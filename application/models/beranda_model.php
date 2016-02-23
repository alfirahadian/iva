<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Beranda_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
    
	public function get_post(){
        $list_beranda = $this->db->order_by("id", "desc")->get('images');
        
        //$place = $query->num_rows();
        $num = $list_beranda->num_rows();


        if($num>0){
            return $list_beranda->result();
            //return $place->result();
        }
        else{
            return 0;
        }
    return json_encode($list_beranda);
    }

    public function get_place(){
        //$query = "SELECT * FROM kabupaten INNER JOIN provinsi ON provinsi.id=kabupaten.id_prov";

        
        $this->db->select('*');
        $this->db->from('kabupaten');
        $this->db->join('provinsi', 'provinsi.id = kabupaten.id_prov','left');
        //$this->db->where('id_prov',11);
        //$query = $this->db->query("SELECT * FROM kabupaten INNER JOIN provinsi ON"." provinsi.id=kabupaten.id_prov");
        $query = $this->db->get();

        $place = $query->num_rows();

    return json_encode($place);
    }
}
?>