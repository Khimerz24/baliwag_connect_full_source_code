<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Signin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Signin_model');
        $this->load->library('session');
    }

    public function signin(){
      
        $data = array(
            "userName" => $this->input->post("userName"),
            "password" => $this->input->post("password")
        );
        $result = $this->Signin_model->signin($data);

        if($result){
            $this->session->set_userdata([
                'user_id'   => $result->id,
                'username'  => $result->user_name,
                'logged_in' => true
            ]);
            echo json_encode(array("status" => "success", "message" => "Successfully logged in"));
        }
        else {
            $this->session->set_flashdata('error', 'Invalid username or password');
            echo json_encode(array("status" => "error", "message" => "Error  logged in"));
        }
       

    }
}
