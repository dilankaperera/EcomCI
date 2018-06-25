<?php

/**
 * 
 */
class Review extends CI_Controller{
	
	public function __construct()
	{
		// echo "string";	
		parent::__construct();
        $this->load->helper('url'); //Loading url helper    
	}

	public function review(){
		// echo "string1";
		$this->load->view('cart/review_view');
		// $this->load->view('templates/header');
	}

	public function rate()
	{
		
		$id = $_POST['id'];

		$rate = $_POST['rate'];
		$review = $_POST['review'];

		$this->load->model('Review_model');
		
		$review_array = array(		
			'rate' => $rate,
			'review' => $review,
			'product_id' =>$id
		);

		$this->Review_model->insertData('rates',$review_array);
		
		echo json_encode(True);



		// $this->load->model('review_model');

		// if ($this->review_model->rate_Product()){

		// 	redirect('/cart/single_product');
		// }

	}

	// public function insert_review(){

	// 	$data = array(
	// 		'reviewform' => $this->input->post('review');
	// 		'product_id' => $this->input->post('product_id');
	// 		// 'username' => $this->input->post('username');
 // 		);

	// 	$this->db->insert('rates',$data);

	// 	redirect('cart/single_product');

	// }

	// public function view_review(){

	// 	$this->load->model('review_model');

	// 	$data['reviews'] = $this->review_model->view_review();

	// 	$this->load->view('cart/single_product');

	// }


}
?>