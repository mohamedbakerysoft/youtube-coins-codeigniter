<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * @property CI_Loader $load
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_Email $email
 * @property CI_Session $session
 * @property CI_DB_active_record $db
 * @property CI_Pagination $pagination
 * @property articles_model $articles
 * @property CI_upload $upload
 * @author Mohamed Mahdy <eng.mohamed.php@gmail.com>
 * @copyright Copyright (c) 2015, Web Developer <Mohamed Mahdy>
 */
class Articles extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->config->set_item('uri_protocol', 'PATH_INFO');
        //parse_str($_SERVER['QUERY_STRING'], $_GET);
        $this->load->model(
            [
                'articles_model' => 'articles',
                'Article_views_counter_model',
                'Articles_top_up_model'
            ]
        );

        $this->load->library("form_validation");
        $this->form_validation->set_error_delimiters('<span class="uk-alert-danger">', '</span>');
    }

    public function index()
    {
    }

    private function fill_data()
    {
        $this->load->helper('video_api');
        $this->articles->ar_created_date = time();
        if ($this->option->get('auto-approve-article')) {
            $this->articles->ar_active = 1;
        }
        $this->articles->ar_state = 1;
        $this->articles->ar_user_id = $this->authority->user->user_id;

        $this->articles->ar_video = $this->input->post('url');
        $this->articles->bridge_category_id = $this->input->post('bridge_category_id');
        $this->articles->ar_file_path = $this->input->post('url');
        // retrieve the youtube json data
        $url_type = get_the_url_type($this->input->post('url'));
        // check the type of the posted url
        switch ($url_type) {
            case 'youtube':
                //  add video
                $youtubeArray = get_youtube_info($this->input->post('url'));
                $this->articles->ar_title = $youtubeArray['title'];
                $this->articles->ar_introduction = $youtubeArray['title'];
                $this->articles->ar_tags = $url_type;
                $this->articles->ar_main_thumb = $youtubeArray['thumbnail_url'];
                $this->articles->ar_main_photo = $youtubeArray['thumbnail_url'];
                $this->articles->ar_author = $youtubeArray['author_name'];
                $this->articles->ar_video = str_replace('feature=oembed', 'feature=oembed&autoplay=1', $youtubeArray['html']);
                break;
            case 'vimeo':
                //  add vimeo
                $vimeo_id = filter_var($this->input->post('url'), FILTER_SANITIZE_NUMBER_INT);
                $vimeo_info = get_vimeo_data($vimeo_id);
                $this->articles->ar_title = $vimeo_info->title;
                $this->articles->ar_introduction = $vimeo_info->description;
                $this->articles->ar_tags = $url_type;
                $this->articles->ar_main_thumb = $vimeo_info->thumbnail_large;
                $this->articles->ar_main_photo = $vimeo_info->thumbnail_large;
                $this->articles->ar_author = $vimeo_info->user_name;
                $this->articles->ar_video = get_vimeo_iframe($vimeo_id);
                //  insert vimeo data
                break;
            case 'dailymotion':
                // get dailymotion
                $obj = get_dailymotion($this->input->post('url'));
                // insert dailymotion
                $this->articles->ar_title = $obj->title;
                $this->articles->ar_introduction = $obj->description;
                $this->articles->ar_tags = $url_type;
                $this->articles->ar_main_thumb = $obj->thumbnail_url;
                $this->articles->ar_main_photo = $obj->thumbnail_url;
                $this->articles->ar_author = $obj->author_name;
                $this->articles->ar_video = get_dailymotion_iframe($this->input->post('url'));
                break;
                // check the type of the url  image url
            case 'image':
                // add image
                $this->articles->ar_title = $this->input->post('title');
                $this->articles->ar_introduction = $this->input->post('title');
                $this->articles->ar_tags = $url_type;
                $this->articles->ar_main_thumb = $this->input->post('url');
                $this->articles->ar_main_photo = $this->input->post('url');
                $this->articles->ar_author = $this->authority->user->user_username;
                $this->articles->ar_video = img($this->input->post('url'));
            default:
                $obj = '';
                break;
        }
    }

    private function set_rules()
    {
        $this->form_validation->set_rules('bridge_category_id', lang('bridge_category_id'), 'required|integer');
        $this->form_validation->set_rules('url', 'Url', 'required|prep_url');
    }

    public function create()
    {
        if (!$this->authority->is_logged()) {
            $this->session->set_flashdata('warning_msg', lang('no-login'));
            redirect('users/login');
        }

        if ($this->get_points() <= $this->option->get('add-new-article-points')) {
            $this->session->set_flashdata(
                'warning_msg',
                'Sorry, to add new Video you have to collect ' . $this->option->get('add-new-article-points') . ' at first'
            );
            redirect();
        }

        $this->set_rules();

        if ($this->form_validation->run() === true) {
            $this->fill_data();
            $slug = str_replace(' ', '-', $this->articles->ar_title);
            $this->articles->ar_slug = str_replace('?', '', $slug);
            $this->articles->create_new();
            $this->level_article_up($this->db->insert_id());
            redirect();
        }
        $vars['action'] = 'articles/create';
        $vars['submit_value'] = 'Upload';
        $vars['reset_button'] = 'Discard';
        $vars['article'] = false;
        $this->view("articles/create", $vars);
    }

    public function add_points_to_users($ar_id = 0)
    {

        if ($this->authority->is_logged()) {

            $obj = new stdClass();
            $obj->ip = $this->authority->user->user_id;
            $obj->url = $ar_id;
            $this->db->where('url', $obj->url);
            $this->db->where('ip', $obj->ip);

            if ($this->db->count_all_results('analytics_views') == 0) {
                $this->update_points($this->option->get('earned-views-points'), '+');
                $this->add_view($ar_id);
            }
        }

        echo $this->get_points();
        exit;
    }

    public function discard()
    {
        redirect();
    }

    /**
     * @param string $id
     */
    public function details($id = 0)
    {
        $this->run_cache();
        $vars['article'] = $this->articles->find_by_id($id);
        if (!is_object($vars['article'])) {
            $this->set_flashdata_page_not_found();
        }
        //$this->set_last_url('articles/' . $id);
        if ($vars['article']->ar_active == 0) {
            $this->session->set_flashdata('warning_msg', 'This video need to activate from admin to view it');
            redirect('site');
        }


        $this->session->set_userdata('last_visited_url', current_url());

        // seo
        $vars['title'] = $this->option->get('infront-article-message') . ' ' . $vars['article']->ar_title . ' - ' . $this->option->get('website-name'); // page title
        //$vars['keywords'] = $vars['article']->ar_tags; // page keywords
        $vars['description'] = $vars['article']->ar_introduction; // page description

        if (@$this->authority->user->user_id == $vars['article']->ar_user_id) {
            $vars['is_author'] = true;
        } else {
            $vars['is_author'] = false;
        }

        $this->load->vars($vars);
        $this->load->view($this->front_end_template_path . "articles/details");
    }

    /**
     * @param int $article_id
     */
    function delete_article($article_id = 0)
    {
        // at first get the article data
        $this->db->where('ar_id', $article_id);
        $this->db->delete('articles');
        $this->session->set_flashdata('error_msg', 'Article Deleted');
        redirect();
    }

    /**
     * insert new view to the views counter if it were unique
     */
    private function add_view($ar_id = 0)
    {
        if ($this->authority->is_logged()) {
            $obj = new stdClass();
            $obj->ip = @$this->authority->user->user_id;
            $obj->created_date = time();
            $obj->url = $ar_id;

            $this->db->where('url', $obj->url);
            $this->db->where('ip', $obj->ip);

            $view['article_id'] = $ar_id;
            $view['user_id'] = $this->authority->user->user_id;

            $this->Article_views_counter_model->save($view);
            $earned_points = $this->option->get('earned-views-points');
            $this->Articles_top_up_model->update_current_balance($earned_points, $ar_id);

            $current_balance = $this->Articles_top_up_model->get_current_balance($ar_id);
            if ($current_balance == 0) {
                $this->articles->un_active_ar($ar_id);
            }

            //echo $this->db->count_all_results('analytics_views');
            if ($this->db->count_all_results('analytics_views') == 0) {

                $this->db->insert('analytics_views', $obj);
            }
        }
    }

    /**
     * @param integer $id
     */
    public function remove_articles($id)
    {
        $this->articles->delete($id);
    }

    public function level_article_up($ar_id = 0)
    {
        $this->db->where('ar_id', $ar_id);
        $article = $this->db->get('articles')->row();
        if ($article->ar_user_id != @$this->authority->user->user_id) {
            log_message('error', 'the articles id != the logged user id , so the system will refuse to level the video up');
            exit;
        }

        if ($this->get_points() >= $this->option->get('add-new-article-points')) {
            $this->update_points($this->option->get('add-new-article-points'), '-');
        } else {
            $this->session->set_flashdata(
                'warning_msg',
                'Sorry, to add new Video you have to collect ' . $this->option->get('add-new-article-points') . ' at first'
            );
            //redirect();
            exit;
        }

        // reset all videos
        $this->db->set('ar_first', 0);
        $this->db->update('articles');

        // level the selected video up
        $this->db->set('ar_first', 1);
        $this->db->set('ar_ord', 1);
        $this->db->where('ar_id', $ar_id);
        $this->db->update('articles');

        // rearrange the previous ar_ord
        // $article->ar_ord refer to the selected video to level it up
        $articles_greater_than_selected = $this->db->query("SELECT * FROM articles WHERE ar_ord > " . $article->ar_ord)->result();
        foreach ($articles_greater_than_selected as $row) {
            $this->db->set('ar_ord', $row->ar_ord - 1);
            $this->db->where('ar_id', $row->ar_id);
            $this->db->update('articles');
            //log_message('error','Now we will minus ('.$row->ar_ord.')');
        }

        // increment all ar_ord by one except ar_first = 1
        $all_articles_except_first = $this->db->query("SELECT * FROM articles WHERE ar_first != 1")->result();
        foreach ($all_articles_except_first as $row) {
            $this->db->set('ar_ord', $row->ar_ord + 1);
            $this->db->where('ar_id', $row->ar_id);
            $this->db->update('articles');
        }

        // set the since counter by 0
        $this->option->update('main-seconds-count-up', 0);
        $this->option->update('last-seconds-count-up', 0);
    }

    public function load_first_video()
    {
        $this->load->view('themes/default/site/first_video');
    }

    /** regenerate numerically from 0 . 1 .2 .3 ascending */
    private function reset_ord()
    { // make it public before run it
        $this->articles->reset_table_ord();
    }

    public function level_up_video()
    {
        $this->update_points($this->input->post('amount'), '-');

        $data['ar_id'] = $this->input->post('article_id');
        $data['amount'] = $this->input->post('amount');

        $userPoints = $this->get_points();
        if ($this->input->post('amount') > $userPoints) {
            $this->session->set_flashdata('error_msg', "You Don't Have Enough Points!");
            return redirect('videos');
        }

        $this->Articles_top_up_model->save($data);
        $this->session->set_flashdata('success_msg', 'Video Leveled up successfully');
        return redirect('videos');
    }

    public function delete_video()
    {
        $video = $this->articles->find_by_id($this->input->post('article_id'));
        if ($video) {
            $this->articles->delete($this->input->post('article_id'));
            $this->session->set_flashdata('success_msg', 'Video Deleted successfully');
            return redirect('/videos');
        }
    }
    public function active_video()
    {
        $video = $this->articles->find_by_id($this->input->post('article_id'));
        if ($video) {
            $this->articles->update_one_field($this->input->post('article_id'), 'ar_active', 1);
            $this->session->set_flashdata('success_msg', 'Video Activated successfully');
            return redirect('/videos');
        }
    }
    public function un_active_video()
    {
        $video = $this->articles->find_by_id($this->input->post('article_id'));
        if ($video) {
            $this->articles->update_one_field($this->input->post('article_id'), 'ar_active', 0);
            $this->session->set_flashdata('success_msg', 'Video Deactivated successfully');
            return redirect('/videos');
        }
    }
}
