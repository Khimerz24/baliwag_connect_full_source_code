<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once(APPPATH . 'libraries/php_mailer/PHPMailer-master/src/Exception.php');
require_once(APPPATH . 'libraries/php_mailer/PHPMailer-master/src/PHPMailer.php');
require_once(APPPATH . 'libraries/php_mailer/PHPMailer-master/src/SMTP.php');
class Event_applicants extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Event_applicant_model');
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
        $this->load->view('event_applicants/index', $data);
    }

    public function getApplicants()
    {

        $status = $this->input->post('status');

        if ($status == "all") {

            $where = "WHERE 1 = 1";
        } else {

            $where = "WHERE status = $status";
        }

        $result = $this->Event_applicant_model->getApplicants($where);

        $data = [];

        foreach ($result as $list) {
            $status = $this->status($list->status);
            $action = $this->action($list->status, $list->id, $list->applicant_email);
            $data[] = array(
                "event_name" => $list->event_name,
                "applicant_name" => $list->applicant_name,
                "applicant_gender" => $list->applicant_gender,
                "applicant_email" => $list->applicant_email,
                "applicant_age" => $list->applicant_age,
                "applicant_address" => $list->applicant_address,
                "applicant_birth_date" => $list->applicant_birth_date,
                "applicant_birth_place" => $list->applicant_birth_place,
                "reason_of_application" => $list->reason_of_application,
                "id_number" => $list->id_number,
                "participant_code" => $list->participant_code,
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

    function action($status, $id, $email)
    {

        $viewValidId = '<a class="dropdown-item" href="javascript: viewValidId(' . $id . ')"><i class="fas fa-file"></i> View Id</a>';
        $receive = '<a class="dropdown-item" href="javascript: approvedApplicant(' . $id . ', \'' . $email . '\')"><i class="fas fa-check"></i> Approved</a>';
        $cancel = '<a class="dropdown-item " href="javascript: rejectApplicant(' . $id . ')"><i class="fas fa-times"></i> Rejected</a>';
        $updateStatus = '<a class="dropdown-item " href="javascript: updateRfqStatus()"><i class="fas fa-sync-alt"></i> Update</a>';

        $action = '<div class="dropdown">
            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-cogs"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">';

        if ($status == 1) {

            $action .= $viewValidId;
        }
        if ($status == 2) {

            $action .= $viewValidId;
            $action .= $receive;
            $action .= $cancel;
        }
        if ($status == 3) {

            $action .= $viewValidId;
        }

        $action .= '</div></div>';

        return $action;
    }

    public function approvedApplicant()
    {

        $id = $this->input->post('id');
        $email = $this->input->post('email');
        $code = rand(100000, 999999);

        $result = $this->Event_applicant_model->approvedApplicant($id, $email, $code);

        if ($result) {

            try {
                $mail = new PHPMailer(true);

                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'riggsico59@gmail.com';
                $mail->Password   = 'cxoy pkel zefe pjxd';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;

                $mail->setFrom('riggsico59@gmail.com', 'Baliwag Connect Participant Code');
                $mail->addAddress($email, "Baliwag Connect Participant");

                $mail->isHTML(true);
                $mail->Subject = 'Your Verification Code';

                $mail->addEmbeddedImage(FCPATH . 'assets/img/main-logo.png', 'logoimg', 'logo.png');

                $mail->Body = "
                <p>Hi <strong>From Baliwag Connect Participant</strong>,<br>
                Your Participant code is: <b>{$code}</b><br>
                Please keep this code safe and do not share it with anyone.<br>
                Thank you</p>
                
                <div style='text-align: center; font-size: 12px; color:rgb(255, 255, 255);background-color: #05158F; padding: 8px;'>
                    <img src='cid:logoimg' alt='Baliwag Connect Logo' style='width:100px; margin-bottom: 8px;'><br>
                    Contact us at: <a href='mailto:baliwagtourism@gmail.com' style='Text-decoration: none;color: rgb(255, 255, 255);'>baliwagtourism@gmail.com</a> | 
                    Phone: <a href='tel:+639057415884' style='Text-decoration: none;color: rgb(255, 255, 255);'>+63 905 741 5884</a>
                </div>
                ";

                // $mail->AltBody = "Hi {$firstName}, your verification code is: {$validation}";

                $mail->send();
            } catch (Exception $e) {
                log_message('error', "Mail Error: {$mail->ErrorInfo}");
            }

            echo json_encode(array("status" => "success", "message" => "Applicant successfully approved"));
        }
    }

    public function rejectApplicant()
    {

        $id = $this->input->post('id');

        $result = $this->Event_applicant_model->rejectApplicant($id);

        if ($result) {

            echo json_encode(array("status" => "success", "message" => "Business successfully rejected"));
        } else {

            echo json_encode(array("status" => "error", "message" => "Error saving reject business"));
        }
    }

    public function viewValidId()
    {

        $id = $this->input->post('id');

        $result = $this->Event_applicant_model->viewValidId($id);

        echo json_encode(array("data" => $result));
    }
}
