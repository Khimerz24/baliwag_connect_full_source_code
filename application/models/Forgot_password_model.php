<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forgot_password_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function verifyEmail($email, $newCode)
    {
        $result = $this->db->query("SELECT email FROM user WHERE email = ? ", [$email])->row();
        if ($result) {
            $this->db->query("UPDATE user SET validation_code = ? WHERE email = ?", [$newCode, $email]);
            return [$newCode, $result->email];
        }
        return false;
    }

    public function verifyCode($code)
    {
        return $this->db->query("SELECT * FROM user WHERE validation_code = ?", array($code))->row();
    }

    public function newPassword($hashedPassword, $code)
    {
        $this->db->query("UPDATE user SET password = ? WHERE validation_code = ?", array($hashedPassword, $code));
        return $this->db->query("SELECT * FROM user WHERE validation_code = ?", array($code))->row();
    }
}
