<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('contact_model');
        $this->load->library('session');
    }

	public function index()
	{

        $data["username"] = $this->session->userdata('username');
        $data["usergroup"] = $this->session->userdata('usergroup');

        // var_dump($data["username"]);
        
        if(!$data["username"]){
            redirect('admin');
        }
        $this->load->view('contact/index', $data);
   
	}
    
    public function getContactDetail(){

        $result = $this->contact_model->getContactDetail();

        echo json_encode(array("data" => $result));
 
     }
  
}
