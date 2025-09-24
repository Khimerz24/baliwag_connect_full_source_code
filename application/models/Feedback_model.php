<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Feedback_model extends CI_Model
{

    public function __construct(){
        parent::__construct();
        $this->load->database();
        
    }

    public function getFeedbackDetail(){

        return $this->db->query("SELECT feedback.*, CONCAT(first_name, ' ', middle_name ,' ', last_name) AS name FROM feedback")->result();
    //   return $this->db->query("SELECT * FROM business_directory ")->result();

    }

}
