<?php

class Cart extends CI_Controller{


    function add(){
        // Set array for send data.
        $insert_data = array(
            'id' => $this->input->post('product_id'),
            'name' => $this->input->post('product_name'),
            'price' => $this->input->post('product_price'),
            'image' => $this->input->post('product_image'),
            'qty' => 1
        );
        // This function add items into cart.
        $this->cart->insert($insert_data);
        echo $fefe = count($this->cart->contents());
        // This will show insert data in cart.
    }


    function remove() {
        $rowid = $this->input->post('rowid');
        // Check rowid value.
        if ($rowid==="all"){
            // Destroy data which store in session.
            $this->cart->destroy();
        }else{
            // Destroy selected rowid in session.
            $data = array(
                'rowid' => $rowid,
                'qty' => 0
            );
            // Update cart data, after cancel.
            $this->cart->update($data);
        }
        echo $fefe = count($this->cart->contents());
        // This will show cancel data in cart.
    }




    function update_cart(){
        // Recieve post values,calcute them and update
        $rowid = $_POST['rowid'];
        $price = $_POST['price'];
        $amount = $price * $_POST['qty'];
        $qty = $_POST['qty'];

        $data = array(
            'rowid' => $rowid,
            'price' => $price,
            'amount' => $amount,
            'qty' => $qty
        );
        $this->cart->update($data);
        echo $data['amount'];
    }



public function view_product(){

            $this->load->model('Review_model');

            $this->load->view('templates/header');

            $pro_id = $this->uri->segment(3);

            $data['review']=$this->Review_model->view_review($pro_id);
            $data['product'] = $this->cart_model->view_product($pro_id);
            $this->load->view('cart/single_product',$data);
            $this->load->view('templates/footer');

        }



    public function view_cart(){
        $this->load->view('templates/header');
        $this->load->view('cart/view_cart');
        $this->load->view('templates/footer');
    }

    public function opencart()
    {
        $data['cart']  = $this->cart->contents();
        $this->load->view('cart/view_cart1', $data);
    }

    function billing_view(){
        $this->load->view('templates/header');
        // Load "billing_view".
        $this->load->view('cart/billing_view');
        $this->load->view('templates/footer');
    }

}