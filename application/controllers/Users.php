<?php

class Users extends MY_Controller
{
    public $user = "";

    function __construct()
    {
        parent::__construct();
        $this->load->model("users_model", "users");
        $this->load->model("articles_model");
        $this->load->library('upload');
        $this->load->library('form_validation');
        $config['upload_path'] = 'assets/uploads/';
        $config['encrypt_name'] = false;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('pagination');
        $this->upload->initialize($config);
    }

    function index()
    {
        if ($this->user) {
            $data['user_profile'] = $this->facebook->api('/me/');

            // Get logout url of facebook
            $data['logout_url'] = $this->facebook->getLogoutUrl(array('next' => base_url() . 'index.php/oauth_login/logout'));

            // Send data to profile page
            $this->load->view('profile', $data);
        } else {
            // Store users facebook login url
            $data['login_url'] = $this->facebook->getLoginUrl();
            $this->load->view('login', $data);
        }
    }

    function login()
    {
        if ($this->authority->is_logged()) {
            redirect('site');
        }

        if ($this->option->get('facebook-login-state') == '1') {
            $this->facebook();
        }

        $this->_load_form_validation();
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|max_length[100]|htmlspecialchars|valid_email'
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|min_length[6]|max_length[30]'
        );
        if ($this->_use_recaptcha()) {
            $this->form_validation->set_rules(
                'g-recaptcha-response',
                'Recaptcha',
                'required'
            );
        }
        if ($this->form_validation->run() == true) {
            $this->_do_login();
        } else {
            $this->view('users/login');
        }
    }

    public function registerLoginWithGoogle()
    {
        if ($this->option->get('google-login-state') == '1') {

            $this->db->where('user_email', $this->input->post('email'));
            $this->db->where('user_state', 1);
            $user = $this->db->get('users')->row();
            if (is_object($user)) {
                $this->authority->set_user_data($user);
            } else {
                $userObj = new stdClass();
                $userObj->user_photo = $this->input->post('image');
                $userObj->user_username = url_title($this->input->post('name'));
                $userObj->user_email = $this->input->post('email');
                $userObj->user_created_date = time();
                $this->db->insert('users', $userObj);
                $this->db->where('user_email', $this->input->post('email'));
                $user = $this->db->get('users')->row();
                $this->authority->set_user_data($user);
            }

            redirect('site');
        }
    }

    private function facebook()
    {
        $this->load->library('facebook');

        $user = $this->facebook->getUser();

        if ($user) {
            try {
                $user_profile = $this->facebook->api('/me');
            } catch (FacebookApiException $e) {
                $user = null;
            }
        } else {
            $this->facebook->destroySession();
        }

        if ($user) {
            $data['logout_url'] = site_url('users/logout'); // Logs off application

            $this->db->where('user_email', $user_profile['email']);
            $this->db->where('user_state', 1);
            $user = $this->db->get('users')->row();
            if (is_object($user)) {
                $this->authority->set_user_data($user);
                redirect('site');
            } else {
                $userObj = new stdClass();
                $userObj->user_photo = "https://graph.facebook.com/" . $user_profile['id'] . "/picture?type=large";
                $userObj->user_username = $user_profile['name'];
                $userObj->user_email = $user_profile['email'];
                $userObj->user_created_date = time();
                $this->db->insert('users', $userObj);
                $this->db->where('user_email', $user_profile['email']);
                $user = $this->db->get('users')->row();
                $this->authority->set_user_data($user);
            }

            redirect('site');
        } else {
            $data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('users/login/2'),
                'scope' => array("email") // permissions here
            ));
        }
        $this->load->vars($data);
    }

    /**
     * @param string $username user_username
     */
    function profile($username = '')
    {
        $this->db->join('points', 'users.user_id = points.user_id', 'left');
        $vars['user'] = $this->db->get_where('users', array('user_username' => $username))->row();
        if (!is_object($vars['user'])) {
            $this->set_flashdata_page_not_found();
        }

        if (@$vars['user']->user_id == @$this->authority->user->user_id) {
            $vars['not_the_author'] = false;
        } else {
            $vars['not_the_author'] = true;
        }
        $this->_load_form_validation();
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|htmlspecialchars|min_length[3]|max_length[17]'
        );
        $this->form_validation->set_rules('email', 'Email address ', 'required|valid_email|max_length[100]');
        $this->form_validation->set_rules('password', 'Password', 'min_length[6]|max_length[17]');

        if ($this->form_validation->run() == true) {
            if (is_object($this->authority->user)) {
                if ($vars['not_the_author'] === false) {
                    $this->db->set('user_username', url_title($this->input->post('username')));
                    $this->db->set('user_email', $this->input->post('email'));
                    if ($this->input->post('password')) {
                        $this->db->set('user_password', $this->input->post('password'));
                    }
                    if (@$_FILES["user_photo"]['name']) {
                        $user_photo = $this->upload('user_photo');
                        $user_photo = base_url() . 'assets/uploads/' . $user_photo;
                        $this->db->set('user_photo', $user_photo);
                    }
                    $this->db->where('user_id', $this->authority->user->user_id);
                    $this->db->update('users');
                } else {
                    $this->session->set_flashdata('error_msg', 'It`s not allowed to access this account');
                    redirect('users/login');
                }
            } else {
                $this->session->set_flashdata('error_msg', 'You have to login to do this action');
                redirect('users/login');
            }
            // update the login information
            $new_data = $this->db->get_where('users', array('user_id' => @$this->authority->user->user_id))->row();
            $this->session->set_userdata('user_data', $new_data);

            $this->session->set_flashdata('success_msg', 'Congratulations! You have successfully update your data');
            redirect('users/profile/' . $this->input->post('username'));
        }

        $vars['site'] = $this;
        $this->view('users/profile', $vars);
    }

    function profile_likes($username = '')
    {
        $this->run_cache();
        $vars['user'] = $this->db->get_where('users', array('user_username' => $username))->row();
        if (!is_object($vars['user'])) {
            $this->set_flashdata_page_not_found();
        }
        $query = "SELECT * FROM articles_likes";
        $query .= " LEFT JOIN articles ON articles_likes.ar_id = articles.ar_id AND ar_state = 1
                    AND articles.ar_active = 1
                    JOIN categories ON categories.category_id = articles.bridge_category_id AND articles.ar_state = 1
                    ";
        $query .= " JOIN users ON articles.ar_user_id = users.user_id ";
        $query .= " JOIN points ON points.user_id = users.user_id ";
        $query .= " WHERE users.user_id = '" . @$vars['user']->user_id . "'";
        $query .= " ORDER BY created_date DESC";
        $vars['articles'] = $this->db->query($query)->result();

        $vars['site'] = $this;
        $this->view('users/profile_likes', $vars);
    }

    function count_comments($article_id = 0)
    {
        $this->db->where('bridge_ar_id', $article_id);

        return $this->db->count_all_results('articles_comments');
    }

    function count_likes($article_id = 0)
    {
        $this->db->where('ar_id', $article_id);

        return $this->db->count_all_results('articles_likes');
    }

    function count_views($url = '')
    {
        $this->db->where('url', $url);

        return $this->db->count_all_results('analytics_views');
    }

    function sign_up()
    {
        $this->_load_form_validation();
        $this->session->unset_userdata('user');
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|max_length[100]|htmlspecialchars|is_unique[users.user_username]|min_length[3]|max_length[17]'
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|min_length[6]|max_length[30]|matches[confirmPassword]'
        );
        $this->form_validation->set_rules(
            'confirmPassword',
            'Confirm password',
            'required|min_length[6]|max_length[30]'
        );
        $this->form_validation->set_rules(
            'email',
            'Email address ',
            'required|valid_email|max_length[150]|is_unique[users.user_email]'
        );
        if ($this->uri->segment(1) == 'register' && $this->uri->segment(2)) {
            $this->form_validation->set_rules(
                'user_ip',
                'Ip Address ',
                'required|is_unique[users.user_ip]'
            );
        }
        if ($this->_use_recaptcha()) {
            $this->form_validation->set_rules(
                'g-recaptcha-response',
                'Recaptcha',
                'required'
            );
        }
        $this->form_validation->set_message('is_unique', 'Already registered');

        if ($this->form_validation->run() == true) {
            if ($this->uri->segment(1) == 'register' && $this->uri->segment(2)) {
                $username = base64url_decode($this->uri->segment(2));
                setcookie('username', $username);
                $this->db->from('users');
                $this->db->where('user_username', $username);
                $query = $this->db->get();
                $user = $query->row();
                //check if referral user exist
                if ($user == null) {
                    $this->session->set_flashdata('error_msg', 'Wrong Referral Link!');
                    return redirect('users/sign_up');;
                }
                $this->update_points($this->option->get('referral_awards'), '+', $user->user_id);
                $this->users->update_one_field($user->user_id, 'referral_counter', $user->referral_counter + 1);
            }


            if ($this->uri->segment(1) == 'register' && $this->uri->segment(2)) {
                $this->db->set('referral_user_id', $user->user_id);
            }
            $this->db->set('user_username', url_title($this->input->post('username')));
            $this->db->set('user_email', $this->input->post('email'));
            $this->db->set('user_password', md5($this->input->post('password')));
            $this->db->set('user_state', 1);
            $this->db->set('user_created_date', time());
            $this->db->set('user_group_id', 3);  // members group
            $this->db->set('user_ip', $this->input->post('user_ip'));  // members group
            $this->db->insert('users');
            $this->session->set_flashdata('success_msg', 'Congratulations! You have successfully registered');
            $this->_do_login(true);
            redirect('site');
        } else {
            $this->view('users/sign_up');
        }
    }

    function sign_out()
    {
        //Logout Process Succeed
        if (isset($_SESSION['access_token'])) {
            unset($_SESSION['access_token']);
            $this->session->sess_destroy();
            $this->load->view('redirect');
        } else {
            //unset($_SESSION['access_token']);
            $this->session->sess_destroy();
            redirect('users/login');
        }
    }

    private function _do_login($first_register = false)
    {
        $login = $this->authority->check_user($this->input->post('email'), md5($this->input->post('password')));
        if ($login) {
            $this->db->where('user_email', $this->input->post('email'));
            $this->db->where('user_password', md5($this->input->post('password')));
            $result = $this->db->get('users')->row();
            if ($first_register) {
                $this->session->set_flashdata('success_msg', 'You have Earned ' . $this->option->get('register-points') . ' Point cause you register at ' . $this->option->get('website-name'));
                $this->update_points($this->option->get('register-points'), '+', $result->user_id);
            } else {
                $this->update_points($this->option->get('login-points'), '+', $result->user_id);
            }

            if ($this->get_last_url()) {
                redirect($this->get_last_url());
            } else {
                redirect('site');
            }
        } else {
            $this->session->set_flashdata('error_msg', 'Wrong email or password!');
            redirect('users/login');
        }
    }

    private function _load_form_validation()
    {
        $this->load->library("form_validation");
        $this->form_validation->set_error_delimiters("<span class='uk-alert-danger'>", "</span>");
    }

    private function _use_recaptcha()
    {
        return (bool) trim((string) $this->option->get('recapatcha-api-key'));
    }

    function videos()
    {
        $config['per_page'] = 10;
        $page_number = $this->uri->segment(3);

        $videos = $this->articles_model->list_videos($this->authority->user->user_id, $config['per_page'], $page_number);
        $data['videos'] = $videos['result'];

        $config['base_url'] = base_url() . 'users/videos/';
        $config['total_rows'] = $videos['count'];

        $config["uri_segment"] = 3;


        $config['full_tag_open'] = '<ul class="uk-pagination">';
        $config['full_tag_close'] = '</ul>';
        $config["first_tag_open"]  = '<li>';
        $config["first_tag_close"] = '</li>';
        $config["last_tag_open"]   = '<li>';
        $config["last_tag_close"]  = '</li>';
        $config["next_tag_open"]   = '<li>';
        $config["next_tag_close"]  = '</li>';
        $config["prev_tag_open"]   = '<li>';
        $config["prev_tag_close"]  = '</li>';
        $config["num_tag_open"]   = '<li>';
        $config["num_tag_close"]  = '</li>';
        $config["cur_tag_open"]    = '<li class="uk-active"><span>';
        $config["cur_tag_close"]   = '</span></li>';
        $config['first_link'] = 'First Page';
        $config['last_link'] = 'Last Page';
        $config['next_link'] = 'Next Page';
        $config['prev_link'] = 'Prev Page';

        $this->pagination->initialize($config);
        $this->view('users/videos', $data);
    }

    function paypal_email()
    {
        $this->form_validation->set_rules('paypal_email', 'Paypal Email', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            return redirect('paypal/withdraw');
        } else {
            $user_id = $this->authority->user->user_id;

            $this->users->save_paypal_email($user_id);
            $this->session->set_flashdata('success_msg', 'Paypal Email Saved Successfully');
            $data['paypal_email'] = $this->input->post('paypal_email');
            $this->view('paypal/withdraw', $data);
        }
    }
}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */
