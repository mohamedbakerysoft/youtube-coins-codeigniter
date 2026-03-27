<?php

/**
 * Created by PhpStorm.
 * User: mohamed
 * Date: 10/06/2015
 * Time: 06:03 م
 */
class Paypal extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->library("form_validation");
        $this->load->library('session');
        $this->load->model('Payment_model');

        $this->payment = new Payment_model;
    }

    function index()
    {
        $this->is_logged();
        $this->view('paypal/index');
    }

    function withdraw()
    {
        $this->is_logged();
        $data['paypal_email'] = $this->authority->user->paypal_field;
        $this->view('paypal/withdraw', $data);
    }

    function success()
    {
        flash_data_success('Congratulations, your balance updated');
        $this->update_points(option_get('paypal-amount'), '+', user_id());
    }

    function cancel()
    {
        flash_data_warning('Payment cancelled.');
        redirect();
    }

    function ipn()
    {
        if ($this->paypal_lib->validate_ipn()) {
            $item_name = $this->paypal_lib->ipn_data['item_name'];
            $price = $this->paypal_lib->ipn_data['mc_gross'];
            $currency = $this->paypal_lib->ipn_data['mc_currency'];
            $payer_email = $this->paypal_lib->ipn_data['payer_email'];
            $txn_id = $this->paypal_lib->ipn_data['txn_id'];
            $key = $this->paypal_lib->ipn_data['transaction_subject'];
            return true;
        } else {
            return false;
        }
    }

    function withdraw_transaction()
    {
        $this->form_validation->set_rules('withdraw_amount', 'Withdraw Amount', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            return redirect('paypal/withdraw');
        } else {

            if ($this->input->post('withdraw_amount') < 1000) {
                $this->session->set_flashdata('error_msg', 'The minimum amount to withdraw in 1000 coins');
                return redirect('paypal/withdraw');
            }

            $userPoints = $this->get_points();
            if ($this->input->post('withdraw_amount') > $userPoints) {
                $this->session->set_flashdata('error_msg', "You Don't Have Enough Points!");
                return redirect('paypal/withdraw');
            }

            $this->payment->amount = $this->input->post('withdraw_amount');
            $this->payment->status = 'pending';
            $this->payment->user_id = $this->authority->user->user_id;

            $this->payment->save_transactions();
            $this->update_points($this->input->post('withdraw_amount'), '-');
            $this->session->set_flashdata('success_msg', 'We received your request and will review within 2-5 Days');
            $data['paypal_email'] = $this->authority->user->paypal_field;
            $this->view('paypal/withdraw', $data);
        }
    }
}
