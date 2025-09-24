<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact_model extends CI_Model
{

    public function __construct(){
        parent::__construct();
        $this->load->database();
        
    }

    public function getContactDetail(){

        return $this->db->query("SELECT * FROM contact_us")->result();

    }

}
