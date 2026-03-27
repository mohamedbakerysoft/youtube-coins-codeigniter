<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * NETBEANS - Code Completion Keys
 * @property CI_Loader $load
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property authority $authority
 * @property CI_Email $email
 * @property CI_Session $session
 * @property CI_DB_active_record $db
 * @property Admin_model $admin
 */
class Admin extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library("form_validation");
        $this->form_validation->set_error_delimiters('<span class="uk-alert-danger">', '</span>');
        $this->load->library('upload');
        $config['upload_path'] = 'assets/uploads/';
        $config['encrypt_name'] = false;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->upload->initialize($config);
    }

    function index()
    {
        $this->is_logged();
    }

    function setting()
    {
        $this->set_last_url('admin/setting');
        $this->is_logged();
        if(ENVIRONMENT !== 'DEMO'){
            $this->_admin_check_right_redirect();
        }
        $this->form_validation->set_rules('website-name', "website name", 'trim|required|htmlspecialchars');
        $this->form_validation->set_rules('title', "title", 'trim|required|htmlspecialchars');
        $this->form_validation->set_rules('description', "description", 'trim|required|htmlspecialchars');
        $this->form_validation->set_rules('keywords', "keywords", 'trim|required|htmlspecialchars');
        $this->form_validation->set_rules('ads-header', "ads-header", 'trim');
        $this->form_validation->set_rules('ads-footer', "ads-footer", 'trim');
        $this->form_validation->set_rules('infront-article-message', "infront-article-message", 'trim');
        $site_logo = '';
        $favicon = '';
        $site_watermark_path = '';
        // validation website logo
        if(ENVIRONMENT !== 'DEMO') {
            if (array_key_exists("site-logo", $_FILES)) {
                if ($_FILES["site-logo"]['name']) {
                    $site_logo = base_url() . 'assets/uploads/' . $this->upload('site-logo');
                } else {
                    $site_logo = false;
                }
            }
        }

        if(ENVIRONMENT !== 'DEMO') {
            if (!$site_logo && $this->input->post('submit_input')) {
                $vars['site_logo_msg'] = $this->upload->display_errors('', '');
            } else {
                $vars['site_logo_msg'] = '';
            }

            // validation website logo
            if (array_key_exists("site-watermark-path", $_FILES)) {
                if ($_FILES["site-watermark-path"]['name']) {
                    $site_watermark_path = base_url() . 'assets/uploads/' . $this->upload('site-watermark-path');
                } else {
                    $site_watermark_path = false;
                }
            }

            if (!$site_watermark_path && $this->input->post('submit_input')) {
                $vars['site_watermark_msg'] = $this->upload->display_errors('', '');
            } else {
                $vars['site_watermark_msg'] = '';
            }

            // validation favicon
            $this->upload->error_msg = array();
            if (array_key_exists('favicon', $_FILES)) {
                if ($_FILES["favicon"]['name']) {
                    $favicon = base_url() . 'assets/uploads/' . $this->upload('favicon');
                } else {
                    $favicon = false;
                }
            }

            if (!$favicon && $this->input->post('submit_input')) {
                $vars['favicon_msg'] = $this->upload->display_errors('', '');
            } else {
                $vars['favicon_msg'] = '';
            }
        }

        if ($this->form_validation->run() == true) {
            if(ENVIRONMENT !== 'DEMO') {
                if ($site_logo) {
                    $this->option->update('site-logo', $site_logo);
                }

                if ($site_watermark_path) {
                    $this->option->update('site-watermark-path', $site_watermark_path);
                }

                if ($favicon) {
                    $this->option->update('favicon', $favicon);
                }
                $this->option->update('website-name', $this->input->post('website-name'));
                $this->option->update('website-email', $this->input->post('website-email'));
                $this->option->update('title', $this->input->post('title'));
                $this->option->update('description', $this->input->post('description'));
                $this->option->update('keywords', $this->input->post('keywords'));
                $this->option->update('ads-header', $this->input->post('ads-header'));
                $this->option->update('ads-article', $this->input->post('ads-article'));
                $this->option->update('ads-footer', $this->input->post('ads-footer'));
                $this->option->update('uk-theme', $this->input->post('uk-theme'));
                $this->session->set_userdata('selected-theme', $this->option->get('uk-theme'));
                $this->option->update('comments-sitting-1', $this->input->post('comments-sitting-1'));
                $this->option->update('auto-approve-article', $this->input->post('auto-approve-article'));
                $this->option->update('site-watermark-state', $this->input->post("site-watermark-state"));
                $this->option->update('infront-article-message', $this->input->post('infront-article-message'));
                $this->option->update('cache-state', $this->input->post('cache-state'));
                $this->option->update('cache-period', (int)$this->input->post('cache-period'));

                // pages setting
                $this->option->update('about', $this->input->post('about'));
                $this->option->update('contact', $this->input->post('contact'));
                $this->option->update('how-it-works', $this->input->post('how-it-works'));


                $this->option->update('google-login-state', $this->input->post('google-login-state'));
                // google api
                option_update('recapatcha-api-key', $this->input->post('recapatcha-api-key'));
                $this->option->update('google-login-state', $this->input->post('google-login-state'));
                $this->option->update('google-api-key', $this->input->post('google-api-key'));
                $this->option->update('google-client-id', $this->input->post('google-client-id'));
                $this->option->update('google-client-secret', $this->input->post('google-client-secret'));

                // points setting
                $this->option->update('register-points', $this->input->post('register-points'));
                $this->option->update('login-points', $this->input->post('login-points'));
                $this->option->update('add-new-article-points', $this->input->post('add-new-article-points'));
                $this->option->update('earned-views-points', $this->input->post('earned-views-points'));

                // paypal setting
                option_update('paypal-email', $this->input->post('paypal-email'));
                option_update('paypal-product-name', $this->input->post('paypal-product-name'));
                option_update('paypal-amount', $this->input->post('paypal-amount'));
                option_update('paypal-price', $this->input->post('paypal-price'));
                option_update('paypal-currency', $this->input->post('paypal-currency'));
                option_update('paypal-sand-box', $this->input->post('paypal-sand-box'));

                // facebook setting
                option_update('facebook-login-state', $this->input->post('facebook-login-state'));
                option_update('fb-appId', $this->input->post('fb-appId'));
                option_update('fb-secret', $this->input->post('fb-secret'));
            }
            $this->session->set_flashdata('success_msg', lang('Data_updated'));
            redirect('admin/setting');
        }
        $this->view('admin/setting', $vars);
    }

    function upgrade()
    {
        $this->demo_mode('admin/setting');
        $this->load->helper('file_helper');
        $this->set_last_url('admin/setting');
        $this->is_logged();
        $this->_admin_check_right_redirect();

        if (array_key_exists('hdphp', $_FILES)) {
            if ($_FILES["hdphp"]['name']) {
                $config['upload_path'] = 'assets/uploads/';
                $config['encrypt_name'] = false;
                $config['allowed_types'] = 'zip';
                $this->upload->initialize($config);
                $new_version = base_url() . 'assets/uploads/' . $this->upload('hdphp');
                $error = $this->upload->display_errors();
                if ($error) {
                    $this->session->set_flashdata('error_msg', $this->upload->display_errors());
                    redirect('admin/setting#upgrade');
                }
                if ($new_version) {
                    $data = array('upload_data' => $this->upload->data());

                    $zip = new ZipArchive;
                    $file = $data['upload_data']['full_path'];
                    chmod($file, 0777);
                    if ($zip->open($file) === true) {
                        $zip->extractTo('./');
                        $zip->close();
                    }
                    @unlink($file);
                    $this->session->set_flashdata('success_msg', 'Congratulations, your upgrade process succeed');
                    redirect('admin/setting#upgrade');
                }
            } else {
                redirect('admin/setting#upgrade');
            }
        } else {
            $this->session->set_flashdata('error_msg', lang('nothing-selected'));
            redirect('admin/setting#upgrade');
        }
    }

    function custom_style()
    {
        $this->demo_mode('admin/setting');
        $this->set_last_url('admin/custom_style');
        $this->is_logged();
        $this->_admin_check_right_redirect();
        $this->form_validation->set_rules('css-file', "css-file", 'trim');

        if ($this->form_validation->run() == true) {
            $this->option->update('css-file', $this->input->post('css-file'));
            // write the new style to style.css file
            $fp = fopen('assets/themes/default/css/style.css', 'w');
            fwrite($fp, $this->input->post('css-file'));
            fclose($fp);

            $this->session->set_flashdata('success_msg', lang('Data_updated'));
            redirect('admin/custom_style');
        }

        $vars['fp'] = file_get_contents('./assets/themes/default/css/style.css');
        $this->view('admin/custom_style',$vars);
    }

    function categories()
    {
        $this->demo_mode('admin/setting');
        $this->set_last_url('admin/categories');
        $this->is_logged();
        $this->_admin_check_right_redirect();
        $this->db->order_by('category_name', 'ASC');
        $vars['categories'] = $this->db->get_where('categories', array('category_state' => 1))->result();
        $this->view('admin/categories', $vars);
    }

    function users()
    {
        $this->demo_mode('admin/setting');
        $this->set_last_url('admin/users');
        $this->is_logged();
        $this->_admin_check_right_redirect();
        $this->db->order_by('user_created_date', 'DESC');
        $vars['users'] = $this->db->get_where('users', array('user_state' => 1))->result();
        $this->view('admin/users', $vars);
    }


    function articles()
    {
        $this->demo_mode('admin/setting');
        $this->set_last_url('admin/articles');
        $this->is_logged();
        $this->_admin_check_right_redirect();
        $this->db->join('users', 'ar_user_id = user_id', 'left');
        $this->db->order_by('ar_created_date', 'DESC');
        $this->db->where('ar_state', 1);
        $vars['articles'] = $this->db->get('articles')->result();
        $this->view('admin/articles', $vars);
    }

    function add_category()
    {
        $this->demo_mode('admin/setting');
        $this->set_last_url('admin/add_category');
        $this->is_logged();
        $this->_admin_check_right_redirect();
        $this->form_validation->set_rules('category_name', lang('Category name'), 'trim|required');
        if ($this->form_validation->run() == true) {
            $stdClass = new stdClass();
            $stdClass->category_name = $this->input->post('category_name');
            $stdClass->category_icon_code = $this->input->post('category_icon_code');
            $stdClass->category_active = $this->input->post('category_active');
            $stdClass->category_state = 1;
            $this->db->insert('categories', $stdClass);
            $category_id = $this->db->insert_id();
            $this->session->set_flashdata('success_msg', 'Data Inserted');
            redirect('admin/categories#' . $category_id);
        }
        $vars['form_title'] = 'Add new Language';
        $vars['form_action'] = 'add_category';
        $vars['checked'] = 'checked="true"';
        $vars['form_submit'] = 'Add';
        $this->view('admin/add_category', $vars);
    }

    function edit_category($category_id = 0)
    {
        $this->demo_mode('admin/setting');
        $this->set_last_url('admin/edit_category');
        $this->is_logged();
        $this->_admin_check_right_redirect();
        $this->form_validation->set_rules('category_name', lang("Category name"), 'trim|required');

        if ($this->form_validation->run() == true) {
            $stdClass = new stdClass();
            $stdClass->category_name = $this->input->post('category_name');
            $stdClass->category_icon_code = $this->input->post('category_icon_code');
            $stdClass->category_active = $this->input->post('category_active');
            $this->db->where('category_id', $category_id);
            $this->db->update('categories', $stdClass);
            $this->session->set_flashdata('success_msg', 'Data Updated');
            redirect('admin/categories#' . $category_id);
        }
        $this->db->where('category_id', $category_id);
        $vars['category'] = $this->db->get('categories')->row();
        $vars['form_title'] = 'Edit Language';
        $vars['form_action'] = 'edit_category/' . $category_id;
        $vars['checked'] = ($vars['category']->category_active == 1) ? 'checked="true"' : '';
        $vars['form_submit'] = 'Update';
        $this->view('admin/add_category', $vars);
    }

    /**
     * @param int $category_id
     */
    function delete_category($category_id = 0)
    {
        $this->demo_mode('admin/setting');
        $this->set_last_url('admin/categories');
        $this->is_logged();
        $this->_admin_check_right_redirect();
        $this->session->set_flashdata('error_msg', 'Data deleted');
        $this->db->set('category_state', 0);
        $this->db->where('category_id', $category_id);
        $this->db->update('categories');
        redirect('admin/categories');
    }

    function delete_user($user_id = 0)
    {
        $this->demo_mode('admin/setting');
        $this->set_last_url('admin/users');
        $this->is_logged();
        $this->_admin_check_right_redirect();
        if ($user_id != 1) {
            $this->session->set_flashdata('error_msg', lang('Data deleted'));
            $this->db->set('user_state', 0);
            $this->db->where('user_id', $user_id);
            $this->db->update('users');
        } else {
            $this->session->set_flashdata('warning_msg', lang('not allowed to delete admin'));
        }

        redirect('admin/users');
    }

    /**
     * @param int $category_id
     */
    function active_category($category_id = 0)
    {
        $this->demo_mode('admin/setting');
        $this->set_last_url('admin/categories');
        $this->is_logged();
        $this->_admin_check_right_redirect();
        $this->db->where('category_id', $category_id);
        $category = $this->db->get('categories')->row();
        $this->session->set_flashdata('success_msg', lang('Data_updated'));

        if ($category->category_active) {
            $this->db->set('category_active', 0);
        } else {
            $this->db->set('category_active', 1);
        }

        $this->db->where('category_id', $category_id);
        $this->db->update('categories');
        redirect('admin/categories#' . $category_id);
    }

    /**
     * @param int $article_id
     */
    function active_article($article_id = 0)
    {
        $this->demo_mode('admin/setting');
        $this->set_last_url('admin/articles');
        $this->is_logged();
        $this->_admin_check_right_redirect();
        $this->db->where('ar_id', $article_id);
        $article = $this->db->get('articles')->row();
        $this->session->set_flashdata('success_msg', lang('Data_updated'));

        if ($article->ar_active) {
            $this->db->set('ar_active', 0);
        } else {
            $this->db->set('ar_active', 1);
        }

        $this->db->where('ar_id', $article_id);
        $this->db->update('articles');
        redirect('admin/articles#' . $article_id);
    }

    /**
     * @param int $article_id
     */
    function delete_article($article_id = 0)
    {
        $this->demo_mode('admin/setting');
        $this->set_last_url('admin/articles');
        $this->is_logged();
        $this->_admin_check_right_redirect();
        // at first get the article data
        $this->db->where('ar_id', $article_id);
        $this->db->delete('articles');
        $this->session->set_flashdata('error_msg', lang('Data deleted'));
        redirect('admin/articles');
    }
}