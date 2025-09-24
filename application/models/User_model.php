<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
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

  public function saveUser($data)
  {

    return $this->db->insert('user', array(
      'user_group'  => $data['userGroup'],
      'first_name'  => $data['firstName'],
      'last_name'   => $data['lastName'],
      'user_name'   => $data['userName'],
      'password'    => $data['password'],
      'user_group'  => $data['userGroup'],
      'status'  =>  1
    ));
  }
}
