<?php 
class Beranda_tabel extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('beranda_model');
	}

	public function index(){
		/*
		if (($this->session->userdata('nip')=="")){
			redirect ('/user');
		}

		else {
		$data['beranda'] = $this->beranda_model->get_post();
		$this->load->view('view_beranda', $data);
		//$this->load->view('view_beranda');
	}
	*/

	$data['beranda'] = $this->beranda_model->get_post();
	$data['place'] = $this->beranda_model->get_place();

	$this->load->view('view_beranda_tabel', $data);
	}


}
?>