<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getTotalBusiness()
    {

        return $this->db->query("SELECT COUNT(*) AS total FROM application_forms 
        ")->row();
    }

    public function approvedTotalBusiness()
    {

        return $this->db->query("SELECT COUNT(*) AS totalApproved FROM application_forms 
        WHERE status= ?", array(1))->row();
    }

    public function pendingTotalBussiness()
    {

        return $this->db->query("SELECT COUNT(*) AS totalPending FROM application_forms 
        WHERE status= ?", array(2))->row();
    }

    public function rejectedTotalBussiness()
    {

        return $this->db->query("SELECT COUNT(*) AS totalRejected FROM application_forms 
        WHERE status= ?", array(3))->row();
    }



    public function getRetail()
    {

        return $this->db->query("SELECT COUNT(*) AS totalRetail FROM application_forms 
       WHERE bussiness_category= ?", array(2))->row();
    }

    public function getFood()
    {

        return $this->db->query("SELECT COUNT(*) AS totalFood FROM application_forms 
        WHERE bussiness_category= ?", array(1))->row();
    }

    public function getService()
    {

        return $this->db->query("SELECT COUNT(*) AS totalService FROM application_forms 
        WHERE bussiness_category= ?", array(4))->row();
    }

    public function getTourist()
    {

        return $this->db->query("SELECT COUNT(*) AS totalTourist FROM application_forms 
        WHERE bussiness_category= ?", array(3))->row();
    }

    public function getEvents()
    {

        return $this->db->query("SELECT COUNT(*) AS totalEvents FROM event_application_forms 
        WHERE status= ?", array(1))->row();
    }
}
