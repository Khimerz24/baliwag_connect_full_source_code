<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('session');
    }

	public function index()
	{
        $this->load->view('admin/admin/index');
	}

    public function loginUser(){

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->Admin_model->loginUser($username, $password);

        if($user){
            $this->session->set_userdata([
                'admin_id'  => $user->id,
                'username'  => $user->user_name,
                'usergroup' => $user->user_group,
                'logged_in' => true
            ]);
            
            echo json_encode(array("status" => "success",  "message" => "Login successful"));
        }
        else {
            $this->session->set_flashdata('error', 'Invalid username or password');
            echo json_encode(array("status" => "error" , "message" => "Invalid username or password"));
        }

    }
    
}
