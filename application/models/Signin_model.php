<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Signin_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function signin($data) {
        
        $result = $this->db->query("SELECT * FROM user WHERE user_name = ? AND status = ? AND user_group = ?", array($data["userName"], 1, 4));
    
        if ($result->num_rows() > 0) {
            $user = $result->row();

            if (password_verify($data["password"], $user->password)) {
                return $user; 
            }
        }
    
        return false; 
    }
    

}
