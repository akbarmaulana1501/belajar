<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_profile extends CI_Model 
{
    public $table 	= 'pegawai';
    public $id 		= 'user_id';
    public $order 	= 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function get_Profile($user_id)
    {
		// $query = $this->db->get_where('user_role',array('is_main_role'=>0));
        // $this->db->where('id !=', 1);
        $this->db->where('admin.user_id', $user_id);
        $this->db->join('_user_role', '_user_role.id = admin.role_id');
        $query = $this->db->get('admin');
        return $query;	
    }

    
    public function changeProfile($key,$imgName){
        $this->db->set('image',$imgName);
        $this->db->where('id_pegawai',$key);
        $this->db->update("user");
    }

    function get_pegawai_keluarga_by_id($id_pegawai) {   
        $this->db->where('pegawai.id_pegawai',$id_pegawai);
        $this->db->select('
            pegawai.id_pegawai,
            pegawai.nik,
            pegawai.nik_lama,
            pegawai.nama,
            pegawai.status_aktif,
            pegawai.status_kwn,
            pegawai.no_kk,

            pegawai_keluarga.nama_ibu,
            pegawai_keluarga.pekerjaan_ibu,
            pegawai_keluarga.nama_ayah,
            pegawai_keluarga.pekerjaan_ayah,

            ');
        $this->db->join('pegawai_keluarga', 'pegawai_keluarga.id_pegawai = pegawai.id_pegawai', 'left');
        return $this->db->get($this->table)->row();
    }   

    function get_cek_keluarga_by_id($id_pegawai) {   
        $this->db->where('id_pegawai',$id_pegawai);
        return $this->db->get('pegawai_keluarga');
    }

    function insert_pegawai_keluarga($table, $data)
    {
        $query = $this->db->insert($table, $data);
        return $query;
    } 

    function update_pegawai_keluarga($id,$table, $data)
    {
        $this->db->where('id_pegawai', $id);
        $this->db->update($table, $data);
    }

    function get_by_id($id_pegawai) {   
        $this->db->where('id_pegawai',$id_pegawai);
        $this->db->select('

            pegawai.nik,
            pegawai.nik_lama,
            pegawai.nama,
            
            ');

            // $this->db->join('_pegawai_role', '_pegawai_role.id = pegawai.role_id', 'left');
            // $this->db->join('pegawai', 'pegawai.id_pegawai = pegawai.id_pegawai', 'left');
            // $this->db->join('pegawai_penempatan', 'pegawai_penempatan.id_pegawai = pegawai.id_pegawai', 'left');
            // $this->db->join('unit_usaha', 'unit_usaha.id_unit_usaha = pegawai_penempatan.id_unit_usaha', 'left');
            // $this->db->join('unit_level', 'unit_level.id_unit_level = pegawai_penempatan.id_unit_level', 'left');
            // $this->db->join('unit_kerja_sub', 'unit_kerja_sub.id_unit_kerja_sub = pegawai_penempatan.id_unit_kerja_sub', 'left');
        return $this->db->get($this->table)->row();
    }

}

/* End of file m_profile.php */
/* Location: ./application/models/m_profile.php */