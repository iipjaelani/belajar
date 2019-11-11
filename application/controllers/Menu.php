<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
  
  public function index()
  {
    $data['title'] = 'Menu managemet';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['menu'] = $this->db->get('user_menu')->result_array();
    $data['news'] = $this->db->get('news')->result_array();
    $data['jumlahnews'] = $this->db->get('news')->num_rows();
    
     $this->form_validation->set_rules('menu', 'Menu', 'required');

    if($this->form_validation->run() == false){
      
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/index', $data);
        $this->load->view('templates/footer');
     
     
     } else {
       
        $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu baru berhasil ditambahkan</div>');
     
        redirect('menu');
       
     
     }// end if
   }//end index
    
    public function submenu()
    {
    $data['news'] = $this->db->get('news')->result_array();
    $data['jumlahnews'] = $this->db->get('news')->num_rows();
    
    $data['title'] = 'Sub Menu Managemet';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->model('Menu_Model', 'menu');

    $data['subMenu'] = $this->menu->getSubMenu();
    $data['menu'] = $this->db->get('user_menu')->result_array();


    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('url', 'URL', 'required');
    $this->form_validation->set_rules('icon', 'Icon', 'required');

    if($this->form_validation->run() == false){

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('menu/submenu', $data);
    $this->load->view('templates/footer');
    } else{
      $data = [
              'title' => $this->input->post('title'),
              'menu_id' => $this->input->post('menu_id'),
              'url' => $this->input->post('url'),
              'icon' => $this->input->post('icon'),
              'is_active' => $this->input->post('is_active')
              ];

       			$this->db->insert('user_sub_menu', $data);
      			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data success too Add</div>');
       			 redirect('menu/submenu');
    }//end if
  } //end sub menu
  
  public function hapus($id) //untuk menghapus Menu
  {
    
    
    $this->Menu_model->hapusMenu($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu Berhasil di hapus</div>');    
    redirect('menu');
    
    
    
  } //end hapusMenu
  
} //end CI_Controller