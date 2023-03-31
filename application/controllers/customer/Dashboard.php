<?php

class Dashboard extends CI_controller
{
    public function index()
    {
        return $this->load->view('customer/dashboard');
    }
}