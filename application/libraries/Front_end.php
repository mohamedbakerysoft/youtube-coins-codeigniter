<?php

/**
 * Description of front_end
 *
 * @author Mohamed Mahdy
 *
 */
class Front_end extends main
{
    public $selected_theme;
    public $front_end_template_path;

    function __construct()
    {
        parent::__construct();

        if(ENVIRONMENT == 'maintenance') {
            redirect('maintenance');
            die();
        }

        if (!$this->session->userdata('selected-theme')) {
            $this->session->set_userdata('selected-theme', $this->option->get('uk-theme'));
        }

        if (!$this->session->userdata('download-iframe')) {
            if(ENVIRONMENT == 'production') {
                $this->session->set_userdata('download-iframe', 0);
            }else{
                $this->session->set_userdata('download-iframe', 1);
            }
        }

        $this->selected_theme = $this->option->get('selected-theme');
        $this->front_end_template_path = 'user/template/' . $this->selected_theme . '/';
        $this->load_main_vars();
    }

    function get_points()
    {
        $this->db->where('user_id', @$this->authority->user->user_id);
        $result = $this->db->get('points')->row();
        if (is_object($result)) {
            return $result->points;
        } else {
            return 0;
        }
    }

    public function demo_mode($uri)
    {
        if (ENVIRONMENT == 'DEMO') {
            flash_data_warning(lang('Feature only Available in the Premium Version'));
            redirect($uri);
        }
    }

    function set_flashdata_page_not_found()
    {
        $this->session->set_flashdata('warning_msg', 'Sorry this page is not found');
        redirect('site');
    }

    /**
     * print last mysql query or log it to log error
     */
    public function db_last_query($log = false)
    {
        if ($log) {
            log_message('error', $this->db->last_query());
        } else {
            echo $this->db->last_query();
        }
    }

    private function load_main_vars()
    {
        $vars['title'] = $this->option->get('title');
        $vars['keywords'] = $this->option->get('keywords');
        $vars['description'] = $this->option->get('description');
        $this->db->order_by('category_name', 'ASC');
        $this->db->where('category_active', 1);
        $vars['categories'] = $this->db->get_where('categories', array('category_state' => 1))->result();
        $vars['points'] = $this->get_points();
        $this->load->vars($vars);
    }

    /**
     * return module language file
     * @param String $moduleName
     */
    protected function load_lang($moduleName = '')
    {
        $this->lang->load($moduleName);
    }

    /**
     * present master page includes header and footer
     * @param string $main_containt
     * @param array $data
     */
    protected function view($main_content, $data = null)
    {
        $this->load->view('user/template/' . $this->selected_theme . '/header');
        $this->load->view('user/template/' . $this->selected_theme . '/' . $main_content, $data);
        $this->load->view('user/template/' . $this->selected_theme . '/footer');
    }

    protected function is_logged()
    {
        if (!$this->authority->is_logged()) {
            redirect('users/login');
        }
    }

    protected function set_last_url($last_url = '')
    {
        $this->session->set_userdata('last_url', $last_url);
    }

    protected function get_last_url()
    {
        return $this->session->userdata('last_url');
    }

    function update_points($points = 0, $operation = '+', $user_id = 0)
    {
        if ($user_id) {
            $id = $user_id;
        } else {
            $id = $this->authority->user->user_id;
        }
        $this->db->where('user_id',$id);
        $data = $this->db->get('points')->row();

        if(is_object($data)){
            $this->db->where('user_id', $id);
            if ($operation == '+') {
                $this->db->set('points', $data->points + $points);
            } else {
                $this->db->set('points', $data->points - $points);
            }
            $this->db->update('points');
        }else{
            $this->db->set('points', $points);
            $this->db->set('user_id', $id);
            $this->db->insert('points');
        }

    }

}

