<?php

/**
 * @property CI_Loader $load
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_Email $email
 * @property CI_Session $session
 * @property CI_DB_active_record $db
 * @property CI_Pagination $pagination
 * @property CI_upload $upload
 */
class Site extends MY_Controller
{
    private $articles_limit = 30;

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->init_switcher();
        $vars['site'] = $this;

        if ($this->uri->segment(1) == 'category') {
            $article = $this->db->query('SELECT * FROM categories WHERE category_id = ' . $this->uri->segment(2))->row();
            $this->session->set_userdata('category_name', @$article->category_name);
            if ($this->uri->segment(2) == 0) {
                $this->session->set_userdata('category_name', 'All Languages');
            }
        } else {
            $this->session->set_userdata('category_name', 'All Languages');
        }
        $vars['first_video'] = $this->db->query("SELECT * FROM articles WHERE ar_first = '1'")->row();
        $this->view('site/index', $vars);
    }

    private function init_switcher()
    {
        if ($this->uri->segment(2) == 'close-frame') {
            $this->session->set_userdata('download-iframe', 2);
        }

        if ($this->uri->segment(2) == 'open-frame') {
            $this->session->set_userdata('download-iframe', 1);
            $this->session->set_userdata('selected-theme', $this->option->get('uk-theme'));
        }

        if ($this->uri->segment(2) == 'selectTheme1') {
            $this->session->set_userdata('selected-theme', 'uikit.min.css');
        }

        if ($this->uri->segment(2) == 'selectTheme2') {
            $this->session->set_userdata('selected-theme', 'uikit.almost-flat.min.css');
        }

        if ($this->uri->segment(2) == 'selectTheme3') {
            $this->session->set_userdata('selected-theme', 'uikit.gradient.min.css');
        }

        if ($this->uri->segment(2) == 'selectTheme4') {
            $this->session->set_userdata('selected-theme', 'uikit-dark.min.css');
        }
    }

    public function list_articles()
    {
        if (is_object($this->authority->user)) {
            $user_id = $this->authority->user->user_id;
        } else {
            $user_id = 0;
        }

        $this->initialize_limit();
        $limit = $this->articles_limit;
        $query = "SELECT ar_title,ar_tags,ar_id,ar_main_thumb,ar_ord,url FROM articles";
        $query .= " LEFT JOIN analytics_views ON analytics_views.url = articles.ar_id AND analytics_views.ip = " . $user_id;
        $query .= " WHERE ar_state = 1 AND ar_active = 1 AND ar_first != 1";
        $query .= $this->filter_query();
        $query .= " ORDER BY ar_ord ASC ";
        $query .= " LIMIT " . $limit;
        $vars['articles'] = $this->db->query($query)->result();

        $vars['site'] = $this;
        $this->load->view($this->front_end_template_path . 'site/list_articles', $vars);
    }

    private function filter_query()
    {
        if ($this->uri->segment(1) == 'category' && $this->uri->segment(2) != 0) {
            $this->session->set_userdata('filterQuery', " AND bridge_category_id = '" . $this->uri->segment(2) . "' ");
        } else {
            $this->session->set_userdata('filterQuery', "");
        }

        return $this->session->userdata('filterQuery');
    }

    /**
     * set articles_limit flash data number of articles to view in home
     */
    private function initialize_limit()
    {
        if ($this->session->userdata('articles_limit_counter') > 0) {
            $this->session->set_userdata(
                'articles_limit',
                $this->session->userdata('articles_limit') + $this->articles_limit
            );
        }
        $this->session->set_userdata('articles_limit_counter', $this->session->userdata('articles_limit_counter') + 1);
    }

    public function add_seconds($seconds = 0, $ar_id = 0)
    {
        $first_video = $this->db->get_where('articles', array('ar_first' => '1'), 1)->row();
        if ($first_video->ar_id == $ar_id) {
            $this->option->update('main-seconds-count-up', $seconds);
            $this->option->update('last-seconds-count-up', time());
        } else {
            //ignore
        }
    }
}
