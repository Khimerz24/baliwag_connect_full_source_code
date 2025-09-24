<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Business_directory_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getBusinessDirectory($where)
    {

        return $this->db->query("SELECT * FROM application_forms $where")->result();
        //   return $this->db->query("SELECT * FROM business_directory $where")->result();

    }

    public function getDataToUpdate($id)
    {

        return $this->db->query("SELECT * FROM application_forms WHERE id = ?", array($id))->result();
    }

    public function receiveDirectory($id)
    {

        return $this->db->query("UPDATE application_forms SET status = ? WHERE id = ?", array(1, $id));
    }

    public function updateDetails($id, $data)

    {
        return $this->db->query("UPDATE application_forms 
        SET  bussiness_category = ?, bussiness_name = ?, bussiness_description = ?, bussiness_email = ?, bussiness_phone_number = ?, bussiness_address = ? 
        WHERE id = ?", array($data['bussiness_category'], $data['bussiness_name'], $data['bussiness_description'], $data['bussiness_email'], $data['bussiness_phone_number'], $data['bussiness_address'], $id));
    }


    public function rejectDirectory($id)
    {

        return $this->db->query("UPDATE application_forms SET status = ? WHERE id = ?", array(3, $id));
    }

    public function viewApplication($id)
    {

        return $this->db->query("SELECT * FROM application_forms WHERE id = ?", array($id))->result();
    }

    public function getImage($id)
    {

        return $this->db->query("SELECT id, bussiness_logo_path FROM application_forms WHERE id = ?", array($id))->result();
    }

    public function updateLogo($data)
    {

        return $this->db->query("UPDATE application_forms SET bussiness_logo_path = ? WHERE id = ?", array($data['bussiness_logo_path'], $data['id']));
    }

    public function viewPermit($id)
    {

        return $this->db->query("SELECT bussiness_permit_path FROM application_forms WHERE id = ?", array($id))->row();
    }

    public function viewValidId($id)
    {

        return $this->db->query("SELECT valid_id_path FROM application_forms WHERE id = ?", array($id))->row();
    }

    public function saveBusiness($data)
    {

        return $this->db->insert('application_forms', $data);
    }

    public function remove($id)
    {

        return $this->db->query("UPDATE application_forms SET status = ? WHERE id = ?", array(0, $id));
    }
}
