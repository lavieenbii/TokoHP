<?php

class Checkouts extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_checkouts');
    }

    public function index()
    {
        $data['checkouts'] = $this->M_checkouts->getAll();
        
		$this->load->view('admin/users/checkouts', $data);
    }

    public function confirm($id)
    {
        $this->M_checkouts->admin_confirm($id);

        redirect('admin/checkouts');
    }

    public function unconfirm($id)
    {
        $this->M_checkouts->admin_unconfirm($id);

        redirect('admin/checkouts');
    }
}