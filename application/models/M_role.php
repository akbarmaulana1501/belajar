<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_role extends CI_Model 
{

    public $table = '_user_role';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function get_all_role()
    {
		// $query = $this->db->get_where('user_role',array('is_main_role'=>0));
        // $this->db->where('id !=', 1);
        $query = $this->db->get('_user_role');
		return $query;	
	}

    function insert($data)
    {
        $query = $this->db->insert($this->table, $data);
    	return $query;
    }

	function edit($id,$role)
	{
		$query = $this->db->query("UPDATE _user_role set role='$role' where id='$id'");
		return $query;
	}	

	function delete($id)
	{
		$query = $this->db->query("DELETE FROM _user_role where id='$id'");
		return $query;
	}


    function get_access($id)
    {
		$query = $this->db->get_where('_user_role',array('id'=>$id));
        // $query = $this->db->get('user_role');
		return $query;	
	}

	

}

/* End of file m_role.php */
/* Location: ./application/models/m_role.php */