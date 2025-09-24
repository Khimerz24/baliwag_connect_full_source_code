<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Centralized extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Centralized_model');
        $this->load->library('session');
    }

    public function index()
    {
        $data['centralized'] =  $this->Centralized_model->getCentralized();
        $this->load->view('template/navbar', $data);
    }
}
