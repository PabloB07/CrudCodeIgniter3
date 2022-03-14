<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();

		//$this->load->library('session');
		$this->load->helper('url');
		$this->load->model("UsersData_model");
	}

	public function index()
	{
		$this->load->view('contacts/add');
	}
	public function save()
    {
		$full_name = $this->input->post("full_name");
		$email = $this->input->post("email");
		$password = $this->input->post("password");

		$this->form_validation->set_rules('full_name', 'Nombre completo', 'required|min_length[5]');
		$this->form_validation->set_rules('email', 'Correo electrónico', 'required|valid_email|is_unique[contacts.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
	
		if ($this->form_validation->run() == FALSE){
			$this->load->view('contacts/add');
		}else{
			$data = array(
				"full_name" => $full_name,
				"email" => $email,
				"password" => md5($password)
			);
			
			$this->UsersData_model->save($data);
			//$this->session->set_flashdata('success', 'Se guardo los datos correctamente');
			redirect(base_url()."users");
		}
	}
}
