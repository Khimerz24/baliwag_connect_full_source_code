<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Signup_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function saveSignUp($data){

        return $this->db->insert('user', array(
            'first_name'  => $data['firstName'],
            'last_name'   => $data['lastName'],
            'user_name'   => $data['userName'],
            'email'       => $data['email'],
            'password'    => $data['password'],
            'user_group'  => 4,
            'validation_code'  => $data['validation_code'],
            'status' => 0
        ));
  
     }

    public function verify($verificationCode){
        $result = $this->db->query("SELECT * FROM user WHERE validation_code = ?", array($verificationCode));

        if ($result->num_rows() > 0) {

            $this->db->query("UPDATE user SET status = 1 WHERE validation_code = ?", array($verificationCode));

            return $result->row(); 
        } else {
            return false;
        }
    }

}
