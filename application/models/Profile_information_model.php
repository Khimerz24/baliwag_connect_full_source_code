<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_information_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function getUser()
    {
      return $this->db->query("SELECT *, CONCAT(first_name, ' ', last_name) AS name FROM user")->result();
    }

    public function saveUser($data){

      return $this->db->insert('user', array(
          'first_name'  => $data['firstName'],
          'last_name'   => $data['lastName'],
          'email'       => $data['email'],
          'user_name'   => $data['userName'],
          'password'    => $data['password'],
          'user_group'  => $data['userGroup']
      ));

   }

   public function getAdminData($adminId){

        return $this->db->query("SELECT id, CONCAT(first_name, '', last_name) AS name, first_name, last_name, email, user_name FROM  user WHERE id = ?", array($adminId))->result();
    
    }

  public function  saveEditUser($data){
      
       return $this->db->query("UPDATE user SET first_name = ?, last_name = ?, email = ?, user_name = ? 
       WHERE id = ?", array($data['first_name'], $data['last_name'], $data['email'], $data['user_name'], $data['id']));
  }
    
}
