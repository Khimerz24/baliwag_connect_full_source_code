<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Centralized_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getCentralized()
    {

        return $this->db->query("SELECT * FROM centralized ")->result();
        //   return $this->db->query("SELECT * FROM business_directory $where")->result();

    }
}
