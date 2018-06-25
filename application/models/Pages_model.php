<?php

class Pages_model extends CI_Model {

    // Function to retrieve an array with all product information
    function retrieve_products(){
        $query = $this->db->get('product'); // Select the table products
        return $query->result_array(); // Return the results in a array.
    }

}