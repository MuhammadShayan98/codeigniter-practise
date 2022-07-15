<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('Student_Model');
    }

    public function index()
    {
        $this->displayStudentRecords();
    }

    public function displayStudentRecords()
    {
        $result['data'] = $this->Student_Model->getUsers();
        $this->load->view('student_records', $result);
    }
    public function filterStudentRecords()

    {
        $Student_Name = $this->input->post('Student_Name');
        $result['data'] = $this->Student_Model->filter_data($Student_Name);
        $this->load->view('student_records', $result);
    }


    function edit_studentData(){
        // display students
        $user_id = $this->input->get('id');
        $result['data'] = $this->Student_Model->display_studentData($user_id);
        $this->load->view('update_form',$result);

        // update students

        if($this->input->post('update')){

        $Student_Name = $this->input->post('Student_Name');
        $Passwords = $this->input->post('Passwords');
        $Phone_Number = $this->input->post('Phone_Number');
        $Depart_Name = $this->input->post('Depart_Name');

        $data = array(
            'Student_Name' => $Student_Name,
            'Passwords' =>	$Passwords,
            'Phone_Number' =>$Phone_Number,
            'Depart_Name' => $Depart_Name,
        );
        $this->Student_Model->Update_studentData($data, $user_id);
        redirect(base_url('/'));
        }
			
    }

    function deleteStudent()
    {
        $user_id = $this->input->get('id');
        $response = $this->Student_Model->delele_studentData($user_id);
        if ($response == true) {
            redirect(base_url());
        } else {
            echo "Error !";
        }
    }
}
