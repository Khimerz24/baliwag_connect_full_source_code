<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('feedback_model');
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
        $this->load->view('feedback/index', $data);
   
	}
    
    public function getFeedbackDetail(){

        $result = $this->feedback_model->getFeedbackDetail();

        echo json_encode(array("data" => $result));
 
     }
  
}
