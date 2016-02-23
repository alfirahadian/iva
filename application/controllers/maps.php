<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maps extends CI_Controller {

	public function index()
	{
		$this->load->view('view_maps');
	}
}
