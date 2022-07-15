<?php
// if (!defined('BASEPATH'))
//     exit('No direct script access allowed');

class Login_Model extends CI_Model
{

    function loginUser($username, $password)
    {

        $this->db->select('*');
        $this->db->from(_TABLE_STUDENT_);
        // $this->db->from('tbl_student');
        $this->db->where('Student_Email', $username);
        $this->db->where('Passwords', $password);
        return $query = $this->db->get()->row();
    }
}
