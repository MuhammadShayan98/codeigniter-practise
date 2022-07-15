<?php
// defined('BASEPATH') or exit('No direct script access allowed');

class Login_Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('Admin/LoginAdmin_Model');
        $this->load->library('form_validation', 'session');
    }

    public function index()
    {
        $this->login_Admin();
    }


    function login_Admin()
    {
        $this->session->set_flashdata('msg', '<h4 class="alert alert-success text-center">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
        Login Successfully!</h4>');

        $this->form_validation->set_rules('Admin_Name', 'Username', 'required');
        $this->form_validation->set_rules('passwords', 'Password', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Admin/admin_login');
        } else {
            $Admin_Name = $this->input->post('Admin_Name');
            $passwords  = $this->input->post('passwords');

            $response = $this->LoginAdmin_Model->loginAdmin($Admin_Name, $passwords);

            // var_dump($response);
            // die();

            if (!empty($response)) {
                $sess_array = array(
                    'Admin_Name' => $Admin_Name,
                    'passwords' => $passwords,
                );
                $this->session->set_userdata('name', $sess_array['Admin_Name']);

                // redirect('index.php/Admin/Manage_User');
                $this->load->view('Admin/dashboard', 'refresh');
            } else {
                $this->session->set_flashdata('alert', '<h4 class="alert alert-danger text-center">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button> Invalid User!</h4>');

                redirect('Admin/Login_Admin');
               
            }
        }
    }
    public function logout()
    {
        $sess_logout = array(
            'Admin_Name' => '',
            'passwords' => '',
        );
        $this->session->unset_userdata($sess_logout);
        // $this->session->s();
        redirect('Admin/Login_Admin');
    }
}
