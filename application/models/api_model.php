<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Api_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
    
	public function add_file($data)
	{
        //$file_name = $data['file_name'];
		$data=array(
			'nama_pasien'=>$data['nama'],
            'filename'=>$data['file_name'],
            'filename_2'=>$data['file_name_2'],
            'id_pasien'=>$data['id_pasien'],
            'provinsi'=>$data['propinsi'],
            'kabupaten'=>$data['kabupaten'],
            'kecamatan'=>$data['kecamatan'],
            'status'=>$data['status'],
            'iva_ori'=>$data['iva_ori'],
            'status_iva'=>$data['status_iva'],
            'note'=>$data['note']
			);
		$this->db->insert('images',$data);
	}

    public function get_provinsi()
    {
         $list_provinsi= $this->db->order_by("id", "desc")->get('provinsi');
        
        //$place = $query->num_rows();
        $num = $list_provinsi->num_rows();


        if($num>0){
            return $list_provinsi->result();
            //return $place->result();
        }
        else{
            return 0;
        }
    return json_encode($list_provinsi);
    }

    public function get_kabupaten()
    {
         $list_kabupaten= $this->db->order_by("id", "desc")->get('kabupaten');
        
        //$place = $query->num_rows();
        $num = $list_kabupaten->num_rows();


        if($num>0){
            return $list_kabupaten->result();
            //return $place->result();
        }
        else{
            return 0;
        }
    return json_encode($list_kabupaten);
    }

    public function get_kecamatan()
    {
         $list_kecamatan= $this->db->order_by("id", "desc")->get('kecamatan');
        
        //$place = $query->num_rows();
        $num = $list_kecamatan->num_rows();


        if($num>0){
            return $list_kecamatan->result();
            //return $place->result();
        }
        else{
            return 0;
        }
    return json_encode($list_kecamatan);
    }
}
?>