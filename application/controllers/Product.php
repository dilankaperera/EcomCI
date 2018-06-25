<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

    public function getProducts(){

    	$this->load->model('Product_model');

        $data['products'] = $this->Product_model->getProducts();

        $this->load->view('templates/header');
        $this->load->view('pages/allproducts', $data);
   		$this->load->view('templates/footer');

    }


}
?>