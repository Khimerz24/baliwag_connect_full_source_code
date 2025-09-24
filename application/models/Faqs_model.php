<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Faqs_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getFaqs()
    {
        return $this->db->query("SELECT * FROM faqs")->result();
    }

    public function removeFaqs($id)
    {
        return $this->db->query("UPDATE faqs SET status = ? WHERE id = ?", array(0, $id));
    }

    public function getFaqsToUpdate($id)
    {
        return $this->db->query("SELECT * FROM faqs WHERE id = ?", array($id))->row();
    }

    public function newFaqs($data)
    {
        return $this->db->query("INSERT INTO faqs (title, description) VALUES (?, ?)", array($data['title'], $data['description']));
    }
    public function saveFaqs($data)
    {
        return $this->db->query("UPDATE faqs SET title = ?, description = ? WHERE id = ?", array($data['title'], $data['description'], $data['id']));
    }
}
