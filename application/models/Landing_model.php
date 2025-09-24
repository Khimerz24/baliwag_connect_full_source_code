<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function sendFeedback($data)
    {

         return $this->db->query("INSERT INTO feedback (subject,first_name, middle_name, last_name, email, message)
         VALUES (?, ?, ?, ?, ?, ?)", array($data['subject'], $data['first_name'], $data['middle_name'], $data['last_name'], $data['email'], $data['message']));
    }

    public function getAllEvent()
    {

        return $this->db->query("SELECT 
        DATE_FORMAT(CONCAT(`event_date`, '-01'), '%M %Y') AS month_year,
        id,
        event_logo,
        event_name,
        event_address,
        `event_date`,
        status
        FROM event_application_forms
        WHERE status = ?
        ORDER BY `event_date` ASC", array(1))->result();
    }

    public function getAllEventCarousel()
    {

        return $this->db->query("SELECT * FROM announcement WHERE status = ?", array(1))->result();
    }

    public function getCommonBussiness($category, $idFromIndex)
    {

        if (!empty($idFromIndex)) {
            return $this->db
                ->query(
                    "SELECT * FROM application_forms WHERE bussiness_category = ? AND status = ?",
                    array($idFromIndex, 1)
                )
                ->result();
        }

        if ($category != 5) {
            return $this->db
                ->query(
                    "SELECT * FROM application_forms WHERE bussiness_category = ? AND status = ?",
                    array($category, 1)
                )
                ->result();
        } else {
            return $this->db
                ->query(
                    "SELECT * FROM application_forms WHERE status = ?",
                    array(1)
                )
                ->result();
        }
    }

    public function getAnnouncement()
    {

        return $this->db->query("SELECT * FROM announcement WHERE status = ?", array(1))->result();
    }

    public function getEvents($options)
    {

        if ($options  == 2) {
            return $this->db->query("SELECT * FROM event_application_forms WHERE status = ?", array(1))->result();
        } else {
            return $this->db->query("SELECT * FROM event_application_forms WHERE joinable = ? AND status = ?", array($options, 1))->result();
        }
    }

    public function createApplication($data)
    {

        return $this->db->insert('application_forms', $data);
    }

    public function createEventApplication($data)
    {

        return $this->db->insert('event_application_forms', $data);
    }

    public function createApplicant($data)
    {

        return $this->db->insert('applicant_forms', $data);
    }

    public function viewBusinessInformation($id)
    {

        return $this->db->query("SELECT * FROM application_forms WHERE id = ?", array($id))->result();
    }

    public  function insertContact($data)
    {

        return $this->db->insert('contact_us', $data);
    }

    public function viewEventDetails($id)
    {
        return $this->db->query("SELECT * FROM event_application_forms WHERE id = ?", array($id))->result();
    }
    public function allFaqs()
    {
        return $this->db->query("SELECT * FROM faqs WHERE status = ?", array(1))->result();
    }
}
