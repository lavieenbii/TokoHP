<?php

class Basket extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_order');
    }

    public function index()
    {
        $userId = $this->session->userdata('id');

        $data['orders'] = $this->m_order->get_order_buyer($userId);

        return $this->load->view('customer/basket', $data);
    }
}