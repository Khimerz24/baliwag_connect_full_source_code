<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }
    public function index()
    {
        echo "logout";
    }

    public function logoutSessions()
    {
        
        $this->session->sess_destroy(); 
        echo json_encode(array("status" => TRUE));
        redirect('admin');  

    }

    public function logoutSessionsWeb()
    {
        
        $this->session->sess_destroy(); 
        echo json_encode(array("status" => TRUE));
        redirect('landing');  

    }

   
}
