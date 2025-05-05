<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_SettingApp extends CI_Model 
{

	
    public $table 	= '_application';
    public $id 		= 'id_application';

    function __construct()
	    {
	        parent::__construct();
	    }
	
	public function by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id_application',$id);
        $query = $this->db->get();

        return $query->row();
    }

	function get_by_id($id)
		{			
			$this->db->where('id_application', $id);
	        $query = $this->db->get('_application')->row();
			echo json_encode($query);
		}


	function update($id,$table, $data)
        {
            $this->db->where('id_application', $id);
            $this->db->update($table, $data);
        }

}

/* End of file m_setting.php */
/* Location: ./application/models/m_setting.php */