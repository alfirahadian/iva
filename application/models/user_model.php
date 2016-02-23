<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
	function login($nip,$password)
    {
		$this->db->where("nip",$nip);
        $this->db->where("password",$password);
            
        $query=$this->db->get("user");
        if($query->num_rows()>0)
        {
         	foreach($query->result() as $rows)
            {
            	//add all data to session
                $newdata = array(
                	   	'user_id' 		=> $rows->id,
                        'nama'   => $rows->nama,
                    	'nip' 	=> $rows->nip,
	                    'logged_in' 	=> TRUE,
                   );
			}
            	$this->session->set_userdata($newdata);
                return true;            
		}
		return false;
    }
    
	public function add_user()
	{
		$data=array(
			'nama'=>$this->input->post('nama'),
            'jk'=>$this->input->post('jk'),
            'profesi'=>$this->input->post('profesi'),
            'nip'=>$this->input->post('nip'),
			'alamat'=>$this->input->post('alamat'),
			'password'=>md5($this->input->post('password'))
			);
		$this->db->insert('user',$data);
	}
}
?>