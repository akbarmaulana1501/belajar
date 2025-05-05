<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_App extends CI_Model 
{

	
	public $table 	= 'user';

	function __construct()
	{
		parent::__construct();
	}

	private function __DataUnit(){
		$this->db->select('pegawai.id_pegawai, 

			unit_bisnis.id_unit_bisnis, 
			unit_bisnis.nm_unit_bisnis,

			unit_kerja.id_unit_kerja, 
			unit_kerja.nm_unit_kerja, 

			unit_level.id_unit_level, 
			unit_level.nm_unit_level, 

			unit_usaha.id_unit_usaha, 
			unit_usaha.nm_unit_usaha,

			unit_organisasi.id_unit_organisasi, 
			unit_organisasi.nm_unit_organisasi');
		$this->db->from('pegawai_penempatan');
		$this->db->join('pegawai', 'pegawai.id_pegawai = pegawai_penempatan.id_pegawai');
		$this->db->join('unit_bisnis', 'unit_bisnis.id_unit_bisnis = pegawai_penempatan.id_unit_bisnis');
		$this->db->join('unit_kerja', 'unit_kerja.id_unit_kerja = pegawai_penempatan.id_unit_kerja');
		$this->db->join('unit_level', 'unit_level.id_unit_level = pegawai_penempatan.id_unit_level');
		$this->db->join('unit_usaha', 'unit_usaha.id_unit_usaha = pegawai_penempatan.id_unit_usaha');
		$this->db->join('unit_organisasi', 'unit_organisasi.id_unit_organisasi = pegawai_penempatan.id_unit_organisasi');
		$this->db->where('pegawai.id_pegawai', $this->session->userdata('id_pegawai'));
		return $this->db->get()->row_array();
	}

	function aplikasi()
	{	
		$id_application = $this->session->userdata('id_application');	
		$role_id 		= $this->session->userdata('role_id');	
		$id_pegawai 	= $this->session->userdata('id_pegawai');	
		$email 			= $this->session->userdata('email');	
		$this->db->select('
			_application.nm_application,
			_application.nm_perusahaan,
			_application.alamat,
			_application.kel,
			_application.kec,
			_application.kab_kota,
			_application.prov,
			_application.email,
			_application.website,
			_application.logo,
			_application.favicon,

			pegawai.id_pegawai,
			pegawai.nik,

			pegawai_izin.id_pegawai_izin,

			pegawai_cuti.id_pegawai_cuti,
			pegawai_izin.tgl_pengajuan as tgl_pengajuan_izin,
			
			pegawai.image as image_pegawai,

			user.nama as nama_user,
			user.email as email_user,
			user.image as image_user,
			user.is_active as is_active_user,
			user.date_created as date_created_user,

			_user_role.role,
			_user_role.id as role_id,

			unit_level.nm_unit_level,
			unit_level.id_unit_level,

			unit_bisnis.nm_unit_bisnis,
			unit_bisnis.id_unit_bisnis,

			unit_usaha.nm_unit_usaha,
			unit_usaha.id_unit_usaha,

			unit_organisasi.nm_unit_organisasi,
			unit_organisasi.id_unit_organisasi,

			unit_kerja.nm_unit_kerja,
			unit_kerja.id_unit_kerja,

			unit_kerja_sub.nm_unit_kerja_sub,
			unit_kerja_sub.id_unit_kerja_sub,
			user.image,
			user.user_id,
			user.nama,

			pegawai_penempatan.id_unit_usaha

			');

		$this->db->where(array(
			'_application.id_application'=>$id_application,
			'_user_role.id'=> $role_id,
			'pegawai.id_pegawai'=>$id_pegawai,
		)
	);

		$this->db->join('_application', '_application.id_application = user.id_application', 'left');
		$this->db->join('_user_role', '_user_role.id = user.role_id', 'left');
		$this->db->join('pegawai', 'pegawai.id_pegawai = user.id_pegawai', 'left');
		$this->db->join('pegawai_penempatan', 'pegawai_penempatan.id_pegawai = pegawai.id_pegawai', 'left');
		$this->db->join('pegawai_izin','pegawai_izin.id_pegawai = pegawai.id_pegawai', 'left');
		$this->db->join('pegawai_cuti','pegawai_cuti.id_pegawai = pegawai.id_pegawai', 'left');
		$this->db->join('jenis_izin_list','jenis_izin_list.id_jenis_izin = pegawai_izin.id_jenis_izin', 'left');

		$this->db->join('unit_level', 'unit_level.id_unit_level = pegawai_penempatan.id_unit_level', 'left');
		$this->db->join('unit_bisnis', 'unit_bisnis.id_unit_bisnis = pegawai_penempatan.id_unit_bisnis', 'left');
		$this->db->join('unit_usaha', 'unit_usaha.id_unit_usaha = pegawai_penempatan.id_unit_usaha', 'left');
		$this->db->join('unit_organisasi', 'unit_organisasi.id_unit_organisasi = pegawai_penempatan.id_unit_organisasi', 'left');
		$this->db->join('unit_kerja', 'unit_kerja.id_unit_kerja = pegawai_penempatan.id_unit_kerja', 'left');
		$this->db->join('unit_kerja_sub', 'unit_kerja_sub.id_unit_kerja_sub = pegawai_penempatan.id_unit_kerja_sub', 'left');


		$query = $this->db->get($this->table);

		return $query->row_array();
	}
	function data_login()
	{	
		$id_application = $this->session->userdata('id_application');	
		$role_id 		= $this->session->userdata('role_id');	
		$id_pegawai 	= $this->session->userdata('id_pegawai');	
		$email 			= $this->session->userdata('email');	
		$this->db->select('
			_application.nm_application,
			_application.nm_perusahaan,
			_application.alamat,
			_application.kel,
			_application.kec,
			_application.kab_kota,
			_application.prov,
			_application.email,
			_application.website,
			_application.logo,
			_application.favicon,

			pegawai.id_pegawai,
			pegawai.nik,
			pegawai.nama,
			
			pegawai.image as image_pegawai,

			user.nama as nama_user,
			user.email as email_user,
			user.image as image_user,
			user.is_active as is_active_user,
			user.date_created as date_created_user,

			_user_role.role,
			_user_role.id as role_id,

			unit_level.nm_unit_level,
			unit_level.id_unit_level,

			unit_bisnis.nm_unit_bisnis,
			unit_bisnis.id_unit_bisnis,

			unit_usaha.nm_unit_usaha,
			unit_usaha.id_unit_usaha,

			unit_organisasi.nm_unit_organisasi,
			unit_organisasi.id_unit_organisasi,

			unit_kerja.nm_unit_kerja,
			unit_kerja.id_unit_kerja,

			unit_kerja_sub.nm_unit_kerja_sub,
			unit_kerja_sub.id_unit_kerja_sub,
			user.image,

			');

		$this->db->where(array(
			'_application.id_application'=>$id_application,
			'_user_role.id'=> $role_id,
			'pegawai.id_pegawai'=>$id_pegawai,
		)
	);

		$this->db->join('_application', '_application.id_application = user.id_application', 'left');
		$this->db->join('_user_role', '_user_role.id = user.role_id', 'left');
		$this->db->join('pegawai', 'pegawai.id_pegawai = user.id_pegawai', 'left');
		$this->db->join('pegawai_penempatan', 'pegawai_penempatan.id_pegawai = pegawai.id_pegawai', 'left');

		$this->db->join('unit_level', 'unit_level.id_unit_level = pegawai_penempatan.id_unit_level', 'left');
		$this->db->join('unit_bisnis', 'unit_bisnis.id_unit_bisnis = pegawai_penempatan.id_unit_bisnis', 'left');
		$this->db->join('unit_usaha', 'unit_usaha.id_unit_usaha = pegawai_penempatan.id_unit_usaha', 'left');
		$this->db->join('unit_organisasi', 'unit_organisasi.id_unit_organisasi = pegawai_penempatan.id_unit_organisasi', 'left');
		$this->db->join('unit_kerja', 'unit_kerja.id_unit_kerja = pegawai_penempatan.id_unit_kerja', 'left');
		$this->db->join('unit_kerja_sub', 'unit_kerja_sub.id_unit_kerja_sub = pegawai_penempatan.id_unit_kerja_sub', 'left');


		$query = $this->db->get($this->table);

		return $query->row_array();
	}
	// function user()
	// 	{	
	// 		$id_application = $this->session->userdata('id_application');	
	// 		$role_id 		= $this->session->userdata('role_id');	
	// 		$id_pegawai 	= $this->session->userdata('id_pegawai');	
	// 		$email 			= $this->session->userdata('email');	

	// 		$this->db->select('
	// 							_application.nm_application,
	// 							_application.nm_perusahaan,
	// 							_application.alamat,
	// 							_application.kel,
	// 							_application.kec,
	// 							_application.kab_kota,
	// 							_application.prov,
	// 							_application.email,
	// 							_application.website,
	// 							_application.logo,
	// 							_application.favicon,

	// 							pegawai.id_pegawai,
	// 							pegawai.nik,
	// 							pegawai.nama,

	// 							user.nama as nama_user,
	// 							user.email as email_user,
	// 							user.image as image_user,
	// 							user.is_active as is_active_user,
	// 							user.date_created as date_created_user,

	// 							_user_role.role,
	// 							_user_role.id as role_id,

	// 							unit_level.nm_unit_level,
	// 							unit_level.id_unit_level,

	// 							unit_bisnis.nm_unit_bisnis,
	// 							unit_bisnis.id_unit_bisnis,

	// 							unit_usaha.nm_unit_usaha,
	// 							unit_usaha.id_unit_usaha,

	// 							unit_organisasi.nm_unit_organisasi,
	// 							unit_organisasi.id_unit_organisasi,

	// 							unit_kerja.nm_unit_kerja,
	// 							unit_kerja.id_unit_kerja,

	// 							unit_kerja_sub.nm_unit_kerja_sub,
	// 							unit_kerja_sub.id_unit_kerja_sub,
	// 							user.image,

	// 							');

 // 			$this->db->where(array(
 //                    '_application.id_application'=>$id_application,
 //                    '_user_role.id'=> $role_id,
 //                    'pegawai.id_pegawai'=>$id_pegawai,
 //                    ),
 //                );

	// 		$this->db->join('_application', '_application.id_application = user.id_application', 'left');
	// 		$this->db->join('_user_role', '_user_role.id = user.role_id', 'left');
	// 		$this->db->join('pegawai', 'pegawai.id_pegawai = user.id_pegawai', 'left');
	// 		$this->db->join('pegawai_penempatan', 'pegawai_penempatan.id_pegawai = pegawai.id_pegawai', 'left');

	// 		$this->db->join('unit_level', 'unit_level.id_unit_level = pegawai_penempatan.id_unit_level', 'left');
	// 		$this->db->join('unit_bisnis', 'unit_bisnis.id_unit_bisnis = pegawai_penempatan.id_unit_bisnis', 'left');
	// 		$this->db->join('unit_usaha', 'unit_usaha.id_unit_usaha = pegawai_penempatan.id_unit_usaha', 'left');
	// 		$this->db->join('unit_organisasi', 'unit_organisasi.id_unit_organisasi = pegawai_penempatan.id_unit_organisasi', 'left');
	// 		$this->db->join('unit_kerja', 'unit_kerja.id_unit_kerja = pegawai_penempatan.id_unit_kerja', 'left');
	// 		$this->db->join('unit_kerja_sub', 'unit_kerja_sub.id_unit_kerja_sub = pegawai_penempatan.id_unit_kerja_sub', 'left');


	//         $query = $this->db->get($this->table);

	// 				return $query->row_array();
	// 	}

}

/* End of file m_setting.php */
/* Location: ./application/models/m_setting.php */