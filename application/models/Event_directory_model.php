<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event_directory_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getBusinessDirectory($where)
    {

      return $this->db->query("SELECT event_application_forms.*, CONCAT(event_first_name,' ', event_middle_name,' ', event_last_name) AS event_owner FROM event_application_forms $where")->result();
        //   return $this->db->query("SELECT * FROM business_directory $where")->result();

    }

    public function receiveDirectory($id)
    {

        return $this->db->query("UPDATE event_application_forms SET status = ? WHERE id = ?", array(1, $id));
    }

    public function rejectDirectory($id)
    {

        return $this->db->query("UPDATE event_application_forms SET status = ? WHERE id = ?", array(3, $id));
    }

    public function archieveDirectory($id)
    {

        return $this->db->query("UPDATE event_application_forms SET status = ? WHERE id = ?", array(4, $id));
    }

    public function viewApplication($id)
    {

        return $this->db->query("SELECT * FROM event_application_forms WHERE id = ?", array($id))->result();
    }

    public function viewPermit($id)
    {

        return $this->db->query("SELECT event_logo FROM  event_application_forms WHERE id = ?", array($id))->row();
    }

    public function viewValidId($id)
    {

        return $this->db->query("SELECT valid_id_path FROM event_application_forms WHERE id = ?", array($id))->row();
    }

    public function createAdminApplication($data)
    {

        return $this->db->insert('event_application_forms', $data);
    }
}
