<?php

class M_user_confirmation extends CI_Model
{
	private $_table = "order_product";

	public function getAll(){
		$data = $this->db->get($this->_table);
        return $data->result();
	}

	public function customer_confirmation($id){
		$this->db->set('status', 1);
		$this->db->where('id', $id);
		$this->db->update($this->_table);
	}

	public function customer_unconfirmation($id){
		$this->db->set('status', 0);
		$this->db->where('id', $id);
		$this->db->update($this->_table);
	}

}