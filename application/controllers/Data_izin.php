<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_izin extends CI_Controller 
{

    public $data = [];

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('M_DataIzin','dataIzin');
    }

    private function blocked()
    {
        $this->data['title']        = 'Page Is Blocked';
        $this->load->view('admin/auth/blocked', $this->data);
    }

    public function index()
    {
        $data['title']          = 'Data Izin'; 
        $data['app']            = $this->App->aplikasi();
        $data['m']              = 'Izin';
        $data['ml']             = 'Data Izin';
        $this->template->load('templates/master','admin/dataizin/dataizin', $data);
    }

    public function testt(){
        $list = $this->dataIzin->get_datatables();
        echo json_encode($list);
    }

    public function ajax_list()
    {
        $list = $this->dataIzin->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $izin) {
            $id_pegawai_izin =   $izin->id_pegawai_izin;
            $approval   = $this->dataIzin->get_by_id_pegawai_izin($id_pegawai_izin);
            $no++;
            $row    = array();
            $row[]  = $no;


            if ($izin->status == 0) {
                $row[] = '<button type="button" class="btn btn-xs btn-dark waves-effect waves-light" title="Belum bisa dicetak karena belum diapprove"><i class="fas fa-print"> </i> Cetak </button>';
            } else if ($izin->status == 1) {
                $row[] = '<a href="' . base_url() . 'data_izin/cetak/' . encrypt_url($izin->id_pegawai_izin) . '" target="_blank" class="btn-xs btn-primary waves-effect waves-light"><i class="fas fa-print"> </i> Cetak </a>&nbsp;';
            } else if ($izin->status == 2) {
                $row[] = '<a href="' . base_url() . 'data_izin/cetak/' . encrypt_url($izin->id_pegawai_izin) . '" target="_blank" class="btn-xs btn-primary waves-effect waves-light"><i class="fas fa-print"> </i> Cetak </a>&nbsp;';
            }

            if ($izin->status == 0) {
                $row[] = '<a href="javascript:void(0)" title="Approve" class="btn-xs btn-success waves-effect waves-light" onclick="approve(\'' . encrypt_url($izin->id_pegawai) . '\',\'' . encrypt_url($izin->id_pegawai_izin) . '\')"><i class="fas fa-balance-scale"> </i> Approve </a>';
            } else if ($izin->status == 1) {
                $row[] = '<span class="badge badge-success" title="Disetujui oleh : ' . $approval->nm_approval . ' ' . $approval->nm_unit_level . ' ' . $approval->nm_unit_kerja . ' ' . $approval->nm_unit_organisasi . ' pada tanggal ' . date_indo(substr($approval->tgl_approve, 0, 10)) . ' Pukul ' . substr($approval->tgl_approve, 11, 8) . '"><i class="fas fa-check"></i> Disetujui</span>';
            } else if ($izin->status == 2) {
                $row[] = '<span class="badge badge-danger" title="Ditolak oleh : ' . $approval->nm_approval . ' ' . $approval->nm_unit_level . ' ' . $approval->nm_unit_kerja . ' ' . $approval->nm_unit_organisasi . ' pada tanggal ' . date_indo(substr($approval->tgl_approve, 0, 10)) . ' Pukul ' . substr($approval->tgl_approve, 11, 8) . '"><i class="fas fa-times"></i> Ditolak</span>';
            }

            $row[] = $izin->nik;
            $row[] = $izin->nama;

            // tambahkan tgl_approve
            $row[] = date_indo($izin->tgl_pengajuan);
            $row[] = $izin->lama . " hari";
            $row[] = date_indo($izin->tgl_mulai);
            $row[] = date_indo($izin->tgl_akhir);
            $row[] = ucwords($izin->nm_jenis_izin);
            $row[] = wordwrap(ucwords($izin->keterangan), 40, "<br>", true);
            // $row[] = $izin->jatah_izin . " hari";

            $data[] = $row;
}

$output = array(
    "draw"              => $_POST['draw'],
    "recordsTotal"      => $this->dataIzin->count_all(),
    "recordsFiltered"   => $this->dataIzin->count_filtered(),
    "data"              => $data,
);

echo json_encode($output);
}

private function __createPrimaryKey($params){
        //2+4+2+2+ newID.length = letter Primary_Key
    $newID = null;
    if($params === "approve"){
        $newID = $this->dataIzin->getMaxID()->newID;
        if($newID === NULL){
            $newID = 0;
        }
    }

    if($params === "pegawai_izin"){
        $newID = $this->dataIzin->getMaxID()->newID;
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

public function approve() {
    $this->_validate_approve();
    $out = null;
    $where['id_pegawai_izin'] = decrypt_url($this->input->post('idapp'));
    $where['id_pegawai'] = decrypt_url($this->input->post('idp'));
    $data['status'] = str_replace("'", "", $this->input->post('status'));
    $secondTable['id_izin_app'] = $this->__createPrimaryKey("approve");
    $secondTable['id_pegawai_izin'] = $where['id_pegawai_izin'];
    $secondTable['keterangan'] = str_replace("'", "", $this->input->post('catatan_app'));
    $secondTable['id_app_peg'] = $this->App->Aplikasi()['id_pegawai'];
    $lama = $this->db->get_where("pegawai_izin",array("id_pegawai_izin" => $where['id_pegawai_izin'], "id_pegawai" => $where['id_pegawai']))->row()->lama;
    // $jatah = $this->dataIzin->getDataJumlahIzin($where['id_pegawai'])->jatah_izin;
    if($jatah < $lama){
        $out['status'] = 0;
    }else{
        $finalIzin = $jatah - $lama;
        $this->dataIzin->update($where,$data,"pegawai_izin");
        $this->dataIzin->insert($secondTable,"izin_approval");
        // $this->dataIzin->update(array("id_pegawai" => $where['id_pegawai']),array("jatah_izin" => $finalIzin),"pegawai");
        $out['status'] = 1;
    }
    echo json_encode($out);
}



private function _validate_approve(){
    $valid = array();
    $valid['error_string'] = array();
    $valid['inputerror'] = array();
    $valid['status'] =  TRUE;

    if($this->input->post('status') == '' || $this->input->post('status') == null){
        $valid['inputerror'][] = 'status';
        $valid['error_string'][] = 'Tidak Boleh Kosong';
        $valid['status'] = FALSE;
    }

    if($this->input->post('catatan_app') == '' || $this->input->post('catatan_app') == null){
        $valid['inputerror'][] = 'catatan_app';
        $valid['error_string'][] = 'Tidak Boleh Kosong';
        $valid['status'] = FALSE;
    }
    if($valid['status'] === FALSE){
        echo json_encode($valid);
        exit();
    }
}

public function getDataModal(){
    $id             = decrypt_url($this->input->post('idp'));
    $idizin = decrypt_url($this->input->post('idizin'));
    $list           = $this->dataIzin->getDataModal($id,$idizin);
    $out            = array();
    $out['status']  = 1;
    $out['data']    = $list;
    echo json_encode($out);
}

public function deleteIzin(){
    $id = decrypt_url($this->input->post('id'));
    $do = $this->dataIzin->delete(array("id_pegawai_izin" => $id),"pegawai_izin");
    $out['status'] = 1;
    echo json_encode($out);
}

public function insertIzin(){
    $this->_validate();
    $data['id_pegawai_izin']    = $this->__createPrimaryKey("pegawai_izin");
    $data['id_pegawai']         = $this->session->userdata('id_pegawai');
    $data['tgl_pengajuan']      = str_replace("'", "", $this->input->post('tgl_pengajuan'));
    $data['lama']               = str_replace("'", "", $this->input->post('lama'));
    $data['tgl_mulai']          = str_replace("'", "", $this->input->post('tgl_mulai'));
    $data['tgl_akhir']          = str_replace("'", "", $this->input->post('tgl_akhir'));
    $data['id_jenis_izin']           = str_replace("'", "", $this->input->post('id_jenis_izin'));
    $data['pelaksanaan_izin']   = str_replace("'", "", $this->input->post('pelaksanaan_izin'));
    $data['keterangan']         = str_replace("'", "", $this->input->post('keterangan'));
    $data['status'] = 0;
    $this->dataIzin->insert($data,"pegawai_izin");
    echo json_encode(array("status" => 1));
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

    // $jatah = $this->db->get_where("pegawai",array("id_pegawai" => $this->session->userdata('id_pegawai') ))->row()->jatah_izin;

    if($this->input->post('lama') == '' || $this->input->post('lama') == null || $this->input->post('lama') > $jatah){
        $valid['inputerror'][] = 'lama';
        $valid['error_string'][] = 'Lama Error atau tidak sesuai jatah izin';
        $valid['status'] = FALSE;
    }

    if($this->input->post('id_jenis_izin') == '' || $this->input->post('id_jenis_izin') == null){
        $valid['inputerror'][] = 'id_jenis_izin';
        $valid['error_string'][] = 'Jenis Izin harus dipilih';
        $valid['status'] = FALSE;
    }

    if($this->input->post('pelaksanaan_izin') == '' || $this->input->post('pelaksanaan_izin') == null){
        $valid['inputerror'][] = 'pelaksanaan_izin';
        $valid['error_string'][] = 'Pelaksanaan Izin harus dipilih';
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


    // public function getDatacetak(){
    //     $id = decrypt_url($this->input->post('idp'));
    //     $list = $this->dataIzin->getDatacetak($id);
    //     $out = array();
    //     $out['status'] = 1;
    //     $out['data'] = $list;
    //     echo json_encode($out);
    // }

    // public function getDataCetak()
    // {   
    //     // $id_pegawai = $where['id_pegawai'] = decrypt_url($this->input->post('idp'));

    //     // redirect(base_url('cetak'));

    //     // $this->data['Pegawai_izin'] = $this->dataIzin->getDataCetak($id_pegawai);

    //     // $id = decrypt_url($this->input->post('idp'));
    //     // $list = $this->dataIzin->getDataCetak($id);
    //     // $out = array();
    //     // $out['status'] = 1;
    //     // $out['data'] = $list;
    //     // echo json_encode($out);

    //     // $this->template->load('templates/master','admin/izin/cetak', $this->data);

    //     // redirect(base_url('izin'));

    //     require('libs/fpdf.php');
    //     $pdf = new FPDF();
    //     $pdf->AddPage();
    //     $pdf->SetFont('Arial','B',16);
    //     $pdf->Cell(40,10,'Halo PDF!!!');
    //     $pdf->Output();

    // }

public function cetak($params){
    $id_pegawai = decrypt_url($params);
    $dt = $this->dataIzin->getDataCetak($id_pegawai);
    $this->load->library('pdf');
    $this->data['title']    = 'Laporan';
    $this->data['nama'] = $dt->nama;
    $this->data['nik'] = $dt->nik;
    // $this->data['jatah_cuti'] = $dt->jatah_cuti;
    $this->data['lama'] = $dt->lama;
    $this->data['tgl_mulai'] = $dt->tgl_mulai;
    $this->data['tgl_akhir'] = $dt->tgl_akhir;
    $this->data['lokasi'] = $dt->lokasi;
    $this->data['alasan'] = $dt->alasan;
    $this->data['keterangan'] = $dt->keterangan;
    $this->data['status'] = $dt->status;
    $this->data['jabatan'] = $dt->nm_unit_level;
    $this->data['nm_unit_kerja'] = $dt->nm_unit_kerja;
    $this->data['nm_unit_organisasi'] = $dt->nm_unit_organisasi;
    $this->data['bar_code'] = $dt->bar_code;
    $this->data['qr_code'] = $dt->qr_code;
    $this->data['nm_approval'] = $this->db->get_where("pegawai",array("id_pegawai" => $dt->id_app_peg))->row()->nama;
    $this->data['qr_approval'] = $this->db->get_where("pegawai",array("id_pegawai" => $dt->id_app_peg))->row()->qr_code;
    $this->data['bar_approval'] = $this->db->get_where("pegawai",array("id_pegawai" => $dt->id_app_peg))->row()->bar_code;

    $this->data['jenis_izin'] = $this->db->get_where("jenis_izin_list",array("id_jenis_izin" => $dt->id_jenis_izin))->row()->nm_jenis_izin;
    $this->data['lama_jenis_izin'] = $this->db->get_where("jenis_izin_list",array("id_jenis_izin" => $dt->id_jenis_izin))->row()->lama_jenis_izin;

    $html = $this->load->view('admin/dataizin/cetak', $this->data, true);
    $this->pdf->createPDF($html, 'Cetak Izin', false); 
}


}


/* End of file Izin.php */
/* Location: ./application/controllers/Dashboard.php */