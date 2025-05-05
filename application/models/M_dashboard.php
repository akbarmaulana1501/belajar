<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model 
{
    
    function __construct()
    {
        parent::__construct();
    }

	function edit($id_company,$nama_company,$alamat,$kel,$kec,$kab_kota,$prov,$no_telp,$email_company,$website)
	{
		$query = $this->db->query("UPDATE company set nama_company='$nama_company',alamat='$alamat',kel='$kel',kec='$kec',kab_kota='$kab_kota',prov='$prov',no_telp='$no_telp',email_company='$email_company',website='$website' where id_company='$id_company'");
		return $query;
	}	

}

/* End of file m_dahboard.php */
/* Location: ./application/models/m_dahboard.php */