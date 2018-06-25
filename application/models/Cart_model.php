<?php

class Cart_model extends CI_Model {

    // Function to retrieve an array with all product information
    function view_product($pro_id){

        $condition = "product_id =" . "'" . $pro_id . "'";
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result_array(); // Return the results in a array.
    }



    // Add an item to the cart
    function validate_add_cart_item(){

        $id = $this->input->post('product_id'); // Assign posted product_id to $id
        $cty = $this->input->post('quantity'); // Assign posted quantity to $cty

        $this->db->where('product_id', $id); // Select where id matches the posted id
        $query = $this->db->get('product', 1); // Select the products where a match is found and limit the query by 1

        // Check if a row has matched our product id
        if($query->num_rows > 0){

            // We have a match!
            foreach ($query->result() as $row)
            {
                // Create an array with product information
                $data = array(
                    'id'      => $id,
                    'qty'     => $cty,
                    'price'   => $row->price,
                    'name'    => $row->name
                );

                // Add the data to the cart using the insert function that is available because we loaded the cart library
                $this->cart->insert($data);

                return TRUE; // Finally return TRUE
            }

        }else{
            // Nothing found! Return FALSE!
            return FALSE;
        }
    }

}