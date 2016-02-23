<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}
	public function index()
	{
		if(($this->session->userdata('nip')!=""))
		{
			redirect ('beranda');
		}
		else{
			$this->load->view('view_login');
		}
	}
	public function login()
	{
		$nip=$this->input->post('nip');
		$password=md5($this->input->post('password'));

		$result=$this->user_model->login($nip,$password);
		if($result) $this->index();
		else        $this->load->view('view_login');
	}
	public function signup()
	{
		
		$this->load->view('view_signup');
	}
	public function registration()
	{
		$this->load->library('form_validation');
		// field name, error message, validation rules
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nip', 'Nomor Induk Pegawai', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('con_password', 'Password Confirmation', 'required');

		if($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			$this->user_model->add_user();
			$this->login();
		}
	}
	public function logout()
	{
		$newdata = array(
		'user_id'   =>'',
		'nama'  =>'',
		'nip'     => '',
		'logged_in' => FALSE,
		);
		$this->session->unset_userdata($newdata);
		$this->session->sess_destroy();
		$this->index();
	}
}
?>