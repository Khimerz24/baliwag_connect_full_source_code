<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event_applicant_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getApplicants($where)
    {

        return $this->db->query("SELECT applicant_forms.*, event_application_forms.event_name AS event_name FROM applicant_forms LEFT JOIN event_application_forms ON event_application_forms.id = applicant_forms.event_id $where")->result();
        //   return $this->db->query("SELECT * FROM business_directory $where")->result();

    }

    public function approvedApplicant($id, $email, $code)
    {

        return $this->db->query("UPDATE applicant_forms SET participant_code = ?,status = ? WHERE id = ?", array($code, 1, $id));
    }

    public function rejectApplicant($id)
    {

        return $this->db->query("UPDATE applicant_forms SET status = ? WHERE id = ?", array(3, $id));
    }

    public function viewApplication($id)
    {

        return $this->db->query("SELECT * FROM applicant_forms WHERE id = ?", array($id))->result();
    }

    public function viewPermit($id)
    {

        return $this->db->query("SELECT event_logo_path FROM  applicant_forms WHERE id = ?", array($id))->row();
    }

    public function viewValidId($id)
    {

        return $this->db->query("SELECT valid_id_path FROM applicant_forms WHERE id = ?", array($id))->row();
    }
}
