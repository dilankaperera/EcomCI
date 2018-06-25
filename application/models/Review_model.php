<?php

/**
 * 
 */
class Review_model extends CI_Model{
	
	public function rate_Product(){

		$this->db->select('product_id');
		$this->db->from('product');
		$this->db->join('rates','product_id=product.product_id');
		// $query = $this->db->get();

		$this->db->where('product_id',$product_id);
		$res = array(
			'rate' => $rating,
			'product_id' => $product_id
		);

		$this->db->insert('rates', $res);
		if ($res) {
			return TRUE;
		}else {
			return FALSE;
		}

	}

	public function view_review($product_id){

		$this->db->where('product_id',$product_id);
		$this->db->order_by('rate_id', 'desc');
		$this->db->limit(5);

		$data = $this->db->get('rates');
		return $data->result();
	}

	function insertData($tablename,$data_arr){

		$this->db->insert($tablename,$data_arr);
	}





}
?>