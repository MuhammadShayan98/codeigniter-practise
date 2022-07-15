<?php

class Registration_Model extends CI_Model
{

    function insertData($data)
    {
        $this->db->insert(_TABLE_STUDENT_, $data);
        return true;
    }

    function getCountry()
    {
        $this->db->select('*');
        $this->db->from('tbl_country');
        return $this->db->get()->result();
    }

    function insert_UserImage($data)
    {
        if (!empty($data)) {
            $this->db->insert('tbl_user_image', $data);
            $last_id = $this->db->insert_id();
            return $last_id; 

        }
    }
}
