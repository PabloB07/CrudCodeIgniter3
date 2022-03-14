<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller
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
		$data = array("data" => $this->UsersData_model->getUsers());

		$this->load->view('contacts/main',$data);
	}
	public function delete($id)
    {
		$this->UsersData_model->delete($id);
		//$this->session->set_flashdata('success', 'El usuario se eliminó correctamente');
		redirect(base_url()."users");
	}
}
