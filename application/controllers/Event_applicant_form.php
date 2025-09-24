<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event_applicant_form extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Landing_model');
        $this->load->library('session');
    }

    // public function index()
    // {

    //     $data["user_id"] = $this->session->userdata('user_id');
    //     $data["username"] = $this->session->userdata('username');
    //     $this->load->view('event_applicant_form/index', $data);
    // }
    public function index($event_id = null)
    {
        $data["user_id"]   = $this->session->userdata('user_id');
        $data["username"]  = $this->session->userdata('username');
        $data["event_id"]  = $event_id;

        $this->load->view('event_applicant_form/index', $data);
    }

    public function createApplicant()
    {


        if (!empty($_FILES['validId'])) {
            //image uploading
            $config['upload_path'] = './assets/event_application_forms/';
            $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|jpg|png|jpeg|gif';
            $config['max_size'] = 40240;
            $config['file_name'] = $_FILES['validId']['name'];

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('validId')) {
                echo json_encode(["result" => "failed", "message" => $this->upload->display_errors()]);
            }

            $data_file = $this->upload->data();
            $applicant_id_path = 'assets/applicant_forms/' . $data_file['file_name'];
        } else {

            $applicant_id_path = NULL;
        }

        if ($this->session->userdata('user_id') == !null) {
            $data = array(
                "user_id" => $this->session->userdata('user_id'),
                "event_id" => $this->input->post('eventId'),
                "applicant_name" => $this->input->post('applicantName'),
                "applicant_gender" => $this->input->post('gender'),
                "applicant_email" => $this->input->post('applicantEmail'),
                "applicant_age" => $this->input->post('applicantAge'),
                "applicant_birth_date" => $this->input->post('applicantBirthDate'),
                "applicant_birth_place" => $this->input->post('applicantBirthPlace'),
                "applicant_address" => $this->input->post('applicantAddress'),
                "reason_of_application" => $this->input->post('reasonOfApplication'),
                "valid_id_path" => $applicant_id_path,
                "id_number" => $this->input->post('idNumber'),
            );

            $result = $this->Landing_model->createApplicant($data);

            if ($result) {

                echo json_encode(array("status" => "success", "message" => "Applicant successfully submitted"));
            } else {

                echo json_encode(array("status" => "error", "message" => "Error saving Applicant"));
            }
        } else {
            echo json_encode(array("status" => "error", "message" => "Please login first"));
        }
    }
}
