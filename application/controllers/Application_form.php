<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Application_form extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Landing_model');
        $this->load->library('session');
    }

	public function index(){

        $data["user_id"] = $this->session->userdata('user_id');
        $data["username"] = $this->session->userdata('username');
        $this->load->view('application_form/index', $data);

        // $data["allEvent"] = $this->Landing_model->getAllEvent();  
        // $this->load->view('landing/index', $data);
	}

    public function createApplication(){

        $dateNow = date('Y-m-d');

        if(!empty($_FILES['bussinessLogo'])){
            //image uploading
            $config['upload_path'] = './assets/application_forms/';
            $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|jpg|png|jpeg|gif';
            $config['max_size'] = 40240;
            $config['file_name'] = $_FILES['bussinessLogo']['name'];

            $this->load->library('upload',$config);

            if(!$this->upload->do_upload('bussinessLogo')){
                echo json_encode(["result" => "failed", "message" => $this->upload->display_errors()]);
            }

            $data_file = $this->upload->data();
            $bussines_logo_file_path = 'assets/application_forms/'.$data_file['file_name'];
            }else{

                $$bussines_permit_file_path = NULL;
                
            }

        if(!empty($_FILES['bussinessPermit'])){
            //image uploading
            $config['upload_path'] = './assets/application_forms/';
            $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|jpg|png|jpeg|gif';
            $config['max_size'] = 40240;
            $config['file_name'] = $_FILES['bussinessPermit']['name'];

            $this->load->library('upload',$config);

            if(!$this->upload->do_upload('bussinessPermit')){
                echo json_encode(["result" => "failed", "message" => $this->upload->display_errors()]);
            }

            $data_file = $this->upload->data();
            $bussines_permit_file_path = 'assets/application_forms/'.$data_file['file_name'];
            }else{

                $$bussines_permit_file_path = NULL;
                
            }

        if(!empty($_FILES['validId'])){
            //image uploading
            $config['upload_path'] = './assets/application_forms/';
            $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|jpg|png|jpeg|gif';
            $config['max_size'] = 40240;
            $config['file_name'] = $_FILES['validId']['name'];

            $this->load->library('upload',$config);

            if(!$this->upload->do_upload('validId')){
                echo json_encode(["result" => "failed", "message" => $this->upload->display_errors()]);
            }

            $data_file = $this->upload->data();
            $valid_id_file_path = 'assets/application_forms/'.$data_file['file_name'];
            }else{

                $$valid_id_file_path = NULL;
                
            }
            

      if($this->session->userdata('user_id') == !null){

            $data = array(
                "user_id" => $this->session->userdata('user_id'),
                "bussiness_logo_path" => $bussines_logo_file_path,
                "bussiness_name" => $this->input->post('bussinessName'),
                "bussiness_category" => $this->input->post('bussinessType'),
                "date_submitted" =>   $dateNow,
                "bussiness_description" => $this->input->post('bussinessDescription'),
                "bussiness_email" => $this->input->post('bussinessEmail'),
                "bussiness_phone_number" => $this->input->post('bussinessPhoneNumber'),
                "bussiness_address" => $this->input->post('bussinessAddress'),
                "bussiness_permit_path" => $bussines_permit_file_path,
                "bussiness_owner" => $this->input->post('bussinessOwner'),
                "bussiness_owner_email" => $this->input->post('bussinessOwnerEmail'),
                "owner_age" => $this->input->post('ownerAge'),
                "birth_date" => $this->input->post('birthDate'),
                "birth_place" => $this->input->post('birthPlace'),
                "nationality" => $this->input->post('nationality'),
                "residence" => $this->input->post('residence'),
                "postal_code" => $this->input->post('postalCode'),
                "valid_id_path" => $valid_id_file_path,
            );

            $result = $this->Landing_model->createApplication($data);

            if($result){

                echo json_encode(array("status" => "success", "message" => "Application successfully submitted"));

            }else{

                echo json_encode(array("status" => "error", "message" => "Error saving application"));

            }

      }else{
            echo json_encode(array("status" => "error", "message" => "Please login first"));
      }

    }
 
}
