<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upcoming_event extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('Upcoming_event_model');
        $this->load->library('session');
    }

    public function index()
    {

        $data["username"] = $this->session->userdata('username');
        $data["usergroup"] = $this->session->userdata('usergroup');
        if (!$data["username"]) {
            redirect('admin');
        }
        $this->load->view('upcoming_event/index', $data);
    }

    public function getUpcomingEvent()
    {

        $status = $this->input->post('status');

        if ($status == "all") {

            $where = "WHERE 1 = 1";
        } else {

            $where = "WHERE status = $status";
        }
        $result = $this->Upcoming_event_model->getUpcomingEvent($where);

        $data = [];

        foreach ($result as $list) {
            $status = $this->status($list->status);
            $action = $this->action($list->status, $list->id);
            $data[] = array(
                "logo" => $list->event_image,
                "event_name" => $list->event_name,
                "location" => $list->location,
                "date" => $list->date,
                "organizer" => $list->organizer,
                "status" => $status,
                "action" => $action
            );
        }

        echo json_encode(array("data" => $data));
    }

    public function status($status)
    {

        $statusLabel = "";

        if ($status == 1) {

            $statusLabel = "<span class='badge badge-success'>Pulished</span>";
        }

        if ($status == 2) {

            $statusLabel = "<span class='badge badge-warning'>Archieved</span>";
        }

        if ($status == 3) {

            $statusLabel = "<span class='badge badge-danger'>Canceled</span>";
        }

        return $statusLabel;
    }

    function action($status, $id)
    {
        $update = '<a class="dropdown-item" href="javascript: update(' . $id . ')"><i class="fas fa-edit"></i> Replace Logo</a>';
        $archieve = '<a class="dropdown-item" href="javascript: archieve(' . $id . ')"><i class="fas fa-archive"></i> Archive</a>';
        $receive = '<a class="dropdown-item" href="javascript: receiveDirectory(' . $id . ')"><i class="fas fa-check"></i> Receive</a>';
        $cancel = '<a class="dropdown-item " href="javascript: cancel(' . $id . ')"><i class="fas fa-times"></i> Canceled</a>';
        $republished = '<a class="dropdown-item " href="javascript: republished(' . $id . ')"><i class="fas fa-sync-alt"></i> Republish</a>';

        $action = '<div class="dropdown">
            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-cogs"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">';

        if ($status == 1) {
            $action .= $update;
            $action .= $archieve;
            $action .= $cancel;
        }
        if ($status == 2) {
            $action .= $update;
            $action .= $republished;
            // $action .= $receive;
            // $action .= $cancel ;
        }
        if ($status == 3) {
            $action .= $republished;
        }

        $action .= '</div></div>';

        return $action;
    }


    public function getEventModal()
    {

        $result = $this->load->view('upcoming_event/event_modal', '', TRUE);
        // var_dump($result);
        echo json_encode(array("data" => $result));
    }
    public function getEventUpdateModal()
    {
        $id['id'] = $this->input->post('id');
        $result = $this->load->view('upcoming_event/update_modal', $id, TRUE);
        echo json_encode(array("data" => $result));
    }
    
     public function updateLogo()
    {
        $id = $this->input->post('id');
        $upcoming_event_file_path = NULL;

        if (!empty($_FILES['eventLogo']['name'])) {
    
            $config['upload_path']   = './assets/upcoming_events/';
            $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|jpg|png|jpeg|gif';
            $config['max_size']      = 40240;
            $config['encrypt_name']  = TRUE; 

            $this->load->library('upload');
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('eventLogo')) {
                echo json_encode([
                    "status"  => "failed",
                    "message" => strip_tags($this->upload->display_errors())
                ]);
                return; 
            }

            $data_file = $this->upload->data();
            $upcoming_event_file_path = 'assets/upcoming_events/' . $data_file['file_name'];
        }

        $data = array(
            'id'          => $id,
            'event_image' => $upcoming_event_file_path
        );

        $result = $this->Upcoming_event_model->updateLogo($data);

        if ($result) {
            echo json_encode([
                "status"  => "success",
                "message" => "Event logo successfully updated"
            ]);
        } else {
            echo json_encode([
                "status"  => "error",
                "message" => "Error updating logo"
            ]);
        }
    }

    
    public function saveEvent()
    {
        $upcoming_event_file_path = NULL; 

        if (!empty($_FILES['eventImage']['name'])) {
     
            $config['upload_path']   = './assets/upcoming_events/';
            $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|jpg|png|jpeg|gif';
            $config['max_size']      = 40240;
            $config['encrypt_name']  = TRUE; 

            $this->load->library('upload');
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('eventImage')) {
                echo json_encode([
                    "status"  => "failed",
                    "message" => strip_tags($this->upload->display_errors())
                ]);
                return; 
            }

            $data_file = $this->upload->data();
            $upcoming_event_file_path = 'assets/upcoming_events/' . $data_file['file_name'];
        }

        $data = array(
            'eventImage'    => $upcoming_event_file_path,
            'eventName'     => $this->input->post('eventName'),
            'eventDate'     => $this->input->post('eventDate'),
            'eventLocation' => $this->input->post('eventLocation'),
            'eventOrganizer'=> $this->input->post('eventOrganizer'),
        );

        $result = $this->Upcoming_event_model->saveEvent($data);

        if ($result) {
            echo json_encode([
                "status"  => "success",
                "message" => "Event successfully saved"
            ]);
        } else {
            echo json_encode([
                "status"  => "error",
                "message" => "Error saving event"
            ]);
        }
    }

    public function archieveEvent()
    {

        $id = $this->input->post('id');
        $result = $this->Upcoming_event_model->archieveEvent($id);

        if ($result) {

            echo json_encode(array("status" => "success", "message" => "Event successfully archieved"));
        } else {

            echo json_encode(array("status" => "error", "message" => "Error saving archieved"));
        }
    }

    public function cancelEvent()
    {

        $id = $this->input->post('id');
        $result = $this->Upcoming_event_model->cancelEvent($id);

        if ($result) {

            echo json_encode(array("status" => "success", "message" => "Event successfully canceled"));
        } else {

            echo json_encode(array("status" => "error", "message" => "Error saving canceled"));
        }
    }

    public function republished()
    {

        $id = $this->input->post('id');
        $result = $this->Upcoming_event_model->republished($id);

        if ($result) {

            echo json_encode(array("status" => "success", "message" => "Event successfully republished"));
        } else {

            echo json_encode(array("status" => "error", "message" => "Error republished"));
        }
    }
}
