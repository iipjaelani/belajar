<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
  
  
  
  public function index()
  {
    
    $data['title'] = 'Dashboard';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['member'] = $this->db->get('user')->result_array();
    
    $data['jumlah'] = $this->db->get('user')->num_rows();
    $data['news'] = $this->db->get('news')->result_array();
    $data['jumlahnews'] = $this->db->get('news')->num_rows();
    
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('templates/footer');



  } //end index
  
  
  
  
  
  
  public function user()
  {
    
    $data['title'] = 'User management';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
   
   
   //$data[Member model ] dijadikan variabel . yang data nya di ambil dari model ADMIN_MODEL 
   // GETROLE adalah nama function dari model
   //jangan lupa load dulu model nya di AUTO LOAD
   
   // $data['memberRole'] = $this->db->get_where('user', ['id !=', 1])->result_array();
    $data['memberRole'] = $this->Admin_model->getRole();
    
  //  $data['member'] = $this->db->get('user')->result_array();  
  // $data['jumlah'] adalah variabel, data nya di ambil dari tabel user 
  //num row untuk mengambil jumlah row(kolom) pada database
    $data['jumlah'] = $this->db->get('user')->num_rows();
    
   $data['news'] = $this->db->get('news')->result_array();
   $data['jumlahnews'] = $this->db->get('news')->num_rows();
    
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/user', $data);
    $this->load->view('templates/footer');



  } //end user
  
  public function detail($id)
  {
    
   
    $data['title'] = 'Detail user';
    $data['user'] = $this->db->get_where('user',['id' => $id])->row_array();
    
 //   $data['user'] = $this->db->get('user')->row_array();
    $data['news'] = $this->db->get('news')->result_array();
    $data['jumlahnews'] = $this->db->get('news')->num_rows();
    
       $this->load->view('templates/header', $data);
       $this->load->view('templates/sidebar', $data);
       $this->load->view('templates/topbar');
       $this->load->view('admin/detail', $data);
       $this->load->view('templates/footer');
  

  } //end detail
 
    
    
    
    
    
    
    
  public function role()
  {
    
    $data['title'] = 'Role';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['role'] = $this->db->get('role_id')->result_array();
    
    $data['news'] = $this->db->get('news')->result_array();
    $data['jumlahnews'] = $this->db->get('news')->num_rows();
    
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/role', $data);
    $this->load->view('templates/footer');



  } //end role
    
  public function roleAccess($id) //parameter sesui link
  {
    
    $data['title'] = 'Role access';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //ambil data sesui id
    $data['role'] = $this->db->get_where('role_id', ['id' => $id])->row_array();
    $this->db->where('id !=', 1);
    $data['menu'] = $this->db->get('user_menu')->result_array();
    $data['news'] = $this->db->get('news')->result_array();
    $data['jumlahnews'] = $this->db->get('news')->num_rows();
    
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/role-access', $data);
    $this->load->view('templates/footer');



  } //end role access
    
  public function changeAccess()
  {
     $menu_id = $this->input->post('menuId');
     $role_id = $this->input->post('roleId');
     
     $data = [
        'role_id' => $role_id,
        'menu_id' => $menu_id
        ];
     $result = $this->db->get_where('user_access_menu', $data);
     
     if ($result->num_rows() < 1){
        $this->db->insert('user_access_menu', $data);
     } else {
        $this->db->delete('user_access_menu', $data);
     }
     
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data has beed changed</div>');
       
  } // end changeAccess
  
  public function news()
  {
    
    
    $data['title'] = 'News';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
    $data['news'] = $this->db->get('news')->result_array();
    $data['jumlahnews'] = $this->db->get('news')->num_rows();
    
    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('subjek', 'subjek', 'required');
    $this->form_validation->set_rules('pesan', 'Pesan', 'required');

    
    if($this->form_validation->run() == false){
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/news', $data);
        $this->load->view('templates/footer');
        
      } else {
        
        $this->Admin_model->tambahNews();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menambah berita</div>');    
        redirect('admin/news');
  
      }
    
    
  } //end news
  
  
  
  
  public function bug()
  {
    
    $data['title'] = 'Bug';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['member'] = $this->db->get('user')->result_array();
    
    $data['bugReport'] = $this->Admin_model->getBug();
    
    
    // $data['bug'] = $this->db->get('bug')->num_rows();
     $data['isiBug'] = $this->db->get_where('bug')->row_array();
  
  
    $data['news'] = $this->db->get('news')->result_array();
    $data['jumlahnews'] = $this->db->get('news')->num_rows();
    
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/bug', $data);
    $this->load->view('templates/footer');



  } //end bug
  
  
  public function hapus($id)
  {
    
    $this->Admin_model->hapusBug($id);
       $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menghapus notifikasi bug</div>');    
        redirect('admin/bug');
  
    
  }
  
  
  
  
  
  
  
    
} //end controler
  
  
  