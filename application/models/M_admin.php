<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {
	
	function get_role($role_id){
			$query = $this->db->get_where('_user_role', array('id' => $role_id));
			return $query;	
		}	


	function get_all_company($id_company){
			$query = $this->db->get_where('_company', array('id_company' => $id_company));
			return $query;	
		}	

	function edit($id_company,$nama_company,$alamat,$kel,$kec,$kab_kota,$prov,$no_telp,$email_company,$website)
	{
		$query = $this->db->query("UPDATE _company set nama_company='$nama_company',alamat='$alamat',kel='$kel',kec='$kec',kab_kota='$kab_kota',prov='$prov',no_telp='$no_telp',email_company='$email_company',website='$website' where id_company='$id_company'");
		return $query;
	}	

	function get_all_unit_usaha($id_unit_usaha){
			$query = $this->db->get_where('unit_usaha', array('id_unit_usaha' => $id_unit_usaha));
			return $query;	
		}	

	function edit_unit_usaha($id_unit_usaha,$nama_company,$alamat,$kel,$kec,$kab_kota,$prov,$no_telp,$email_company,$website)
	{
		$query = $this->db->query("UPDATE unit_usaha set nama_unit_usaha='$nama_unit_usaha',alamat='$alamat',kel='$kel',kec='$kec',kab_kota='$kab_kota',prov='$prov',no_telp='$no_telp',email_unit_usaha='$email_company',website='$website' where id_unit_usaha='$id_unit_usaha'");
		return $query;
	}
}

/* End of file m_admin.php */
/* Location: ./application/models/m_admin.php */