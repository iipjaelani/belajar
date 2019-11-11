<?php

class Register_model extends CI_model {
   
   
   public function regisUser()
   {
     	  //data yang akan dimasukan ke db
      $data = [
         "name" => htmlspecialchars($this->input->post('name', true)),
         "email" => htmlspecialchars($this->input->post('email', true)),
         "image" => 'default.jpg',
         "password" => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
         "role_id" => 2,
         "is_active" => 0,
         "date_created" => time()
        
      ];
      //perintah masukan data ke db
      $this->db->insert('user', $data);
   }
  
}