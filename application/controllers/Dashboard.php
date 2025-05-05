<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
            is_logged_in();
            $this->load->model('M_admin');
            $this->load->model('M_pegawai','pegawai');

    }

    public function index()
    {
                       
        $data['title']  = 'Dasboard'; 
        $data['app']    = $this->App->aplikasi();
        $this->template->load('templates/master','admin/dashboard', $data);
    }


    private function _do_upload()
    {
        $config['upload_path']          = 'image/image_pegawai';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100; //set max size allowed in Kilobyte
        $config['max_width']            = 1000; // set max width image allowed
        $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);
        $this->upload->initialize ($config);

        if(!$this->upload->do_upload('image')) //upload and validate
        {
            $data['inputerror'][] = 'image';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }

    public function get_by_id($id_pegawai)
    {
            $data = $this->pegawai->get_by_id(decrypt_url($id_pegawai));

            echo json_encode($data);
    }


    public function update()
    {
        $this->_validate();
        $id                                = str_replace("'", "", $this->input->post('id_pegawai'));
        $data  = array(
            'nik'               => str_replace("'", "", $this->input->post('nik')),
                            'nama'              => str_replace("'", "", $this->input->post('nama')),
                            'nm_pgl'              => str_replace("'", "", $this->input->post('nm_pgl')),
                            'gelar1'            => str_replace("'", "", $this->input->post('gelar1')),
                            'gelar2'            => str_replace("'", "", $this->input->post('gelar2')),
                            'jenis_kelamin'     => str_replace("'", "", $this->input->post('jenis_kelamin')),
                            'tpt_lahir'         => str_replace("'", "", $this->input->post('tpt_lahir')),
                            'tgl_lahir'         => str_replace("'", "", $this->input->post('tgl_lahir')),
                            'pend_terakhir'         => str_replace("'", "", $this->input->post('pend_terakhir')),
                            'gol_dar'           => str_replace("'", "", $this->input->post('gol_dar')),
                            'tinggi'            => str_replace("'", "", $this->input->post('tinggi')),
                            'berat'             => str_replace("'", "", $this->input->post('berat')),
                            'agama'             => str_replace("'", "", $this->input->post('agama')),
                            'no_ktp'            => str_replace("'", "", $this->input->post('no_ktp')),
                            'no_kk'            => str_replace("'", "", $this->input->post('no_kk')),
                            'alamat_ktp'        => str_replace("'", "", $this->input->post('alamat_ktp')),
                            'alamat_dom'        => str_replace("'", "", $this->input->post('alamat_dom')),
                            'telpon1'           => str_replace("'", "", $this->input->post('telpon1')),
                            'telpon2'           => str_replace("'", "", $this->input->post('telpon2')),
                            'no_telp_keluarga'  => str_replace("'", "", $this->input->post('no_telp_keluarga')),
                            'email'             => str_replace("'", "", $this->input->post('email')),
                            'status_pegawai'    => str_replace("'", "", $this->input->post('status_pegawai')),
                            'fungsi'            => str_replace("'", "", $this->input->post('fungsi')),
                            'status_kwn'    => str_replace("'", "", $this->input->post('status_kwn')),
                            'no_bpjs_tkerja'    => str_replace("'", "", $this->input->post('no_bpjs_tkerja')),
                            'tgl_kerja'    => str_replace("'", "", $this->input->post('tgl_kerja')),
                            'no_dplk'    => str_replace("'", "", $this->input->post('noDPLK')),
                            'no_bpjs_kes'    => str_replace("'", "", $this->input->post('no_bpjs_kes')),
                            'tgl_diangkat_pwtt'    => str_replace("'", "", $this->input->post('tgl_diangkat_pwtt')),
                            'tgl_cuti'    => str_replace("'", "", $this->input->post('tgl_cuti')),
                            'tgl_strsip'    => str_replace("'", "", $this->input->post('datestrsip')),
                            'id_medis'    => str_replace("'", "", $this->input->post('id_medis')),
                            'no_strsip'         => str_replace("'", "", $this->input->post('strsip')),
                            'no_dplk'    => str_replace("'", "", $this->input->post('noDPLK')),
                            'gol'    => str_replace("'", "", $this->input->post('gol')),
                            'tmt_gol'    => str_replace("'", "", $this->input->post('tmt_gol')),
                            'sgt'    => str_replace("'", "", $this->input->post('sgt')),
                            'tmt_sgt'    => str_replace("'", "", $this->input->post('tmt_sgt')),
                            'id_eselon'    => str_replace("'", "", $this->input->post('id_eselon')),
                            'tmt_eselon'    => str_replace("'", "", $this->input->post('tmt_eselon')),
                            'stat_pajak'    => str_replace("'", "", $this->input->post('stat_pajak')),
                            'tk_pajak'    => str_replace("'", "", $this->input->post('tk_pajak')),
                            'pjk_mulai'    => str_replace("'", "", $this->input->post('pjk_mulai')),
                            'pjk_akhir'    => str_replace("'", "", $this->input->post('pjk_akhir')),
                            'npwp'    => str_replace("'", "", $this->input->post('npwp')),
                            'tgl_npwp'    => str_replace("'", "", $this->input->post('tgl_npwp')),
                            'no_rek'    => str_replace("'", "", $this->input->post('noRek')),
                            'id_bank'    => str_replace("'", "", $this->input->post('s_bank')),
                            'atas_nm'    => str_replace("'", "", $this->input->post('anRek')),
                        );

        $this->pegawai->update(decrypt_url($id), 'pegawai', $data);
        echo json_encode(array("status" => true));
    }
    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('nik') == '')
        {
            $data['inputerror'][] = 'nik';
            $data['error_string'][] = 'NIK Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }


        if($this->input->post('nama') == '')
        {
            $data['inputerror'][] = 'nama';
            $data['error_string'][] = 'Nama Pegawai Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        // if($this->input->post('gelar1') == '')
        // {
        //     $data['inputerror'][] = 'gelar1';
        //     $data['error_string'][] = 'Gelar1 Tidak Boleh Kosong';
        //     $data['status'] = FALSE;
        // }
        // if($this->input->post('gelar2') == '')
        // {
        //     $data['inputerror'][] = 'gelar2';
        //     $data['error_string'][] = 'Gelar2 Tidak Boleh Kosong';
        //     $data['status'] = FALSE;
        // }
        if($this->input->post('jenis_kelamin') == '')
        {
            $data['inputerror'][] = 'jenis_kelamin';
            $data['error_string'][] = 'Jenis Kelamin Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if($this->input->post('tpt_lahir') == '')
        {
            $data['inputerror'][] = 'tpt_lahir';
            $data['error_string'][] = 'Tempat Lahir Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if($this->input->post('tgl_lahir') == '')
        {
            $data['inputerror'][] = 'tgl_lahir';
            $data['error_string'][] = 'Tanggal Lahir Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if($this->input->post('gol_dar') == '')
        {
            $data['inputerror'][] = 'gol_dar';
            $data['error_string'][] = 'Golongan Darah Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if($this->input->post('tinggi') == '')
        {
            $data['inputerror'][] = 'tinggi';
            $data['error_string'][] = 'Tinggi Badan Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if($this->input->post('berat') == '')
        {
            $data['inputerror'][] = 'berat';
            $data['error_string'][] = 'Berat Badan Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if($this->input->post('agama') == '')
        {
            $data['inputerror'][] = 'agama';
            $data['error_string'][] = 'Agama Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if($this->input->post('no_ktp') == '')
        {
            $data['inputerror'][] = 'no_ktp';
            $data['error_string'][] = 'No KTP Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if($this->input->post('no_kk') == '')
        {
            $data['inputerror'][] = 'no_kk';
            $data['error_string'][] = 'No KK Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if($this->input->post('alamat_ktp') == '')
        {
            $data['inputerror'][] = 'alamat_ktp';
            $data['error_string'][] = 'Alamat Sesuai KTP Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if($this->input->post('alamat_dom') == '')
        {
            $data['inputerror'][] = 'alamat_dom';
            $data['error_string'][] = 'Alamat Domisili Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if($this->input->post('telpon1') == '')
        {
            $data['inputerror'][] = 'telpon1';
            $data['error_string'][] = 'Telepon Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if($this->input->post('telpon2') == '')
        {
            $data['inputerror'][] = 'telpon2';
            $data['error_string'][] = 'Telepon Ke-2 Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
         if($this->input->post('no_telp_keluarga') == '')
        {
            $data['inputerror'][] = 'no_telp_keluarga';
            $data['error_string'][] = 'Nomor telepon keluarga Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if($this->input->post('email') == '')
        {
            $data['inputerror'][] = 'email';
            $data['error_string'][] = 'Alamat e-mail Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if($this->input->post('pend_terakhir') == '')
        {
            $data['inputerror'][] = 'pend_terakhir';
            $data['error_string'][] = 'Pendidikan Terakhir Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if($this->input->post('status_pegawai') == '')
        {
            $data['inputerror'][] = 'status_pegawai';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if($this->input->post('fungsi') == '')
        {
            $data['inputerror'][] = 'fungsi';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        // if($this->input->post('lokasi') == '')
        // {
        //     $data['inputerror'][] = 'lokasi';
        //     $data['error_string'][] = 'Tidak Boleh Kosong';
        //     $data['status'] = FALSE;
        // }
        if($this->input->post('status_kwn') == '')
        {
            $data['inputerror'][] = 'status_kwn';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if($this->input->post('no_bpjs_kes') == '')
        {
            $data['inputerror'][] = 'no_bpjs_kes';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if($this->input->post('no_bpjs_tkerja') == '')
        {
            $data['inputerror'][] = 'no_bpjs_tkerja';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if($this->input->post('tgl_kerja') == '')
        {
            $data['inputerror'][] = 'tgl_kerja';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if($this->input->post('tgl_diangkat_pwtt') == '')
        {
            $data['inputerror'][] = 'tgl_diangkat_pwtt';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if($this->input->post('tgl_cuti') == '')
        {
            $data['inputerror'][] = 'tgl_cuti';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        // if($this->input->post('masa_kerja') == '')
        // {
        //     $data['inputerror'][] = 'masa_kerja';
        //     $data['error_string'][] = 'Tidak Boleh Kosong';
        //     $data['status'] = FALSE;
        // }
        if($this->input->post('id_medis') == '')
        {
            $data['inputerror'][] = 'id_medis';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if($this->input->post('strsip') == '')
        {
            $data['inputerror'][] = 'strsip';
            $data['error_string'][] = 'STR SIP Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if($this->input->post('gol') == '')
        {
            $data['inputerror'][] = 'gol';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if($this->input->post('sgt') == '')
        {
            $data['inputerror'][] = 'sgt';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if($this->input->post('id_eselon') == '')
        {
            $data['inputerror'][] = 'id_eselon';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if($this->input->post('tmt_sgt') == '')
        {
            $data['inputerror'][] = 'tmt_sgt';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if($this->input->post('tmt_gol') == '')
        {
            $data['inputerror'][] = 'tmt_gol';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if($this->input->post('tmt_eselon') == '')
        {
            $data['inputerror'][] = 'tmt_eselon';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if($this->input->post('stat_pajak') == '')
        {
            $data['inputerror'][] = 'stat_pajak';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if($this->input->post('tk_pajak') == '')
        {
            $data['inputerror'][] = 'tk_pajak';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if($this->input->post('pjk_mulai') == '')
        {
            $data['inputerror'][] = 'pjk_mulai';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if($this->input->post('pjk_akhir') == '')
        {
            $data['inputerror'][] = 'pjk_akhir';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if($this->input->post('npwp') == '')
        {
            $data['inputerror'][] = 'npwp';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if($this->input->post('tgl_npwp') == '')
        {
            $data['inputerror'][] = 'tgl_npwp';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

}


/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */