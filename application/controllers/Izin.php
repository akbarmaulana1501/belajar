<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Izin extends CI_Controller 
{

    public $data = [];

    public function __construct()
    {
        parent::__construct();
            is_logged_in();
            $this->load->model('M_admin');
            $this->load->model('M_izin','izin');
    }



    public function index()
    {
        $data['title']  = 'Pengajuan Izin'; 
        $data['app']    = $this->App->aplikasi();
        $data['create'] = 'Create';
        $data['delete'] = 'Delete';
        $data['m']      = 'Izin';
        $data['ml']     = 'Pengajuan Izin';
        $this->template->load('templates/master','admin/izin/izin', $data);
    }

    public function ajax_list(){
        $list = $this->izin->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach($list as $izin){
            $no++;
            $row = array();
            $row[] = $no;

            $id_pegawai_izin    = $izin->id_pegawai_izin; 
            $approval           = $this->izin->get_by_id_pegawai_izin($id_pegawai_izin);
            if($izin->status == 1){
                $row[] = '<a href="'.base_url().'izin/cetak/'.encrypt_url($izin->id_pegawai_izin).'" title="Cetak" class="btn-xs btn-primary waves-effect waves-light" target="_blank"><i class="fas fa-print"> </i> Cetak </a>&nbsp;';

                $row[] = '<span class="badge badge-warning" title="Disetujui oleh : '.$approval->nm_approval.' '.$approval->nm_unit_level.' '.$approval->nm_unit_kerja.' '.$approval->nm_unit_organisasi.' pada tanggal '.date_indo(substr($approval->tgl_approve,0,10)).' Pukul '.substr($approval->tgl_approve,11,8).'"><i class="fas fa-check"></i> Disetujui</span>';

            }else if ($izin->status == 2){
                $row[] = '<a href="'.base_url().'izin/cetak/'.encrypt_url($izin->id_pegawai_izin).'" title="Cetak" class="btn-xs btn-primary waves-effect waves-light" target="_blank"><i class="fas fa-print"> </i> Cetak </a>&nbsp;';

                $row[] = '<span class="badge badge-danger" title="Ditolak oleh : '.$approval->nm_approval.' '.$approval->nm_unit_level.' '.$approval->nm_unit_kerja.' '.$approval->nm_unit_organisasi.' pada tanggal '.date_indo(substr($approval->tgl_approve,0,10)).' Pukul '.substr($approval->tgl_approve,11,8).'"><i class="fas fa-times"></i> Ditolak</span>';
            } else{
                $row[] = '&nbsp;<a href="javascript:void(0)" title="Hapus" class="btn-xs btn-danger waves-effect waves-light" onclick="hapus(\''.encrypt_url($izin->id_pegawai_izin).'\')"><i class="fas fa-edit"> </i> Hapus </a>';

                $row[] = '<span class="badge badge-pink" title="Belum disetujui oleh atasan"><i class="fas fa-sync-alt"> </i> Belum Disetujui</span>';
            }
            
            $row[] = $izin->nik;
            $row[] = $izin->nama;
            $row[] = date_indo($izin->tgl_pengajuan);
            $row[] = $izin->lama . " hari";
            $row[] = date_indo($izin->tgl_mulai);
            $row[] = date_indo($izin->tgl_akhir);
            $row[] = wordwrap(ucwords($this->db->get_where("jenis_izin_list",array("id_jenis_izin" => $izin->id_jenis_izin))->row()->nm_jenis_izin), 40, "<br>", true);
            $row[] = wordwrap(ucwords($izin->keterangan), 5, "<br>", true);

            $data[] = $row;
        }
        
        $output = array(
                        "draw"              => $_POST['draw'],
                        "recordsTotal"      => $this->izin->count_all(),
                        "recordsFiltered"   => $this->izin->count_filtered(),
                        "data"              => $data,
        );

        echo json_encode($output);
    }

    private function __createPrimaryKey($params){
        //2+4+2+2+ newID.length = letter Primary_Key
        $newID = null;
        if($params === "approve"){
            $newID = $this->izin->getMaxID()->newID;
            if($newID === NULL){
                $newID = 0;
            }
        }

        if($params === "pegawai_izin"){
            $newID = $this->izin->getMaxID()->newID;
            if($newID === NULL){
                $newID = 0;
            }
        }

        $symbol = ["!^","@!","#@","$#","%$","^&","&&","*","(*","()","&+","@|","?-"];
        $number = ["62","89","53","31","58","70","34","19","70","95","12","15","77","66"];
        $string = ["thIs","lOaD","viEw","GoOd","MiLk","kEEp","GaMe","jUnE","rIDe","HopE","NeeD","StAy","rAce","MaNa"];
        $id = $symbol[rand(0,12)] . $string[rand(0,12)] . $number[rand(0,12)] . $symbol[rand(0,12)] . $newID; 
        return $id;
    }

    public function approve(){
        $out = null;
        $where['id_pegawai_izin'] = decrypt_url($this->input->post('idapp'));
        $where['id_pegawai'] = decrypt_url($this->input->post('idp'));
        $data['status'] = 1;
        
        $secondTable['id_izin_app'] = $this->__createPrimaryKey("approve");
        $secondTable['id_pegawai_izin'] = $where['id_pegawai_izin'];
        $secondTable['keterangan'] = str_replace("'", "", $this->input->post('catatan_app'));
        $secondTable['id_app_peg'] = $this->App->Aplikasi()['id_pegawai'];

        $this->izin->update($where,$data,"pegawai_izin");
        $this->izin->insert($secondTable,"izin_approval");
        $out['status'] = 1;
        echo json_encode($out);
    }

    public function getDataModal(){
        $id = decrypt_url($this->input->post('idp'));
        $list = $this->izin->getDataModal($id);
        $out = array();
        $out['status'] = 1;
        $out['data'] = $list;
        echo json_encode($out);
    }

    public function deleteizin(){
        $id = decrypt_url($this->input->post('id'));
        $do = $this->izin->delete(array("id_pegawai_izin" => $id),"pegawai_izin");
        $out['status'] = 1;
        echo json_encode($out);
    }

    public function insertizin(){
        $this->_validate();
        $data['id_pegawai_izin']    = $this->__createPrimaryKey("pegawai_izin");
        $data['id_pegawai']         = $this->session->userdata('id_pegawai');
        $data['tgl_pengajuan']      = str_replace("'", "", $this->input->post('tgl_pengajuan'));
        $data['lama']               = str_replace("'", "", $this->input->post('lama'));
        $data['tgl_mulai']          = str_replace("'", "", $this->input->post('tgl_mulai'));
        $data['tgl_akhir']          = str_replace("'", "", $this->input->post('tgl_akhir'));
        $data['id_jenis_izin']      = str_replace("'", "", $this->input->post('jns_izin'));
        $data['keterangan']         = str_replace("'", "", $this->input->post('keterangan'));
        $data['status'] = 0;
        $this->izin->insert($data,"pegawai_izin");
        echo json_encode(array("status" => 1));
    }

    public function getJenisIzin(){
        $data = $this->db->get("jenis_izin_list")->result();
        echo json_encode($data);
    }

    private function _validate(){
        $valid = array();
        $valid['error_string'] = array();
        $valid['inputerror'] = array();
        $valid['status'] =  TRUE;

        if($this->input->post('tgl_pengajuan') == '' || $this->input->post('tgl_pengajuan') == null){
            $valid['inputerror'][] = 'tgl_pengajuan';
            $valid['error_string'][] = 'Tanggal Pengajuan Tidak Boleh Kosong';
            $valid['status'] = FALSE;
        }

        if($this->input->post('tgl_mulai') == '' || $this->input->post('tgl_mulai') == null){
            $valid['inputerror'][] = 'tgl_mulai';
            $valid['error_string'][] = 'Tanggal Mulai Tidak Boleh Kosong';
            $valid['status'] = FALSE;
        }

        if($this->input->post('tgl_akhir') == '' || $this->input->post('tgl_akhir') == null){
            $valid['inputerror'][] = 'tgl_akhir';
            $valid['error_string'][] = 'Tanggal Akhir Tidak Boleh Kosong';
            $valid['status'] = FALSE;
        }

        if($this->input->post('keterangan') == '' || $this->input->post('keterangan') == null){
            $valid['inputerror'][] = 'keterangan';
            $valid['error_string'][] = 'Keterangan Tidak Boleh Kosong';
            $valid['status'] = FALSE;
        }


        if($this->input->post('lama') == '' || $this->input->post('lama') == null){
            $valid['inputerror'][] = 'lama';
            $valid['error_string'][] = 'Masukan Lama Izin dengan benar';
            $valid['status'] = FALSE;
        }

        if($this->input->post('jns_izin') == '' || $this->input->post('jns_izin') == null){
            $valid['inputerror'][] = 'jns_izin';
            $valid['error_string'][] = 'Jenis izin harus dipilih';
            $valid['status'] = FALSE;
        }


        if($this->input->post('keterangan') == '' || $this->input->post('keterangan') == null){
            $valid['inputerror'][] = 'keterangan';
            $valid['error_string'][] = 'Keterangan Tidak Boleh Kosong';
            $valid['status'] = FALSE;
        }

        if($valid['status'] === FALSE){
            echo json_encode($valid);
            exit();
        }
    }

    public function cetak($params){
        $id_pegawai_izin = decrypt_url($params);
        $dt = $this->izin->getDataCetak($id_pegawai_izin);
        $this->load->library('pdf');
        $this->data['title']    = 'Laporan';
        $this->data['nama'] = $dt->nama;
        $this->data['nik'] = $dt->nik;
        $this->data['lama'] = $dt->lama;
        $this->data['tgl_mulai'] = $dt->tgl_mulai;
        $this->data['tgl_akhir'] = $dt->tgl_akhir;
        $this->data['alasan'] = $dt->alasan;
        $this->data['keterangan'] = $dt->keterangan;
        $this->data['jabatan'] = $dt->nm_unit_level;
        $this->data['status'] = $dt->status;
        $this->data['nm_unit_kerja'] = $dt->nm_unit_kerja;
        $this->data['nm_unit_organisasi'] = $dt->nm_unit_organisasi;
        // $this->data['lokasi'] = $dt->lokasi;
        $this->data['nm_approval'] = $this->db->get_where("pegawai",array("id_pegawai" => $dt->id_app_peg))->row()->nama;
        $this->data['qr_approval'] = $this->db->get_where("pegawai",array("id_pegawai" => $dt->id_app_peg))->row()->qr_code;
        $this->data['bar_approval'] = $this->db->get_where("pegawai",array("id_pegawai" => $dt->id_app_peg))->row()->bar_code;
        $this->data['qr_code'] = $this->db->get_where("pegawai",array("id_pegawai" => $dt->id_app_peg))->row()->qr_code;

        $this->data['jenis_izin'] = $this->db->get_where("jenis_izin_list",array("id_jenis_izin" => $dt->id_jenis_izin))->row()->nm_jenis_izin;
        $this->data['lama_jenis_izin'] = $this->db->get_where("jenis_izin_list",array("id_jenis_izin" => $dt->id_jenis_izin))->row()->lama_jenis_izin;

        
        $html = $this->load->view('admin/izin/cetak', $this->data, true);
        $this->pdf->createPDF($html, 'Cetak izin', false);  
    }  

}


/* End of file izin.php */
/* Location: ./application/controllers/Dashboard.php */