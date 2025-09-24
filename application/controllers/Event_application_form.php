<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event_application_form extends CI_Controller
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
        $this->load->view('event_application_form/index', $data);

        // $data["allEvent"] = $this->Landing_model->getAllEvent();  
        // $this->load->view('landing/index', $data);
    }

    public function createApplication()
    {
        $dateNow = date('Y-m-d');

        $uploadFile = function ($fieldName) {
            if (!empty($_FILES[$fieldName]['name'])) {
                $config['upload_path']   = './assets/event_application_forms/';
                $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|jpg|png|jpeg|gif';
                $config['max_size']      = 40240;
                $config['file_name']     = $_FILES[$fieldName]['name'];

                $CI = &get_instance();
                $CI->load->library('upload', $config);

                if (!$CI->upload->do_upload($fieldName)) {
                    echo json_encode([
                        "result"  => "failed",
                        "message" => $CI->upload->display_errors()
                    ]);
                    exit;
                }

                $data_file = $CI->upload->data();
                return 'assets/event_application_forms/' . $data_file['file_name'];
            }
            return NULL;
        };
        $event_logo_file_path   = $uploadFile('eventLogo');
        $event_photo_file_path  = $uploadFile('eventPhoto');
        $event_photo_file_path_2 = $uploadFile('eventPhoto2');
        $event_photo_file_path_3 = $uploadFile('eventPhoto3');
        $valid_id_file_path     = $uploadFile('validId');


        if ($this->session->userdata('user_id') != null) {
            $data = array(
                "user_id"             => $this->session->userdata('user_id'),
                "event_logo"          => $event_logo_file_path,
                "event_name"          => $this->input->post('eventName'),
                "date_submitted"      => $dateNow,
                "event_description"   => $this->input->post('eventDescription'),
                "event_date"   => $this->input->post('eventDate'),
                "event_email"         => $this->input->post('eventEmail'),
                "event_phone_number"  => $this->input->post('eventPhoneNumber'),
                "event_address"       => $this->input->post('eventAddress'),
                "event_date"          => $this->input->post('eventDate'),
                "joinable"            => $this->input->post('joinable'),
                "event_reason"        => $this->input->post('reasonForApplication'),
                "event_photo"         => $event_photo_file_path,
                "event_photo_2"       => $event_photo_file_path_2,
                "event_photo_3"       => $event_photo_file_path_3,
                // "event_owner"         => $this->input->post('eventOwner'),
                "event_first_name"         => $this->input->post('eventFirstName'),
                "event_middle_name"         => $this->input->post('eventMiddleName'),
                "event_last_name"         => $this->input->post('eventLastName'),
                "event_gender"        => $this->input->post('gender'),
                "event_owner_email"   => $this->input->post('eventOwnerEmail'),
                "owner_age"           => $this->input->post('ownerAge'),
                "birth_date"          => $this->input->post('birthDate'),
                "birth_place"         => $this->input->post('birthPlace'),
                "residence"           => $this->input->post('residence'),
                "valid_id_path"       => $valid_id_file_path,
                "id_number"           => $this->input->post('idNumber'),
            );

            $result = $this->Landing_model->createEventApplication($data);

            if ($result) {
                echo json_encode([
                    "status"  => "success",
                    "message" => "Event Application successfully submitted"
                ]);
            } else {
                echo json_encode([
                    "status"  => "error",
                    "message" => "Error saving application"
                ]);
            }
        } else {
            echo json_encode([
                "status"  => "error",
                "message" => "Please login first"
            ]);
        }
    }
}
