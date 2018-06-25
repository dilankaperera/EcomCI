<?php

class Admin extends CI_Controller{

    public function index(){
    	$this->load->view('admin/dashboard');
    }

    public function getAgents(){

    	$this->load->model('agent_model');
        $data['agents'] = $this->agent_model->getAgents();

        // var_dump($data);

        $this->load->view('admin/agent_view', $data);
   	
    }

    public function delete_agent(){
            
        $user_username = $this->uri->segment(3);
        // echo $user_username;
        
        $this->load->model('agent_model');

        $res = $this->agent_model->delete_agent($user_username);
        $res1 = $this->agent_model->delete_agent($user_username);

        if($res && $res1) {
            $this->session->set_flashdata('You have deleted an agent');
            redirect('/admin/getAgents');
        }else {
            // echo "Error in deletion";
            $this->session->set_flashdata('msg','Oops! Error.  Please try again later!!!');
                    redirect('/admin/getAgents');
        }


        // var_dump($res);
        // $this->load->view('admin/agent_view');
        // redirect('/admin/getAgents');

    }

    public function accept_agent(){

        $this->load->model('agent_model');       

        $user_username = $this->uri->segment(3);
        $res = $this->agent_model->accept_agent($user_username);  //update accepted status

        $res1 = $this->agent_model->search_email($user_username); //get the email

        // var_dump($res);
        // var_dump($res1);

        $email = $res1[0]->agent_email;
        $firstname = $res1[0]->agent_first_name;

        if($res) {
            $this->session->set_flashdata('msg','You have accpeted an agent');

            //send email to the agent accepting the request

            $config = Array(
                        'protocol' => 'smtp',
                        'smtp_host' => 'ssl://smtp.gmail.com',
                        'smtp_port' => 465,
                        'smtp_user' => 'technologiesgzone@gmail.com',
                        'smtp_pass' => '$1qaz2wsx$',
                        'mailtype'  => 'html',
                        'charset'   => 'iso-8859-1',
                        'wordwrap'=> TRUE,
                    );

            $message = 'Dear ' . $firstname . ',<br><br>It is pleasure to announce that, GZone technologies has accpeted your request to be an agent. Please login with the username your provide for proceedings. <br><br><br><br> Thank you.<br>Gzone Technologies';

            $this->load->library('email');
            $this->email->initialize($config);
            $this->email->set_newline("\r\n");
 
            $this->email->from('technologiesgzone@gmail.com');
            $this->email->to($email);
            $this->email->subject('Subject : Accpetance as an AGENT of GZone technologies');
            $this->email->message($message);
            $this->email->send();
            
            redirect('/admin/getAgents');

        }else {
             $this->session->set_flashdata('msg','Oops! Error.  Please try again later!!!');
                    redirect('/admin/getAgents');
        }
        // var_dump($res);
    }
    



}