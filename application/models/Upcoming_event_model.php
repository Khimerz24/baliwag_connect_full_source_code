<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upcoming_event_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function getUpcomingEvent($where)
  {

    return $this->db->query("SELECT * FROM upcoming_event  $where")->result();
  }

  public function saveEvent($data)
  {

    return $this->db->query("INSERT INTO upcoming_event (event_image,event_name, location, date, organizer) 
      VALUES (?,?,?,?,?)", array($data['eventImage'], $data['eventName'], $data['eventLocation'], $data['eventDate'], $data['eventOrganizer']));

    //     return $this->db->insert('user', array(
    //       'first_name'  => $data['firstName'],
    //       'last_name'   => $data['lastName'],
    //       'email'       => $data['email'],
    //       'password'    => $data['password'],
    //       'user_group'  => $data['userGroup']
    // ));

  }

  public function archieveEvent($id)
  {

    return $this->db->query("UPDATE upcoming_event 
        SET status = 2 WHERE id = ?", array($id));
  }

  public function cancelEvent($id)
  {

    return $this->db->query("UPDATE upcoming_event 
        SET status = 3 WHERE id = ?", array($id));
  }

  public function republished($id)
  {

    return $this->db->query("UPDATE upcoming_event 
      SET status = 1 WHERE id = ?", array($id));
  }

  public function updateLogo($data)
  {
    $this->db->where('id', $data['id']);
    $this->db->update('upcoming_event', $data);
    return $this->db->affected_rows();
  }
}
