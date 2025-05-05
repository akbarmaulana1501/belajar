<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_DataCuti extends CI_Model{
    var $table          = "pegawai_cuti";

    var $primary        = "id_pegawai_cuti";

    var $column_order   = array('pegawai_cuti.tgl_pengajuan','pegawai_cuti.lama','pegawai_cuti.tgl_mulai','pegawai_cuti.tgl_akhir','pegawai_cuti.jns_cuti','pegawai_cuti.keterangan','pegawai_cuti.status');

    var $column_search  = array('pegawai_cuti.id_pegawai','pegawai_cuti.tgl_pengajuan','pegawai_cuti.lama','pegawai_cuti.tgl_mulai','pegawai_cuti.tgl_akhir','pegawai_cuti.jns_cuti','pegawai_cuti.keterangan','pegawai_cuti.status');

    var $order          = array('pegawai_cuti.tgl_pengajuan' => 'DESC','pegawai_cuti.status' => 'ASC');

    public function __construct(){
        parent::__construct();
    }

    function get(){
        $query = $this->db->get($this->table)->result_array();
        return $query;
    }

    private function _get_datatables_query(){

        if($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 2) {
            $this->db->select('pegawai_cuti.status,pegawai.id_pegawai,pegawai.nik,pegawai.nama,pegawai_cuti.tgl_pengajuan,pegawai_cuti.lama,pegawai_cuti.tgl_mulai,pegawai_cuti.tgl_akhir,pegawai_cuti.jns_cuti,pegawai_cuti.status,pegawai_cuti.keterangan,pegawai_cuti.id_pegawai_cuti,pegawai.jatah_cuti');

            $this->db->join('cuti_approval', 'cuti_approval.id_pegawai_cuti = pegawai_cuti.id_pegawai_cuti');
            $this->db->join('pegawai', 'pegawai.id_pegawai = pegawai_cuti.id_pegawai');
            $this->db->join('pegawai_penempatan','pegawai_penempatan.id_pegawai = pegawai.id_pegawai','left');
            $this->db->join('unit_usaha', 'unit_usaha.id_unit_usaha = pegawai_penempatan.id_unit_usaha', 'left');
            $this->db->from($this->table);
        }
        if($this->session->userdata('role_id') == 3) {
            // $this->db->select('*');
            
            // $this->db->where('pegawai_penempatan.id_unit_usaha', $this->App->aplikasi()['id_unit_usaha']);


            $this->db->where(array(
                // 'pegawai_penempatan.id_unit_level'=>$this->App->aplikasi()['id_unit_level'],
                // 'pegawai_penempatan.id_unit_bisnis'=>$this->App->aplikasi()['id_unit_bisnis'],
                'pegawai_penempatan.id_unit_usaha'=>$this->App->aplikasi()['id_unit_usaha'],
                'pegawai.status_aktif'=>1,
                // 'pegawai_penempatan.id_unit_organisasi'=>$this->App->aplikasi()['id_unit_organisasi'],
                // 'pegawai_penempatan.id_unit_kerja'=>$this->App->aplikasi()['id_unit_kerja'],
                )
            );
            $this->db->select('pegawai_cuti.status,pegawai.id_pegawai,pegawai.nik,pegawai.nama,pegawai_cuti.tgl_pengajuan,pegawai_cuti.lama,pegawai_cuti.tgl_mulai,pegawai_cuti.tgl_akhir,pegawai_cuti.jns_cuti,pegawai_cuti.status,pegawai_cuti.keterangan,pegawai_cuti.id_pegawai_cuti,pegawai.jatah_cuti');
            if ($this->input->post('start_date') and $this->input->post('end_date') and $this->input->post('status')) {
                $this->db->where('pegawai_cuti.tgl_mulai BETWEEN "' . $this->input->post('start_date') . '" and "' . $this->input->post('end_date') . '"');
                $this->db->where('pegawai_cuti.status', $this->input->post('status'));
            } elseif ($this->input->post('start_date') and $this->input->post('end_date')) {
                $this->db->where('pegawai_cuti.tgl_mulai BETWEEN "' . $this->input->post('start_date') . '" and "' . $this->input->post('end_date') . '"');
            } elseif ($this->input->post('status')) {
                $this->db->where('pegawai_cuti.status', $this->input->post('status'));
            } else {
                $this->db->where('pegawai_cuti.status !=', 0);
                $this->db->where('pegawai_cuti.tgl_pengajuan LIKE', '%' . date('Y-m') . '%');
            }
            $this->db->join('cuti_approval', 'cuti_approval.id_pegawai_cuti = pegawai_cuti.id_pegawai_cuti');
            $this->db->join('pegawai', 'pegawai.id_pegawai = pegawai_cuti.id_pegawai');
            $this->db->join('pegawai_penempatan','pegawai_penempatan.id_pegawai = pegawai.id_pegawai','left');
            $this->db->join('unit_usaha', 'unit_usaha.id_unit_usaha = pegawai_penempatan.id_unit_usaha', 'left');
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
        $this->db->select_max('substr(id_cuti_app,11,11)+1', 'newID');
        return $this->db->get('cuti_approval')->row();
    }
    
    function getDataModal($idp,$idcuti){
        $this->db->select('

                        pegawai.nik, 
                        pegawai.nama, 
                        pegawai.jatah_cuti,

                        pegawai_cuti.lama,
                        pegawai_cuti.tgl_mulai,
                        pegawai_cuti.tgl_akhir,
                        pegawai_cuti.pelaksanaan_cuti,
                        pegawai_cuti.keterangan as alasan,
                        
                        unit_level.nm_unit_level, 
                        unit_kerja.nm_unit_kerja, 
                        unit_organisasi.nm_unit_organisasi, 
                        pegawai_cuti.lama');


        $this->db->where('pegawai.id_pegawai', $idp);
        $this->db->where('pegawai_cuti.id_pegawai_cuti',$idcuti);
        $this->db->from('pegawai_penempatan');
        $this->db->join('pegawai', 'pegawai_penempatan.id_pegawai = pegawai.id_pegawai');
        $this->db->join('pegawai_cuti', 'pegawai_cuti.id_pegawai = pegawai.id_pegawai');
        $this->db->join('unit_level','unit_level.id_unit_level = pegawai_penempatan.id_unit_level');
        $this->db->join('unit_kerja','unit_kerja.id_unit_kerja = pegawai_penempatan.id_unit_kerja');
        $this->db->join('unit_organisasi','unit_organisasi.id_unit_organisasi = pegawai_penempatan.id_unit_organisasi');
        return $this->db->get()->result();
    }

    function get_by_id_pegawai_cuti($id_pegawai_cuti) {   
        $this->db->where('pegawai_cuti.id_pegawai_cuti',$id_pegawai_cuti);
        $this->db->select('pegawai.nama as nm_approval,unit_level.nm_unit_level,unit_kerja.nm_unit_kerja,unit_organisasi.nm_unit_organisasi,cuti_approval.tgl_approve');
        $this->db->join('cuti_approval', 'cuti_approval.id_pegawai_cuti = pegawai_cuti.id_pegawai_cuti', 'left');
        $this->db->join('pegawai', 'pegawai.id_pegawai = cuti_approval.id_app_peg', 'left');
        $this->db->join('pegawai_penempatan','pegawai_penempatan.id_pegawai = pegawai.id_pegawai');
        $this->db->join('unit_level','unit_level.id_unit_level = pegawai_penempatan.id_unit_level');
        $this->db->join('unit_kerja','unit_kerja.id_unit_kerja = pegawai_penempatan.id_unit_kerja');
        $this->db->join('unit_organisasi','unit_organisasi.id_unit_organisasi = pegawai_penempatan.id_unit_organisasi');
        return $this->db->get('pegawai_cuti')->row();
    }

    // function finaljumlah_cuti($id,$jumlah_cuti){
    //     $this->db->select('pegawai.id_pegawai, pegawai.jatah_cuti');
    //     $this->db->set('jatah_cuti', $jumlah_cuti);
    //     $this->db->from('pegawai');
    //     $this->db->where('pegawai.id_pegawai', $id);
    // }

    function getDataJumlahCuti($id){
        $this->db->select('pegawai.jatah_cuti');
        $this->db->from('pegawai');
        $this->db->where('pegawai.id_pegawai', $id);
        return $this->db->get()->row();
    }


    function getDataCetak($id){
        $this->db->select('
        
                pegawai.nik,
                pegawai.nama,
                pegawai.jatah_cuti,
                pegawai.qr_code,
                pegawai.bar_code,

                unit_level.nm_unit_level,
                unit_kerja.nm_unit_kerja,
                unit_organisasi.nm_unit_organisasi,
                
                pegawai_cuti.lama,
                pegawai_cuti.tgl_mulai,
                pegawai_cuti.tgl_akhir,
                pegawai_cuti.pelaksanaan_cuti,
                pegawai_cuti.keterangan as alasan,
                pegawai_cuti.status,

                cuti_approval.id_app_peg ,
                cuti_approval.keterangan,
        ');
        $this->db->where('pegawai_cuti.id_pegawai_cuti', $id);
        $this->db->join('pegawai_penempatan','pegawai_penempatan.id_pegawai = pegawai.id_pegawai');
        $this->db->join('unit_level','unit_level.id_unit_level = pegawai_penempatan.id_unit_level');
        $this->db->join('unit_kerja','unit_kerja.id_unit_kerja = pegawai_penempatan.id_unit_kerja');
        $this->db->join('unit_organisasi','unit_organisasi.id_unit_organisasi = pegawai_penempatan.id_unit_organisasi');
        $this->db->join('pegawai_cuti','pegawai_cuti.id_pegawai = pegawai.id_pegawai');
        $this->db->join('cuti_approval','cuti_approval.id_pegawai_cuti = pegawai_cuti.id_pegawai_cuti');
        return $this->db->get('pegawai')->row();
    }

}