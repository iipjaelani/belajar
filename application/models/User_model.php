<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class User_model extends CI_Model
{

    public function getBug()
    {


    $query = "SELECT `bug`.*, `bug_id`.`bug_name`
             FROM `bug` JOIN `bug_id`
             ON `bug`.`bug_id` = `bug_id`.`id`
             ";
  
    return $this->db->query($query)->result_array();
   
   
    } // end getSubMenu
    
    
    public function tambahBug()
    {
      
      $data = [
              'bug_id' => $this->input->post('type'),
              
              'bug' => htmlspecialchars($this->input->post('bug')),
              'date_created' => time()
           ];
      
      $this->db->insert('bug', $data);

    }
    
    
    
    
    
    
 } //emd model