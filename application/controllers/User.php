<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
    }

    public function index()
    {
        $data["username"] = $this->session->userdata('username');
        $data["usergroup"] = $this->session->userdata('usergroup');

        if (!$data["username"]) {
            redirect('admin');
        }
        $this->load->view('user/index', $data);
    }

    public function getUser()
    {

        $result = $this->User_model->getUser();

        $data = [];

        foreach ($result as $list) {
            $role = $this->category($list->user_group);

            $data[] = array(
                "userGroup" => $role,
                "name" => $list->name,
                "email" => $list->email,
                "userName" => $list->user_name,
              "lastLogin" => date("F j, Y, g:i a", strtotime($list->last_login) + (60 * 60 * 8 * 8)), 
            );
        }

        echo json_encode(array("data" => $data));
    }

    public function category($status)
    {

        $statusLabel = "";

        if ($status == 1) {

            $statusLabel = "Super Admin";
        }

        if ($status == 2) {

            $statusLabel = "Tourism";
        }

        if ($status == 3) {

            $statusLabel = "Bussiness(BPLO)";
        }

        if ($status == 4) {

            $statusLabel = "Standard";
        }


        return $statusLabel;
    }

    public function getUserModal()
    {

        $result = $this->load->view('user/user_modal', '', TRUE);
        // var_dump($result);
        echo json_encode(array("data" => $result));
    }

    public function saveUser()
    {

        $rawPassword = $this->input->post('password');

        $hashedPassword = password_hash($rawPassword, PASSWORD_DEFAULT);

        $data = array(
            'userGroup' => $this->input->post('userGroup'),
            'firstName' => $this->input->post('firstName'),
            'lastName' => $this->input->post('lastName'),
            'userName' => $this->input->post('userName'),
            'password' => $hashedPassword,
            'userGroup' => $this->input->post('userGroup'),
        );

        $result = $this->User_model->saveUser($data);

        if ($result) {

            echo json_encode(array("status" => "success", "message" => "User successfully saved"));
        } else {

            echo json_encode(array("status" => "error", "message" => "Error saving user"));
        }
    }
}
