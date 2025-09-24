<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Dashboard_model');
    }

    public function index()
    {

        $data["username"] = $this->session->userdata('username');
        $data["usergroup"] = $this->session->userdata('usergroup');

        $data["businessTotal"] = $this->Dashboard_model->getTotalBusiness();
        $data["approvedTotal"] = $this->Dashboard_model->approvedTotalBusiness();
        $data["pendingTotal"] = $this->Dashboard_model->pendingTotalBussiness();
        $data["rejectedTotal"] = $this->Dashboard_model->rejectedTotalBussiness();

        $data["retailTotal"] = $this->Dashboard_model->getRetail();
        $data["foodTotal"] = $this->Dashboard_model->getFood();
        $data["serviceTotal"] = $this->Dashboard_model->getService();
        $data["touristTotal"] = $this->Dashboard_model->getTourist();
        $data["eventsTotal"] = $this->Dashboard_model->getEvents();
        // var_dump($data["businessTotal"]);
        if (!$data["username"]) {
            redirect('admin');
        }
        $this->load->view('admin/admin/dashboard', $data);
    }
}
