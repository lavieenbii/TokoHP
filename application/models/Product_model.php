<?php

class Product_model extends CI_Model
{

	private $_table = "product";
	public $id;
	public $admin_id;
	public $name;
	public $price;
	public $image;

	public function rules(){
		return[

			['field' => 'admin_id',
			'label' => 'Admin_id',
			'rules' => 'required'],

			['field' => 'name',
			'label' => 'Name',
			'rules' => 'required'],

			['field' => 'price',
			'label' => 'Price',
			'rules' => 'numeric'],
		];
	}

	public function getAll(){
		return $this->db->get($this->_table)->result();
	}
	public function getById($id){
		return $this->db->get_where($this->_table, ["id" => $id])->row();
	}

	public function save(){
		$post = $this->input->post();
		$this->id = uniqid();
		$this->admin_id = $post["admin_id"];
		$this->name = $post["name"];
		$this->price = $post["price"];
		$this->image = $post["image"];

		$this->db->insert($this->_table, $this);
	}

	public function update(){
		$post = $this->input->post();
		$this->id = $post["id"];
		$this->admin_id = $post["admin_id"];
		$this->name = $post["name"];
		$this->price = $post["price"];
		$this->db->update($this->_table, $this, array('id' => $post['id']));
	}

	public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
}