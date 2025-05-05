<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_DataIzin extends CI_Model{
    var $table          = "pegawai_izin";

    var $primary        = "id_pegawai_izin";

    var $column_order   = array('pegawai_izin.tgl_pengajuan','pegawai_izin.lama','pegawai_izin.tgl_mulai','pegawai_izin.tgl_akhir','pegawai_izin.id_jenis_izin','pegawai_izin.keterangan','pegawai_izin.status');

    var $column_search  = array('pegawai_izin.id_pegawai','pegawai_izin.tgl_pengajuan','pegawai_izin.lama','pegawai_izin.tgl_mulai','pegawai_izin.tgl_akhir','pegawai_izin.id_jenis_izin','pegawai_izin.keterangan','pegawai_izin.status');

    var $order          = array('pegawai_izin.tgl_pengajuan' => 'DESC','pegawai_izin.status' => 'ASC');

    public function __construct(){
        parent::__construct();
    }

    function get(){
        $query = $this->db->get($this->table)->result_array();
        return $query;
    }

    private function _get_datatables_query(){
        
            if ($this->session->userdata('role_id') == 1) {
                // $this->db->select('*');
                $this->db->select('pegawai_izin.status,pegawai.id_pegawai,pegawai.nik,pegawai.nama,pegawai_izin.tgl_pengajuan,pegawai_izin.lama,pegawai_izin.tgl_mulai,pegawai_izin.tgl_akhir,jenis_izin_list.nm_jenis_izin,pegawai_izin.status,pegawai_izin.keterangan,pegawai_izin.id_pegawai_izin,');
                // $this->db->where('pegawai_penempatan.id_unit_usaha', $this->App->aplikasi()['id_unit_usaha']);

                if ($this->input->post('start_date') and $this->input->post('end_date') and $this->input->post('status')) {
                    $this->db->where('pegawai_izin.tgl_mulai BETWEEN "' . $this->input->post('start_date') . '" and "' . $this->input->post('end_date') . '"');
                    $this->db->where('pegawai_izin.status', $this->input->post('status'));
                } elseif ($this->input->post('start_date') and $this->input->post('end_date')) {
                    $this->db->where('pegawai_izin.tgl_mulai BETWEEN "' . $this->input->post('start_date') . '" and "' . $this->input->post('end_date') . '"');
                } elseif ($this->input->post('status')) {
                    $this->db->where('pegawai_izin.status', $this->input->post('status'));
                } else {
                    $this->db->where('pegawai_izin.status !=', 0);
                    $this->db->where('pegawai_izin.tgl_pengajuan LIKE', '%' . date('Y-m') . '%');
                }

                $this->db->join('izin_approval', 'izin_approval.id_pegawai_izin = pegawai_izin.id_pegawai_izin');
                $this->db->join('pegawai', 'pegawai.id_pegawai = pegawai_izin.id_pegawai');
                $this->db->join('pegawai_penempatan', 'pegawai_penempatan.id_pegawai = pegawai.id_pegawai', 'left');
                $this->db->join('unit_usaha', 'unit_usaha.id_unit_usaha = pegawai_penempatan.id_unit_usaha', 'left');
                $this->db->join('jenis_izin_list', 'jenis_izin_list.id_jenis_izin = pegawai_izin.id_jenis_izin');
                $this->db->from($this->table);
            }
            if ($this->session->userdata('role_id') == 2) {
                // $this->db->select('*');
                $this->db->select('pegawai_izin.status,pegawai.id_pegawai,pegawai.nik,pegawai.nama,pegawai_izin.tgl_pengajuan,pegawai_izin.lama,pegawai_izin.tgl_mulai,pegawai_izin.tgl_akhir,jenis_izin_list.nm_jenis_izin,pegawai_izin.status,pegawai_izin.keterangan,pegawai_izin.id_pegawai_izin,');
                // $this->db->where('pegawai_penempatan.id_unit_usaha', $this->App->aplikasi()['id_unit_usaha']);

                if ($this->input->post('start_date') and $this->input->post('end_date') and $this->input->post('status')) {
                    $this->db->where('pegawai_izin.tgl_mulai BETWEEN "' . $this->input->post('start_date') . '" and "' . $this->input->post('end_date') . '"');
                    $this->db->where('pegawai_izin.status', $this->input->post('status'));
                } elseif ($this->input->post('start_date') and $this->input->post('end_date')) {
                    $this->db->where('pegawai_izin.tgl_mulai BETWEEN "' . $this->input->post('start_date') . '" and "' . $this->input->post('end_date') . '"');
                } elseif ($this->input->post('status')) {
                    $this->db->where('pegawai_izin.status', $this->input->post('status'));
                } else {
                    $this->db->where('pegawai_izin.status !=', 0);
                    $this->db->where('pegawai_izin.tgl_pengajuan LIKE', '%' . date('Y-m') . '%');
                }

                $this->db->join('izin_approval', 'izin_approval.id_pegawai_izin = pegawai_izin.id_pegawai_izin');
                $this->db->join('pegawai', 'pegawai.id_pegawai = pegawai_izin.id_pegawai');
                $this->db->join('pegawai_penempatan', 'pegawai_penempatan.id_pegawai = pegawai.id_pegawai', 'left');
                $this->db->join('unit_usaha', 'unit_usaha.id_unit_usaha = pegawai_penempatan.id_unit_usaha', 'left');
                $this->db->join('jenis_izin_list', 'jenis_izin_list.id_jenis_izin = pegawai_izin.id_jenis_izin');
                $this->db->from($this->table);
            }
            $tanggalHari = date('Y-m-d');
            if ($this->session->userdata('role_id') == 3) {
                
                $this->db->where(array(
                    'pegawai_penempatan.id_unit_usaha'=>$this->App->aplikasi()['id_unit_usaha'],
                    'pegawai.status_aktif'=>1,
                ));

                $this->db->select('pegawai_izin.status,pegawai.id_pegawai,pegawai.nik,pegawai.nama,pegawai_izin.tgl_pengajuan,pegawai_izin.lama,pegawai_izin.tgl_mulai,pegawai_izin.tgl_akhir,jenis_izin_list.nm_jenis_izin,pegawai_izin.status,pegawai_izin.keterangan,pegawai_izin.id_pegawai_izin,');
                
                if ($this->input->post('start_date') and $this->input->post('end_date') and $this->input->post('status')) {
                    $this->db->where('pegawai_izin.tgl_mulai BETWEEN "' . $this->input->post('start_date') . '" and "' . $this->input->post('end_date') . '"');
                    $this->db->where('pegawai_izin.status', $this->input->post('status'));
                } elseif ($this->input->post('start_date') and $this->input->post('end_date')) {
                    $this->db->where('pegawai_izin.tgl_mulai BETWEEN "' . $this->input->post('start_date') . '" and "' . $this->input->post('end_date') . '"');
                } elseif ($this->input->post('status')) {
                    $this->db->where('pegawai_izin.status', $this->input->post('status'));
                } else {
                    $this->db->where('pegawai_izin.status !=', 0);
                    $this->db->where('pegawai_izin.tgl_pengajuan LIKE', '%' . date('Y-m') . '%');
                }

                $this->db->join('izin_approval', 'izin_approval.id_pegawai_izin = pegawai_izin.id_pegawai_izin');
                $this->db->join('pegawai', 'pegawai.id_pegawai = pegawai_izin.id_pegawai');
                $this->db->join('pegawai_penempatan', 'pegawai_penempatan.id_pegawai = pegawai.id_pegawai', 'left');
                $this->db->join('unit_usaha', 'unit_usaha.id_unit_usaha = pegawai_penempatan.id_unit_usaha', 'left');
                $this->db->join('jenis_izin_list', 'jenis_izin_list.id_jenis_izin = pegawai_izin.id_jenis_izin');
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
        $this->db->select_max('substr(id_izin_app,11,11)+1', 'newID');
        return $this->db->get('izin_approval')->row();
    }

    function getDataModal($idp,$idizin){
        $this->db->select('

            pegawai.nik, 
            pegawai.nama, 


            pegawai_izin.lama,
            pegawai_izin.tgl_mulai,
            pegawai_izin.tgl_akhir,
            pegawai_izin.lokasi,
            pegawai_izin.keterangan as alasan,

            unit_level.nm_unit_level, 
            unit_kerja.nm_unit_kerja, 
            unit_organisasi.nm_unit_organisasi, 
            pegawai_izin.lama');


        $this->db->where('pegawai.id_pegawai', $idp);
        $this->db->where('pegawai_izin.id_pegawai_izin',$idizin);
        $this->db->from('pegawai_penempatan');
        $this->db->join('pegawai', 'pegawai_penempatan.id_pegawai = pegawai.id_pegawai');
        $this->db->join('pegawai_izin', 'pegawai_izin.id_pegawai = pegawai.id_pegawai');
        $this->db->join('unit_level','unit_level.id_unit_level = pegawai_penempatan.id_unit_level');
        $this->db->join('unit_kerja','unit_kerja.id_unit_kerja = pegawai_penempatan.id_unit_kerja');
        $this->db->join('unit_organisasi','unit_organisasi.id_unit_organisasi = pegawai_penempatan.id_unit_organisasi');
        return $this->db->get()->result();
    }

    function get_by_id_pegawai_izin($id_pegawai_izin) {   
        $this->db->where('pegawai_izin.id_pegawai_izin',$id_pegawai_izin);
        $this->db->select('pegawai.nama as nm_approval,unit_level.nm_unit_level,unit_kerja.nm_unit_kerja,unit_organisasi.nm_unit_organisasi,izin_approval.tgl_approve');
        $this->db->join('izin_approval', 'izin_approval.id_pegawai_izin = pegawai_izin.id_pegawai_izin', 'left');
        $this->db->join('pegawai', 'pegawai.id_pegawai = izin_approval.id_app_peg', 'left');
        $this->db->join('pegawai_penempatan','pegawai_penempatan.id_pegawai = pegawai.id_pegawai');
        $this->db->join('unit_level','unit_level.id_unit_level = pegawai_penempatan.id_unit_level');
        $this->db->join('unit_kerja','unit_kerja.id_unit_kerja = pegawai_penempatan.id_unit_kerja');
        $this->db->join('unit_organisasi','unit_organisasi.id_unit_organisasi = pegawai_penempatan.id_unit_organisasi');
        return $this->db->get('pegawai_izin')->row();
    }

    // function finaljumlah_izin($id,$jumlah_izin){
    //     $this->db->select('pegawai.id_pegawai, ');
    //     $this->db->set('jatah_izin', $jumlah_izin);
    //     $this->db->from('pegawai');
    //     $this->db->where('pegawai.id_pegawai', $id);
    // }

    function getDataJumlahizin($id){
        $this->db->select('');
        $this->db->from('pegawai');
        $this->db->where('pegawai.id_pegawai', $id);
        return $this->db->get()->row();
    }


    function getDataCetak($id){
        $this->db->select('

            pegawai.nik,
            pegawai.nama,
            pegawai.qr_code,
            pegawai.bar_code,

            unit_level.nm_unit_level,
            unit_kerja.nm_unit_kerja,
            unit_organisasi.nm_unit_organisasi,

            pegawai_izin.lama,
            pegawai_izin.tgl_mulai,
            pegawai_izin.tgl_akhir,
            pegawai_izin.id_jenis_izin,
            pegawai_izin.lokasi,
            pegawai_izin.keterangan as alasan,
            pegawai_izin.status,

            izin_approval.id_app_peg,
            izin_approval.keterangan,
            ');
        $this->db->where('pegawai_izin.id_pegawai_izin', $id);
        $this->db->join('pegawai_penempatan','pegawai_penempatan.id_pegawai = pegawai.id_pegawai');
        $this->db->join('unit_level','unit_level.id_unit_level = pegawai_penempatan.id_unit_level');
        $this->db->join('unit_kerja','unit_kerja.id_unit_kerja = pegawai_penempatan.id_unit_kerja');
        $this->db->join('unit_organisasi','unit_organisasi.id_unit_organisasi = pegawai_penempatan.id_unit_organisasi');
        $this->db->join('pegawai_izin','pegawai_izin.id_pegawai = pegawai.id_pegawai');
        $this->db->join('izin_approval','izin_approval.id_pegawai_izin = pegawai_izin.id_pegawai_izin');
        return $this->db->get('pegawai')->row();
    }

}