<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{

    //customer registration

    public function customer_register($enc_password){

        // User data array
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $enc_password,
            'user_role_id' => 2

        );

        $this->db->insert('user', $data);

        $data1 = array(
            'user_username' => $this->input->post('username'),
            'customer_email' => $this->input->post('customer_email')
        );

        // Insert user
       $this->db->insert('customer', $data1);
        // return $insert1;$insert2;

       return true;

    }

    //agent registration
    public function agent_register($enc_password){

        // User data array
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $enc_password,
            'user_role_id' => 1,

        );

        $insert1 = $this->db->insert('user', $data);

        $data = array(

            'agent_first_name' => $this->input->post('fname'),
            'agent_last_name' => $this->input->post('lname'),
            'agent_email' => $this->input->post('email'),
            'agent_phone_num' => $this->input->post('pnumber'),
            'agent_business_name' => $this->input->post('bussname'),
            'agent_nic' => $this->input->post('nic'),
            'agent_license' => $this->input->post('lic'),
            'user_username' => $this->input->post('username'),
            'status' =>'pending'
        );

        // Insert user
        $insert2 = $this->db->insert('agent', $data);
        return $insert1;$insert2;

    }

    // login

    public function login($username,$password){

        // Validate

        $where_arr = array(
            "username" => $username,
            "password" => $password
        );

        $this->db->select('username');
        $this->db->select('password');
        $this->db->select('user_role_id');
        $this->db->where($where_arr);
        $res = $this->db->get('user');

        if($res->num_rows() == 1){
            $this->session->set_userdata('username',$res->row(0)->username);
            $this->session->set_userdata('logged_in', TRUE);
            return $res->result();
        } else {
            return false;
        }

    }
    
    // Check username exists
    public function check_username_exists($username){

        $this->db->where('username', $username);
        $query = $this->db->get('user');

        if($query->num_rows()>0) {
            return true;
        }
        else {
            return false;
        }
    }


    // Check email exists
    public function check_email_exists($email){
        $query = $this->db->get_where('customer', array('customer_email' => $email));
        if(empty($query->row_array())){
            return true;
        } else {
            return false;
        }
    }

    public function check_email($email){

        $this->db->from('customer');

        $this->db->where('customer_email',$email);
        // $query = $this->db->get('customer');
        $query = $this->db->get();
        $row = $query->row();

        // if($query->num_rows>=1){
        //     return true;
        // }
        // return false;  
        if(isset($row)){
            return true;
        }
        return false;

    }

    public function get_email($email){

        $this->db->select('customer_email');
        $this->db->from('customer');
        $this->db->where('customer_email',$email);
        $query = $this->db->get();

        $row = $query->row();
        return $row->customer_email;

    }

    // public function random_str($randomStr,$email){

    //     $data = array(
    //         'user_email' => $email,
    //         'random_str' => $randomStr
    //     );

    //     // $this->db->from('customer');
    //     // $this->db->where('customer_email',$email);
    //     $this->db->insert('random', $data);
    // }

        public function random_str($randomStr,$email){

        $data = array(
            // 'user_email' => $email,
            'random_str' => $randomStr
        );

        $this->db->from('customer');
        $this->db->where('customer_email',$email);
        $this->db->update('customer', $data);

    }










    public function reset_password($enc_password,$email_username){

        // $this->db->select('user_username');
        // $this->db->from('customer');
        // $this->db->where('customer_email',$email);

        // $query = $this->db->get();
        // $row = $query->result_array();
        // var_dump($row);

        // $this->db->select('username');
        // $this->db->from('user');
        // $this->db->where('username',$user_username);

        // $this->db->update('user', array('password' => $enc_password));

        // var_dump($email);
        
        $data = array(
            'password' => $enc_password
        );

        $this->db->where('username',$email_username);
        $res = $this->db->update('user', $data);
        if ($res) {
            return TRUE;
        }else {
            return FALSE;
        }

    }


    // $this->db->get_where('customer',array('customer_email'=>$email))


    public function getUsername($email){

        $this->db->select('user_username');
        $this->db->from('customer');
        $this->db->where('customer_email',$email);
        $query = $this->db->get();

        $row = $query->row();
        return $row->user_username;
    }


    


}