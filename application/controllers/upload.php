<?php 
class Upload extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('upload_model');
	}

	public function index(){
		/*
		if(($this->session->userdata('nip')!=""))
		{
			$this->load->view('view_upload', array('error' => ' ' ));
		}
		else{
			redirect ('user');
		}
		*/
		$data['propinsi'] = $this->db->get('provinsi');
        $this->load->view('view_upload',$data);
		//$this->load->view('view_upload', array('error' => ' ' ));
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
				$data = $this->upload->data();
				echo json_encode($data);
				$this->upload_model->add_file($data);
				redirect('beranda');
			}

			
		}
		
	}
}
?>