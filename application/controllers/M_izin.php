<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_izin extends CI_Model{
    var $table = "pegawai_izin";
    var $primary = "id_pegawai_izin";
    var $column_order = array('pegawai_izin.tgl_pengajuan','pegawai_izin.lama','pegawai_izin.tgl_mulai','pegawai_izin.tgl_akhir','pegawai_izin.jns_cuti','pegawai_izin.keterangan','pegawai_izin.status');

    var $column_search = array('pegawai_izin.id_pegawai','pegawai_izin.tgl_pengajuan','pegawai_izin.lama','pegawai_izin.tgl_mulai','pegawai_izin.tgl_akhir','pegawai_izin.jns_cuti','pegawai_izin.keterangan','pegawai_izin.status');

    var $order = array('pegawai_izin.tgl_pengajuan' => 'ASC');

    public function __construct(){
        parent::__construct();
    }

    function get(){
        $query = $this->db->get($this->table)->result_array();
        return $query;
    }

    private function _get_datatables_query(){
        //jika yang login bukan role id 1 = Administrator      
        if ($this->session->userdata('role_id') == 1) {
            $this->db->select('pegawai_izin.*, pegawai.nama');
            $this->db->from($this->table);
            $this->db->join('pegawai','pegawai.id_pegawai = pegawai_izin.id_pegawai','left');

        } else if ($this->session->userdata('role_id') == 2) { 
            $this->db->select('pegawai_izin.*, pegawai.nama');
            $this->db->join('pegawai','pegawai.id_pegawai = pegawai_izin.id_pegawai','left');
            // $this->db->where(array(
            //     'status_aktif'=>1,
            //     ),
            // );

            $this->db->from($this->table);

        } else if ($this->session->userdata('role_id') == 3) { 

            
            $this->db->where(array(
                // 'pegawai_penempatan.id_unit_level'=>$this->App->aplikasi()['id_unit_level'],
                // 'pegawai_penempatan.id_unit_bisnis'=>$this->App->aplikasi()['id_unit_bisnis'],
                'pegawai_penempatan.id_unit_usaha'=>$this->App->aplikasi()['id_unit_usaha'],
                'pegawai.status_aktif'=>1,
                // 'pegawai_penempatan.id_unit_organisasi'=>$this->App->aplikasi()['id_unit_organisasi'],
                // 'pegawai_penempatan.id_unit_kerja'=>$this->App->aplikasi()['id_unit_kerja'],
                )
            );
            $this->db->join('pegawai','pegawai.id_pegawai = pegawai_izin.id_pegawai','left');
            $this->db->join('pegawai_penempatan', 'pegawai_penempatan.id_pegawai = pegawai.id_pegawai', 'left');
            $this->db->join('unit_usaha', 'unit_usaha.id_unit_usaha = pegawai_penempatan.id_unit_usaha', 'left');
            $this->db->select('pegawai_izin.*, pegawai.nama');
            $this->db->from($this->table);

       
        } else if ($this->session->userdata('role_id') == 4) {
            $this->db->select('pegawai_izin.*, pegawai.nama');
            $this->db->where(array(
                'pegawai_penempatan.id_unit_level'=>$this->App->aplikasi()['id_unit_level'],
                'pegawai_penempatan.id_unit_bisnis'=>$this->App->aplikasi()['id_unit_bisnis'],
                'pegawai_penempatan.id_unit_usaha'=>$this->App->aplikasi()['id_unit_usaha'],
                'pegawai_penempatan.id_unit_organisasi'=>$this->App->aplikasi()['id_unit_organisasi'],
                'pegawai_penempatan.id_unit_kerja'=>$this->App->aplikasi()['id_unit_kerja'],
                'pegawai_penempatan.id_unit_kerja_sub'=>$this->App->aplikasi()['id_unit_kerja_sub'],
                'pegawai_penempatan.id_pegawai'=>$this->App->aplikasi()['id_pegawai'],
                )
            );
            $this->db->join('pegawai_penempatan', 'pegawai_penempatan.id_pegawai = pegawai_izin.id_pegawai', 'left');
            $this->db->join('unit_usaha', 'unit_usaha.id_unit_usaha = pegawai_penempatan.id_unit_usaha', 'left');
            $this->db->join('pegawai','pegawai.id_pegawai = pegawai_penempatan.id_pegawai');
            $this->db->from($this->table); 
 
        }


        $i = 0;
    
        foreach ($this->column_search as $item) 
        {
            if($_POST['search']['value']) 
            {
                
                if($i===0) // first loop
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i)
                    $this->db->group_end(); 
            }
            $i++;
        }
        
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables(){
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
            // $this->db->select("
            // pegawai_izin.id_pegawai_izin,
            //     pegawai_izin.id_pegawai,
            //     pegawai_izin.tgl_pengajuan,
            //     pegawai_izin.lama,
            //     pegawai_izin.tgl_mulai,
            //     pegawai_izin.tgl_akhir,
            //     pegawai_izin.jns_cuti,
            //     pegawai_izin.pelaksanaan_cuti,
            //     pegawai_izin.keterangan,
            //     pegawai_izin.status,

            //     pegawai.nama
            // ");
            // $this->db->from($this->table);
            // $this->db->join('pegawai','pegawai.id_pegawai = pegawai_izin.id_pegawai','left');
            // return $this->db->get()->result();

            // $this->db->select('
            //     pegawai_izin.id_pegawai,
            //     pegawai_izin.tgl_pengajuan,
            //     pegawai_izin.lama,
            //     pegawai_izin.tgl_mulai,
            //     pegawai_izin.tgl_akhir,
            //     pegawai_izin.jns_cuti,
            //     pegawai_izin.pelaksanaan_cuti,
            //     pegawai_izin.keterangan,
            //     pegawai_izin.status,


            //     pegawai.nama
            // ');
            // $this->db->from('pegawai_izin');
            // $this->db->join('pegawai_penempatan', 'pegawai_penempatan.id_pegawai = pegawai_izin.id_pegawai');
            // $this->db->join('pegawai','pegawai.id_pegawai = pegawai_izin.id_pegawai','left');
            // $this->db->where('pegawai_penempatan.id_unit_bisnis', $this->App->aplikasi()['id_unit_bisnis']);
            // $this->db->where('pegawai_penempatan.id_unit_kerja', $this->App->aplikasi()['id_unit_kerja']);
            // $this->db->where('pegawai_penempatan.id_unit_usaha', $this->App->aplikasi()['id_unit_usaha']);
            // $this->db->where('pegawai_penempatan.id_unit_organisasi', $this->App->aplikasi()['id_unit_organisasi']);
            // return $this->db->get()->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->_get_datatables_query();
        return $this->db->count_all_results();
    }

	function delete($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

    function insert($data,$table){
		$this->db->insert($table,$data);
	}

	function update($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

    function getMaxID(){
        $this->db->select_max('substr(id_cuti_app,11,11)+1', 'newID');
        return $this->db->get('cuti_approval')->row();
    }
    
    function getDataModal($id){

        // $query = "SELECT pegawai.nik,pegawai.nama, unit_kerja.nm_unit_kerja, pegawai_izin.keterangan FROM pegawai_penempatan 
        //             JOIN pegawai ON pegawai_penempatan.id_pegawai = pegawai.id_pegawai 
        //             JOIN unit_kerja ON pegawai_penempatan.id_unit_kerja = unit_kerja.id_unit_kerja 
        //             JOIN pegawai_izin ON pegawai_izin.id_pegawai = pegawai.id_pegawai WHERE pegawai.id_pegawai = '$id' ";
        // return $this->db->query($query)->result();
        $this->db->select('pegawai.nik, pegawai.nama, unit_kerja.nm_unit_kerja');
        $this->db->from('pegawai_penempatan');
        $this->db->join('pegawai', 'pegawai_penempatan.id_pegawai = pegawai.id_pegawai');
        $this->db->join('unit_kerja', 'pegawai_penempatan.id_unit_kerja = unit_kerja.id_unit_kerja');
        $this->db->join('pegawai_izin', 'pegawai_izin.id_pegawai = pegawai.id_pegawai');
        $this->db->where('pegawai.id_pegawai', $id);
        return $this->db->get()->result();
    }

    // function finaljumlah_cuti($id,$jumlah_cuti){
    //     $this->db->select('pegawai.id_pegawai, pegawai.jatah_cuti');
    //     $this->db->set('jatah_cuti', $jumlah_cuti);
    //     $this->db->from('pegawai');
    //     $this->db->where('pegawai.id_pegawai', $id);
    // }



    function getDataCetak($id){
        $this->db->select('
        
                pegawai.nik,
                pegawai.nama,
                pegawai.jatah_cuti,

                unit_level.nm_unit_level,
                unit_kerja.nm_unit_kerja,
                unit_organisasi.nm_unit_organisasi,
                
                pegawai_izin.lama,
                pegawai_izin.tgl_mulai,
                pegawai_izin.tgl_akhir,
                pegawai_izin.pelaksanaan_cuti,
                pegawai_izin.keterangan as alasan,

                cuti_approval.id_app_peg ,
                cuti_approval.keterangan,
        ');
        $this->db->where('pegawai.id_pegawai', $id);
        $this->db->join('pegawai_penempatan','pegawai_penempatan.id_pegawai = pegawai.id_pegawai');
        $this->db->join('unit_level','unit_level.id_unit_level = pegawai_penempatan.id_unit_level');
        $this->db->join('unit_kerja','unit_kerja.id_unit_kerja = pegawai_penempatan.id_unit_kerja');
        $this->db->join('unit_organisasi','unit_organisasi.id_unit_organisasi = pegawai_penempatan.id_unit_organisasi');
        $this->db->join('pegawai_izin','pegawai_izin.id_pegawai = pegawai.id_pegawai');
        $this->db->join('cuti_approval','cuti_approval.id_pegawai_izin = pegawai_izin.id_pegawai_izin');
        return $this->db->get('pegawai')->row();
    }

}