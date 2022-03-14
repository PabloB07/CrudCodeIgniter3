<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		//$this->load->library('session');
		$this->load->helper('url');
		$this->load->model("UsersData_model");
	}

	public function index($id)
	{   
        $data = $this->UsersData_model->getUser($id);
		$this->load->view('contacts/edit', $data);
	}
	public function update($id){
		$full_name = $this->input->post("full_name");
		$email = $this->input->post("email");
		$password = $this->input->post("password");
        
        $data = $this->UsersData_model->getUser($id);

        $validate_email= "";
        
        if($email != $data->email)
        {
            $validate_email= "|is_unique[contacts.email]";
        }

		$this->form_validation->set_rules('full_name', 'Nombre completo', 'required|min_length[5]');
		$this->form_validation->set_rules('email', 'Correo electrónico', 'required|valid_email'.$validate_email);
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

		if ($this->form_validation->run() == FALSE)
        {
			$this->index($id);
		}
        else
        {
			$data = array(
				"full_name" => $full_name,
				"email" => $email,
                "password" => md5($password),
			);
			
			$this->UsersData_model->update($data, $id);
			//$this->session->set_flashdata('success', 'Los datos se actualizaron correctamente');
			redirect(base_url()."users");
		}
	}
}
