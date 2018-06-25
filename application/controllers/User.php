<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

    public function customer_register(){

        $data['title'] = 'Sign Up';
        $this->form_validation->set_rules('username', 'username', 'callback_check_username_exists');
        $this->form_validation->set_rules('customer_email', 'email', 'required|callback_check_email_exists|is_unique[customer.customer_email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('repassword', 'Confirm Password', 'matches[password]');


        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('user/customer_register', $data);
            $this->load->view('templates/footer');
        } else {
            // Encrypt password
            $enc_password = md5($this->input->post('password'));
            $this->load->model('user_model');
            

        if ($this->user_model->customer_register($enc_password)) {
                
                $this->session->set_flashdata('msg','You are Successfully Registered! Please login again to confirm');
                redirect('user/login');
        }
            else
            {
                //error
                $this->session->set_flashdata('msg','Oops! Error.  Please try again later!!!');
                    redirect('user/register');
            } 
              
            }

            // $this->load->view('templates/header');
            // $this->load->view('user/customer_register');
            // $this->load->view('templates/footer');
        }



    public function agent_register(){

        $data['title'] = 'Sign Up';
        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|callback_check_email_exists|is_unique[agent.agent_email]');
        // $this->form_validation->set_rules('agent_email', 'Email', 'required|callback_check_email_exists');
        $this->form_validation->set_rules('pnumber', 'Mobile Number ', 'required|regex_match[/^[0-9]{10}$/]'); //{10} for 10 digits number
        $this->form_validation->set_rules('bussname', 'BussinessName', 'required');
        $this->form_validation->set_rules('nic', 'NIC', 'required');
        $this->form_validation->set_rules('lic', 'License', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('repassword', 'Confirm Password', 'matches[password]');


        if ($this->form_validation->run() === FALSE) {
            //$privilages = get_privilage_array($this->session->userdata('privilage_level'));
            $this->load->view('templates/header');
            $this->load->view('user/agent_register', $data);
            $this->load->view('templates/footer');
        } else {
            // Encrypt password
            $enc_password = md5($this->input->post('password'));
            $this->user_model->agent_register($enc_password);
            // Set message
            $this->session->set_flashdata('user_registered', 'You will recieve an email responding the request. Please check your indox and login again to confirm');
            redirect('user/login');
        }
    }
    

     public function login(){

        $data['title'] = 'Login';
        $this->form_validation->set_rules('username','username','required');
        $this->form_validation->set_rules('password','password','required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('user/login', $data);
            $this->load->view('templates/footer');
        }
        else {

            // Get username
            $username = $this->input->post('username');
            // Get and encrypt the password
            $password = md5($this->input->post('password'));
            // Login user
            $res = $this->user_model->login($username, $password);
           

            if ($res) {
                $this->session->set_userdata('user_role_id',$res['0']->user_role_id);
                // Set message
                $this->session->set_flashdata('user_loggedin', 'You are now logged in');

                if($res['0']->user_role_id == '1') {
                    redirect('pages/index');

                } else if($res['0']->user_role_id == '2') {  
                    redirect('pages/index');
                    
                } else if($res['0']->user_role_id == '3'){   
                    redirect('admin/index');
                
                } else {   
                    redirect('user/login');

                }
            } else {
                // Set message
              
                $this->session->set_flashdata('login_failed', 'Login is invalid');
                redirect('user/login');

            }
        }

    }

    // Log out
    public function logout()
    {
        // Unset user data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('cart_contents');

        // Set message
        $this->session->set_flashdata('user_loggedout', 'You are now logged out');
        redirect('pages/index');
    }

    // Check if username exists
    // public function check_username_exists($username)
    // {
    //     $this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one');
    //     if ($this->user_model->check_username_exists($username)) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    // Check if username exists
    public function check_username_exists()
    {
        $this->load->model('User_model');
        if ($this->User_model->check_username_exists($_POST['username'])) {
            // return true;
            echo '<label class="text-danger"><span><i class="fa fa-times" aria-hidden="true"> 
            </i> This user is already registered. Please choose a different Username.</span></label>';
        } 
        else {
            // return false;
            echo '<label class="text-success"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Username is available</span></label>';
        }
    }

    // Check if email exists
    public function check_email_exists($email)
    {
        $this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one');
        if ($this->user_model->check_email_exists($email)) {
            return true;
        } else {
            return false;
        }
    }



}