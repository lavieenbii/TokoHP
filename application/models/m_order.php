<?php

class M_order extends CI_Model
{
    public function get_order_detail($productId, $userId)
    {
        return $this->db->get_where('order_product', ['product_id' => $productId, 'buyer_id' => $userId])->row_array();
    }

    public function get_order_buyer($buyerId)
    {
        return $this->db
            ->select(['product.id', 'product.name AS product_name', 'product.price', 'product.image', 'user.name AS admin_name', 'order_product.status'])
            ->from('order_product')
            ->join('product', 'product.id = order_product.product_id')
            ->join('user', 'user.id = product.admin_id')
            ->where('order_product.buyer_id', $buyerId)
            ->get()
            ->result_array();
    }

    public function insert_order($data)
    {
        $this->db->insert('order_product', $data);
    }

    public function delete_order($data)
    {
        $this->db->delete('order_product', $data);
    }
}