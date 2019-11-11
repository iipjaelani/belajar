<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

 //controler login
	public function index()
	{
	   
	 $data['title'] = 'Form Login';
  	$this->form_validation->set_rules('email', 'Email', 'required|trim');
  	$this->form_validation->set_rules('password', 'Password', 'required|trim');
  
  if($this->form_validation->run() == FALSE){
    	 $this->load->view('templates/login_header', $data);
    		$this->load->view('auth/index');
    		$this->load->view('templates/login_footer');
    } else {   	
     	 $this->_login();
      }
	}


	private function _login()
 {

      $email = $this->input->post('email');
      $password = $this->input->post('password');

      $user = $this->db->get_where('user', ['email' => $email])->row_array();
      
      //jika ada user 
      if($user){
        //jika user aktif
        if($user['is_active'] == 1) {
          //jika salah password
          if(password_verify($password, $user['password'])){
              $data = [

              'email' => $user['email'],
              'role_id' => $user['role_id']
            ];
            $this->session->set_userdata($data);
            // jika role id nya satu dia masuk dashboard admin
            if ($user['role_id'] == 1){
              redirect('admin');
              //selain itu bararti dia user
             } else {
            redirect('user');
            }
          } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf !! , Password anda salah</div>');
            redirect('auth');
           }
          } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf !! , Email anda berlum terVerifikasi</div>');
            redirect('auth');
          }
      }else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf !! , Email anda berlum terdaftar</div>');
        redirect('auth');
      }
 }   	
     	
     	
   
  //end login 
   
     	
     	
 //controler register    	
	public function register()
	{
	  
	   $data['title'] = 'Form register';
      	 
    $this->form_validation->set_rules('name', 'Name', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]');
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
    
    if($this->form_validation->run() == FALSE){
      	 //jika gagal balik ke registrasi
      	 $this->load->view('templates/login_header', $data);
      		$this->load->view('auth/register');
      		$this->load->view('templates/login_footer');
      
     } else {
       //jika berhasil data masuk ke database dan kembali  ke form login
     // 	$this->Register_model->regisUser();
      	
      	$this->_sendEmail();
      	
      	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Hallo! selamat anda behasil mendaftar, silahkan login</div>');
       redirect('auth');
      	 
      	 
      }		

	}
	//end register
	
	private function _sendEmail()
	{
	  
	  $config = [
	  
	  'protocol' => 'smtp',
	  'smtp_host' => 'ssl://smtp.googlemail.com',
	  'smtp_user' => 'santilia261@gmail.com',
	  'smtp_pass' => '@Iipjaelani16',
	  'smtp_port' => 465,
	  'mailtype' => 'html',
	  'charset' => 'utf-8',
	  'newline' => "\r\n" 
	  ];
	  
	  $this->load->library('email', $config);
	  
	  $this->email->from('santilia261@gmail.com', 'Zaylanie WEB');
	  $this->email->to('iipjaelani12345@gmail.com');
	  $this->email->subject('Testing');
	  $this->email->message('hello');
	  
	  
	 if ( $this->email->send() ) {
	   return true;
	 } else {
	   echo $this->email->print_debugger();
	   die;
	 }
	  
	}
	
	
	
	
	//controler logout
	
	public function logout()
	{
	  
	  $this->session->unset_userdata('email');
   $this->session->unset_userdata('roler_id');

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Logout!!</div>');
    redirect('auth');
	  
	 
	  
	  
	  
	} // end logout

} //end controler auth