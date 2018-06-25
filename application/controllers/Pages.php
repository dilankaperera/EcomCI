<?php
class Pages extends CI_Controller {

    public function index($page='index'){
        if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
            show_404();
        }
        $data['title']=ucfirst($page);
        $data['products'] = $this->pages_model->retrieve_products(); // Retrieve an array with all products
        $this->load->view('pages/'.$page,$data);
        $this->load->view('templates/header');
        $this->load->view('templates/slideshow');

        $this->load->view('templates/products',$data);
//        $this->load->view('cart/single_product',$data);
        $this->load->view('templates/footer');
    }



}