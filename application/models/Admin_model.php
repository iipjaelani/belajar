<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Admin_model extends CI_Model
{

    public function getRole(){

//penjesan querry
/* 

SELECT ( Pilih tabel user [*](semuanya) dan tabel user_menu haya menu nya saJa)

FROM ( tabel USER di JOIN ke tabel USER_MENU)

ON ( yang di tabel USER pilih ROLE_ID nya dan di tabel USER_MENU pilih ID nya)


*/
    $query = "SELECT `user`.*, `user_menu`.`menu`
             FROM `user` JOIN `user_menu`
             ON `user`.`role_id` = `user_menu`.`id`
             ";

    return $this->db->query($query)->result_array();
// return ambil data dari database yang dibjoin datanya amana (yang di $querry ) di result_array agar semua data terambil
    }


 
  
  public function tambahNews()
  {
    
    $data = [
    
    'title' => $this->input->post('title'),
    'subjek' => $this->input->post('subjek'),
    'news' => $this->input->post('pesan'),
    'date_created' => time()
      ];
    
    
    $this->db->insert('news', $data);
    
  }


public function getBug()
{
   $query = "SELECT `bug`.*, `bug_id`.`bug_name`
             FROM `bug` JOIN `bug_id`
             ON `bug`.`bug_id` = `bug_id`.`id`
             ";
  
  return $this->db->query($query)->result_array();
}// end getBug

public function hapusBug($id)
{
  
  
   $this->db->where('id', $id);
   $this->db->delete('bug');
    
  
  
}//end hapusBug


}//end  model