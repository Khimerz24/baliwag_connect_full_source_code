<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Announcements extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Announcement_model');
        $this->load->library('session');
    }

    public function index()
    {
        $data["username"] = $this->session->userdata('username');
        $data["usergroup"] = $this->session->userdata('usergroup');
        if (!$data["username"]) {
            redirect('admin');
        }
        $this->load->view('announcements/index', $data);
    }

    public function getAnnouncement()
    {

        // $result = $this->Announcement_model->getAnnouncement();

        // echo json_encode(array("data" => $result));


        $result = $this->Announcement_model->getAnnouncement();

        $data = [];

        foreach ($result as $list) {
            $status = $this->status($list->status);
            $action = $this->action($list->status, $list->id);
            $data[] = array(
                "image" => $list->image,
                "title" => $list->title,
                "description" => $list->description,
                "status" => $status,
                "action" => $action
            );
        }

        // var_dump($data);
        echo json_encode(array("data" => $data));
    }

    public function getAnnouncementModal()
    {
        $id = $this->input->post('id');
        $data['details'] = $this->Announcement_model->getAnnouncementDataForModal($id);

        $result = $this->load->view('announcements/announcement_modal', $data, TRUE);
        // var_dump($result);
        echo json_encode(array("data" => $result));
    }
    public function newAnnouncementModal()
    {

        $result = $this->load->view('announcements/new_announcement_modal', '', TRUE);
        // var_dump($result);
        echo json_encode(array("data" => $result));
    }

    public function newAnnouncement()
    {
        $title = $this->input->post('title');
        $description = $this->input->post('description');

        $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['max_size'] = 40240;
        $config['file_name'] = $_FILES['image']['name'];

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            echo json_encode(["result" => "failed", "message" => $this->upload->display_errors()]);
        }

        $data = $this->upload->data();
        $file_path = $data['file_name'];

        $result = $this->Announcement_model->saveAnnouncement($title, $description, $file_path);


        if ($result) {

            echo json_encode(array("status" => "success", "message" => "Announcement successfully saved"));
        } else {

            echo json_encode(array("status" => "error", "message" => "Error saving Announcement"));
        }
    }

   public function saveAnnouncement()
    {
        $title = $this->input->post('Title');
        $description = $this->input->post('Description');

        $config['upload_path']   = './assets/img/';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['max_size']      = 40240;
        $config['encrypt_name']  = TRUE; 

        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('image')) {
            echo json_encode([
                "status"  => "failed",
                "message" => strip_tags($this->upload->display_errors())
            ]);
            return; 
        }

        $data      = $this->upload->data();
        $file_path = $data['file_name'];

        $result = $this->Announcement_model->saveAnnouncement($title, $description, $file_path);

        if ($result) {
            echo json_encode([
                "status"  => "success",
                "message" => "Announcement successfully saved"
            ]);
        } else {
            echo json_encode([
                "status"  => "error",
                "message" => "Error saving Announcement"
            ]);
        }
    }

    public function updateAnnouncementForm()
    {
        $id          = $this->input->post('id');
        $title       = $this->input->post('updateTitle');
        $description = $this->input->post('updateDescription');
        $old_image   = $this->input->post('old_image');
        $file_path   = $old_image;

        if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {

            $config['upload_path']   = './assets/img/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['max_size']      = 40240;
            $config['file_name']     = time() . '_' . $_FILES['image']['name'];

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $data = $this->upload->data();
                $file_path = $data['file_name'];

                if (!empty($old_image) && file_exists('./assets/img/' . $old_image)) {
                    unlink('./assets/img/' . $old_image);
                }
            }
        }

        $result = $this->Announcement_model->updateAnnouncement($id, $title, $description, $file_path);

        if ($result) {
            echo json_encode(["status" => "success", "message" => "Announcement successfully updated"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Error updating Announcement"]);
        }
    }

    public function status($status)
    {

        $statusLabel = "";

        if ($status == 1) {

            $statusLabel = "<span class='badge badge-success'>Active</span>";
        }

        if ($status == 2) {

            $statusLabel = "<span class='badge badge-warning'>Expired</span>";
        }

        return $statusLabel;
    }

    function action($status, $id)
    {

        $update = '<a class="dropdown-item" href="javascript: update(' . $id . ')"><i class="fas fa-edit"></i> Edit</a>';
        $view = '<a class="dropdown-item" href="javascript: viewRfq()"><i class="fas fa-eye"></i> View</a>';
        $expired = '<a class="dropdown-item" href="javascript: expired(' . $id . ')"><i class="fas fa-times"></i> Expired</a>';
        $cancel = '<a class="dropdown-item " href="javascript: rejectDirectory(' . $id . ')"><i class="fas fa-times"></i> Rejected</a>';
        $updateStatus = '<a class="dropdown-item " href="javascript: repost(' . $id . ')"><i class="fas fa-sync-alt"></i> Repost</a>';

        $action = '<div class="dropdown">
            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-cogs"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">';

        if ($status == 1) {
            $action .= $expired;
            $action .= $update;
        }
        if ($status == 2) {
            $action .= $updateStatus;
        }


        $action .= '</div></div>';

        return $action;
    }

    function expired()
    {

        $id = $this->input->post('id');

        $result = $this->Announcement_model->expired($id);

        if ($result) {

            echo json_encode(array("status" => "success", "message" => "Announcement Expired saved"));
        } else {

            echo json_encode(array("status" => "error", "message" => "Error saving Announcement"));
        }
    }

    function repost()
    {

        $id = $this->input->post('id');

        $result = $this->Announcement_model->repost($id);

        if ($result) {

            echo json_encode(array("status" => "success", "message" => "Announcement Reposted saved"));
        } else {

            echo json_encode(array("status" => "error", "message" => "Error saving reposted announcement"));
        }
    }
}
