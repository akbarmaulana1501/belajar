<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti extends CI_Controller 
{

    public $data = [];

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('M_admin');
        $this->load->model('M_cuti','cuti');
    }



    public function index()
    {
        $data['title']        = 'Pengajuan Cuti'; 
        $data['app']          = $this->App->aplikasi();
        $data['create']       = 'Create';
        $data['delete']       = 'Delete';
        $data['m']            = 'Cuti';
        $data['ml']           = 'Pengajuan Cuti';
        $this->template->load('templates/master','admin/cuti/cuti', $data);
    }

    public function ajax_list(){
        $list = $this->cuti->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach($list as $cuti){
            $no++;
            $row = array();
            $row[] = $no;
            
            $id_pegawai_cuti = $cuti->id_pegawai_cuti;
            $approval  = $this->cuti->get_by_id_pegawai_cuti($id_pegawai_cuti);

            if($cuti->status == 1){

                $row[] = '<a href="'.base_url().'cuti/cetak/'.encrypt_url($cuti->id_pegawai_cuti).'" target="_blank" class="btn-xs btn-primary waves-effect waves-light"><i class="fas fa-print"> </i> Cetak </a>&nbsp;';

                $row[] = '<span class="badge badge-warning" title="Disetujui oleh : '.$approval->nm_approval.' '.$approval->nm_unit_level.' '.$approval->nm_unit_kerja.' '.$approval->nm_unit_organisasi.' pada tanggal '.date_indo(substr($approval->tgl_approve,0,10)).' Pukul '.substr($approval->tgl_approve,11,8).'"><i class="fas fa-check"></i> Disetujui</span>';
            } 
            else if($cuti->status == 2){

                $row[] = '<a href="'.base_url().'cuti/cetak/'.encrypt_url($cuti->id_pegawai_cuti).'" target="_blank" class="btn-xs btn-primary waves-effect waves-light"><i class="fas fa-print"> </i> Cetak </a>&nbsp;';

                $row[] = '<span class="badge badge-danger" title="Ditolak oleh : '.$approval->nm_approval.' '.$approval->nm_unit_level.' '.$approval->nm_unit_kerja.' '.$approval->nm_unit_organisasi.' pada hari "><i class="fas fa-times"></i> Ditolak</span>';

            }
            else {
                $row[] = '&nbsp;<a href="javascript:void(0)" title="Hapus" class="btn-xs btn-danger waves-effect waves-light" onclick="hapus(\''.encrypt_url($cuti->id_pegawai_cuti).'\')"><i class="fas fa-trash"> </i> Hapus </a>';
                $row[] = '<span class="badge badge-pink" title="Belum disetujui oleh atasan"><i class="fas fa-sync-alt"> </i> Belum Disetujui</span>';
            }

            $row[] = $cuti->nik;
            $row[] = $cuti->nama;
            $row[] = date_indo($cuti->tgl_pengajuan);
            $row[] = $cuti->lama . " hari";
            $row[] = date_indo($cuti->tgl_mulai);
            $row[] = date_indo($cuti->tgl_akhir);
            $row[] = ucwords($cuti->jns_cuti);
            $row[] = wordwrap(ucwords($cuti->keterangan), 40, "<br>", true);

            $data[] = $row;
        }
        
        $output = array(
            "draw"              => $_POST['draw'],
            "recordsTotal"      => $this->cuti->count_all(),
            "recordsFiltered"   => $this->cuti->count_filtered(),
            "data"              => $data,
        );
        echo json_encode($output);
    }

    private function __createPrimaryKey($params){
        //2+4+2+2+ newID.length = letter Primary_Key
        $newID = null;
        if($params === "approve"){
            $newID = $this->cuti->getMaxID()->newID;
            if($newID === NULL){
                $newID = 0;
            }
        }

        if($params === "pegawai_cuti"){
            $newID = $this->cuti->getMaxID()->newID;
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
        $where['id_pegawai_cuti'] = decrypt_url($this->input->post('idapp'));
        $where['id_pegawai'] = decrypt_url($this->input->post('idp'));
        $data['status'] = 1;
        
        $secondTable['id_cuti_app'] = $this->__createPrimaryKey("approve");
        $secondTable['id_pegawai_cuti'] = $where['id_pegawai_cuti'];
        $secondTable['keterangan'] = str_replace("'", "", $this->input->post('catatan_app'));
        $secondTable['id_app_peg'] = $this->App->Aplikasi()['id_pegawai'];

        $lama = $this->cuti->getDataJumlahCuti($where['id_pegawai'])->lama;
        $jatah = $this->cuti->getDataJumlahCuti($where['id_pegawai'])->jatah_cuti;

        if($jatah < $lama){
            $out['status'] = 0;
        }else{
            $finalCuti = $jatah - $lama;
            $this->cuti->update($where,$data,"pegawai_cuti");
            $this->cuti->insert($secondTable,"cuti_approval");
            $this->cuti->update(array("id_pegawai" => $where['id_pegawai']),array("jatah_cuti" => $finalCuti),"pegawai");
            $out['status'] = 1;
        }
        echo json_encode($out);
    }

    public function getDataModal(){
        $id             = decrypt_url($this->input->post('idp'));
        $list           = $this->cuti->getDataModal($id);
        $out            = array();
        $out['status']  = 1;
        $out['data']    = $list;
        echo json_encode($out);
    }

    public function deleteCuti(){
        $id = decrypt_url($this->input->post('id'));
        $do = $this->cuti->delete(array("id_pegawai_cuti" => $id),"pegawai_cuti");
        $out['status'] = 1;
        echo json_encode($out);
    }

    public function insertCuti(){
        $this->_validate();
        $data['id_pegawai_cuti']    = $this->__createPrimaryKey("pegawai_cuti");
        $data['id_pegawai']         = $this->session->userdata('id_pegawai');
        $data['tgl_pengajuan']      = str_replace("'", "", $this->input->post('tgl_pengajuan'));
        $data['lama']               = str_replace("'", "", $this->input->post('lama'));
        $data['tgl_mulai']          = str_replace("'", "", $this->input->post('tgl_mulai'));
        $data['tgl_akhir']          = str_replace("'", "", $this->input->post('tgl_akhir'));
        $data['jns_cuti']           = str_replace("'", "", $this->input->post('jns_cuti'));
        $data['pelaksanaan_cuti']   = str_replace("'", "", $this->input->post('pelaksanaan_cuti'));
        $data['keterangan']         = str_replace("'", "", $this->input->post('keterangan'));
        $data['status'] = 0;
        $this->cuti->insert($data,"pegawai_cuti");
        echo json_encode(array("status" => 1));

        $id_approval = $this->cuti->getIdApproval($this->session->userdata('id_pegawai'));
        $email_approval = $this->cuti->getEmailApproval($id_approval);
        $this->_sendEmail($email_approval);

        // echo json_encode($email_approval);
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

        $jatah = $this->db->get_where("pegawai",array("id_pegawai" => $this->session->userdata('id_pegawai') ))->row()->jatah_cuti;

        if($this->input->post('lama') == '' || $this->input->post('lama') == null || $this->input->post('lama') > $jatah){
            $valid['inputerror'][] = 'lama';
            $valid['error_string'][] = 'Lama Error atau tidak sesuai jatah cuti';
            $valid['status'] = FALSE;
        }

        if($this->input->post('jns_cuti') == '' || $this->input->post('jns_cuti') == null){
            $valid['inputerror'][] = 'jns_cuti';
            $valid['error_string'][] = 'Jenis Cuti harus dipilih';
            $valid['status'] = FALSE;
        }

        if($this->input->post('pelaksanaan_cuti') == '' || $this->input->post('pelaksanaan_cuti') == null){
            $valid['inputerror'][] = 'pelaksanaan_cuti';
            $valid['error_string'][] = 'Pelaksanaan Cuti harus dipilih';
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

    private function _sendEmail($email_tujuan)
    {

        $setconfig = $this->cuti->setting_smtp('1');
        // echo json_encode($setconfig);

        $result = $setconfig[0]; // Mengambil elemen pertama dari hasil query

        $config = [
            'protocol'  => $result['protocol'],
            'smtp_host' => $result['smtp_host'],
            'smtp_user' => $result['smtp_user'],
            'smtp_pass' => $result['smtp_pass'],
            'smtp_port' => $result['smtp_port'],
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];


        // $config = [
        //     'protocol'  => $setconfig->protocol,
        //     'smtp_host' => $setconfig->smtp_host,
        //     'smtp_user' => $setconfig->smtp_user,
        //     'smtp_pass' => $setconfig->smtp_pass,
        //     'smtp_port' => $setconfig->smtp_port,
        //     'mailtype'  => $setconfig->mailtype,
        //     'charset'   => $setconfig->charset,
        //     'newline'   => $setconfig->newline
        // ];


        // $config = [
        //     'protocol'  => 'smtp',
        //     'smtp_host' => 'ssl://smtp.googlemail.com',
        //     'smtp_user' => 'mlghozy@gmail.com',
        //     'smtp_pass' => 'dwsiemaijmaxotbm',
        //     'smtp_port' => 465,
        //     'mailtype'  => 'html',
        //     'charset'   => 'utf-8',
        //     'newline'   => "\r\n"
        // ];
        
        // echo json_encode($config);


        $this->email->initialize($config);

        $this->email->from('mlghozy@gmail.com', 'Sistem Kepegawaian PT BTM(no-reply)');
        $this->email->to($email_tujuan);

        $pemohon = $this->cuti->getNamaPemohon($this->session->userdata('id_pegawai'));
        $this->email->subject('Pengajuan Cuti');
        $this->email->message('Permohonan Cuti dari Bpk/Ibu : ' . $pemohon .
            '<br>Untuk selengkapnya silahkan akses link berikut : https://36.92.141.5/pegawaian/');
        

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    // public function getDatacetak(){
    //     $id = decrypt_url($this->input->post('idp'));
    //     $list = $this->cuti->getDatacetak($id);
    //     $out = array();
    //     $out['status'] = 1;
    //     $out['data'] = $list;
    //     echo json_encode($out);
    // }

    // public function getDataCetak()
    // {   
    //     // $id_pegawai = $where['id_pegawai'] = decrypt_url($this->input->post('idp'));

    //     // redirect(base_url('cetak'));

    //     // $this->data['Pegawai_cuti'] = $this->cuti->getDataCetak($id_pegawai);

    //     // $id = decrypt_url($this->input->post('idp'));
    //     // $list = $this->cuti->getDataCetak($id);
    //     // $out = array();
    //     // $out['status'] = 1;
    //     // $out['data'] = $list;
    //     // echo json_encode($out);

    //     // $this->template->load('templates/master','admin/cuti/cetak', $this->data);

    //     // redirect(base_url('cuti'));

    //     require('libs/fpdf.php');
    //     $pdf = new FPDF();
    //     $pdf->AddPage();
    //     $pdf->SetFont('Arial','B',16);
    //     $pdf->Cell(40,10,'Halo PDF!!!');
    //     $pdf->Output();

    // }

    public function cetak($params){
        $id_pegawai_cuti = decrypt_url($params);
        $dt = $this->cuti->getDataCetak($id_pegawai_cuti);
        $this->load->library('pdf');
        $this->data['title']    = 'Laporan';
        $this->data['nama'] = $dt->nama;
        $this->data['nik'] = $dt->nik;
        $this->data['jatah_cuti'] = $dt->jatah_cuti;
        $this->data['lama'] = $dt->lama;
        $this->data['tgl_mulai'] = $dt->tgl_mulai;
        $this->data['tgl_akhir'] = $dt->tgl_akhir;
        $this->data['pelaksanaan_cuti'] = $dt->pelaksanaan_cuti;
        $this->data['alasan'] = $dt->alasan;
        $this->data['keterangan'] = $dt->keterangan;
        $this->data['status'] = $dt->status;
        $this->data['nm_unit_level'] = $dt->nm_unit_level;
        $this->data['nm_unit_kerja'] = $dt->nm_unit_kerja;
        $this->data['nm_unit_organisasi'] = $dt->nm_unit_organisasi;
        $this->data['bar_code'] = $dt->bar_code;
        $this->data['qr_code'] = $dt->qr_code;
        $this->data['nm_approval'] = $this->db->get_where("pegawai",array("id_pegawai" => $dt->id_app_peg))->row()->nama;
        $this->data['qr_approval'] = $this->db->get_where("pegawai",array("id_pegawai" => $dt->id_app_peg))->row()->qr_code;
        $this->data['bar_approval'] = $this->db->get_where("pegawai",array("id_pegawai" => $dt->id_app_peg))->row()->bar_code;

        $html = $this->load->view('admin/cuti/cetak', $this->data, true);
        $this->pdf->createPDF($html, 'Cetak Cuti', false);  
    }  

}


/* End of file Cuti.php */
/* Location: ./application/controllers/Dashboard.php */