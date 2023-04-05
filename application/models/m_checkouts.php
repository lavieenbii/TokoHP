<?php

class M_checkouts extends CI_Model
{
	private $_table = "checkouts";

	public function getAll(){
		$data = $this->db->get($this->_table)->result();

		foreach ($data as $checkout) {
			$checkout->user = $this->getUserInfo($checkout->user_id)->name;
			$checkout->product = $this->getProductsInfo($checkout->product_id)->name;
		}

		return $data;
	}

	public function getUserInfo($id){
		return $this->db->get_where('user', ['id' => $id])->row();
	}

	public function getProductsInfo($id){
		return $this->db->get_where('products', ['product_id' => $id])->row();
	}

	public function admin_confirm($id){
		$this->db->set('admin_confirmation', 1);
		$this->db->update($this->_table, $this, array('id' => $id));
	}

	public function admin_unconfirm($id){
		$this->db->set('admin_confirmation', 0);
		$this->db->update($this->_table, $this, array('id' => $id));
	}
}