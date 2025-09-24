<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function loginUser($username, $password)
    {
        $sql = "SELECT * FROM user WHERE user_name = ? AND status = ? AND user_group IN (?,?,?)";
        $query = $this->db->query($sql, array($username, 1, 1, 2, 3));
        $user = $query->row();
    
        if ($user && password_verify($password, $user->password)) {

            $this->db->query("UPDATE user SET last_login = NOW() WHERE user_name = ?", array($username));
            return $user; 
        } else {
            return false;
        }
    }
    
}
