<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Announcement_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getAnnouncement()
    {

        return $this->db->query("SELECT * FROM announcement")->result();
    }

    public function saveAnnouncement($title, $description, $file_path)
    {

        return $this->db->query("INSERT INTO announcement (image, title, description) 
        VALUES (?,?,?)", array($file_path, $title, $description));
    }

    public function expired($id)
    {

        return $this->db->query("UPDATE announcement 
        SET status = 2 WHERE id = ?", array($id));
    }

    public function repost($id)
    {

        return $this->db->query("UPDATE announcement 
        SET status = 1 WHERE id = ?", array($id));
    }

    public function getAnnouncementDataForModal($id)
    {

        return $this->db->query("SELECT * FROM announcement WHERE id = ?", array($id))->row();
    }
    public function updateAnnouncement($id, $title, $description, $file_path)
    {

        return $this->db->query("UPDATE announcement 
        SET image = ?, title = ?, description = ? WHERE id = ?", array($file_path, $title, $description, $id));
    }
}
