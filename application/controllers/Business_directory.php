<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Business_directory extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Business_directory_model');
        $this->load->library('session');
    }

    public function index()
    {

        $data["username"] = $this->session->userdata('username');
        $data["usergroup"] = $this->session->userdata('usergroup');

        if (!$data["username"]) {
            redirect('admin');
        }
        $this->load->view('business_directory/index', $data);
    }

    public function getBusinessDirectory()
    {

        $status = $this->input->post('status');

        if ($status == "all") {

            $where = "WHERE 1 = 1 ORDER BY date_submitted DESC";
        } else {

            $where = "WHERE status = $status ORDER BY date_submitted DESC";
        }

        $result = $this->Business_directory_model->getBusinessDirectory($where);

        $data = [];

        foreach ($result as $list) {
            $status = $this->status($list->status);
            $category = $this->category($list->bussiness_category);
            $action = $this->action($list->status, $list->id);

            $data[] = array(
                "logo" => $list->bussiness_logo_path,
                "bussiness_name" => $list->bussiness_name,
                "bussiness_description" => $list->bussiness_description,
                "location" => $list->bussiness_address,
                "email" => $list->bussiness_email,
                "contact" => $list->bussiness_phone_number,
                "bussiness_category" => $category,
                "date_submitted" => $list->date_submitted,
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

            $statusLabel = "<span class='badge badge-success'>Active</span>";
        }

        if ($status == 2) {

            $statusLabel = "<span class='badge badge-warning'>Pending</span>";
        }

        if ($status == 0) {

            $statusLabel = "<span class='badge badge-danger'>Remove</span>";
        }

        return $statusLabel;
    }

    public function category($status)
    {

        $statusLabel = "";

        if ($status == 1) {

            $statusLabel = "Foods Places";
        }

        if ($status == 2) {

            $statusLabel = "Retail Store";
        }

        if ($status == 3) {

            $statusLabel = "Tourist Spot";
        }

        if ($status == 4) {

            $statusLabel = "Services";
        }

        return $statusLabel;
    }

    function action($status, $id)
    {
        $updateDetails = '<a class="dropdown-item" href="javascript: updateDetailsss(' . $id . ')"><i class="fas fa-edit"></i> Update Details</a>';
        $update = '<a class="dropdown-item" href="javascript: update(' . $id . ')"><i class="fas fa-edit"></i> Replace Logo</a>';
        // $view = '<a class="dropdown-item" href="javascript: viewApplication('.$id.')"><i class="fas fa-eye"></i> View Application</a>';
        $viewPermit = '<a class="dropdown-item" href="javascript: viewPermit(' . $id . ')"><i class="fas fa-file"></i> View Permit</a>';
        $viewValidId = '<a class="dropdown-item" href="javascript: viewValidId(' . $id . ')"><i class="fas fa-file"></i> View Id</a>';
        $receive = '<a class="dropdown-item" href="javascript: receiveDirectory(' . $id . ')"><i class="fas fa-check"></i> Approved</a>';
        $remove = '<a class="dropdown-item " href="javascript: remove(' . $id . ')"><i class="fas fa-times"></i> Remove</a>';
        $updateStatus = '<a class="dropdown-item " href="javascript: updateRfqStatus()"><i class="fas fa-sync-alt"></i> Update</a>';

        $action = '<div class="dropdown">
            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-cogs"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">';

        if ($status == 1) {
            // $action .= $view;
            $action .= $update;
            $action .= $updateDetails;
            $action .= $remove;
            // $action .= $viewPermit;
            // $action .= $viewValidId;
        }
        if ($status == 2) {
            // $action .= $view;
            // $action .= $update;
            // $action .= $viewValidId;
            $action .= $receive;
            $action .= $update;
            // $action .= $cancel ;
        }
        if ($status == 3) {
            $action .= $update;
            // $action .= $view;
            // $action .= $viewPermit;
            // $action .= $viewValidId;
        }

        $action .= '</div></div>';

        return $action;
    }

    public function receiveDirectory()
    {

        $id = $this->input->post('id');

        // var_dump($id);

        $result = $this->Business_directory_model->receiveDirectory($id);

        if ($result) {

            echo json_encode(array("status" => "success", "message" => "Business successfully Approved"));
        } else {

            echo json_encode(array("status" => "error", "message" => "Error saving business"));
        }
    }

    public function rejectDirectory()
    {

        $id = $this->input->post('id');

        $result = $this->Business_directory_model->rejectDirectory($id);

        if ($result) {

            echo json_encode(array("status" => "success", "message" => "Business successfully rejected"));
        } else {

            echo json_encode(array("status" => "error", "message" => "Error saving reject business"));
        }
    }

    public function businessModal()
    {

        $result = $this->load->view('business_directory/business_modal', '', TRUE);
        // var_dump($result);
        echo json_encode(array("data" => $result));
    }

    public function updateModal()
    {
        $id['id'] = $this->input->post('id');

        // $data['image'] = $this->Business_directory_model->getImage($id);

        $result = $this->load->view('business_directory/update_modal', $id, TRUE);
        // var_dump($result);
        echo json_encode(array("data" => $result));
    }
    public function updateDetailsModals()
    {
        $id = $this->input->post('id');

        $data['details'] = $this->Business_directory_model->getDataToUpdate($id);

        $result = $this->load->view('business_directory/update_details', $data, TRUE);

        echo json_encode(array("data" => $result));
    }

    public function updateDetails()
    {
        $id = $this->input->post('id');
        $data = array(
            'bussiness_category' => $this->input->post('businessCategory'),
            'bussiness_name' => $this->input->post('businessName'),
            'bussiness_description' => $this->input->post('businessDescription'),
            'bussiness_email' => $this->input->post('businessEmail'),
            'bussiness_phone_number' => $this->input->post('businessNo'),
            'bussiness_address' => $this->input->post('businessAddress'),
        );

        $result = $this->Business_directory_model->updateDetails($id, $data);

        if ($result) {
            echo json_encode(array("status" => "success", "message" => "Business successfully updated"));
        } else {
            echo json_encode(array("status" => "error", "message" => "Error saving Business"));
        }
    }

    public function remove()
    {
        $id = $this->input->post('id');
        $result = $this->Business_directory_model->remove($id);

        if ($result) {
            echo json_encode(array("status" => "success", "message" => "Business successfully removed"));
        } else {
            echo json_encode(array("status" => "error", "message" => "Error removing Business"));
        }
    }

     public function saveBusiness()
    {
        $bussines_logo_file_path = NULL; 
    
        if (!empty($_FILES['bussinessLogo']['name'])) {
           
            $config['upload_path']   = './assets/application_forms/';
            $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|jpg|png|jpeg|gif';
            $config['max_size']      = 40240;
            $config['encrypt_name']  = TRUE; 
    
            $this->load->library('upload');
            $this->upload->initialize($config);
    
            if (!$this->upload->do_upload('bussinessLogo')) {
                echo json_encode([
                    "status"  => "failed",
                    "message" => strip_tags($this->upload->display_errors())
                ]);
                return;
            }
    
            $data_file = $this->upload->data();
            $bussines_logo_file_path = 'assets/application_forms/' . $data_file['file_name'];
        }
    
        $data = array(
            'date_submitted'       => date('Y-m-d'),
            'bussiness_category'   => $this->input->post('bussinessType'),
            'bussiness_name'       => $this->input->post('businessName'),
            'bussiness_description'=> $this->input->post('businessDescription'),
            'bussiness_address'    => $this->input->post('businessLocation'),
            'bussiness_phone_number'=> $this->input->post('businessContact'),
            'bussiness_email'      => $this->input->post('businessEmail'),
            'bussiness_logo_path'  => $bussines_logo_file_path, 
        );
    
        $result = $this->Business_directory_model->saveBusiness($data);
    
        if ($result) {
            echo json_encode([
                "status"  => "success",
                "message" => "Business successfully saved"
            ]);
        } else {
            echo json_encode([
                "status"  => "error",
                "message" => "Error saving business"
            ]);
        }
    }

    public function update()
    {
        $id = $this->input->post('id');
        $bussines_logo_file_path = NULL; 
    
        if (!empty($_FILES['bussinessLogo']['name'])) {
        
            $config['upload_path']   = './assets/application_forms/';
            $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|jpg|png|jpeg|gif';
            $config['max_size']      = 40240;
            $config['encrypt_name']  = TRUE;
    
            $this->load->library('upload');
            $this->upload->initialize($config);
    
            if (!$this->upload->do_upload('bussinessLogo')) {
                echo json_encode([
                    "status"  => "failed",
                    "message" => strip_tags($this->upload->display_errors())
                ]);
                return; 
            }
    
            $data_file = $this->upload->data();
            $bussines_logo_file_path = 'assets/application_forms/' . $data_file['file_name'];
        }
    
        $data = array(
            'id'                  => $id,
            'bussiness_logo_path' => $bussines_logo_file_path
        );
    
        $result = $this->Business_directory_model->updateLogo($data);
    
        if ($result) {
            echo json_encode([
                "status"  => "success",
                "message" => "Logo successfully updated"
            ]);
        } else {
            echo json_encode([
                "status"  => "error",
                "message" => "Error updating logo"
            ]);
        }
    }

    public function viewApplication($id = null)
    {
        if (!$id) {
            show_error('No ID provided.');
            return;
        }

        $result = $this->Business_directory_model->viewApplication($id);

        if (!$result || empty($result)) {
            show_error('No application found.');
            return;
        }

        $data = $result[0];

        require_once(APPPATH . 'third_party/tcpdf/tcpdf.php');

        $pdf = new TCPDF();
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Company');
        $pdf->SetTitle('Business Application Form');
        $pdf->SetMargins(25, 5, 25);
        $pdf->AddPage();

        $html = '
        <style>
             .label {
                font-weight: bold;
                font-size: 10pt;
                color: #333;
            }
            .input {
            text-align: center;
                border: 1px solid #c47ea3;
                padding: 10px 8px;    
                font-size: 10pt;
                margin-bottom: 10px;
                line-height: 2;        
                min-height: 30px;      
            }
        </style>
        
        <h2 style="text-align:center; color:#800040;">Business Application Form</h2><br>
        
        <table cellpadding="4" cellspacing="0" width="100%">
            <tr>
                <td colspan="2">
                    <span class="label">Date Submitted</span>
                    <div class="input">' . $data->date_submitted . '</div>
                </td>
            </tr>
            <tr>
                <td width="50%">
                    <span class="label">Business Name</span>
                    <div class="input">' . $data->bussiness_name . '</div>
                </td>
                <td width="50%">
                    <span class="label">Category</span>
                    <div class="input">' . $data->bussiness_category . '</div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <span class="label">Business Description</span>
                    <div class="input">' . $data->bussiness_description . '</div>
                </td>
            </tr>
            <tr>
                <td width="50%">
                    <span class="label">Email</span>
                    <div class="input">' . $data->bussiness_email . '</div>
                </td>
                <td width="50%">
                    <span class="label">Phone Number</span>
                    <div class="input">' . $data->bussiness_phone_number . '</div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <span class="label">Business Address</span>
                    <div class="input">' . $data->bussiness_address . '</div>
                </td>
            </tr>
           
        </table>
        
        <h4 style="color:#800040; margin-top: 15px;">Business Owner</h4>
        <table cellpadding="4" cellspacing="0" width="100%">
            <tr>
                <td width="50%">
                    <span class="label">Owner Name</span>
                    <div class="input">' . $data->bussiness_owner . '</div>
                </td>
                <td width="50%">
                    <span class="label">Owner Email</span>
                    <div class="input">' . $data->bussiness_owner_email . '</div>
                </td>
            </tr>
            <tr>
                <td width="50%">
                    <span class="label">Age</span>
                    <div class="input">' . $data->owner_age . '</div>
                </td>
                <td width="50%">
                    <span class="label">Birth Date</span>
                    <div class="input">' . $data->birth_date . '</div>
                </td>
            </tr>
            <tr>
                <td width="50%">
                    <span class="label">Birth Place</span>
                    <div class="input">' . $data->birth_place . '</div>
                </td>
                <td width="50%">
                    <span class="label">Nationality</span>
                    <div class="input ">' . $data->nationality . '</div>
                </td>
            </tr>
            <tr>
                <td width="50%">
                    <span class="label">Residence</span>
                    <div class="input">' . $data->residence . '</div>
                </td>
                <td width="50%">
                    <span class="label">Postal Code</span>
                    <div class="input">' . $data->postal_code . '</div>
                </td>
            </tr>
        </table>

        ';


        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Output('Business_Application_' . $data->id . '.pdf', 'I');
    }



    public function viewPermit()
    {

        $id = $this->input->post('id');

        $result = $this->Business_directory_model->viewPermit($id);

        echo json_encode(array("data" => $result));
    }

    public function viewValidId()
    {

        $id = $this->input->post('id');

        $result = $this->Business_directory_model->viewValidId($id);

        echo json_encode(array("data" => $result));
    }


    public function generate_pdf()
    {
        require_once(APPPATH . 'third_party/tcpdf/tcpdf.php');

        $pdf = new TCPDF();
        $pdf->AddPage();
        $pdf->writeHTML("<h1>Hello PDF</h1>");
        $pdf->Output("example.pdf", "I");
    }
}
