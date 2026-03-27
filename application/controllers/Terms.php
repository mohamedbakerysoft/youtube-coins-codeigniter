<?php

/**
 * Created by PhpStorm.
 * User: mohamed
 * Date: 10/06/2015
 * Time: 06:03 م
 */
class Terms extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('session');
    }

    function index()
    {
        $this->view('terms/index');
    }
}
