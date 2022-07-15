<?php
class Manage_User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library(array("pagination", "session"));

        $this->load->model('Student/Student_Model');
    }

    public function index()
    {
        $this->displayStudentRecords();
    }

    public function displayStudentRecords()
    {
        $result['data'] = $this->Student_Model->getUsers();
        $this->load->view('Admin/manage_user', $result);
    }

    public function filterStudentRecords()
    {
        $Student_Name = $this->input->post('Student_Name');
        $result['data'] = $this->Student_Model->filter_data($Student_Name);
        $this->load->view('Admin/manage_user', $result);
    }


    function edit_studentData()
    {
        // display students
        $user_id = $this->input->get('id');
        $result['data'] = $this->Student_Model->display_studentData($user_id);
        $this->load->view('update_form', $result);

        // update students

        if ($this->input->post('update')) {

            $Student_Name = $this->input->post('Student_Name');
            $Passwords = $this->input->post('Passwords');
            $Phone_Number = $this->input->post('Phone_Number');
            $Depart_Name = $this->input->post('Depart_Name');

            $data = array(
                'Student_Name' => $Student_Name,
                'Passwords' =>    $Passwords,
                'Phone_Number' => $Phone_Number,
                'Depart_Name' => $Depart_Name,
            );
            $this->Student_Model->Update_studentData($data, $user_id);
            redirect('Admin/Manage_User');
        }
    }

    function deleteStudent()
    {
        $user_id = $this->input->get('id');
        $response = $this->Student_Model->delele_studentData($user_id);

        if ($response == true) {
            redirect('Admin/Manage_User');
        } else {
            echo "Error !";
        }
    }

    function viewStudent()
    {

        $id = $this->input->post('id');
        $get_student = $this->Student_Model->view($id);
        echo json_encode($get_student);
        // $this->load->view('Admin/Manage_User', $result1);
    }

    // function showPagination()
    // {
    //     $Student_Name = $this->input->post('Student_Name');
    //     if (!empty($Student_Name)) {
    //         $result['data'] = $this->Student_Model->filter_data($Student_Name);
    //         $this->load->view('Admin/students/index', $result);
    //     } else {
    //         $config = array();
    //         $config["base_url"] = base_url() . "Admin/Manage_User/showPagination".$Student_Name;
    //         $config["total_rows"] = $this->Student_Model->get_count();
    //         $config["per_page"] = 2;
    //         $config["uri_segment"] = 4;
    //         $config['full_tag_open']     =     "<ul class='pagination pagination-split'>";
    //         $config['full_tag_close']     =    "</ul>";
    //         $config['num_tag_open']     =     '<li>';
    //         $config['num_tag_close']     =     '</li>';
    //         $config['cur_tag_open']     =     "<li class='disabled'><li class='active'><a href='#'>";
    //         $config['cur_tag_close']     =     "<span class='sr-only'></span></a></li>";
    //         $config['next_tag_open']     =     "<li>";
    //         $config['next_tag_close']     =     "</li>";
    //         $config['prev_tag_open']     =     "<li>";
    //         $config['prev_tag_close']     =     "</li>";
    //         $config['first_tag_open']     =     "<li>";
    //         $config['first_tag_close'] =     "</li>";
    //         $config['last_tag_open']     =     "<li>";
    //         $config['last_tag_close']     =     "</li>";

    //         $config['prev_link'] = '<i class="fa fa-long-arrow-left"></i>Previous Page';
    //         $config['prev_tag_open'] = '<li>';
    //         $config['prev_tag_close'] = '</li>';

    //         $config['next_link'] = 'Next Page<i class="fa fa-long-arrow-right"></i>';
    //         $config['next_tag_open'] = '<li>';
    //         $config['next_tag_close'] = '</li>';

    //         $this->pagination->initialize($config);
    //         $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    //         $data["links"] = $this->pagination->create_links();
    //         $data['students'] = $Student_Name;
    //         $data['data'] = $this->Student_Model->get_students($config["per_page"], $page, $Student_Name);
    //         $this->load->view('Admin/students/index', $data);
    //     }
    // }

    function showPagination()
    {
        $search = $this->input->post('Student_Name');

        $config = array();
        $config["base_url"] = base_url() . "Admin/Manage_User/showPagination/";
        $config["total_rows"] = $this->Student_Model->get_count();
        $config["per_page"] = 2;
        $config["uri_segment"] = 4;

        // *****************************************************************************
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">'; //this is active tab
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        // *****************************************************************************

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : $search;
        $data["links"] = $this->pagination->create_links();
        $data['students'] = $search;
        $data['data'] = $this->Student_Model->get_students($config["per_page"], $page, $search);
        $this->load->view('Admin/students/index', $data);
    }
    public function export_csv()
    {
        $result['data'] = $this->Student_Model->getUserDetails();
        $this->load->view('Admin/Manage_User', $result);
        /* file name */
        $filename = 'users_' . date('Ymd') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");
        /* get data */
        $usersData = $this->Student_Model->getUserDetails();

        /* file creation */
        $file = fopen('php://output', 'w');
        $header = array("Student_Name", "Phone_Number");
        fputcsv($file, $header);
        foreach ($usersData as $key => $line) {
            fputcsv($file, $line);
        }
        fclose($file);
        exit;
    }

    public function viewajax()
	{
       
	   $result['data']=$this->Student_Model->view();
       $this->load->view('admin/ajaxfile',$result);
    //    var_dump($result);
	}
}
