<?php

class Registration extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('Registration_Model');
		$this->load->library(array('form_validation', 'session', 'upload'));
	}

	public function index()
	{
		$this->showCountry();
	}


	public function showCountry()
	{
		$this->studentData();
		$result['data'] = $this->Registration_Model->getCountry();
		$this->load->view('registration_form', $result);
	}

	public function studentData()
	{
		$this->form_validation->set_rules('Student_Name', 'Student_Name', 'required', 'alpha');
		$this->form_validation->set_rules('Passwords', 'Passwords', 'required', 'alpha_numeric');
		$this->form_validation->set_rules('Phone_Number', 'Phone_Number', 'required', 'numeric');
		$this->form_validation->set_rules('Depart_Name', 'Depart_Name', 'required');

		if ($this->form_validation->run() == FALSE) {
			// $this->load->view(('registration_form'));
		}
		// echo "error";
		else {

			if ($this->input->post('submit')) {

				// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

				$date = date('Y-m-d');

				$config['upload_path']  = './uploads/'. $date;
				$dir = $config['upload_path'];

				$date = str_replace(':', '', $date);
				if (!is_dir('./uploads/' . $date)) {
					mkdir('./uploads/' . $date, 0777, true);
				}

				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 1000;
				$config['max_width']            = 10024;
				$config['max_height']           = 7668;
				$image_name = $_FILES['userfile']['name'];
				$image_size  = $_FILES['userfile']['size'];
				$uploadData['uploaded_on'] = date("Y-m-d H:i:s");


				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if (!$this->upload->do_upload('userfile')) {
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('registration_form', $error);
				} else {
					$data = array('upload_data' => $this->upload->data());
					$data = array(
						'file_name' => $image_name . $date,
						'size' => $image_size,
						'uploaded_on' => implode($uploadData),
					);

					$userImageId = $this->Registration_Model->insert_UserImage($data);
					$this->load->view('registration_form', $data);
				}
				// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

				$Student_Name = $this->input->post('Student_Name');
				$Passwords = $this->input->post('Passwords');
				$Phone_Number = $this->input->post('Phone_Number');
				$Depart_Name = $this->input->post('Depart_Name');
				$Country = $this->input->post('Country');

				$data = array(

					'Student_Name' => $Student_Name,
					'Passwords' =>	$Passwords,
					'Phone_Number' => $Phone_Number,
					'Depart_Name' => $Depart_Name,
					'Country' => $Country,
					'image_id' =>  $userImageId
				);


				$response = $this->Registration_Model->insertData($data);

				$this->load->view('registration_form', $data);
				redirect('Admin/Manage_User');
			}
		}
	}
}
