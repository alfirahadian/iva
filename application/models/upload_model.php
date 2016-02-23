<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Upload_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
    
	public function add_file($data)
	{
        //$file_name = $data['file_name'];
		$data=array(
			'nama_pasien'=>$this->input->post('nama'),
            'filename'=>$data['file_name'],
            'provinsi'=>$this->input->post('propinsi'),
            'kabupaten'=>$this->input->post('kabupaten'),
            'kecamatan'=>$this->input->post('kecamatan'),
            'status'=>$this->input->post('status')
			);
		$this->db->insert('images',$data);
	}
}
?>