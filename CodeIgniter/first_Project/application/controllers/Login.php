<?php
class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('Login_Model');
        $this->load->library('form_validation', 'session');
    }
    public function  index()
    {
        $this->login();
    }


    public function login()
    {

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login_page/login');
        } else {
            $username = $this->input->post('username');
            $password  = $this->input->post('password');

            $response = $this->Login_Model->loginUser($username, $password);

            if (!empty($response)) {

                $sess_array = array(
                    'Student_Name' => $username,
                    'username' => $password,
                );
                $this->session->set_userdata('username', $sess_array['Student_Name']);
                if ($response->Role_id == '1') {
                    $this->load->view('Student/dashboard.php');
                } elseif ($response->Role_id == '2') {
                    $this->load->view('Admin/dashboard.php');
                } else {
                    echo 'Wrong User';
                }
                // $this->load->view('Student/dashboard.php');
                // redirect('Student/dashboard');
            } else {
                echo 'Not Valid';
            }
        }
    }
    public function logout()
    {
        $sess_array = array(
            'Student_Name' => '',
            'username' => '',
        );
        $this->session->unset_userdata($sess_array);
        $this->session->sess_destroy();
        redirect('/');
    }
}
