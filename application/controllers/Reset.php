<?php

class Reset extends CI_Controller
{

  function __construct(){
      parent::__construct();               
      $this->load->library('form_validation');    
      $this->load->helper('captcha');              
    }      
    

  public function reset_mail(){

    $this->form_validation->set_rules('email','Email','trim|required|xss_clean');

    if ($this->form_validation->run()==FALSE) {

      $this->load->view('templates/header');
      $this->load->view('user/forgot_pass');
      $this->load->view('templates/footer');

    }

    else{

    //get the email
    $email = $this->input->post('email');

    $this->load->model('User_model');
    // $this->load->User_model->check_email_exists($email);

    if ($this->User_model->check_email($email)) {

      $email = $this->User_model->get_email($email);
      $this->session->set_flashdata('email', $email);

      // send the email
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

            //create token
            $randomStr = $this->random_str();
            $this->User_model->random_str($randomStr,$email);

            $message = 'Dear User,<br><br> Please use the following code to verifiy your account.<br><br>This is your code : '.$randomStr.'<br><br><br> Thank you.<br>Gzone Technologies';
            $this->load->library('email');
            $this->email->initialize($config);
            $this->email->set_newline("\r\n");
 
            $this->email->from('technologiesgzone@gmail.com');
            $this->email->to($email);
            $this->email->subject('Subject : Verifiy the GZone Account');
            $this->email->message($message);
            $this->email->send();

            $this->session->set_flashdata('randomStr', $randomStr);

            $this->load->view('templates/header');
            $this->load->view('user/recover');
            $this->load->view('templates/footer');


          } else{
           
            $this->session->set_flashdata('email_invalid', 'Email your does not exists.');

            $this->load->view('templates/header');
            $this->load->view('user/forgot_pass');
            $this->load->view('templates/footer');

          }

        }

        // }else{

        //   // Set message
              
        //   $this->session->set_flashdata('email_invalid', 'Email your does not exists.');
        //   redirect('Reset/reset_mail_form');


        // }

      }

  public function checkValidateStr() {

    $code = $_POST['token'];
    $randomStr = $this->session->flashdata('randomStr');

    if($code == $randomStr){
        // echo 'Code Valid';

        $email = $this->session->flashdata('email');

        $this->load->model('User_model');
        $email_username = $this->User_model->getUsername($email);

        $this->session->set_flashdata('email_username', $email_username);

        // $this->session->set_flashdata('codevalid', 'Code is valid.');

        $this->load->view('templates/header');
        $this->load->view('user/reset_pass');
        $this->load->view('templates/footer');


    } else {

        // $this->session->set_flashdata('codeinvalid', 'Code is invalid.');
        redirect('Reset/reset_mail_form');
        echo 'Code Invalid';
    }
  }


  public function reset_mail_form() {

      $this->load->view('templates/header');
      $this->load->view('user/forgot_pass');
      $this->load->view('templates/footer');
      
    
  }
  

  function random_str($length = 10, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'){

    $str = '';
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $str .= $keyspace[rand(0, $max)];
    }
    return $str;
  }


 public function reset_password(){

  $email_username = $this->session->flashdata('email_username');


  $this->form_validation->set_rules('password', 'Password', 'required');
  $this->form_validation->set_rules('repassword', 'Confirm Password', 'matches[password]');

  if ($this->form_validation->run() === FALSE) {

    // $data['title'] = 'Reset password';
    $this->load->view('templates/header');
    $this->load->view('user/reset_pass');
    $this->load->view('templates/footer');

  } else {

    $enc_password = md5($this->input->post('password'));

    $this->load->model('User_model');

    if ( $this->User_model->reset_password($enc_password,$email_username)) {
      $this->session->set_flashdata('msg','You are Successfully recovered your account! Please login again to confirm');
      echo "You are Successfully recovered your account! Please login again to confirm";
      redirect('user/login');
      }

    else{
      //error
      $this->session->set_flashdata('msg','Oops! Error.  Please try again later!!!');
      // redirect('user/register');
      $this->load->view('templates/header');
      $this->load->view('user/reset_pass');
      $this->load->view('templates/footer');

    }

    }
    

  }

        
}
?>