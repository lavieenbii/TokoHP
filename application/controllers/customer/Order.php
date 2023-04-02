<?php

class Order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_order');
    }

    public function index()
    {
        $action = $this->input->post('order');
        $productId = $this->input->post('product');

        $buyerId = $this->session->userdata('id');

        $data = [
            'product_id' => $productId,
            'buyer_id' => $buyerId
        ];

        if ($action == 'insert') {
            $this->m_order->insert_order($data);
        } else if ($action == 'delete') {
            $this->m_order->delete_order($data);
        }

        redirect('customer/product/' . $productId);
    }
}