<?php

/**
 * Created by PhpStorm.
 * User: mohamed
 * Date: 10/06/2015
 * Time: 06:03 م
 */
class Payment extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->library("form_validation");
        $this->load->library('session');
        $this->load->model('Payment_offline_model');
        $this->load->model("users_model", "users");
        $this->load->library('upload');
        $config['upload_path'] = 'assets/uploads/';
        $config['encrypt_name'] = true;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';

        $this->upload->initialize($config);

        $this->payment = new Payment_offline_model;
        $this->user = new Users_model;
    }

    function index()
    {
        $this->is_logged();
        $payments = $this->payment->list_all();
        $data = [
            'payments' => [],
        ];
        foreach ($payments as $payment) {
            $user = $this->user->find_by_id($payment->user_id);
            if ($user) {
                $payment_data = [
                    'id' => $payment->id,
                    'username' => $user->user_username,
                    'amount' => $payment->amount,
                    'status' => $payment->status,
                    'statement' => $payment->statement,
                ];
                $data['payments'][] = $payment_data;
            }
        }

        $this->view('admin/payments', $data);
    }

    function withdraw()
    {
        $this->is_logged();

        $data['bank_info'] = [
            'bank_name' => 'Arab National Bank',
            'account_number' => '123456789',
            'routing_number' => '123456789',
        ];

        $this->view('transactions/withdraw', $data);
    }

    public function save_payment()
    {
        // Get the input values
        $amount = $this->input->post('amount');
        $user_id = $this->authority->user->user_id;
        $statement = '';

        if ($_FILES["statement"]['name']) {
            $statement = $this->upload('statement');
            $statement = base_url() . 'assets/uploads/' . $statement;
        }

        // Save the link in the database
        $data = array(
            'amount' => $amount,
            'user_id' => $user_id,
            'statement' => $statement,
            'status' => 'pending',
        );
        $this->db->insert('payments', $data);

        // Redirect to success page or do something else
        redirect('payment/success');
    }

    // approve payment and update user point with 1 of the amount equal 100 points
    function approve($id)
    {
        $this->is_logged();
        $this->db->where('id', $id);
        $this->db->update('payments', array('status' => 'approved'));
        $payment = $this->db->get_where('payments', array('id' => $id))->row();
        $points = $payment->amount * 100;
        $this->update_points($points, '+', $payment->user_id);
        redirect('payment');
    }

    // reject payment
    function reject($id)
    {
        $this->is_logged();
        $this->db->where('id', $id);
        $this->db->update('payments', array('status' => 'rejected'));
        redirect('payment');
    }
}
