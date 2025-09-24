<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Faqs extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Faqs_model');
        $this->load->library('session');
    }

    public function index()
    {
        $data["username"] = $this->session->userdata('username');
        $data["usergroup"] = $this->session->userdata('usergroup');

        if (!$data["username"]) {
            redirect('admin');
        }
        $this->load->view('faqs/index', $data);
    }

    public function getFaqs()
    {

        $result = $this->Faqs_model->getFaqs();
        // var_dump($result);
        $data = [];

        foreach ($result as $list) {
            $status = $this->status($list->status);


            $data[] = array(

                "title" => $list->title,
                "description" => $list->description,
                "status" => $status,
                "action" => $this->action($list->status, $list->id),
            );
        }

        echo json_encode(array("data" => $data));
    }

    public function status($status)
    {

        $statusLabel = "";

        if ($status == 1) {

            $statusLabel = "<span class='badge badge-success'>Approved</span>";
        }
        if ($status == 0) {

            $statusLabel = "<span class='badge badge-danger'>Remove</span>";
        }

        return $statusLabel;
    }

    function action($status, $id)
    {

        $update = '<a class="dropdown-item" href="javascript: update(' . $id . ')"><i class="fas fa-edit"></i> Edit</a>';
        $view = '<a class="dropdown-item" href="javascript: viewApplication(' . $id . ')"><i class="fas fa-eye"></i> View Application</a>';
        $viewPermit = '<a class="dropdown-item" href="javascript: viewPermit(' . $id . ')"><i class="fas fa-image"></i> View Logo</a>';
        $viewValidId = '<a class="dropdown-item" href="javascript: viewValidId(' . $id . ')"><i class="fas fa-file"></i> View Id</a>';
        $receive = '<a class="dropdown-item" href="javascript: receiveDirectory(' . $id . ')"><i class="fas fa-check"></i> Approved</a>';
        $cancel = '<a class="dropdown-item " href="javascript: removeFaqs(' . $id . ')"><i class="fas fa-times"></i> Remove</a>';


        $action = '<div class="dropdown">
            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-cogs"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">';

        if ($status == 1) {
            $action .= $cancel;
            $action .= $update;
        }
        if ($status == 0) {
            $action .= "";
        }

        $action .= '</div></div>';

        return $action;
    }
    public function faqsModal()
    {
        $result = $this->load->view('faqs/faqs_modal', '', TRUE);
        // var_dump($result);
        echo json_encode(array("data" => $result));
    }

    public function update()
    {
        $id = $this->input->post('id');
        $data['faqs'] = $this->Faqs_model->getFaqsToUpdate($id);
        $result = $this->load->view('faqs/update_modal', $data, TRUE);
        // var_dump($result);
        echo json_encode(array("data" => $result));
    }
    public function newFaqs()
    {
        $title = $this->input->post('title');
        $description = $this->input->post('description');


        $data = array(
            'title' =>  $title,
            'description' => $description,
        );

        $result = $this->Faqs_model->newFaqs($data);

        if ($result) {

            echo json_encode(array("status" => "success", "message" => "Faqs successfully added"));
        } else {

            echo json_encode(array("status" => "error", "message" => "Error saving faqs"));
        }
    }
    public function saveFaqs()
    {
        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $description = $this->input->post('description');


        $data = array(
            'id' =>   $id,
            'title' =>  $title,
            'description' => $description,
        );

        $result = $this->Faqs_model->saveFaqs($data);

        if ($result) {

            echo json_encode(array("status" => "success", "message" => "Faqs updated successfully"));
        } else {

            echo json_encode(array("status" => "error", "message" => "Error updating faqs"));
        }
    }
    public function removeFaqs()
    {

        $id = $this->input->post('id');
        $result = $this->Faqs_model->removeFaqs($id);
        if ($result) {
            echo json_encode(array("status" => "success", "message" => "Faqs successfully removed"));
        } else {
            echo json_encode(array("status" => "error", "message" => "Error removing faqs"));
        }
    }
}
