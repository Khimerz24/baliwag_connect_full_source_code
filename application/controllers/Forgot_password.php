<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// require_once(APPPATH . '../php_mailer/PHPMailer-master/src/Exception.php');
// require_once(APPPATH . '../php_mailer/PHPMailer-master/src/PHPMailer.php');
// require_once(APPPATH . '../php_mailer/PHPMailer-master/src/SMTP.php');


require_once(APPPATH . 'libraries/php_mailer/PHPMailer-master/src/Exception.php');
require_once(APPPATH . 'libraries/php_mailer/PHPMailer-master/src/PHPMailer.php');
require_once(APPPATH . 'libraries/php_mailer/PHPMailer-master/src/SMTP.php');


class Forgot_password extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Forgot_password_model');
        $this->load->library('session');
    }
    public function index()
    {
        $this->load->view('forgot_password/index');
    }
    public function loadVerify()
    {
        $this->load->view('forgot_password/verify');
    }
    public function loadForgotPass()
    {
        $code = $this->input->get('code');
        $data['code'] = $code;
        $this->load->view('forgot_password/new_password', $data);
    }

    public function verify()
    {
        $newCode = rand(100000, 999999);
        $email = $this->input->post('verifyEmail');
        $emailResultAndCode = $this->Forgot_password_model->verifyEmail($email, $newCode);

        if ($emailResultAndCode) {
            $code = $emailResultAndCode[0];
            $email = $emailResultAndCode[1];

            try {
                $mail = new PHPMailer(true);

                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'technocraftersolutions@gmail.com';
                $mail->Password   = 'bcqr rklz oacw nbqv'; 
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;

                $mail->setFrom('technocraftersolutions@gmail.com', 'Baliwag Connect Verification Code forget');
                $mail->addAddress($email,);
                $mail->addEmbeddedImage(FCPATH . 'assets/img/main-logo.png', 'logoimg', 'logo.png');

                $mail->isHTML(true);
                $mail->Subject = 'Your Verification Code';
                $mail->Body    = "<p>Hi<br>Your verification code is: <b>{$code}</b></p>  <div style='text-align: center; font-size: 12px; color:rgb(255, 255, 255);background-color: #05158F; padding: 8px;'>
                    <img src='cid:logoimg' alt='Baliwag Connect Logo' style='width:100px; margin-bottom: 8px;'><br>
                    Contact us at: <a href='mailto:baliwagtourism@gmail.com' style='Text-decoration: none;color: rgb(255, 255, 255);'>baliwagtourism@gmail.com</a> | 
                    Phone: <a href='tel:+639057415884' style='Text-decoration: none;color: rgb(255, 255, 255);'>+63 905 741 5884</a>
                </div>";
                $mail->AltBody = "Hi your verification code is: {$code}
                ";

                $mail->send();
                echo json_encode(array("status" => "success"));
            } catch (Exception $e) {
                log_message('error', "Mail Error: {$mail->ErrorInfo}");
            }
        } else {
            echo json_encode(array("status" => "error", "message" => "Invalid Email"));
        }
    }
    public function verifyCode()
    {
        $code = $this->input->post('verifyCode');

        $result = $this->Forgot_password_model->verifyCode($code);

        if ($result) {
            // $this->session->set_userdata([
            //     'user_id'   => $result->id,
            //     'username'  => $result->user_name,
            //     'logged_in' => true
            // ]);
            echo json_encode(array("status" => "success", "message" => "Successfully verified", "code" =>  $result->validation_code));
        } else {
            echo json_encode(array("status" => "error", "message" => "Invalid Code"));
        }
    }
    public function  newPassword()
    {
        $newPassword = $this->input->post('newPassword');
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $code = $this->input->post('code');
        $result = $this->Forgot_password_model->newPassword($hashedPassword, $code);
        // var_dump($result);
        if ($result) {
            $this->session->set_userdata([
                'user_id'   => $result->id,
                'username'  => $result->user_name,
                'logged_in' => true
            ]);
            echo json_encode(array("status" => "success", "message" => "Successfully changed password"));
        } else {
            echo json_encode(array("status" => "error", "message" => "Error changing password"));
        }
    }
}
