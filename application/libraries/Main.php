<?php

class Main extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->language("public");
    }

    function check_right($right = '')
    {
        return $this->authority->check_right($right);
    }

    function _admin_check_right_redirect()
    {
        if (!$this->authority->check_right('manage-all')) {
            $this->session->set_flashdata('warning_msg', lang('no-perm'));
            redirect('users/login');
        }
    }

    protected function _check_right_redirect($right = '', $destination = 'users/login')
    {
        if (!$this->authority->check_right($right)) {
            $this->session->set_flashdata('warning_msg', lang('no-perm'));
            redirect($destination);
        }
    }

    protected function profiler()
    {
        $this->output->enable_profiler(true);
    }

    protected function alert($message = '', $redirect = '')
    {
        ?>
        <script type="text/javascript">
            alert("<?php echo  $message ?>");
            window.location = '<?php echo  base_url() . $redirect ?>';
        </script>
    <?php
    }

    /**
     * @example image_url
     * @param file $file
     * @return file_url if true otherwise return false
     */
    protected function upload($file_name = '')
    {
        if ($this->upload->do_upload($file_name)) {
            $image = $this->upload->data();

            return $image['file_name'];
        } else {
            return false;
        }
    }

    function run_cache()
    {
        if ($this->option->get('cache-state')) {
            $this->output->cache($this->option->get('cache-period'));
        }
    }

}