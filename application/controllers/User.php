<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
  
  public function index()
  {
    $data['title'] = 'My profile';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['news'] = $this->db->get('news')->result_array();
    $data['news'] = $this->db->get('news')->result_array();
    $data['jumlahnews'] = $this->db->get('news')->num_rows();
    
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('user/index', $data);
    $this->load->view('templates/footer');



  } // end index
  
  public function aritmatika()
  {
    $data['title'] = 'Arimatika';
    $data['aritmatika'] = $this->db->get_where('aritmatika')->result_array();
    $data['news'] = $this->db->get('news')->result_array();
    $data['jumlahnews'] = $this->db->get('news')->num_rows();
    
    
    $this->form_validation->set_rules('aritmatika', 'Aritmatika', 'required');

    if($this->form_validation->run() == false){  
          $this->load->view('templates/header', $data);
          $this->load->view('templates/sidebar', $data);
         // $this->load->view('templates/topbar', $data);
          $this->load->view('user/aritmatika', $data);
          $this->load->view('templates/footer');
 
      } else {
       
        $this->db->insert('aritmatika', ['menu_name' => $this->input->post('aritmatika')]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu baru berhasil ditambahkan</div>');
     
        redirect('user/aritmatika');
       
     
     } //end if
      

  } // end arimatika
  
  public function edit() {
    $data['news'] = $this->db->get('news')->result_array();
    $data['jumlahnews'] = $this->db->get('news')->num_rows();
    

    $data['title'] = 'Edit Profile';

    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


    $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

    if($this->form_validation->run() == false){
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user', $data);
        $this->load->view('templates/footer');

    } else {

       $name = htmlspecialchars($this->input->post('name', true));
       $email = $this->input->post('email');

//cek gambar

       $upload_image = $_FILES['image']['name'];


       if ($upload_image){
          $config['allowed_types'] = 'jpg|png';
          $config['max_size'] = '1000';
          $config['upload_path'] = './assets/img/profile/';

          $this->load->library('upload', $config);
                    
          if($this->upload->do_upload('image')){
             
             $old_image = $data['user']['image'];
              if($old_image != 'default.jpg'){
                 
                 unlink(FCPATH . 'assets/img/profile/'. $old_image);
                 
              }
             $new_image = $this->upload->data('file_name');
             $this->db->set('image', $new_image);
          } else {

            echo $this->upload->dispay_errors();

          }
       }

       $this->db->set('name', $name);
       $this->db->where('email', $email);
       $this->db->update('user');

       	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your Profile hass been update</div>');
       	redirect('user/index');

    }

  } //end edit
  
  
  public function news()
  {
    $data['news'] = $this->db->get('news')->result_array();
    $data['jumlahnews'] = $this->db->get('news')->num_rows();
    
    
    $data['title'] = 'News';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
    $data['news'] = $this->db->get('news')->result_array();
    
    
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('user/news', $data);
    $this->load->view('templates/footer');
    
    
    
    
  } //ene news
  
  
  public function chat()
  {
    $data['news'] = $this->db->get('news')->result_array();
    $data['jumlahnews'] = $this->db->get('news')->num_rows();
    
    
    $data['title'] = 'Chat';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
    
    $data['news'] = $this->db->get('news')->result_array();
    
    $data['bug'] = $this->db->get('bug')->result_array();
  //  $data['jumlahBug'] = $this->db->get('bug')->num_rows()
    $data['bugId'] = $this->db->get('bug_id')->result_array();
    
    $data['bugName'] = $this->User_model->getBug();
    
      
      
    $this->form_validation->set_rules('type', 'Type Bug', 'required');   
    $this->form_validation->set_rules('bug', 'Bug', 'required'); 
       
    if($this->form_validation->run() == false){
          $this->load->view('templates/header', $data);
          $this->load->view('templates/sidebar', $data);
          $this->load->view('templates/topbar', $data);
          $this->load->view('user/chat', $data);
          $this->load->view('templates/footer');
      
          } else {
            
            $this->User_model->tambahBug();
           	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Report Bug berhasil dikirim ke admin</div>');
            redirect('user/chat');

            
          }
    
    
    
  } //ene chat
  





}