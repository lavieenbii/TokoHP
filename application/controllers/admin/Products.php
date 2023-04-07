<?php

class Products extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product_model');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$data['products'] = $this->Product_model->getAll();
		$this->load->view('admin/product/list', $data);
	}

	public function add()
	{
		$product = $this->Product_model;
		$validation = $this->form_validation;
		$validation->set_rules($product->rules());

		if ($validation->run()) {
			$product->save();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
		}else {
			$this->session->set_flashdata('error', 'Gagal disimpan');
		}

		$this->load->view('admin/product/new');
	}

	public function edit($id = null)
	{
		if (!isset($id)) redirect('admin/products');
		
		$product = $this->Product_model;
		$validation = $this->form_validation;
		$validation->set_rules($product->rules());

		if ($validation->run()) {
			$product->update();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
		}

		$data["product"] = $product->getById($id);
		if (!$data["product"]) show_404();
		
		$this->load->view("admin/product/edit", $data);
	}
	
	public function delete($id=null)
	{
		if (!isset($id)) show_404();
		
		if ($this->Product_model->delete($id)) {
			redirect(site_url('admin/products'));
		}
	}
}
