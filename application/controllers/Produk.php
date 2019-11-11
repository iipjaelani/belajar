<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
  
  public function index()
  {
    
    $data['title'] = 'Dashboard';
    
    

     $this->load->view('templates/header', $data);
     // $this->load->view('templates/sidebar', $data);
   //  $this->load->view('templates/topbar', $data);
    $this->load->view('produk/index', $data);
    $this->load->view('templates/footer');



  } //end index
  
  }