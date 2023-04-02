<?php

class M_product extends CI_Model
{  
    public function get_all_product()
    {
        return $this->db
            ->select(['product.id', 'product.name AS product_name', 'product.price', 'product.image', 'user.name AS admin_name'])
            ->from('product')
            ->join('user', 'user.id = product.admin_id')
            ->get()
            ->result_array();
    }

    public function get_product_detail($id)
    {
        return $this->db
            ->select(['product.id', 'product.name AS product_name', 'product.price', 'product.image', 'user.name AS admin_name'])
            ->from('product')
            ->join('user', 'user.id = product.admin_id')
            ->where('product.id', $id)
            ->get()
            ->row_array();
    }
}