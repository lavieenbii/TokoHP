<?php

class User_confirmation extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user_confirmation', 'M_order');
    }

   public function index()
	{
		$data['order_products'] = $this->M_order->getAll();
		$this->load->view('customer/user_confirmation', $data);
	}

    public function customer_confirmation($id)
    {
        $this->M_order->customer_confirmation($id);
        redirect('customer/user_confirmation');
    }
    
    public function customer_unconfirmation($id)
    {
        $this->M_order->customer_unconfirmation($id);
        redirect('customer/user_confirmation');
    }
}