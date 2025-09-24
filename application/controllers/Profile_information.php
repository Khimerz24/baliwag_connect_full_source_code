<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_information extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Profile_information_model');
    }

	public function index()
	{
        $data["username"] = $this->session->userdata('username');
        $adminId = $this->session->userdata('admin_id');
        $data["usergroup"] = $this->session->userdata('usergroup');
        $data["adminData"] = $this->Profile_information_model->getAdminData($adminId);

        // var_dump($data["adminData"]);
        if(!$data["username"]){
            redirect('admin');
        }
        $this->load->view('profile_information/index', $data);
    
	}

    public function updateUser(){

        $data = array(
          'id'          => $this->input->post('userId'),
          'first_name'  => $this->input->post('firstName'),
          'last_name'   => $this->input->post('lastName'),
          'email'       => $this->input->post('email'),
          'user_name'   => $this->input->post('userName'),
        );

        $result =$this->Profile_information_model->saveEditUser($data);

        if($result){
            $this->session->sess_destroy(); 
            echo json_encode(array("status" => "success", "message" => "Profile Successfully Updated"));
        }else{
            echo json_encode(array("status" => "error", "message" => "Faile To Updated"));
        }

    }
}
