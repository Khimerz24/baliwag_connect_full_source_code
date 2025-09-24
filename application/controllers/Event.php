<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Event_directory_model');
        $this->load->library('session');
    }

    public function index()
    {

        $data["username"] = $this->session->userdata('username');
        $data["usergroup"] = $this->session->userdata('usergroup');

        // var_dump($data["username"]);

        if (!$data["username"]) {
            redirect('admin');
        }
        $this->load->view('event_directory/index', $data);
    }

    public function getBusinessDirectory()
    {

        $status = $this->input->post('status');

        if ($status == "all") {

            $where = "WHERE 1 = 1 ORDER BY date_submitted DESC";
        } else {

            $where = "WHERE status = $status ORDER BY date_submitted DESC";
        }

        $result = $this->Event_directory_model->getBusinessDirectory($where);

        $data = [];

        foreach ($result as $list) {
            $status = $this->status($list->status);
            $action = $this->action($list->status, $list->id);
            $data[] = array(
                "event_logo" => $list->event_logo,
                "event_name" => $list->event_name,
                "event_owner" => $list->event_owner,
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

            $statusLabel = "<span class='badge badge-success'>Approved</span>";
        }

        if ($status == 2) {

            $statusLabel = "<span class='badge badge-warning'>Pending</span>";
        }

        if ($status == 3) {

            $statusLabel = "<span class='badge badge-danger'>Declined</span>";
        }

        if ($status == 4) {

            $statusLabel = "<span class='badge badge-warning'>Archived</span>";
        }

        return $statusLabel;
    }

    // public function category($status){

    //     $statusLabel = "";

    //     if($status == 1){

    //         $statusLabel = "Foods Places";
    //     }

    //     if($status == 2){

    //         $statusLabel = "Retail Store";
    //     }

    //     if($status == 3){

    //         $statusLabel = "Tourist Spot";
    //     }

    //     if($status == 4){

    //         $statusLabel = "Services";
    //     }

    //     return $statusLabel;

    // }  

    function action($status, $id)
    {

        $update = '<a class="dropdown-item" href="javascript: updateRfq()"><i class="fas fa-edit"></i> Edit</a>';
        $view = '<a class="dropdown-item" href="javascript: viewApplication(' . $id . ')"><i class="fas fa-eye"></i> View Application</a>';
        $viewPermit = '<a class="dropdown-item" href="javascript: viewPermit(' . $id . ')"><i class="fas fa-image"></i> View Logo</a>';
        $viewValidId = '<a class="dropdown-item" href="javascript: viewValidId(' . $id . ')"><i class="fas fa-file"></i> View Id</a>';
        $receive = '<a class="dropdown-item" href="javascript: receiveDirectory(' . $id . ')"><i class="fas fa-check"></i> Approved</a>';
        $cancel = '<a class="dropdown-item " href="javascript: rejectDirectory(' . $id . ')"><i class="fas fa-times"></i>Rejected</a>';
        $archieve = '<a class="dropdown-item " href="javascript: archieveDirectory(' . $id . ')"><i class="fas fa-folder"></i> Archieve</a>';
        $updateStatus = '<a class="dropdown-item " href="javascript: updateRfqStatus()"><i class="fas fa-sync-alt"></i> Update</a>';

        $action = '<div class="dropdown">
            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-cogs"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">';

        if ($status == 1) {
            $action .= $view;
            // $action .= $update;
            $action .= $viewPermit;
            $action .= $viewValidId;
            $action .=  $archieve;
        }
        if ($status == 2) {
            $action .= $view;
            $action .= $viewPermit;
            $action .= $viewValidId;
            $action .= $receive;
            $action .= $cancel;
        }
        if ($status == 3) {
            $action .= $view;
            $action .= $viewPermit;
            $action .= $viewValidId;
        }

        $action .= '</div></div>';

        return $action;
    }

    public function receiveDirectory()
    {

        $id = $this->input->post('id');

        $result = $this->Event_directory_model->receiveDirectory($id);

        if ($result) {

            echo json_encode(array("status" => "success", "message" => "Business successfully Approved"));
        } else {

            echo json_encode(array("status" => "error", "message" => "Error saving business"));
        }
    }
    public function eventModal()
    {

        $result = $this->load->view('event_directory/event_modal', '', TRUE);
        // var_dump($result);
        echo json_encode(array("data" => $result));
    }
    public function rejectDirectory()
    {

        $id = $this->input->post('id');

        $result = $this->Event_directory_model->rejectDirectory($id);

        if ($result) {

            echo json_encode(array("status" => "success", "message" => "Business successfully rejected"));
        } else {

            echo json_encode(array("status" => "error", "message" => "Error saving reject business"));
        }
    }
    public function archieveDirectory()
    {

        $id = $this->input->post('id');

        $result = $this->Event_directory_model->archieveDirectory($id);

        if ($result) {

            echo json_encode(array("status" => "success", "message" => "Business successfully archieved"));
        } else {

            echo json_encode(array("status" => "error", "message" => "Error saving archieved business"));
        }
    }

    // public function createAdminApplication()
    // {
    //     $dateNow = date('Y-m-d');

    //     $uploadFile = function ($fieldName) {
    //         if (!empty($_FILES[$fieldName]['name'])) {
    //             $config['upload_path']   = './assets/event_application_forms/';
    //             $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|jpg|png|jpeg|gif';
    //             $config['max_size']      = 40240;
    //             $config['file_name']     = $_FILES[$fieldName]['name'];

    //             $CI = &get_instance();
    //             $CI->load->library('upload', $config);

    //             if (!$CI->upload->do_upload($fieldName)) {
    //                 echo json_encode([
    //                     "result"  => "failed",
    //                     "message" => $CI->upload->display_errors()
    //                 ]);
    //                 exit;
    //             }

    //             $data_file = $CI->upload->data();
    //             return 'assets/event_application_forms/' . $data_file['file_name'];
    //         }
    //         return NULL;
    //     };
    //     $event_logo_file_path   = $uploadFile('eventLogo');
    //     $event_photo_file_path  = $uploadFile('eventPhoto');
    //     $event_photo_file_path_2 = $uploadFile('eventPhoto2');
    //     $event_photo_file_path_3 = $uploadFile('eventPhoto3');
    //     $valid_id_file_path     = $uploadFile('validId');

    //     $data = array(
    //         "user_id"             => "admin",
    //         "event_logo"          => $event_logo_file_path,
    //         "event_name"          => $this->input->post('eventName'),
    //         "date_submitted"      => $dateNow,
    //         "event_description"   => $this->input->post('eventDescription'),
    //         "event_date"   => $this->input->post('eventDate'),
    //         "event_email"         => $this->input->post('eventEmail'),
    //         "event_phone_number"  => $this->input->post('eventPhoneNumber'),
    //         "event_address"       => $this->input->post('eventAddress'),
    //         "event_date"          => $this->input->post('eventDate'),
    //         "joinable"            => $this->input->post('joinable'),
    //         "event_reason"        => $this->input->post('reasonForApplication'),
    //         "event_photo"         => $event_photo_file_path,
    //         "event_photo_2"       => $event_photo_file_path_2,
    //         "event_photo_3"       => $event_photo_file_path_3,
    //         "event_owner"         => $this->input->post('eventOwner'),
    //         "event_gender"        => $this->input->post('gender'),
    //         "event_owner_email"   => $this->input->post('eventOwnerEmail'),
    //         "owner_age"           => $this->input->post('ownerAge'),
    //         "birth_date"          => $this->input->post('birthDate'),
    //         "birth_place"         => $this->input->post('birthPlace'),
    //         "residence"           => $this->input->post('residence'),
    //         "valid_id_path"       => $valid_id_file_path,
    //         "id_number"           => $this->input->post('idNumber'),
    //     );

    //     $result = $this->Event_directory_model->createAdminApplication($data);

    //     if ($result) {
    //         echo json_encode([
    //             "status"  => "success",
    //             "message" => "Event Application successfully submitted"
    //         ]);
    //     } else {
    //         echo json_encode([
    //             "status"  => "error",
    //             "message" => "Error saving application"
    //         ]);
    //     }
    // }
    
     public function createAdminApplication()
        {
            $dateNow = date('Y-m-d');

           
            $uploadFile = function ($fieldName) {
                if (!empty($_FILES[$fieldName]['name'])) {
                    $config['upload_path']   = './assets/event_application_forms/';
                    $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|jpg|png|jpeg|gif';
                    $config['max_size']      = 40240;
                    $config['encrypt_name']  = TRUE; 

                    $CI = &get_instance();
                    $CI->load->library('upload');
                    $CI->upload->initialize($config);

                    if (!$CI->upload->do_upload($fieldName)) {
                        echo json_encode([
                            "status"  => "failed",
                            "message" => strip_tags($CI->upload->display_errors())
                        ]);
                        return NULL; 
                    }

                    $data_file = $CI->upload->data();
                    return 'assets/event_application_forms/' . $data_file['file_name'];
                }
                return NULL;
            };

         
            $event_logo_file_path    = $uploadFile('eventLogo');
            $event_photo_file_path   = $uploadFile('eventPhoto');
            $event_photo_file_path_2 = $uploadFile('eventPhoto2');
            $event_photo_file_path_3 = $uploadFile('eventPhoto3');
            $valid_id_file_path      = $uploadFile('validId');

            $data = array(
                "user_id"            => "admin",
                "event_logo"         => $event_logo_file_path,
                "event_name"         => $this->input->post('eventName'),
                "date_submitted"     => $dateNow,
                "event_description"  => $this->input->post('eventDescription'),
                "event_date"         => $this->input->post('eventDate'), 
                "event_email"        => $this->input->post('eventEmail'),
                "event_phone_number" => $this->input->post('eventPhoneNumber'),
                "event_address"      => $this->input->post('eventAddress'),
                "joinable"           => $this->input->post('joinable'),
                "event_reason"       => $this->input->post('reasonForApplication'),
                "event_photo"        => $event_photo_file_path,
                "event_photo_2"      => $event_photo_file_path_2,
                "event_photo_3"      => $event_photo_file_path_3,
                // "event_owner"        => $this->input->post('eventOwner'),
                "event_first_name"         => $this->input->post('eventFirstName'),
                "event_middle_name"         => $this->input->post('eventMiddleName'),
                "event_last_name"         => $this->input->post('eventLastName'),
                "event_gender"       => $this->input->post('gender'),
                "event_owner_email"  => $this->input->post('eventOwnerEmail'),
                "owner_age"          => $this->input->post('ownerAge'),
                "birth_date"         => $this->input->post('birthDate'),
                "birth_place"        => $this->input->post('birthPlace'),
                "residence"          => $this->input->post('residence'),
                "valid_id_path"      => $valid_id_file_path,
                "id_number"          => $this->input->post('idNumber'),
            );

            $result = $this->Event_directory_model->createAdminApplication($data);

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
        }


    public function viewApplication($id = null)
    {
        if (!$id) {
            show_error('No ID provided.');
            return;
        }

        $result = $this->Event_directory_model->viewApplication($id);

        if (!$result || empty($result)) {
            show_error('No application found.');
            return;
        }

        $data = $result[0];

        require_once(APPPATH . 'third_party/tcpdf/tcpdf.php');

        $pdf = new TCPDF();
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Company');
        $pdf->SetTitle('Event Application Form');
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
        
        <h2 style="text-align:center; color:#800040;">Event Application Form</h2><br>
        
        <table cellpadding="4" cellspacing="0" width="100%">
            <tr>
                <td colspan="2">
                    <span class="label">Date Submitted</span>
                    <div class="input">' . $data->date_submitted . '</div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <span class="label">Business Name</span>
                    <div class="input">' . $data->event_name . '</div>
                </td>
               
            </tr>
            <tr>
                <td colspan="2">
                    <span class="label">Business Description</span>
                    <div class="input">' . $data->event_description . '</div>
                </td>
            </tr>
            
            <tr>
                <td colspan="2">
                    <span class="label">Business Address</span>
                    <div class="input">' . $data->event_address . '</div>
                </td>
            </tr>
           
        </table>
        
        <h4 style="color:#800040; margin-top: 15px;">Business Owner</h4>
        <table cellpadding="4" cellspacing="0" width="100%">
            <tr>
                <td width="50%">
                    <span class="label">Owner Name</span>
                    <div class="input">' . $data->event_owner . '</div>
                </td>
                <td width="50%">
                    <span class="label">Owner Email</span>
                    <div class="input">' . $data->event_owner_email . '</div>
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
                    <span class="label">Residence</span>
                    <div class="input">' . $data->residence . '</div>
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

        $result = $this->Event_directory_model->viewPermit($id);

        echo json_encode(array("data" => $result));
    }

    public function viewValidId()
    {

        $id = $this->input->post('id');

        $result = $this->Event_directory_model->viewValidId($id);

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
