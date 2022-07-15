<?php


class Student_Model extends CI_Model
{

  function getUsers()
  {

    $query = $this->db->get(_TABLE_STUDENT_);
    return $query->result();
  }

  function filter_data($Student_Name)
  {
    $query = $this->db->query('SELECT * FROM tbl_student WHERE Student_Name = "' . $Student_Name . '" ');
    return $query->result();
    // return $sql= $query->result_array();

  }

  function delele_studentData($user_id)
  {
    $this->db->where('id', $user_id);
    $this->db->delete(_TABLE_STUDENT_);
    return true;
  }

  function display_studentData($user_id)
  {
    $this->db->where('id', $user_id);
    $query = $this->db->get(_TABLE_STUDENT_);
    return $query->result();
  }

  function Update_studentData($data, $user_id)
  {
    $this->db->where('id', $user_id);
    $this->db->update(_TABLE_STUDENT_, $data);
  }

  public function view()
  {
    $id = $this->input->post('id');
    $this->db->where('id',$id);
    $query=$this->db->get(_TABLE_STUDENT_);
    return $query->result();
  }

  public function fetch_by_id(){
    $id = $this->input->get('id');
    $this->db->where('id', $id);
    $query = $this->db->get('quotes');
    return $query->result();
} 



  public function get_count()
  {
    return $this->db->count_all(_TABLE_STUDENT_);
  }


  public function get_students($limit, $start, $search)
  {
    if ($search == '') {
      $this->db->limit($limit, $start);
      $query = $this->db->get(_TABLE_STUDENT_);
      return $query->result();
    } else {

      $this->db->where('Student_Name', $search);
      $query =  $this->db->get(_TABLE_STUDENT_);
      return $query->result();
    }
  }

  function getUserDetails()
  {
    $response = array();
    $this->db->select('Student_Name,Phone_Number');
    $q = $this->db->get(_TABLE_STUDENT_);
    $response = $q->result_array();
    return $response;
  }

  
}
