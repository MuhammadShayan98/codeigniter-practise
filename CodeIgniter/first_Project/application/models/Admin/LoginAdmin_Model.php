<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class LoginAdmin_Model extends CI_Model
{

    function loginAdmin($Admin_Name, $passwords)
    {

        $this->db->select('*');
        $this->db->from("tbl_admin");
        $this->db->where('Admin_Name', $Admin_Name);
        $this->db->where('passwords', $passwords);
        return $query = $this->db->get()->row();
      
    }
}
