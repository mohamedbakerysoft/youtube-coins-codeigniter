<?php

/**
 * Created by PhpStorm.
 * User: mohamed
 * Date: 10/06/2015
 * Time: 06:03 م
 */
class Transactions extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->library("form_validation");
        $this->load->library('session');
        $this->load->model('Payment_model');

        $this->transaction = new Payment_model;
    }

    function index()
    {
        $this->is_logged();
        $data = [
            'transactions' => $this->transaction->_list($this->authority->user->user_id),
        ];
        $this->view('transactions/index', $data);
    }
}
