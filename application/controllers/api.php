<?php 
class api extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('api_model');
	}

	public function get_beranda(){
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
	/*
	$data['beranda'] = $this->beranda_model->get_post();
	$data['place'] = $this->beranda_model->get_place();

	$this->load->view('view_beranda', $data);
	*/
	$data['beranda'] = $this->beranda_model->get_post();
	$data['place'] = $this->beranda_model->get_place();
	

	$this->output
      ->set_status_header(200)
      ->set_content_type('application/json', 'utf-8')
      ->set_output(json_encode($data, JSON_PRETTY_PRINT))
      ->_display();
      exit;
    }

    function kabupaten(){
        $propinsiID = $_GET['id'];
        $kabupaten   = $this->db->get_where('kabupaten',array('id_prov'=>$propinsiID));
        echo " <div class='row'>
                <label>Kabupaten</label>";
        echo "<select name='kabupaten' id='kabupaten' onChange='loadKecamatan()' class='browser-default'>";
        foreach ($kabupaten->result() as $k)
        {
            echo "<option value='$k->id'>$k->nama</option>";
        }
        echo "</select></div>";
    }
    
    function kecamatan(){
        $kabupatenID = $_GET['id'];
        $kecamatan   = $this->db->get_where('kecamatan',array('id_kabupaten'=>$kabupatenID));
        echo " <div class='row'>
                <label>Puskesmas Kecamatan :</label>";
        echo "<select name='kecamatan' id='kecamatan' onChange='loadDesa()' class='browser-default'>";
        foreach ($kecamatan->result() as $k)
        {
            echo "<option value='$k->id'>$k->nama</option>";
        }
        echo"</select></div>";
    }
    
    /*
    function desa(){
        $kecamatanID  = $_GET['id'];
        $desa         = $this->db->get_where('desa',array('id_kecamatan'=>$kecamatanID));
        echo " <div class='row'>
                <label>Desa</label>";
        echo "<select class='browser-default'>";
        foreach ($desa->result() as $d)
        {
            echo "<option value='$d->id'>$d->nama</option>";
        }
        echo"</select></div>";
    }
	*/
	public function do_upload(){
		/*
		$this->load->library('form_validation');
		// field name, error message, validation rules
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		//$this->form_validation->set_rules('place', 'Tempat dilakukan test', 'required');
		//$this->form_validation->set_rules('userfile', 'Gambar hasil test IVA', 'required');

		if($this->form_validation->run() == FALSE)
		{
			echo "Terjadi kesalahan. Pastikan Anda memasukkan data yang benar.";
		}
		else
		{
			$config['upload_path'] = './images/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			//$config['max_size']	= '10000';
	 
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
	 
			if ( ! $this->upload->do_upload()){
				$error = array('error' => $this->upload->display_errors());
				//$this->load->view('view_upload', $error);
				echo "Jangan lupa masukkan gambar";
			}
			else{
				$data = (array)json_decode(file_get_contents('php://input'));
				$data = $this->upload($data);

				$response = array(
		        'Success' => true,
		        'Info' => 'Data Tersimpan');

				$this->upload_model->add_file($data);
				$this->output
			        ->set_status_header(201)
			        ->set_content_type('application/json', 'utf-8')
			        ->set_output(json_encode($response, JSON_PRETTY_PRINT))
			        ->_display();
			        exit; 
						}

			
		}
		*/
		$data = (array)json_decode(file_get_contents('php://input'));
		$this->load->model('api_model');
		$this->api_model->add_file($data);

				$response = array(
		        'Success' => true,
		        'Info' => 'Data Tersimpan');

				//$this->api_model->add_file($data);
				$this->output
			        ->set_status_header(201)
			        ->set_content_type('application/json', 'utf-8')
			        ->set_output(json_encode($response, JSON_PRETTY_PRINT))
			        ->_display();
			        exit; 
						
		}
		
	public function get_provinsi(){
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

	$data['provinsi'] = $this->api_model->get_provinsi();
	//$data['place'] = $this->beranda_model->get_place();
	

	$this->output
      ->set_status_header(200)
      ->set_content_type('application/json', 'utf-8')
      ->set_output(json_encode($data, JSON_PRETTY_PRINT))
      ->_display();
      exit;
	}

	public function get_kabupaten(){
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

	$data['kabupaten'] = $this->api_model->get_kabupaten();
	//$data['place'] = $this->beranda_model->get_place();
	

	$this->output
      ->set_status_header(200)
      ->set_content_type('application/json', 'utf-8')
      ->set_output(json_encode($data, JSON_PRETTY_PRINT))
      ->_display();
      exit;
	}

	public function get_kecamatan(){
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

	$data['kecamatan'] = $this->api_model->get_kecamatan();
	//$data['place'] = $this->beranda_model->get_place();
	

	$this->output
      ->set_status_header(200)
      ->set_content_type('application/json', 'utf-8')
      ->set_output(json_encode($data, JSON_PRETTY_PRINT))
      ->_display();
      exit;
	}


	}
/*
$data = (array)json_decode(file_get_contents('php://input'));
      $this->Mahasiswa->insertMahasiswa($data);

      $response = array(
        'Success' => true,
        'Info' => 'Data Tersimpan');

      $this->output
        ->set_status_header(201)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT))
        ->_display();
        exit; 
*/
?>