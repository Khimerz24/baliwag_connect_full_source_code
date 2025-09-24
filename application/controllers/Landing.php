<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Landing_model');
        $this->load->library('session');
    }

    public function index()
    {

        $data["user_id"] = $this->session->userdata('user_id');
        $data["username"] = $this->session->userdata('username');
        $data["allEvent"] = $this->Landing_model->getAllEvent();

        $data["allEventCarousel"] = $this->Landing_model->getAllEventCarousel();

        $this->load->view('landing/index', $data);

        // $data["allEvent"] = $this->Landing_model->getAllEvent();  
        // $this->load->view('landing/index', $data);
    }
    public function sendFeedback()
    {

        $data = array(
            "subject" => $this->input->post("subject"),
            "first_name" => $this->input->post("firstName"),
            "middle_name" => $this->input->post("middleName"),
            "last_name" => $this->input->post("lastName"),
            "email" => $this->input->post("email"),
            "message" => $this->input->post("message")
        );

        $result = $this->Landing_model->sendFeedback($data);

        if ($result) {

            echo json_encode(array("status" => "success", "message" => "Feedback successfully saved"));
        } else {

            echo json_encode(array("status" => "error", "message" => "Error saving usFeedbacker"));
        }
    }

    public function getCommonBussiness()
    {

        $category = $this->input->post("category");

        $idFromIndex = $this->input->post("idFromIndex");

        if ($idFromIndex != null) {
            $idFromIndex;
        } else {
            $idFromIndex = NULL;
        }

        $result = $this->Landing_model->getCommonBussiness($category, $idFromIndex);

        echo json_encode(array("data" => $result));
    }

    public function common_bussiness()
    {
        $data["user_id"] = $this->session->userdata('user_id');
        $data["username"] = $this->session->userdata('username');
        $data["typeFromAnotherPage"] = $this->input->get('type');
        // $data["commonBussiness"] = $this->Landing_model->getCommonBussiness();  
        $this->load->view('landing/common_bussiness', $data);
    }
    public function announcement()
    {
        $data["user_id"] = $this->session->userdata('user_id');
        $data["username"] = $this->session->userdata('username');
        $data["announcement"] = $this->Landing_model->getAnnouncement();
        $this->load->view('landing/announcement', $data);
    }
    public function bussiness_application()
    {
        $data["user_id"] = $this->session->userdata('user_id');
        $data["username"] = $this->session->userdata('username');
        $this->load->view('landing/bussiness_application', $data);
    }
    public function about()
    {
        $data["user_id"] = $this->session->userdata('user_id');
        $data["username"] = $this->session->userdata('username');
        $this->load->view('landing/about', $data);
    }
    public function event()
    {
        $data["user_id"] = $this->session->userdata('user_id');
        $data["username"] = $this->session->userdata('username');
        $this->load->view('landing/event', $data);
    }
    public function contact()
    {
        $data["user_id"] = $this->session->userdata('user_id');
        $data["username"] = $this->session->userdata('username');
        $this->load->view('landing/contact', $data);
    }
    public function faqs()
    {
        $data["user_id"] = $this->session->userdata('user_id');
        $data["username"] = $this->session->userdata('username');
        $data["typeFromAnotherPage"] = $this->input->get('type');
        $data["faqs"] = $this->Landing_model->allFaqs();
        $this->load->view('landing/faqs', $data);
    }

    public function getEvents()
    {

        $options = $this->input->post("options");

        $result = $this->Landing_model->getEvents($options);

        echo json_encode(array("data" => $result));
    }

    public function viewEventDetails($id)
    {

        $data["user_id"] = $this->session->userdata('user_id');
        $data["username"] = $this->session->userdata('username');

        $data["details"] = $this->Landing_model->viewEventDetails($id);

        $this->load->view('landing/event_details', $data);
    }

    public function viewBusinessInformation($id = null)
    {
        $data["user_id"] = $this->session->userdata('user_id');
        $data["username"] = $this->session->userdata('username');

        $data["information"] = $this->Landing_model->viewBusinessInformation($id);

        $this->load->view('landing/view_information', $data);
    }

    public function insertContact()
    {


        $data = array(
            "first_name" => $this->input->post("firstName"),
            "last_name" => $this->input->post("lastName"),
            "email" => $this->input->post("email"),
            "message" => $this->input->post("message")
        );

        $result = $this->Landing_model->insertContact($data);

        if ($result) {

            echo json_encode(array("status" => "success", "message" => "Message successfully saved"));
        } else {

            echo json_encode(array("status" => "error", "message" => "Error saving message"));
        }
    }
     public function searchBusiness()
        {
            $search = $this->input->post('search');
    
            $this->db->like('bussiness_name', $search);
            $query = $this->db->get('application_forms', array('status' => 1)); 
    
            echo json_encode(["data" => $query->result_array()]);
        }
    public function searchEvent()
        {
            $search = $this->input->post('search');
            $this->db->like('event_name', $search);
            $query = $this->db->get_where('event_application_forms', array('status' => 1));
            echo json_encode(["data" => $query->result_array()]);
        }
}
