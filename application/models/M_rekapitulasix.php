<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_rekapitulasi extends CI_Model 
{
	var $table          = 'pegawai_penempatan';
	var $id             = 'id_pegawai_penempatan';
    // var $column_order   = array('pegawai.nik','pegawai.nik_lama','pegawai.nama','pegawai.gelar1','pegawai.gelar2','pegawai.jenis_kelamin','pegawai.tpt_lahir','pegawai.tgl_lahir','pegawai.gol_dar','pegawai.tinggi','pegawai.berat','pegawai.agama','pegawai.no_ktp','pegawai.alamat_ktp','pegawai.alamat_dom','pegawai.telpon1','pegawai.telpon2','pegawai.no_telp_keluarga','pegawai.email','pegawai.status_aktif');

    // var $column_search  = array('pegawai.id_pegawai','pegawai.nik','pegawai.nik_lama','pegawai.nama','pegawai.gelar1','pegawai.gelar2','pegawai.jenis_kelamin','pegawai.tpt_lahir','pegawai.tgl_lahir','pegawai.gol_dar','pegawai.tinggi','pegawai.berat','pegawai.agama','pegawai.no_ktp','pegawai.alamat_ktp','pegawai.alamat_dom','pegawai.telpon1','pegawai.telpon2','pegawai.no_telp_keluarga','pegawai.email','pegawai.status_aktif');

    // var $order          = array('pegawai.nik' => 'ASC'); 
    // ,'unit_usaha.id_unit_usaha' => 'ASC'

	public function __construct()
	{
		parent::__construct();
	}

	function get()
	{
		$query = $this->db->get($this->table)->result_array();
		return $query;  
	}  

	public function get_jumlah_by_unit_level(){
        //SELECT id_unit_level, COUNT(*) FROM `pegawai_penempatan` GROUP BY id_unit_level;
		$this->db->select('id_unit_level');
		$this->db->count('*');
		$this->db->groupby('id_unit_level');
		return $this->db->get($this->table)->row();
	}

	public function getJumlahPegawaiPerUnitUsaha(){
        //SELECT unit_usaha.nm_unit_usaha, COUNT(*) FROM `pegawai_penempatan`, `unit_usaha` WHERE pegawai_penempatan.id_unit_usaha = unit_usaha.id_unit_usaha GROUP BY unit_usaha.id_unit_usaha;
		$this->db->select('unit_usaha.nm_unit_usaha, COUNT(*)');
		$this->db->from('pegawai_penempatan');
		$this->db->join('unit_usaha', 'pegawai_penempatan.id_unit_usaha = unit_usaha.id_unit_usaha');
		$this->db->group_by('unit_usaha.id_unit_usaha');
		return $this->db->get()->result();
	}

	public function getJumlahPegawaiPerGender(){
		//SELECT unit_usaha.nm_unit_usaha, pegawai.jenis_kelamin, COUNT(pegawai.jenis_kelamin) FROM pegawai JOIN pegawai_penempatan ON pegawai.id_pegawai = pegawai_penempatan.id_pegawai JOIN unit_usaha ON pegawai_penempatan.id_unit_usaha = unit_usaha.id_unit_usaha GROUP BY unit_usaha.id_unit_usaha, pegawai.jenis_kelamin 
		$this->db->select('unit_usaha.nm_unit_usaha, pegawai.jenis_kelamin, COUNT(pegawai.jenis_kelamin)');
		$this->db->from('pegawai');
		$this->db->join('pegawai_penempatan', 'pegawai.id_pegawai = pegawai_penempatan.id_pegawai');
		$this->db->join('unit_usaha', 'pegawai_penempatan.id_unit_usaha = unit_usaha.id_unit_usaha');
		$this->db->group_by('unit_usaha.id_unit_usaha, pegawai.jenis_kelamin');

		$query = $this->db->get();
		return $query->result();
	}

}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */
// $2y$10$ocTikbJfbC4Plas6pbFXlOVPr1ZVBvgi0epI/uvHX5IPThdp04D/C