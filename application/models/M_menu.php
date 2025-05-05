<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_menu extends CI_Model {
	
    public $table = '_user_menu';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

	function get_all_menu(){
			// $query = $this->db->get_where('user_menu',array('is_main_menu'=>0));
	        $query = $this->db->get('_user_menu');
	        $this->db->order_by('is_main_menu','DESC');
			return $query;	
		}

    function insert($data)
	    {
	        $query = $this->db->insert($this->table, $data);
	    	return $query;
	    }

	function edit($id,$title,$url,$ket,$icon,$is_main_menu,$is_aktif){
			$query = $this->db->query("UPDATE _user_menu set title='$title',url='$url',ket='$ket',icon='$icon',is_main_menu='$is_main_menu',is_aktif='$is_aktif' where id='$id'");
			return $query;
		}	

	function activation($id,$is_aktif){
			$query = $this->db->query("UPDATE _user_menu set is_aktif='$is_aktif' where id='$id'");
			return $query;
		}	

	function delete($id){
			$query = $this->db->query("DELETE FROM _user_menu where id='$id'");
			$query = $this->db->query("DELETE FROM _user_access_menu where menu_id='$id'");
			return $query;
		}


}

/* End of file m_menu.php */
/* Location: ./application/models/m_menu.php */