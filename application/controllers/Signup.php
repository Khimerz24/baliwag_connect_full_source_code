<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// require_once(APPPATH . '../php_mailer/PHPMailer-master/src/Exception.php');
// require_once(APPPATH . '../php_mailer/PHPMailer-master/src/PHPMailer.php');
// require_once(APPPATH . '../php_mailer/PHPMailer-master/src/SMTP.php');


require_once(APPPATH . 'libraries/php_mailer/PHPMailer-master/src/Exception.php');
require_once(APPPATH . 'libraries/php_mailer/PHPMailer-master/src/PHPMailer.php');
require_once(APPPATH . 'libraries/php_mailer/PHPMailer-master/src/SMTP.php');

class Signup extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Signup_model');
    }

    public function index()
    {
        $this->load->view('signup/index');
    }

    public function signupUser()
    {
    
        $firstName = $this->input->post("firstName");
        $lastName = $this->input->post("lastName");
        $userName = $this->input->post("userName");
        
        $email = $this->input->post("email");
        $rawPassword = $this->input->post("password");
        $hashedPassword = password_hash($rawPassword, PASSWORD_DEFAULT);

        $validation = rand(100000, 999999); 

        $data = array(
            "firstName" => $firstName,
            "lastName" => $lastName,
            "userName" => $userName,
            "email" => $email,
            "password" => $hashedPassword,
            "validation_code" => $validation,
            "status" => 0
        );

        $result = $this->Signup_model->saveSignUp($data);

        if($result){

            try {
                $mail = new PHPMailer(true);
    
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                  $mail->Username   = 'technocraftersolutions@gmail.com';
                $mail->Password   = 'bcqr rklz oacw nbqv'; 
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;
    
                $mail->setFrom('technocraftersolutions@gmail.com', 'Baliwag Connect Verification Code');
                $mail->addAddress($email, "{$firstName} {$lastName}");
                $mail->addEmbeddedImage(FCPATH.'assets/img/main-logo.png', 'logoimg', 'logo.png');
    
                $mail->isHTML(true);
                $mail->Subject = 'Your Verification Code';
                $mail->Body    = "<p>Hi <strong>{$firstName}</strong>,<br>Your verification code is: <b>{$validation}</b></p>  <div style='text-align: center; font-size: 12px; color:rgb(255, 255, 255);background-color: #05158F; padding: 8px;'>
                    <img src='cid:logoimg' alt='Baliwag Connect Logo' style='width:100px; margin-bottom: 8px;'><br>
                    Contact us at: <a href='mailto:baliwagtourism@gmail.com' style='Text-decoration: none;color: rgb(255, 255, 255);'>baliwagtourism@gmail.com</a> | 
                    Phone: <a href='tel:+639057415884' style='Text-decoration: none;color: rgb(255, 255, 255);'>+63 905 741 5884</a>
                </div>";
                $mail->AltBody = "Hi {$firstName}, your verification code is: {$validation}
                ";
    
                $mail->send();
    
     
    
            } catch (Exception $e) {
                log_message('error', "Mail Error: {$mail->ErrorInfo}");
              
            }
            
            echo json_encode(array("status" => "success"));
        }
        
      
    }

    public function verification()
    {

        $this->load->view('signup/verification');

    }

    public function verify(){

        $verificationCode = $this->input->post("verificationCode");
     
        $result = $this->Signup_model->verify($verificationCode);

        if($result){

            echo json_encode(array("status" => "success" , "message" => "Successfully verified"));

        }else{

            echo json_encode(array("status" => "error" , "message" => "Invalid Code"));

        }
       
    }
}
