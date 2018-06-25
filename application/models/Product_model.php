<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function getProducts()
	{
		$this->db->select('*');
		$this->db->from('product');
		$data = $this->db->get();

		return $data->result();
	}



}
?>