<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'third_party/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pegawai extends CI_Controller
{

    public $data = [];


    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('upload');
        $this->load->model('M_pegawai', 'pegawai');
        $this->load->library('form_validation');
        // $this->load->library('datatables');
        $this->load->library('zend');
    }

    public function download()
    {
        // ambil semua data dari tabel database
        $data = $this->db->get('pegawai')->result_array();

        // inisialisasi objek Spreadsheet
        $spreadsheet = new Spreadsheet();

        // tambahkan header pada file Excel
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1', 'Kolom 1')
        ->setCellValue('B1', 'Kolom 2')
        ->setCellValue('C1', 'Kolom 3')
        ->setCellValue('D1', 'Kolom 4');

        // tambahkan data pada file Excel
        $row = 2;
        foreach ($data as $row_data) {
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A' . $row, $row_data['id_pegawai'])
            ->setCellValue('B' . $row, $row_data['nama'])
            ->setCellValue('C' . $row, $row_data['nik'])
            ->setCellValue('D' . $row, $row_data['jenis_kelamin']);
            $row++;
        }

        // set nama worksheet
        $spreadsheet->getActiveSheet()->setTitle('Sheet1');

        // set active worksheet yang akan diekspor
        $spreadsheet->setActiveSheetIndex(0);

        // set header untuk mengirimkan file Excel ke browser
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="data_export.xls"');
        header('Cache-Control: max-age=0');

        // inisialisasi objek Writer
        $writer = new Xlsx($spreadsheet);

        // ekspor file Excel ke output
        $writer->save('php://output');
        exit();
    }

    public function index()
    {
        $this->data['title']        = 'Pegawai';
        if ($this->App->aplikasi()['role_id'] !=3 && $this->App->aplikasi()['role_id'] != 4) {
            $this->data['TombolCreate']   = '

            <h4 class="page-title"><button type="button" class="btn btn-sm btn-primary waves-effect waves-light" onclick="add()"><i class="fe-plus-square"></i> Create </button>

            <button type="button" class="btn btn-sm btn-primary waves-effect waves-light" onclick="reload_table()"><i class="fe-refresh-cw"></i> Reload </button>

            <button type="button" class="btn btn-sm btn-primary waves-effect waves-light text-capitalize" onclick="reset_jatah_cuti()"><i class="fe-refresh-cw"></i> Reset Jatah Cuti </button>
            </h4>';
        } else {
            $this->data['TombolCreate']   = '

            <h4 class="page-title">

            <button type="button" class="btn btn-sm btn-primary waves-effect waves-light" onclick="reload_table()"><i class="fe-refresh-cw"></i> Reload </button>

            </h4>';
        }
        

        $this->data['create']       = 'Create';
        $this->data['edit']         = 'Update';
        $this->data['delete']       = 'Delete';
        $this->data['non_aktif']    = 'Non Aktifkan Pegawai';
        $this->data['aktif']        = 'Aktifkan Pegawai';
        $this->data['m']            = 'Pegawai';
        $this->data['ml']           = 'Pegawai List';
        $this->template->load('templates/master', 'admin/pegawai/list', $this->data);
    }

    public function ajax_list()
    {
        $list = $this->pegawai->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $pegawai) {
            $no++;
            $row = array();

            $row[] = $no;

            if ($this->App->aplikasi()['role_id']==1) {
                if (((empty($pegawai->qr_code) && empty($pegawai->barcode)) OR empty($pegawai->qr_code)) OR empty($pegawai->bar_code)) {
                    $row[] = '<a href="javascript:void(0)" title="Code" class="btn-xs btn-primary waves-effect waves-light" onclick="codeimage(' . "'" . encrypt_url($pegawai->id_pegawai) . "'" . ')"><i class="fas fa-edit"> </i> Code Image </a>';
                } else {
                    $row[] = '<img src="'.base_url().$pegawai->qr_code.'" class="img-thumbnail" alt="qr_code"><br><img src="'.base_url().$pegawai->bar_code.'" class="img-thumbnail" alt="barcode">';
                }
            }
            
            if ($this->App->aplikasi()['role_id']==1) {

                $row[] =
                '<a href="javascript:void(0)" title="Update" class="btn-xs btn-primary waves-effect waves-light" onclick="update(' . "'" . encrypt_url($pegawai->id_pegawai) . "'" . ')"><i class="fas fa-edit"> </i> Update </a>

                <a href="javascript:void(0)" title="Hapus" class="btn-xs btn-danger waves-effect waves-light" onclick="deletedata(' . "'" . encrypt_url($pegawai->id_pegawai) . "'" . ')"><i class="fas fa-trash"></i> Delete </a>';

            }

            if ($this->App->aplikasi()['role_id']==2) {

                $row[] =
                '<a href="javascript:void(0)" title="Update" class="btn-xs btn-primary waves-effect waves-light" onclick="update(' . "'" . encrypt_url($pegawai->id_pegawai) . "'" . ')"><i class="fas fa-edit"> </i> Update </a>

                <a href="javascript:void(0)" title="Hapus" class="btn-xs btn-danger waves-effect waves-light" onclick="deletedata(' . "'" . encrypt_url($pegawai->id_pegawai) . "'" . ')"><i class="fas fa-trash"></i> Delete </a>';

            }

            if ($pegawai->status_aktif == 1) {
                $pegawai->status_aktif = '<a href="javascript:void(0)" title="Non AKtif Pegawai" class="btn-xs btn-success waves-effect waves-light" onclick="nonaktif_pegawai(' . "'" . encrypt_url($pegawai->id_pegawai) . "'" . ')"><i class="fas fa-check"></i> Aktif </a>';
            } else {

                $pegawai->status_aktif = '<a href="javascript:void(0)" title="Tidak Aktif" class="btn-xs btn-danger waves-effect waves-light" onclick="active(' . "'" . encrypt_url($pegawai->id_pegawai) . "'" . ')"><i class="fe-x"></i> TIdak Aktif </a>';
            }

            $row[] = $pegawai->status_aktif;

            $row[] = '<a href="' . base_url() . 'pegawai/detail/' . encrypt_url($pegawai->id_pegawai) . '" title="Detail Pegawai" class="btn-xs btn-info waves-effect waves-light"><i class="fas fa-users"></i> Detail </a>';

            $row[] = $pegawai->nik;
            $row[] = $pegawai->nik_lama;
            $row[] = $pegawai->nama;
            $row[] = $pegawai->gelar1;
            $row[] = $pegawai->gelar2;
            $row[] = $pegawai->jenis_kelamin;
            $row[] = $pegawai->tpt_lahir;
            $row[] = $pegawai->tgl_lahir;
            $row[] = $pegawai->gol_dar;
            $row[] = $pegawai->tinggi;
            $row[] = $pegawai->berat;
            $row[] = $pegawai->agama;
            $row[] = $pegawai->no_ktp;
            $row[] = $pegawai->no_kk;
            $row[] = $pegawai->alamat_ktp;
            $row[] = $pegawai->alamat_dom;
            $row[] = $pegawai->telpon1;
            $row[] = $pegawai->telpon2;
            $row[] = $pegawai->no_telp_keluarga;


            $date1 = date_create($pegawai->tgl_kerja);
            $date2 = date_create(date("Y-m-d"));
            $diff  = date_diff($date1,$date2);
            $row[] = $diff->y." Tahun";
            if ($diff->y > 24) {
                $jatah_cuti = 21;
            } else if ($diff->y > 16){
                $jatah_cuti = 18;
            } else if ($diff->y > 8){
                $jatah_cuti = 15;
            } else if ($diff->y >= 1){
                $jatah_cuti = 12;
            } else {
                $jatah_cuti = 0;
            }
            $row[] = $pegawai->jatah_cuti ." Hari";
            // $row[] = $jatah_cuti; 

            $data[] = $row;
        }

        $output = array(
            "draw"              => $_POST['draw'],
            "recordsTotal"      => $this->pegawai->count_all(),
            "recordsFiltered"   => $this->pegawai->count_filtered(),
            "data"              => $data,
        );

        echo json_encode($output);
    }

    // Detail Pegawai
    public function detail($id_pegawai = null)
    {
        if (!$id_pegawai) {
            redirect(base_url('pegawai'), 'refresh');
        }

        $this->data['title']        = 'Detail Pegawai';
        $this->data['create']       = 'Create';
        $this->data['edit']         = 'Update';
        $this->data['delete']       = 'Delete';
        $this->data['back']         = '<h4 class="page-title text-capitalize"><a href="' . base_url("pegawai") . '" title="Penempatan Pegawai" class="btn btn-sm btn-primary waves-effect waves-light"><i class="fas fa-arrow-left"></i> Kembali </a>
        </h4>';


        $this->data['m']            = 'Pegawai';
        $this->data['ml']           = 'Detail';
        $this->data['dt_peg']       = $this->pegawai->get_detail_by_id(decrypt_url($id_pegawai));

        $this->data['id_pegawai']   = $this->data['dt_peg']->id_pegawai;
        $id_peg                     = $this->data['dt_peg']->id_pegawai;


        $this->data['jjp_pegawai']  = '<a href="javascript:void(0)" title="Jenjang Pendidikan Pegawai" id="add_jjp_pegawai" class="btn btn-block btn-danger waves-effect waves-light" onclick="add_jjp_pegawai(' . "'" . encrypt_url($id_peg) . "'" . ')"><i class="fe-plus-square"></i> Jenjang Pendidikan </a>';

        $this->data['button']       = '<button type="button" id="btnSaveAdd" onclick="simpan_data_jjp_pegawai()" class="btn btn-sm btn-primary"><i class="fe-save"> </i> Simpan</button> 

        <button type="button" id="btnSaveUpdate" onclick="simpan_data_jjp_pegawai()" class="btn btn-sm btn-info">
        <i class="fe-save"> </i> Update</button>';

        $this->data['data_pegawai'] = '<a href="javascript:void(0)" title="Update Data Pegawai" class="btn btn-block btn-primary btn_data_pegawai waves-effect waves-light" onclick="update(' . "'" . encrypt_url($id_peg) . "'" . ')"><i class="fas fa-edit"> </i>  Data Pegawai </a>';


        $this->template->load('templates/master', 'admin/pegawai/detail', $this->data);
    }

    private function id_pegawai_jjp_pddkOtomatis()
    {
        $ci         = get_instance();
        $query      = "SELECT MAX(CAST((substr(id_pegawai_jjg_pddk,4)) as unsigned)) as maxKode from pegawai_jjg_pddk";
        $data       = $ci->db->query($query)->row();
        $kode       = $data->maxKode;
        $kodeBaru   = $kode + 1;
        $id         = 'JP_' . $kodeBaru;
        return $id;
    }

    // insert Jenjang Pendidikan Pegawai
    public function insert_data_jjp_pegawai()
    {
        $this->_validate_jjp_pegawai();
        $id                                     = str_replace("'", "", $this->input->post('id_pegawai'));
        $data  = array(
            'id_pegawai_jjg_pddk'   => $this->id_pegawai_jjp_pddkOtomatis(),
            'id_pegawai'            => decrypt_url($id),
            'jenjang_pendidikan'    => str_replace("'", "", $this->input->post('jenjang_pendidikan')),
            'nm_jenjang_pendidikan' => str_replace("'", "", $this->input->post('nm_jenjang_pendidikan')),
            'jurusan'               => str_replace("'", "", $this->input->post('jurusan')),
            'tahun_lulus'           => str_replace("'", "", $this->input->post('tahun_lulus')),
            'no_ijazah'             => str_replace("'", "", $this->input->post('no_ijazah')),
        );

        $insert = $this->pegawai->insert_jenjang_pendidikan("pegawai_jjg_pddk", $data);
        echo json_encode(array("status" => TRUE));
    }

    // update Jenjang Pendidikan Pegawai
    public function update_data_jjp_pegawai()
    {
        $this->_validate_jjp_pegawai();
        $id_pegawai_jjg_pddk                                 = str_replace("'", "", $this->input->post('id_pegawai_jjg_pddk'));
        $data  = array(
            'jenjang_pendidikan'    => str_replace("'", "", $this->input->post('jenjang_pendidikan')),
            'nm_jenjang_pendidikan' => str_replace("'", "", $this->input->post('nm_jenjang_pendidikan')),
            'jurusan'               => str_replace("'", "", $this->input->post('jurusan')),
            'tahun_lulus'           => str_replace("'", "", $this->input->post('tahun_lulus')),
            'no_ijazah'             => str_replace("'", "", $this->input->post('no_ijazah')),
        );


        $this->pegawai->update_data_jjp_pegawai($id_pegawai_jjg_pddk, 'pegawai_jjg_pddk', $data);
        echo json_encode(array("status" => true));
    }

    public function get_DataEdit_JJP_by_id($id)
    {
        $db = $this->pegawai->get_data_jjg_pegawai(decrypt_url($id));
        if (count($db) > 0) {
            $db = $db;
            $db['status_dt'] = true;
        } else {
            $db = null;
            $db['status_dt'] = false;
        }
        echo json_encode($db);
    }

    public function get_cek_keluarga_by_id($id_pegawai)
    {
        $cek_jjp = $this->pegawai->get_cek_keluarga_by_id(decrypt_url($id_pegawai));
        if ($cek_jjp->num_rows() > 0) {
            $data['cek_keluarga_by_id'] = true;
            $data['id_pegawai'] = $id_pegawai;;
        } else {
            $data['cek_keluarga_by_id'] = false;
            $data['id_pegawai'] = $id_pegawai;;
        }
        echo json_encode($data);
    }

    private function id_pegawai_keluargaOtomatis()
    {
        $ci         = get_instance();
        $query      = "SELECT MAX(CAST((substr(id_pegawai_keluarga,4)) as unsigned)) as maxKode from pegawai_keluarga";
        $data       = $ci->db->query($query)->row();
        $kode       = $data->maxKode;
        $kodeBaru   = $kode + 1;
        $id         = 'KL_' . $kodeBaru;
        return $id;
    }

    public function insert_data_pegawai_keluarga()
    {
        $this->_validate_pegawai_keluarga();
        $id                                     = str_replace("'", "", $this->input->post('id_pegawai'));
        $data  = array(
            'id_pegawai_keluarga'   => $this->id_pegawai_keluargaOtomatis(),
            'id_pegawai'            => decrypt_url($id),
            'nama_ibu'              => str_replace("'", "", $this->input->post('nama_ibu')),
            'pekerjaan_ibu'         => str_replace("'", "", $this->input->post('pekerjaan_ibu')),
            'nama_ayah'             => str_replace("'", "", $this->input->post('nama_ayah')),
            'pekerjaan_ayah'        => str_replace("'", "", $this->input->post('pekerjaan_ayah')),
        );

        $insert = $this->pegawai->insert_pegawai_keluarga("pegawai_keluarga", $data);
        echo json_encode(array("status" => TRUE));
    }

    public function update_data_pegawai_keluarga()
    {
        $this->_validate_pegawai_keluarga();
        $id                                     = str_replace("'", "", $this->input->post('id_pegawai'));
        $data  = array(
            'nama_ibu'              => str_replace("'", "", $this->input->post('nama_ibu')),
            'pekerjaan_ibu'         => str_replace("'", "", $this->input->post('pekerjaan_ibu')),
            'nama_ayah'             => str_replace("'", "", $this->input->post('nama_ayah')),
            'pekerjaan_ayah'        => str_replace("'", "", $this->input->post('pekerjaan_ayah')),
        );


        $this->pegawai->update_pegawai_keluarga(decrypt_url($id), 'pegawai_keluarga', $data);
        echo json_encode(array("status" => true));
    }

    public function get_cek_jjp_by_id($id_pegawai)
    {
        $cek_jjp = $this->pegawai->get_cek_jjp_by_id(decrypt_url($id_pegawai));
        if ($cek_jjp->num_rows() > 0) {
            $data['cek_jjp_by_id'] = true;
            $data['id_pegawai'] = $id_pegawai;;
        } else {
            $data['id_pegawai'] = $id_pegawai;;
        }
        echo json_encode($data);
    }

    public function get_cek_pegawai_by_id($id_pegawai)
    {
        $cek_pegawai = $this->pegawai->get_cek_pegawai_by_id(decrypt_url($id_pegawai));
        if ($cek_pegawai->num_rows() > 0) {
            $data['cek_pegawai_by_id'] = true;
            $data['id_pegawai'] = $id_pegawai;;
        } else {
            $data['id_pegawai'] = $id_pegawai;;
        }
        echo json_encode($data);
    }

    public function get_cek_pp_by_id($id_pegawai)
    {
        if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 2) {
            $cek_pp = $this->pegawai->get_cek_pp_by_id(decrypt_url($id_pegawai));
            if ($cek_pp->num_rows() > 0) {
                $data['cek_pp_by_id'] = true;
                $data['id_pegawai'] = $id_pegawai;
            } else {
                $data['cek_pp_by_id'] = false;
                $data['id_pegawai'] = $id_pegawai;
            }
        } else {
            $data['cek_pp_by_id'] = 'no_access';
            $data['id_pegawai'] = $id_pegawai;
        }
        echo json_encode($data);
    }

    public function get_cek_upload_berkas_id($id_pegawai)
    {
        $cek_up_berkas = $this->pegawai->get_cek_upload_berkas_id(decrypt_url($id_pegawai));
        if ($cek_up_berkas->num_rows() > 0) {
            $data['cek_upload_berkas_id'] = true;
            $data['id_pegawai'] = $id_pegawai;;
        } else {
            $data['id_pegawai'] = $id_pegawai;;
        }
        echo json_encode($data);
    }

    public function get_cek_upload_peldik($id_pegawai)
    {
        $cek_jjp = $this->pegawai->get_cek_upload_peldik(decrypt_url($id_pegawai));
        if ($cek_jjp->num_rows() > 0) {
            $data['cek_upload_peldik_id'] = true;
            $data['id_pegawai'] = $id_pegawai;;
        } else {
            $data['id_pegawai'] = $id_pegawai;;
        }
        echo json_encode($data);
    }

    // Kode A
    public function get_unit_level_like()
    {

        $searchTermunit_level  = str_replace("'", "", $this->input->post('searchTermunit_level'));
        $response               = $this->pegawai->get_unit_level_like($searchTermunit_level);
        echo json_encode($response);
    }

    function get_unit_level()
    {
        $id_unit_level      = $this->input->post('id_unit_level');
        $data               = $this->pegawai->get_data_unit_level_by_id($id_unit_level);
        echo json_encode($data);
    }
    // Kode A

    // Kode B
    public function get_unit_bisnis_like()
    {
        $searchTermunit_bisnis  = str_replace("'", "", $this->input->post('searchTermunit_bisnis'));
        $response               = $this->pegawai->get_unit_bisnis_like($searchTermunit_bisnis);
        echo json_encode($response);
    }

    function get_unit_bisnis()
    {
        $id_unit_bisnis      = $this->input->post('id_unit_bisnis');
        $data               = $this->pegawai->get_data_unit_bisnis_by_id($id_unit_bisnis);
        echo json_encode($data);
    }
    // Kode B

    // Kode C
    public function get_unit_usaha_like()
    {

        $searchTermunit_usaha  = str_replace("'", "", $this->input->post('searchTermunit_usaha'));
        $response               = $this->pegawai->get_unit_usaha_like($searchTermunit_usaha);
        echo json_encode($response);
    }
    function get_unit_usaha()
    {
        $id_unit_usaha      = $this->input->post('id_unit_usaha');
        $data               = $this->pegawai->get_data_unit_usaha_by_id($id_unit_usaha);
        echo json_encode($data);
    }
    // Kode C

    // Kode D
    public function get_unit_organisasi_like()
    {

        $searchTermunit_organisasi  = str_replace("'", "", $this->input->post('searchTermunit_organisasi'));
        $response               = $this->pegawai->get_unit_organisasi_like($searchTermunit_organisasi);
        echo json_encode($response);
    }
    function get_unit_organisasi()
    {
        $id_unit_organisasi      = $this->input->post('id_unit_organisasi');
        $data               = $this->pegawai->get_data_unit_organisasi_by_id($id_unit_organisasi);
        echo json_encode($data);
    }
    // Kode D

    // Kode E
    public function get_unit_kerja_like()
    {

        $searchTermunit_kerja  = str_replace("'", "", $this->input->post('searchTermunit_kerja'));
        $response               = $this->pegawai->get_unit_kerja_like($searchTermunit_kerja);
        echo json_encode($response);
    }
    function get_unit_kerja()
    {
        $id_unit_kerja      = $this->input->post('id_unit_kerja');
        $data               = $this->pegawai->get_data_unit_kerja_by_id($id_unit_kerja);
        echo json_encode($data);
    }
    // Kode E

    // Kode F
    public function get_unit_kerja_sub_like()
    {

        $searchTermunit_kerja_sub  = str_replace("'", "", $this->input->post('searchTermunit_kerja_sub'));
        $response               = $this->pegawai->get_unit_kerja_sub_like($searchTermunit_kerja_sub);
        echo json_encode($response);
    }
    function get_unit_kerja_sub()
    {
        $id_unit_kerja_sub      = $this->input->post('id_unit_kerja_sub');
        $data               = $this->pegawai->get_data_unit_kerja_sub_by_id($id_unit_kerja_sub);
        echo json_encode($data);
    }
    // Kode F

    // Lokasi
    public function get_unit_lokasi_like()
    {

        $searchTermunit_lokasi  = str_replace("'", "", $this->input->post('searchTermunit_lokasi'));
        $response               = $this->pegawai->get_unit_lokasi_like($searchTermunit_lokasi);
        echo json_encode($response);
    }
    function get_unit_lokasi()
    {
        $id_unit_lokasi      = $this->input->post('id_unit_lokasi');
        $data               = $this->pegawai->get_data_unit_lokasi_by_id($id_unit_lokasi);
        echo json_encode($data);
    }
    // Lokasi


    private function id_pengawai_penempatanOtomatis()
    {
        $ci         = get_instance();
        $query      = "SELECT MAX(CAST((substr(id_pengawai_penempatan,4)) as unsigned)) as maxKode from pegawai_penempatan";
        $data       = $ci->db->query($query)->row();
        $kode       = $data->maxKode;
        $kodeBaru   = $kode + 1;
        $id         = 'PP_' . $kodeBaru;
        return $id;
    }

    // insert Penempatan Pegawai
    public function insert_data_penempatan()
    {
        $this->_validate_penempatan_pegawai();
        $id                                     = str_replace("'", "", $this->input->post('id_pegawai'));
        $data  = array(
            'id_pengawai_penempatan' => $this->id_pengawai_penempatanOtomatis(),
            'id_pegawai'            => decrypt_url($id),
            'id_unit_level'         => str_replace("'", "", $this->input->post('id_unit_level')),
            'id_unit_bisnis'        => str_replace("'", "", $this->input->post('id_unit_bisnis')),
            'id_unit_usaha'         => str_replace("'", "", $this->input->post('id_unit_usaha')),
            'id_unit_organisasi'    => str_replace("'", "", $this->input->post('id_unit_organisasi')),
            'id_unit_kerja'         => str_replace("'", "", $this->input->post('id_unit_kerja')),
            'id_unit_kerja_sub'     => str_replace("'", "", $this->input->post('id_unit_kerja_sub')),
            'id_unit_lokasi'        => str_replace("'", "", $this->input->post('id_unit_lokasi')),
        );

        $insert = $this->pegawai->insert_data_penempatan("pegawai_penempatan", $data);
        echo json_encode(array("status" => TRUE));
    }

    // update Penempatan Pegawai
    public function update_data_penempatan()
    {
        $this->_validate_penempatan_pegawai();
        $id                                     = str_replace("'", "", $this->input->post('id_pegawai'));
        $data  = array(
            'id_unit_level'         => str_replace("'", "", $this->input->post('id_unit_level')),
            'id_unit_bisnis'        => str_replace("'", "", $this->input->post('id_unit_bisnis')),
            'id_unit_usaha'         => str_replace("'", "", $this->input->post('id_unit_usaha')),
            'id_unit_organisasi'    => str_replace("'", "", $this->input->post('id_unit_organisasi')),
            'id_unit_kerja'         => str_replace("'", "", $this->input->post('id_unit_kerja')),
            'id_unit_kerja_sub'     => str_replace("'", "", $this->input->post('id_unit_kerja_sub')),
            'id_unit_lokasi'        => str_replace("'", "", $this->input->post('id_unit_lokasi')),
        );


        $this->pegawai->update_data_penempatan(decrypt_url($id), 'pegawai_penempatan', $data);
        echo json_encode(array("status" => true));
    }

    public function get_pegawai_like()
    {
        $searchTermPegawai  = str_replace("'", "", $this->input->post('searchTermPegawai'));
        $response           = $this->pegawai->get_pegawai_like($searchTermPegawai);
        echo json_encode($response);
    }

    function get_pegawai()
    {
        $nik                = $this->input->post('nik');
        $data               = $this->pegawai->get_data_pegawai_by_nik($nik);
        echo json_encode($data);
    }


    private function id_pegawaiOtomatis()
    {
        $ci         = get_instance();
        $query      = "SELECT MAX(CAST((substr(id_pegawai,4)) as unsigned)) as maxKode from pegawai";
        $data       = $ci->db->query($query)->row();
        $kode       = $data->maxKode;
        $kodeBaru   = $kode + 1;
        $id         = 'PG_' . $kodeBaru;
        return $id;
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
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('image')) //upload and validate
        {
            $data['inputerror'][] = 'image';
            $data['error_string'][] = 'Upload error: ' . $this->upload->display_errors('', ''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }

    // public function insert()
    // {
    //     $this->_validate();
    //     $data  = array(
    //         'id_pegawai'        => $this->id_pegawaiOtomatis(),
    //         'nik'               => str_replace("'", "", $this->input->post('nik')),
    //         'nik_lama'          => str_replace("'", "", $this->input->post('nik_lama')),
    //         'nama'              => str_replace("'", "", $this->input->post('nama')),
    //         'nm_pgl'            => str_replace("'", "", $this->input->post('nm_pgl')),
    //         'gelar1'            => str_replace("'", "", $this->input->post('gelar1')),
    //         'gelar2'            => str_replace("'", "", $this->input->post('gelar2')),
    //         'jenis_kelamin'     => str_replace("'", "", $this->input->post('jenis_kelamin')),
    //         'tpt_lahir'         => str_replace("'", "", $this->input->post('tpt_lahir')),
    //         'tgl_lahir'         => str_replace("'", "", $this->input->post('tgl_lahir')),
    //         'gol_dar'           => str_replace("'", "", $this->input->post('gol_dar')),
    //         'tinggi'            => str_replace("'", "", $this->input->post('tinggi')),
    //         'berat'             => str_replace("'", "", $this->input->post('berat')),
    //         'agama'             => str_replace("'", "", $this->input->post('agama')),
    //         'pend_terakhir'     => str_replace("'", "", $this->input->post('pend_terakhir')),
    //         'no_ktp'            => str_replace("'", "", $this->input->post('no_ktp')),
    //         'alamat_ktp'        => str_replace("'", "", $this->input->post('alamat_ktp')),
    //         'alamat_dom'        => str_replace("'", "", $this->input->post('alamat_dom')),
    //         'telpon1'           => str_replace("'", "", $this->input->post('telpon1')),
    //         'telpon2'           => str_replace("'", "", $this->input->post('telpon2')),
    //         'no_telp_keluarga'  => str_replace("'", "", $this->input->post('no_telp_keluarga')),
    //         'email'             => str_replace("'", "", $this->input->post('email')),
    //         'status_aktif'      => str_replace("'", "", $this->input->post('status_aktif')),
    //         'tgl_pengajuan'     => str_replace("'", "", $this->input->post('tgl_pengajuan')),
    //         'tgl_keluar'        => str_replace("'", "", $this->input->post('tgl_keluar')),
    //         'alasan_keluar'     => str_replace("'", "", $this->input->post('alasan_keluar')),
    //         'ket_keluar'        => str_replace("'", "", $this->input->post('ket_keluar')),
    //         'status_pegawai'    => str_replace("'", "", $this->input->post('status_pegawai')),
    //         'no_SK'             => str_replace("'", "", $this->input->post('nomorSK')),
    //         'no_dplk'           => str_replace("'", "", $this->input->post('noDPLK')),
    //         'fungsi'            => str_replace("'", "", $this->input->post('fungsi')),
    //         'status_kwn'        => str_replace("'", "", $this->input->post('status_kwn')),
    //         'no_bpjs_kes'       => str_replace("'", "", $this->input->post('no_bpjs_kes')),
    //         'no_bpjs_tkerja'    => str_replace("'", "", $this->input->post('no_bpjs_tkerja')),
    //         'tgl_kerja'         => str_replace("'", "", $this->input->post('tgl_kerja')),
    //         'tgl_diangkat_pwtt' => str_replace("'", "", $this->input->post('tgl_diangkat_pwtt')),
    //         'tgl_cuti'          => str_replace("'", "", $this->input->post('tgl_cuti')),
    //         'id_medis'          => str_replace("'", "", $this->input->post('id_medis')),
    //         'no_strsip'         => str_replace("'", "", $this->input->post('strsip')),
    //         'tgl_strsip'        => str_replace("'", "", $this->input->post('datestrsip')),
    //         'gol'               => str_replace("'", "", $this->input->post('gol')),
    //         'sgt'               => str_replace("'", "", $this->input->post('sgt')),
    //         'id_eselon'         => str_replace("'", "", $this->input->post('id_eselon')),
    //         'tmt_sgt'           => str_replace("'", "", $this->input->post('tmt_sgt')),
    //         'tmt_gol'           => str_replace("'", "", $this->input->post('tmt_gol')),
    //         'tmt_eselon'        => str_replace("'", "", $this->input->post('tmt_eselon')),
    //         'stat_pajak'        => str_replace("'", "", $this->input->post('stat_pajak')),
    //         'tk_pajak'          => str_replace("'", "", $this->input->post('tk_pajak')),
    //         'pjk_mulai'         => str_replace("'", "", $this->input->post('pjk_mulai')),
    //         'pjk_akhir'         => str_replace("'", "", $this->input->post('pjk_akhir')),
    //         'npwp'              => str_replace("'", "", $this->input->post('npwp')),
    //         'tgl_npwp'          => str_replace("'", "", $this->input->post('tgl_npwp')),
    //         'id_bank'           => str_replace("'", "", $this->input->post('s_bank')),
    //         'no_rek'            => str_replace("'", "", $this->input->post('noRek')),
    //         'atas_nm'          => str_replace("'", "", $this->input->post('anRek')),
    //     );


    //     if(!empty($_FILES['image']['name']))
    //     {
    //         $upload = $this->_do_upload();
    //         $data['image'] = $upload;
    //     }

    //         $insert = $this->pegawai->insert("pegawai", $data);
    //         echo json_encode(array("status" => TRUE));
    // }

    public function insert()
    {

        // $this->form_validation->set_rules('nik', 'nik', 'required');
        // $this->form_validation->set_rules('nama', 'nama', 'required');
        // $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required');
        // $this->form_validation->set_rules('tpt_lahir', 'tpt_lahir', 'required');
        // $this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'required');
        // $this->form_validation->set_rules('alamat_ktp', 'alamat_ktp', 'required');

        // QR Code
        $this->load->library('ciqrcode'); //pemanggilan library QR CODE
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = 'image/codeimage/assets/'; //string, the default is application/cache/
        $config['errorlog']     = 'image/codeimage/assets/'; //string, the default is application/logs/
        $config['imagedir']     = 'image/codeimage/qrcodeimage/'; //direktori penyimpanan qr code ./image/profileuser/'
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
        $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);

        $rm = str_replace("'", "", $this->input->post('nik', TRUE));

        $image_name = $rm . '.png'; //buat name dari qr code sesuai dengan rm
        $params['data'] = $rm; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
        $Qrdir = 'image/codeimage/qrcodeimage/';
        $pathQrCode = $Qrdir . $image_name;
        // $pathQRCode = site_url($config['imagedir'] . $image_name); //Menyimpan path image QR Code ke database
        // $this->db->set('qr_code', $pathQRCode);
        // $this->db->insert('pegawai');
        
        // Qr Code

        // Barcode
        $this->zend->load('Zend/Barcode');
        $barcode = $this->input->post('no_ktp'); //nomor id barcode
        $imageResource = Zend_Barcode::factory('code128', 'image', array('text' => $barcode), array())->draw();
        $imageName = $barcode . '.jpg';
        $imagePath = 'image/codeimage/barcodeimage/'; // penyimpanan file barcode
        imagejpeg($imageResource, $imagePath . $imageName);
        $pathBarcode = $imagePath . $imageName; //Menyimpan path image bardcode kedatabase   

        $this->_validate();
        $data  = array(
            'id_pegawai'        => $this->id_pegawaiOtomatis(),
            'nik'               => str_replace("'", "", $this->input->post('nik',TRUE)),
            'nik_lama'          => str_replace("'", "", $this->input->post('nik_lama',TRUE)),
            'nama'              => str_replace("'", "", $this->input->post('nama')),
            'nm_pgl'            => str_replace("'", "", $this->input->post('nm_pgl')),
            'gelar1'            => str_replace("'", "", $this->input->post('gelar1')),
            'gelar2'            => str_replace("'", "", $this->input->post('gelar2')),
            'jenis_kelamin'     => str_replace("'", "", $this->input->post('jenis_kelamin')),
            'tpt_lahir'         => str_replace("'", "", $this->input->post('tpt_lahir')),
            'tgl_lahir'         => str_replace("'", "", $this->input->post('tgl_lahir')),
            'gol_dar'           => str_replace("'", "", $this->input->post('gol_dar')),
            'tinggi'            => str_replace("'", "", $this->input->post('tinggi')),
            'berat'             => str_replace("'", "", $this->input->post('berat')),
            'agama'             => str_replace("'", "", $this->input->post('agama_data_pegawai')),
            'pend_terakhir'     => str_replace("'", "", $this->input->post('pend_terakhir')),
            'no_ktp'            => str_replace("'", "", $this->input->post('no_ktp')),
            'no_kk'             => str_replace("'", "", $this->input->post('no_kk')),
            'alamat_ktp'        => str_replace("'", "", $this->input->post('alamat_ktp')),
            'alamat_dom'        => str_replace("'", "", $this->input->post('alamat_dom')),
            'telpon1'           => str_replace("'", "", $this->input->post('telpon1')),
            'telpon2'           => str_replace("'", "", $this->input->post('telpon2')),
            'no_telp_keluarga'  => str_replace("'", "", $this->input->post('no_telp_keluarga')),
            'email'             => str_replace("'", "", $this->input->post('email')),
            'status_aktif'      => str_replace("'", "", $this->input->post('status_aktif')),
            'tgl_pengajuan'     => str_replace("'", "", $this->input->post('tgl_pengajuan')),
            'tgl_keluar'        => str_replace("'", "", $this->input->post('tgl_keluar')),
            'alasan_keluar'     => str_replace("'", "", $this->input->post('alasan_keluar')),
            'ket_keluar'        => str_replace("'", "", $this->input->post('ket_keluar')),
            'status_pegawai'    => str_replace("'", "", $this->input->post('status_pegawai')),
            'no_SK'             => str_replace("'", "", $this->input->post('nomorSK')),
            'no_dplk'           => str_replace("'", "", $this->input->post('noDPLK')),
            'fungsi'            => str_replace("'", "", $this->input->post('fungsi')),
            'status_kwn'        => str_replace("'", "", $this->input->post('status_kwn')),
            'no_bpjs_kes'       => str_replace("'", "", $this->input->post('no_bpjs_kes')),
            'no_bpjs_tkerja'    => str_replace("'", "", $this->input->post('no_bpjs_tkerja')),
            'tgl_kerja'         => str_replace("'", "", $this->input->post('tgl_kerja')),
            'tgl_diangkat_pwtt' => str_replace("'", "", $this->input->post('tgl_diangkat_pwtt')),
            'tgl_cuti'          => str_replace("'", "", $this->input->post('tgl_cuti')),
            'id_medis'          => str_replace("'", "", $this->input->post('id_medis')),
            'no_strsip'         => str_replace("'", "", $this->input->post('strsip')),
            'tgl_strsip'        => str_replace("'", "", $this->input->post('datestrsip')),
            'gol'               => str_replace("'", "", $this->input->post('gol')),
            'sgt'               => str_replace("'", "", $this->input->post('sgt')),
            'id_eselon'         => str_replace("'", "", $this->input->post('id_eselon')),
            'tmt_sgt'           => str_replace("'", "", $this->input->post('tmt_sgt')),
            'tmt_gol'           => str_replace("'", "", $this->input->post('tmt_gol')),
            'tmt_eselon'        => str_replace("'", "", $this->input->post('tmt_eselon')),
            'stat_pajak'        => str_replace("'", "", $this->input->post('stat_pajak')),
            'tk_pajak'          => str_replace("'", "", $this->input->post('tk_pajak')),
            'pjk_mulai'         => str_replace("'", "", $this->input->post('pjk_mulai')),
            'pjk_akhir'         => str_replace("'", "", $this->input->post('pjk_akhir')),
            'npwp'              => str_replace("'", "", $this->input->post('npwp')),
            'tgl_npwp'          => str_replace("'", "", $this->input->post('tgl_npwp')),
            'id_bank'           => str_replace("'", "", $this->input->post('s_bank')),
            'no_rek'            => str_replace("'", "", $this->input->post('noRek')),
            'atas_nm'           => str_replace("'", "", $this->input->post('anRek')),
            'qr_code'           => $pathQrCode,
            'bar_code'          => $pathBarcode,

            'jatah_cuti'          => $this->jumlah_jatah_cuti(),
        );


if (!empty($_FILES['image']['name'])) {
    $upload = $this->_do_upload();
    $data['image'] = $upload;
}

$insert = $this->pegawai->insert("pegawai", $data);
echo json_encode(array("status" => TRUE));
}

public function get_by_id($id_pegawai)
{
    $data = $this->pegawai->get_by_id(decrypt_url($id_pegawai));

    echo json_encode($data);
}

public function get_pp_by_id($id_pegawai)
{
    $data = $this->pegawai->get_pp_by_id(decrypt_url($id_pegawai));

    echo json_encode($data);
}

public function get_jjp_by_id($id_pegawai)
{
    $data = $this->pegawai->get_jjp_by_id(decrypt_url($id_pegawai));

    echo json_encode($data);
}

public function get_pegawai_keluarga_by_id($id_pegawai)
{
    $data = $this->pegawai->get_pegawai_keluarga_by_id(decrypt_url($id_pegawai));

    echo json_encode($data);
}

public function get_upload_berkas_by_id($id_pegawai)
{
    $data = $this->pegawai->get_upload_berkas_by_id(decrypt_url($id_pegawai));
    echo json_encode($data);
}

public function get_upload_peldik_by_id($id_pegawai)
{
    $data = $this->pegawai->get_upload_peldik_by_id(decrypt_url($id_pegawai));
    echo json_encode($data);
}

public function upload_berkas_ajax_list($id_pegawai)
{
    $list = $this->pegawai->get_data_upload_berkas(decrypt_url($id_pegawai));
    $data = array();
    $no = 1;
    foreach ($list as $upload_berkas) {
        $row = array();

        $row['no'] = $no++;
        $row['button'] = '<a href="javascript:void(0)" onclick="update_upload_berkas(' . "'" . encrypt_url($upload_berkas->id_pegawai_berkas) . "'" . ')" title="Update Berkas Pegawai" class="btn-xs btn-info waves-effect waves-light"><i class="fas fa-edit"></i> </a>

        <a href="javascript:void(0)" onclick="delete_upload_berkas(' . "'" . encrypt_url($upload_berkas->id_pegawai_berkas) . "'" . ')" title="Delete Berkas Pegawai" class="btn-xs btn-danger waves-effect waves-light"><i class="fas fa-trash"></i> </a>';

        $row['id_pegawai'] = $upload_berkas->id_pegawai;
        $row['id_berkas'] = $upload_berkas->id_berkas;
        $row['nm_berkas'] = $upload_berkas->nm_berkas;
        $row['upload_berkas'] = $upload_berkas->upload_berkas;
        $row['time_upload'] = $upload_berkas->time_upload;
        $data[] = $row;
    }
    $output = array(
        "data"  => $data,
    );
    echo json_encode($output);
}

public function upload_peldik_ajax_list($id_pegawai)
{
    $list = $this->pegawai->get_data_upload_peldik(decrypt_url($id_pegawai));
    $data = array();
    $no = 1;
    foreach ($list as $upload_peldik) {
        $row = array();

        $row['no'] = $no++;
        $row['button'] = '<a href="javascript:void(0)" onclick="update_upload_peldik(' . "'" . encrypt_url($upload_peldik->id_pegawai_peldik) . "'" . ')" title="Update Berkas Pegawai" class="btn-xs btn-info waves-effect waves-light"><i class="fas fa-edit"></i> </a>

        <a href="javascript:void(0)" onclick="delete_upload_peldik(' . "'" . encrypt_url($upload_peldik->id_pegawai_peldik) . "'" . ')" title="Delete Berkas Pegawai" class="btn-xs btn-danger waves-effect waves-light"><i class="fas fa-trash"></i> </a>';

        $row['id_pegawai'] = $upload_peldik->id_pegawai;
        $row['id_penyelenggara'] = $upload_peldik->id_penyelenggara_peldik_list;
        $row['nm_penyelenggara'] = $upload_peldik->nm_penyelenggara_peldik_list;
        $row['nm_peldik'] = $upload_peldik->nm_peldik;
        $row['mulai'] = $upload_peldik->tgl_peldik_mulai;
        $row['selesai'] = $upload_peldik->tgl_peldik_selesai;
        $row['waktu'] = $upload_peldik->jml_jam_peldik;
        $row['upload_peldik'] = $upload_peldik->upload_berkas;
        $row['time_upload'] = $upload_peldik->time_upload;
        $data[] = $row;
    }
    $output = array(
        "data"  => $data,
    );
    echo json_encode($output);
}

public function jjp_ajax_list($id_pegawai)
{
    $list = $this->pegawai->get_data_jjp(decrypt_url($id_pegawai));
    $data = array();
    $no = 1;

    foreach ($list as $jjp) {
        $row = array();

        $row['no'] = $no++;
        $row['button'] = '<a href="javascript:void(0)" onclick="update_jjp(' . "'" . encrypt_url($jjp->id_pegawai_jjg_pddk) . "'" . ')" title="Update Jenjang Pendidikan" class="btn-xs btn-info waves-effect waves-light"><i class="fas fa-edit"></i> </a>

        <a href="javascript:void(0)" onclick="delete_jjp(' . "'" . encrypt_url($jjp->id_pegawai_jjg_pddk) . "'" . ')" title="Delete Jenjang Pendidikan" class="btn-xs btn-danger waves-effect waves-light"><i class="fas fa-trash"></i> </a>';

        $row['id_pegawai'] = $jjp->id_pegawai;
        $row['jenjang_pendidikan'] = $jjp->jenjang_pendidikan;
        $row['nm_jenjang_pendidikan'] = $jjp->nm_jenjang_pendidikan;
        $row['jurusan'] = $jjp->jurusan;
        $row['tahun_lulus'] = $jjp->tahun_lulus;
        $row['no_ijazah'] = $jjp->no_ijazah;

        $data[] = $row;
    }

    $output = array(
        "data"  => $data,
    );

    echo json_encode($output);
}

public function delete_jjp()
{
    $id         = str_replace("'", "", $this->input->post('id'));
    $this->pegawai->delete_jjp(decrypt_url($id), 'pegawai_jjg_pddk');
    echo json_encode(array("status" => TRUE));
}

public function update()
{
    $this->_validate();
    $id                                = str_replace("'", "", $this->input->post('id_pegawai'));
    $data  = array(
        'nik'               => str_replace("'", "", $this->input->post('nik')),
        'nik_lama'          => str_replace("'", "", $this->input->post('nik_lama')),
        'nama'              => str_replace("'", "", $this->input->post('nama')),
        'nm_pgl'            => str_replace("'", "", $this->input->post('nm_pgl')),
        'gelar1'            => str_replace("'", "", $this->input->post('gelar1')),
        'gelar2'            => str_replace("'", "", $this->input->post('gelar2')),
        'jenis_kelamin'     => str_replace("'", "", $this->input->post('jenis_kelamin')),
        'tpt_lahir'         => str_replace("'", "", $this->input->post('tpt_lahir')),
        'tgl_lahir'         => str_replace("'", "", $this->input->post('tgl_lahir')),
        'gol_dar'           => str_replace("'", "", $this->input->post('gol_dar')),
        'tinggi'            => str_replace("'", "", $this->input->post('tinggi')),
        'berat'             => str_replace("'", "", $this->input->post('berat')),
        'agama'             => str_replace("'", "", $this->input->post('agama_data_pegawai')),
        'pend_terakhir'     => str_replace("'", "", $this->input->post('pend_terakhir')),
        'no_ktp'            => str_replace("'", "", $this->input->post('no_ktp')),
        'no_kk'             => str_replace("'", "", $this->input->post('no_kk')),
        'alamat_ktp'        => str_replace("'", "", $this->input->post('alamat_ktp')),
        'alamat_dom'        => str_replace("'", "", $this->input->post('alamat_dom')),
        'telpon1'           => str_replace("'", "", $this->input->post('telpon1')),
        'telpon2'           => str_replace("'", "", $this->input->post('telpon2')),
        'no_telp_keluarga'  => str_replace("'", "", $this->input->post('no_telp_keluarga')),
        'email'             => str_replace("'", "", $this->input->post('email')),
        'status_aktif'      => str_replace("'", "", $this->input->post('status_aktif')),
        'status_pegawai'    => str_replace("'", "", $this->input->post('status_pegawai')),
        'fungsi'            => str_replace("'", "", $this->input->post('fungsi')),
        'status_kwn'        => str_replace("'", "", $this->input->post('status_kwn')),
        'no_bpjs_kes'       => str_replace("'", "", $this->input->post('no_bpjs_kes')),
        'no_bpjs_tkerja'    => str_replace("'", "", $this->input->post('no_bpjs_tkerja')),
        'tgl_kerja'         => str_replace("'", "", $this->input->post('tgl_kerja')),
        'tgl_diangkat_pwtt' => str_replace("'", "", $this->input->post('tgl_diangkat_pwtt')),
        'tgl_cuti'          => str_replace("'", "", $this->input->post('tgl_cuti')),
        'id_medis'          => str_replace("'", "", $this->input->post('id_medis')),
        'no_strsip'         => str_replace("'", "", $this->input->post('strsip')),
        'tgl_strsip'        => str_replace("'", "", $this->input->post('datestrsip')),
        'gol'               => str_replace("'", "", $this->input->post('gol')),
        'no_SK'             => str_replace("'", "", $this->input->post('nomorSK')),
        'no_dplk'           => str_replace("'", "", $this->input->post('noDPLK')),
        'sgt'               => str_replace("'", "", $this->input->post('sgt')),
        'id_eselon'         => str_replace("'", "", $this->input->post('id_eselon')),
        'tmt_sgt'           => str_replace("'", "", $this->input->post('tmt_sgt')),
        'tmt_gol'           => str_replace("'", "", $this->input->post('tmt_gol')),
        'tmt_eselon'        => str_replace("'", "", $this->input->post('tmt_eselon')),
        'stat_pajak'        => str_replace("'", "", $this->input->post('stat_pajak')),
        'tk_pajak'          => str_replace("'", "", $this->input->post('tk_pajak')),
        'pjk_mulai'         => str_replace("'", "", $this->input->post('pjk_mulai')),
        'pjk_akhir'         => str_replace("'", "", $this->input->post('pjk_akhir')),
        'npwp'              => str_replace("'", "", $this->input->post('npwp')),
        'tgl_npwp'          => str_replace("'", "", $this->input->post('tgl_npwp')),
        'id_bank'           => str_replace("'", "", $this->input->post('s_bank')),
        'no_rek'            => str_replace("'", "", $this->input->post('noRek')),
        'atas_nm'          => str_replace("'", "", $this->input->post('anRek')),

        'jatah_cuti'          => str_replace("'", "", $this->input->post('jth_cuti')),

    );

        if ($this->input->post('remove_image')) // if remove image checked
        {
            if (file_exists('image/image_pegawai' . $this->input->post('remove_image')) && $this->input->post('remove_image'))
                unlink('image/image_pegawai' . $this->input->post('remove_image'));
            $data['image'] = '';
        }

        if (!empty($_FILES['image']['name'])) {
            $upload     = $this->_do_upload();
            $id_pegawai    = $this->input->post('id_pegawai');
            $pegawai       = $this->pegawai->get_by_id(decrypt_url($id_pegawai));
            if (file_exists('image/image_pegawai' . $pegawai->image) && $pegawai->image)
                unlink('image/image_pegawai' . $pegawai->image);

            $data['image'] = $upload;
        }

        $this->pegawai->update(decrypt_url($id), 'pegawai', $data);
        echo json_encode(array("status" => true));
    }

    public function delete()
    {
        $id         = str_replace("'", "", $this->input->post('id_pegawai'));
        $this->pegawai->delete(decrypt_url($id), 'pegawai');
        $this->pegawai->delete_pegawai_penempatan(decrypt_url($id), 'pegawai_penempatan');
        echo json_encode(array("status" => TRUE));
    }

    public function active()
    {
        $id         = str_replace("'", "", $this->input->post('id_pegawai'));
        // $data       = 1;
        $data  = array(
            'status_aktif'         => '1',
        );
        $this->pegawai->status_aktif(decrypt_url($id), 'pegawai', $data);
        echo json_encode(array("status" => TRUE));
    }

    public function non_active()
    {
        $this->_validate_non_active();
        $id         = str_replace("'", "", $this->input->post('id_pegawai'));
        // $data       = 1;
        $data  = array(
            'status_aktif'      => '0',
            'tgl_pengajuan'        => str_replace("'", "", $this->input->post('tgl_pengajuan')),
            'alasan_keluar'     => str_replace("'", "", $this->input->post('alasan_keluar')),
            'tgl_keluar'        => str_replace("'", "", $this->input->post('tgl_keluar')),
            'ket_keluar'        => str_replace("'", "", $this->input->post('ket_keluar')),
        );
        $this->pegawai->status_tidak_aktif(decrypt_url($id), 'pegawai', $data);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate_non_active()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('tgl_pengajuan') == '') {
            $data['inputerror'][] = 'tgl_pengajuan';
            $data['error_string'][] = 'Tanggal Pengajuan Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if ($this->input->post('alasan_keluar') == '') {
            $data['inputerror'][] = 'alasan_keluar';
            $data['error_string'][] = 'Alasan Keluar Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if ($this->input->post('tgl_keluar') == '') {
            $data['inputerror'][] = 'tgl_keluar';
            $data['error_string'][] = 'Tanggal Keluar Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if ($this->input->post('ket_keluar') == '') {
            $data['inputerror'][] = 'ket_keluar';
            $data['error_string'][] = 'Keterangan Keluar Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }
    // private function _validate()
    // {
    //     $data = array();
    //     $data['error_string'] = array();
    //     $data['inputerror'] = array();
    //     $data['status'] = TRUE;

    //     if($this->input->post('nik') == '')
    //     {
    //         $data['inputerror'][] = 'nik';
    //         $data['error_string'][] = 'NIK Tidak Boleh Kosong';
    //         $data['status'] = FALSE;
    //     }

    //     if($this->input->post('nik_lama') == '')
    //     {
    //         $data['inputerror'][] = 'nik_lama';
    //         $data['error_string'][] = 'NIK Baru Tidak Boleh Kosong';
    //         $data['status'] = FALSE;
    //     }

    //     if($this->input->post('nama') == '')
    //     {
    //         $data['inputerror'][] = 'nama';
    //         $data['error_string'][] = 'Nama Pegawai Tidak Boleh Kosong';
    //         $data['status'] = FALSE;
    //     }
    //     // if($this->input->post('gelar1') == '')
    //     // {
    //     //     $data['inputerror'][] = 'gelar1';
    //     //     $data['error_string'][] = 'Gelar1 Tidak Boleh Kosong';
    //     //     $data['status'] = FALSE;
    //     // }
    //     // if($this->input->post('gelar2') == '')
    //     // {
    //     //     $data['inputerror'][] = 'gelar2';
    //     //     $data['error_string'][] = 'Gelar2 Tidak Boleh Kosong';
    //     //     $data['status'] = FALSE;
    //     // }
    //     if($this->input->post('jenis_kelamin') == '')
    //     {
    //         $data['inputerror'][] = 'jenis_kelamin';
    //         $data['error_string'][] = 'Jenis Kelamin Tidak Boleh Kosong';
    //         $data['status'] = FALSE;
    //     }

    //     if($this->input->post('tpt_lahir') == '')
    //     {
    //         $data['inputerror'][] = 'tpt_lahir';
    //         $data['error_string'][] = 'Tempat Lahir Tidak Boleh Kosong';
    //         $data['status'] = FALSE;
    //     }
    //     if($this->input->post('tgl_lahir') == '')
    //     {
    //         $data['inputerror'][] = 'tgl_lahir';
    //         $data['error_string'][] = 'Tanggal Lahir Tidak Boleh Kosong';
    //         $data['status'] = FALSE;
    //     }
    //     if($this->input->post('gol_dar') == '')
    //     {
    //         $data['inputerror'][] = 'gol_dar';
    //         $data['error_string'][] = 'Golongan Darah Tidak Boleh Kosong';
    //         $data['status'] = FALSE;
    //     }
    //     if($this->input->post('tinggi') == '')
    //     {
    //         $data['inputerror'][] = 'tinggi';
    //         $data['error_string'][] = 'Tinggi Badan Tidak Boleh Kosong';
    //         $data['status'] = FALSE;
    //     }
    //     if($this->input->post('berat') == '')
    //     {
    //         $data['inputerror'][] = 'berat';
    //         $data['error_string'][] = 'Berat Badan Tidak Boleh Kosong';
    //         $data['status'] = FALSE;
    //     }
    //     if($this->input->post('agama') == '')
    //     {
    //         $data['inputerror'][] = 'agama';
    //         $data['error_string'][] = 'Agama Tidak Boleh Kosong';
    //         $data['status'] = FALSE;
    //     }
    //     if($this->input->post('no_ktp') == '')
    //     {
    //         $data['inputerror'][] = 'no_ktp';
    //         $data['error_string'][] = 'No KTP Tidak Boleh Kosong';
    //         $data['status'] = FALSE;
    //     }
    //     if($this->input->post('alamat_ktp') == '')
    //     {
    //         $data['inputerror'][] = 'alamat_ktp';
    //         $data['error_string'][] = 'Alamat Sesuai KTP Tidak Boleh Kosong';
    //         $data['status'] = FALSE;
    //     }
    //     if($this->input->post('alamat_dom') == '')
    //     {
    //         $data['inputerror'][] = 'alamat_dom';
    //         $data['error_string'][] = 'Alamat Domisili Tidak Boleh Kosong';
    //         $data['status'] = FALSE;
    //     }
    //     if($this->input->post('telpon1') == '')
    //     {
    //         $data['inputerror'][] = 'telpon1';
    //         $data['error_string'][] = 'Telepon Tidak Boleh Kosong';
    //         $data['status'] = FALSE;
    //     }
    //     if($this->input->post('telpon2') == '')
    //     {
    //         $data['inputerror'][] = 'telpon2';
    //         $data['error_string'][] = 'Telepon Ke-2 Tidak Boleh Kosong';
    //         $data['status'] = FALSE;
    //     }
    //      if($this->input->post('no_telp_keluarga') == '')
    //     {
    //         $data['inputerror'][] = 'no_telp_keluarga';
    //         $data['error_string'][] = 'Nomor telepon keluarga Tidak Boleh Kosong';
    //         $data['status'] = FALSE;
    //     }
    //     if($this->input->post('email') == '')
    //     {
    //         $data['inputerror'][] = 'email';
    //         $data['error_string'][] = 'Alamat e-mail Tidak Boleh Kosong';
    //         $data['status'] = FALSE;
    //     }
    //     if($this->input->post('status_aktif') == '')
    //     {
    //         $data['inputerror'][] = 'status_aktif';
    //         $data['error_string'][] = 'Status Aktif Tidak Boleh Kosong';
    //         $data['status'] = FALSE;
    //     }
    //     // if($this->input->post('tgl_pengajuan') == '')
    //     // {
    //     //     $data['inputerror'][] = 'tgl_pengajuan';
    //     //     $data['error_string'][] = 'Tidak Boleh Kosong';
    //     //     $data['status'] = FALSE;
    //     // }
    //     // if($this->input->post('tgl_keluar') == '')
    //     // {
    //     //     $data['inputerror'][] = 'tgl_keluar';
    //     //     $data['error_string'][] = 'Tidak Boleh Kosong';
    //     //     $data['status'] = FALSE;
    //     // }
    //     // if($this->input->post('alasan_keluar') == '')
    //     // {
    //     //     $data['inputerror'][] = 'alasan_keluar';
    //     //     $data['error_string'][] = 'Tidak Boleh Kosong';
    //     //     $data['status'] = FALSE;
    //     // }
    //     // if($this->input->post('ket_keluar') == '')
    //     // {
    //     //     $data['inputerror'][] = 'ket_keluar';
    //     //     $data['error_string'][] = 'Tidak Boleh Kosong';
    //     //     $data['status'] = FALSE;
    //     // }
    //     if($this->input->post('status_pegawai') == '')
    //     {
    //         $data['inputerror'][] = 'status_pegawai';
    //         $data['error_string'][] = 'Tidak Boleh Kosong';
    //         $data['status'] = FALSE;
    //     }
    //     if($this->input->post('fungsi') == '')
    //     {
    //         $data['inputerror'][] = 'fungsi';
    //         $data['error_string'][] = 'Tidak Boleh Kosong';
    //         $data['status'] = FALSE;
    //     }
    //     // if($this->input->post('lokasi') == '')
    //     // {
    //     //     $data['inputerror'][] = 'lokasi';
    //     //     $data['error_string'][] = 'Tidak Boleh Kosong';
    //     //     $data['status'] = FALSE;
    //     // }
    //     if($this->input->post('status_kwn') == '')
    //     {
    //         $data['inputerror'][] = 'status_kwn';
    //         $data['error_string'][] = 'Tidak Boleh Kosong';
    //         $data['status'] = FALSE;
    //     }
    //     if($this->input->post('no_bpjs_kes') == '')
    //     {
    //         $data['inputerror'][] = 'no_bpjs_kes';
    //         $data['error_string'][] = 'Tidak Boleh Kosong';
    //         $data['status'] = FALSE;
    //     }
    //     if($this->input->post('no_bpjs_tkerja') == '')
    //     {
    //         $data['inputerror'][] = 'no_bpjs_tkerja';
    //         $data['error_string'][] = 'Tidak Boleh Kosong';
    //         $data['status'] = FALSE;
    //     }
    //     if($this->input->post('tgl_kerja') == '')
    //     {
    //         $data['inputerror'][] = 'tgl_kerja';
    //         $data['error_string'][] = 'Tidak Boleh Kosong';
    //         $data['status'] = FALSE;
    //     }
    //     if($this->input->post('tgl_diangkat_pwtt') == '')
    //     {
    //         $data['inputerror'][] = 'tgl_diangkat_pwtt';
    //         $data['error_string'][] = 'Tidak Boleh Kosong';
    //         $data['status'] = FALSE;
    //     }
    //     if($this->input->post('tgl_cuti') == '')
    //     {
    //         $data['inputerror'][] = 'tgl_cuti';
    //         $data['error_string'][] = 'Tidak Boleh Kosong';
    //         $data['status'] = FALSE;
    //     }
    //     // if($this->input->post('masa_kerja') == '')
    //     // {
    //     //     $data['inputerror'][] = 'masa_kerja';
    //     //     $data['error_string'][] = 'Tidak Boleh Kosong';
    //     //     $data['status'] = FALSE;
    //     // }
    //     if($this->input->post('id_medis') == '')
    //     {
    //         $data['inputerror'][] = 'id_medis';
    //         $data['error_string'][] = 'Tidak Boleh Kosong';
    //         $data['status'] = FALSE;
    //     }
    //     if($this->input->post('gol') == '')
    //     {
    //         $data['inputerror'][] = 'gol';
    //         $data['error_string'][] = 'Tidak Boleh Kosong';
    //         $data['status'] = FALSE;
    //     }
    //     if($this->input->post('sgt') == '')
    //     {
    //         $data['inputerror'][] = 'sgt';
    //         $data['error_string'][] = 'Tidak Boleh Kosong';
    //         $data['status'] = FALSE;
    //     }
    //     if($this->input->post('id_eselon') == '')
    //     {
    //         $data['inputerror'][] = 'id_eselon';
    //         $data['error_string'][] = 'Tidak Boleh Kosong';
    //         $data['status'] = FALSE;
    //     }
    //     if($this->input->post('tmt_sgt') == '')
    //     {
    //         $data['inputerror'][] = 'tmt_sgt';
    //         $data['error_string'][] = 'Tidak Boleh Kosong';
    //         $data['status'] = FALSE;
    //     }
    //     if($this->input->post('tmt_gol') == '')
    //     {
    //         $data['inputerror'][] = 'tmt_gol';
    //         $data['error_string'][] = 'Tidak Boleh Kosong';
    //         $data['status'] = FALSE;
    //     }
    //     if($this->input->post('tmt_eselon') == '')
    //     {
    //         $data['inputerror'][] = 'tmt_eselon';
    //         $data['error_string'][] = 'Tidak Boleh Kosong';
    //         $data['status'] = FALSE;
    //     }
    //     if($this->input->post('stat_pajak') == '')
    //     {
    //         $data['inputerror'][] = 'stat_pajak';
    //         $data['error_string'][] = 'Tidak Boleh Kosong';
    //         $data['status'] = FALSE;
    //     }
    //     if($this->input->post('tk_pajak') == '')
    //     {
    //         $data['inputerror'][] = 'tk_pajak';
    //         $data['error_string'][] = 'Tidak Boleh Kosong';
    //         $data['status'] = FALSE;
    //     }
    //     if($this->input->post('pjk_mulai') == '')
    //     {
    //         $data['inputerror'][] = 'pjk_mulai';
    //         $data['error_string'][] = 'Tidak Boleh Kosong';
    //         $data['status'] = FALSE;
    //     }
    //     if($this->input->post('pjk_akhir') == '')
    //     {
    //         $data['inputerror'][] = 'pjk_akhir';
    //         $data['error_string'][] = 'Tidak Boleh Kosong';
    //         $data['status'] = FALSE;
    //     }
    //     if($this->input->post('npwp') == '')
    //     {
    //         $data['inputerror'][] = 'npwp';
    //         $data['error_string'][] = 'Tidak Boleh Kosong';
    //         $data['status'] = FALSE;
    //     }
    //     if($this->input->post('tgl_npwp') == '')
    //     {
    //         $data['inputerror'][] = 'tgl_npwp';
    //         $data['error_string'][] = 'Tidak Boleh Kosong';
    //         $data['status'] = FALSE;
    //     }
    //     if($data['status'] === FALSE)
    //     {
    //         echo json_encode($data);
    //         exit();
    //     }
    // }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('nik') == '') {
            $data['inputerror'][] = 'nik';
            $data['error_string'][] = 'NIK Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if ($this->input->post('nik_lama') == '') {
            $data['inputerror'][] = 'nik_lama';
            $data['error_string'][] = 'NIK Baru Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if ($this->input->post('nama') == '') {
            $data['inputerror'][] = 'nama';
            $data['error_string'][] = 'Nama Pegawai Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        
        if ($this->input->post('nm_pgl') == '') {
            $data['inputerror'][] = 'nm_pgl';
            $data['error_string'][] = 'Nama Panggilan Tidak Boleh Kosong';
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
        if ($this->input->post('jenis_kelamin') == '') {
            $data['inputerror'][] = 'jenis_kelamin';
            $data['error_string'][] = 'Jenis Kelamin Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if ($this->input->post('tpt_lahir') == '') {
            $data['inputerror'][] = 'tpt_lahir';
            $data['error_string'][] = 'Tempat Lahir Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($this->input->post('tgl_lahir') == '') {
            $data['inputerror'][] = 'tgl_lahir';
            $data['error_string'][] = 'Tanggal Lahir Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($this->input->post('gol_dar') == '') {
            $data['inputerror'][] = 'gol_dar';
            $data['error_string'][] = 'Golongan Darah Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($this->input->post('tinggi') == '') {
            $data['inputerror'][] = 'tinggi';
            $data['error_string'][] = 'Tinggi Badan Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($this->input->post('berat') == '') {
            $data['inputerror'][] = 'berat';
            $data['error_string'][] = 'Berat Badan Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($this->input->post('agama_data_pegawai') == '') {
            $data['inputerror'][] = 'agama_data_pegawai';
            $data['error_string'][] = 'Agama Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if ($this->input->post('pend_terakhir') == '') {
            $data['inputerror'][] = 'pend_terakhir';
            $data['error_string'][] = 'Pendidikan Terakhir Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if ($this->input->post('no_ktp') == '') {
            $data['inputerror'][] = 'no_ktp';
            $data['error_string'][] = 'No KTP Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if ($this->input->post('no_kk') == '') {
            $data['inputerror'][] = 'no_kk';
            $data['error_string'][] = 'No KK Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if ($this->input->post('alamat_ktp') == '') {
            $data['inputerror'][] = 'alamat_ktp';
            $data['error_string'][] = 'Alamat Sesuai KTP Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($this->input->post('alamat_dom') == '') {
            $data['inputerror'][] = 'alamat_dom';
            $data['error_string'][] = 'Alamat Domisili Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($this->input->post('telpon1') == '') {
            $data['inputerror'][] = 'telpon1';
            $data['error_string'][] = 'Telepon Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($this->input->post('telpon2') == '') {
            $data['inputerror'][] = 'telpon2';
            $data['error_string'][] = 'Telepon Ke-2 Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($this->input->post('no_telp_keluarga') == '') {
            $data['inputerror'][] = 'no_telp_keluarga';
            $data['error_string'][] = 'Nomor telepon keluarga Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($this->input->post('email') == '') {
            $data['inputerror'][] = 'email';
            $data['error_string'][] = 'Alamat e-mail Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        // if($this->input->post('status_aktif') == '')
        // {
        //     $data['inputerror'][] = 'status_aktif';
        //     $data['error_string'][] = 'Status Aktif Tidak Boleh Kosong';
        //     $data['status'] = FALSE;
        // }
        // if($this->input->post('tgl_pengajuan') == '')
        // {
        //     $data['inputerror'][] = 'tgl_pengajuan';
        //     $data['error_string'][] = 'Tidak Boleh Kosong';
        //     $data['status'] = FALSE;
        // }
        // if($this->input->post('tgl_keluar') == '')
        // {
        //     $data['inputerror'][] = 'tgl_keluar';
        //     $data['error_string'][] = 'Tidak Boleh Kosong';
        //     $data['status'] = FALSE;
        // }
        // if($this->input->post('alasan_keluar') == '')
        // {
        //     $data['inputerror'][] = 'alasan_keluar';
        //     $data['error_string'][] = 'Tidak Boleh Kosong';
        //     $data['status'] = FALSE;
        // }
        // if($this->input->post('ket_keluar') == '')
        // {
        //     $data['inputerror'][] = 'ket_keluar';
        //     $data['error_string'][] = 'Tidak Boleh Kosong';
        //     $data['status'] = FALSE;
        // }
        if ($this->input->post('status_pegawai') == '') {
            $data['inputerror'][] = 'status_pegawai';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($this->input->post('fungsi') == '') {
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
        if ($this->input->post('status_kwn') == '') {
            $data['inputerror'][] = 'status_kwn';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($this->input->post('no_bpjs_kes') == '') {
            $data['inputerror'][] = 'no_bpjs_kes';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($this->input->post('no_bpjs_tkerja') == '') {
            $data['inputerror'][] = 'no_bpjs_tkerja';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($this->input->post('tgl_kerja') == '') {
            $data['inputerror'][] = 'tgl_kerja';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($this->input->post('tgl_diangkat_pwtt') == '') {
            $data['inputerror'][] = 'tgl_diangkat_pwtt';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($this->input->post('tgl_cuti') == '') {
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
        if ($this->input->post('id_medis') == '') {
            $data['inputerror'][] = 'id_medis';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if ($this->input->post('datestrsip') == '') {
            $data['inputerror'][] = 'datestrsip';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if ($this->input->post('noDPLK') == '') {
            $data['inputerror'][] = 'noDPLK';
            $data['error_string'][] = 'Nomor DPLK Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        // if($this->input->post('strsip') == '')
        // {
        //     $data['inputerror'][] = 'strsip';
        //     $data['error_string'][] = 'STR SIP Tidak Boleh Kosong';
        //     $data['status'] = FALSE;
        // }

        if ($this->input->post('gol') == '') {
            $data['inputerror'][] = 'gol';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($this->input->post('sgt') == '') {
            $data['inputerror'][] = 'sgt';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($this->input->post('id_eselon') == '') {
            $data['inputerror'][] = 'id_eselon';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($this->input->post('tmt_sgt') == '') {
            $data['inputerror'][] = 'tmt_sgt';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($this->input->post('tmt_gol') == '') {
            $data['inputerror'][] = 'tmt_gol';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($this->input->post('tmt_eselon') == '') {
            $data['inputerror'][] = 'tmt_eselon';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($this->input->post('stat_pajak') == '') {
            $data['inputerror'][] = 'stat_pajak';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($this->input->post('tk_pajak') == '') {
            $data['inputerror'][] = 'tk_pajak';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($this->input->post('pjk_mulai') == '') {
            $data['inputerror'][] = 'pjk_mulai';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($this->input->post('pjk_akhir') == '') {
            $data['inputerror'][] = 'pjk_akhir';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($this->input->post('npwp') == '') {
            $data['inputerror'][] = 'npwp';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($this->input->post('tgl_npwp') == '') {
            $data['inputerror'][] = 'tgl_npwp';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if ($this->input->post('s_bank') == '') {
            $data['inputerror'][] = 's_bank';
            $data['error_string'][] = 'Nama Bank Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if ($this->input->post('noRek') == '') {
            $data['inputerror'][] = 'noRek';
            $data['error_string'][] = 'Nomor Rekening Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if ($this->input->post('anRek') == '') {
            $data['inputerror'][] = 'anRek';
            $data['error_string'][] = 'Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }
    private function _validate_penempatan_pegawai()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('id_unit_level') == '') {
            $data['inputerror'][] = 'id_unit_level';
            $data['error_string'][] = 'ID Unit Level Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if ($this->input->post('nm_unit_level') == '') {
            $data['inputerror'][] = 'nm_unit_level';
            $data['error_string'][] = 'Nama Unit Level Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if ($this->input->post('id_unit_usaha') == '') {
            $data['inputerror'][] = 'id_unit_usaha';
            $data['error_string'][] = 'ID Unit Usaha Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($this->input->post('nm_unit_usaha') == '') {
            $data['inputerror'][] = 'nm_unit_usaha';
            $data['error_string'][] = 'Nama Unit Usaha Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }


        if ($this->input->post('id_unit_organisasi') == '') {
            $data['inputerror'][] = 'id_unit_organisasi';
            $data['error_string'][] = 'ID Unit Organisasi Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($this->input->post('nm_unit_organisasi') == '') {
            $data['inputerror'][] = 'nm_unit_organisasi';
            $data['error_string'][] = 'Nama Unit Organisasi Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if ($this->input->post('id_unit_kerja') == '') {
            $data['inputerror'][] = 'id_unit_kerja';
            $data['error_string'][] = 'ID Unit Kerja Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if ($this->input->post('nm_unit_kerja') == '') {
            $data['inputerror'][] = 'nm_unit_kerja';
            $data['error_string'][] = 'Nama Unit Kerja Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if ($this->input->post('id_unit_kerja_sub') == '') {
            $data['inputerror'][] = 'id_unit_kerja_sub';
            $data['error_string'][] = 'ID Sub Unit Kerja Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if ($this->input->post('nm_unit_kerja_sub') == '') {
            $data['inputerror'][] = 'nm_unit_kerja_sub';
            $data['error_string'][] = 'Nama Sub Unit Kerja Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }
    private function _validate_jjp_pegawai()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('id_pegawai') == '') {
            $data['inputerror'][] = 'id_pegawai';
            $data['error_string'][] = 'ID Pegawai Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if ($this->input->post('jenjang_pendidikan') == '') {
            $data['inputerror'][] = 'jenjang_pendidikan';
            $data['error_string'][] = 'Jenjang Pendidikan Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if ($this->input->post('nm_jenjang_pendidikan') == '') {
            $data['inputerror'][] = 'nm_jenjang_pendidikan';
            $data['error_string'][] = 'Nama Jenjang Pendidikan Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if ($this->input->post('jurusan') == '') {
            $data['inputerror'][] = 'jurusan';
            $data['error_string'][] = 'Nama Jurusan Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if ($this->input->post('tahun_lulus') == '') {
            $data['inputerror'][] = 'tahun_lulus';
            $data['error_string'][] = 'Tahun Lulus Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if ($this->input->post('no_ijazah') == '') {
            $data['inputerror'][] = 'no_ijazah';
            $data['error_string'][] = 'Nomor Ijazah Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    private function _validate_pegawai_keluarga()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('id_pegawai') == '') {
            $data['inputerror'][] = 'id_pegawai';
            $data['error_string'][] = 'ID Pegawai Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if ($this->input->post('nama_ibu') == '') {
            $data['inputerror'][] = 'nama_ibu';
            $data['error_string'][] = 'Nama Ibu Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if ($this->input->post('pekerjaan_ibu') == '') {
            $data['inputerror'][] = 'pekerjaan_ibu';
            $data['error_string'][] = 'Pekerjaan Ibu Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if ($this->input->post('nama_ayah') == '') {
            $data['inputerror'][] = 'nama_ayah';
            $data['error_string'][] = 'Nama Ayah Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if ($this->input->post('pekerjaan_ayah') == '') {
            $data['inputerror'][] = 'pekerjaan_ayah';
            $data['error_string'][] = 'Pekerjaan Ayah Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    public function get_berkas_list()
    {
        $data = $this->pegawai->get_berkas_list();
        echo json_encode($data);
        exit;
    }

    public function get_penyelenggara_list()
    {
        $data = $this->pegawai->get_penyelenggara_list();
        echo json_encode($data);
        exit;
    }

    public function tambah_data_berkas()
    {
        $this->_validate_upload_berkas();
        $config['upload_path'] = "./image/berkas_pegawai";
        $config['allowed_types'] = 'pdf';
        $config['encrypt_name'] = TRUE;
        $config['overwrite'] = FALSE;
        $config["max_size"] = 4096;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        //get Payload
        $upload = $this->upload->do_upload("berkasPegawai");

        //id_berkas_pegawai

        $this->db->select_max('id_pegawai_berkas');
        $lastID = $this->db->get('pegawai_berkas')->row()->id_pegawai_berkas;
        if ($lastID != null) {
            $newID = substr($lastID, 3);
            $newID += 1;
            if (strlen($newID) == 1) {
                $id_pegawai_berkas = "PB_00000" . $newID;
            } else if (strlen($newID) == 2) {
                $id_pegawai_berkas = "PB_0000" . $newID;
            } else if (strlen($newID) == 3) {
                $id_pegawai_berkas = "PB_000" . $newID;
            } else if (strlen($newID) == 4) {
                $id_pegawai_berkas = "PB_00" . $newID;
            } else if (strlen($newID) == 5) {
                $id_pegawai_berkas = "PB_0" . $newID;
            } else {
                $id_pegawai_berkas = "PB_" . $newID;
            }
        } else {
            $id_pegawai_berkas = "PB_000001";
        }

        $fileData = $this->upload->data();
        //
        if (!$upload) {
            $status = FALSE;
            $msg = $this->upload->display_errors("", "");
        } else {
            $status = TRUE;
            $msg = "Berkas Berhasil dihapus";
            $data = [
                'id_pegawai_berkas' => $id_pegawai_berkas,
                'id_pegawai' => decrypt_url($this->input->post('id_pegawai')),
                'id_berkas' => $this->input->post('namaBerkas'),
                'upload_berkas' => $fileData['file_name'],
                'time_upload' => date("Y-m-d H:i:s")
            ];

            $insert = $this->pegawai->insert("pegawai_berkas", $data);
        }

        echo json_encode(array("status" => $status, "msg" => $msg));
    }

    public function _validate_upload_berkas() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('namaBerkas') == '') {
            $data['inputerror'][] = 'namaBerkas';
            $data['error_string'][] = 'Nama Berkas Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if ($this->input->post('berkasPegawai') == '') {
            $data['inputerror'][] = 'berkasPegawai';
            $data['error_string'][] = 'Pilih File Untuk Di Upload';
            $data['status'] = FALSE;
        }
        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    public function tambah_data_peldik()
    {
        $config['upload_path'] = "./image/berkas_peldik";
        $config['allowed_types'] = 'pdf';
        $config['encrypt_name'] = TRUE;
        $config['overwrite'] = FALSE;
        $config["max_size"] = 4096;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        //get Payload
        $upload = $this->upload->do_upload("peldikPegawai");


        $fileData = $this->upload->data();
        if (!$upload) {
            $status = FALSE;
            $msg = $this->upload->display_errors("", "");
        } else {
            $status = TRUE;
            $msg = "Berkas Berhasil dihapus";
            $data = [
                'id_pegawai' => decrypt_url($this->input->post('id_pegawai')),
                'id_penyelenggara_peldik_list' => $this->input->post('namaPenyelenggara'),
                'nm_peldik' => $this->input->post('namaPeldik'),
                'tgl_peldik_mulai' => $this->input->post('tglMulai'),
                'tgl_peldik_selesai' => $this->input->post('tglSelesai'),
                'jml_jam_peldik' => $this->input->post('waktu'),
                'upload_berkas' => $fileData['file_name'],
                'time_upload' => date("Y-m-d H:i:s")
            ];

            $insert = $this->pegawai->insert("pegawai_peldik", $data);
        }

        echo json_encode(array("status" => $status, "msg" => $msg));
    }

    private function _getFileName($id)
    {
        return $this->db->get_where('pegawai_berkas', array('id_pegawai_berkas' => $id))->row()->upload_berkas;
    }

    private function _getFileNamepeldik($id)
    {
        return $this->db->get_where('pegawai_peldik', array('id_pegawai_peldik' => $id))->row()->upload_berkas;
    }

    public function delete_upload_berkas()
    {
        $fileName = null;
        $id = decrypt_url($this->input->post('id'));

        $fileName = $this->_getFileName($id);
        if ($fileName != null) {
            unlink("./image/berkas_peldik/" . $fileName);
            $this->pegawai->delete_upload_berkas($id);

            echo json_encode(array("status" => TRUE));
        } else {
            echo json_encode(array("status" => FALSE));
        }
    }

    public function delete_upload_peldik()
    {
        $fileName = null;
        $id = decrypt_url($this->input->post('id'));

        $fileName = $this->_getFileNamepeldik($id);
        if ($fileName != null) {
            unlink("./image/berkas_peldik/" . $fileName);
            $this->pegawai->delete_upload_peldik($id);

            echo json_encode(array("status" => TRUE));
        } else {
            echo json_encode(array("status" => FALSE));
        }
    }

    public function getUploadPeldikbyID()
    {
        $id = decrypt_url($this->input->post('id'));
        $q = $this->db->get_where('pegawai_peldik', array('id_pegawai_peldik'  => $id))->row_array();
        if (count($q) > 0) {
            $q = $q;
            $q['status_dt'] = "true";
        } else {
            $q = null;
            $q['status_dt'] = "false";
        }
        echo json_encode($q);
    }

    public function getUploadBerkasbyID()
    {
        $id = decrypt_url($this->input->post('id'));
        $q = $this->db->get_where('pegawai_berkas', array('id_pegawai_berkas'  => $id))->row_array();

        if (count($q) > 0) {
            $q = $q;
            $q['status_dt'] = "true";
        } else {
            $q = null;
            $q['status_dt'] = "false";
        }
        echo json_encode($q);
    }

    public function update_data_upload_berkas()
    {
        $id = $this->input->post('id_berkas_pegawai');
        $fileName = null;
        $config['upload_path'] = "./image/berkas_pegawai";
        $config['allowed_types'] = 'pdf|PDF';
        $config['encrypt_name'] = TRUE;
        $config['overwrite'] = FALSE;
        $config["max_size"] = 4096;


        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        //get Payload
        $upload = $this->upload->do_upload("berkasPegawai");
        $fileName = $this->_getFileName($id);
        if (!$upload) {
            $status = FALSE;
            $msg = $this->upload->display_errors("", "");
        } else {
            if ($fileName != null) {
                unlink("./image/berkas_pegawai/" . $fileName);
            }
            $status = TRUE;
            $msg = "Berkas Berhasil diupload";
            $fileData = $this->upload->data();
            $data = [
                'id_pegawai' => decrypt_url($this->input->post('id_pegawai')),
                'id_berkas' => $this->input->post('namaBerkas'),
                'upload_berkas' => $fileData['file_name'],
                'time_upload' => date("Y-m-d H:i:s")
            ];
            $insert = $this->pegawai->update_berkas_pegawai($id, $data);
        }
        echo json_encode(array("status" => $status, "msg" => $msg));
    }

    public function update_data_upload_peldik()
    {
        $id = $this->input->post('id_pegawai_peldik');
        $fileName = null;
        $config['upload_path'] = "./image/berkas_peldik";
        $config['allowed_types'] = 'pdf|PDF';
        $config['encrypt_name'] = TRUE;
        $config['overwrite'] = FALSE;
        $config["max_size"] = 4096;


        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        //get Payload
        $upload = $this->upload->do_upload("peldikPegawai");
        $fileName = $this->_getFileNamepeldik($id);
        if (!$upload) {
            $status = FALSE;
            $msg = $this->upload->display_errors("", "");
        } else {
            if ($fileName != null) {
                unlink("./image/berkas_peldik/" . $fileName);
            }
            $status = TRUE;
            $msg = "Berkas Berhasil diupload";
            $fileData = $this->upload->data();
            $data = [
                'id_pegawai' => decrypt_url($this->input->post('id_pegawai')),
                'id_penyelenggara_peldik_list' => $this->input->post('namaPenyelenggara'),
                'nm_peldik' => $this->input->post('namaPeldik'),
                'tgl_peldik_mulai' => $this->input->post('tglMulai'),
                'tgl_peldik_selesai' => $this->input->post('tglSelesai'),
                'jml_jam_peldik' => $this->input->post('waktu'),
                'upload_berkas' => $fileData['file_name'],
                'time_upload' => date("Y-m-d H:i:s")
            ];
            $insert = $this->pegawai->update_peldik_pegawai($id, $data);
        }
        echo json_encode(array("status" => $status, "msg" => $msg));
    }

    public function get_list_medis()
    {
        $data = $this->pegawai->get_select_list('medis_list');
        echo json_encode($data);
    }

    public function get_list_bank()
    {
        $data = $this->pegawai->get_select_list('bank_list');
        echo json_encode($data);
    }

    public function search()
    {

        header('Content-type: application/json');
        $this->db->select('m_pasien.*, concat(m_pasien.nm_pasien, " | ", m_pasien.alamat) as alamat_pasien');
        $this->db->from('m_pasien');
        $s = $this->db->escape_like_str($this->input->get('s'));

        $sChunk = explode(" ", $s);
        $tglLahirRaw = str_replace('/', '-', array_shift($sChunk));
        $tglLahir = date('Y-m-d', strtotime($tglLahirRaw));

        if (strtotime($tglLahirRaw) !== FALSE && (stripos($tglLahirRaw, '-') !== FALSE || stripos($tglLahirRaw, '/') !== FALSE)) {
            $this->db->where("DATE(tgl_lahir) = DATE('{$tglLahir}')", null, FALSE);

            if (count($sChunk) > 0) {
                $s = implode(" ", $sChunk);
            } else {
                $s = "";
            }
        }

        $this->db->where("(no_rekam_medis LIKE '%{$s}%' OR nama LIKE '%{$s}%' OR alamat LIKE '%{$s}%')", null, FALSE);
        // $this->db->like('no_rekam_medis', $this->db->escape_like_str($this->input->get('s')));
        // $this->db->or_like('nama', $this->db->escape_like_str($this->input->get('s')));
        // $this->db->or_like('alamat', $this->db->escape_like_str($this->input->get('s')));
        if ($this->config->item('unit_usaha_kode') != '02') {
            $this->db->limit(100);
        } else {
            $this->db->limit(100);
        }
        $data = $this->db->get()->result();

        echo json_encode([
            'results' => $data
        ]);
    }

    public function insert_data_tanggungan_pegawai()
    {
        $this->_validate_data_tanggungan();
        $id                                     = str_replace("'", "", $this->input->post('id_pegawai'));
        $data  = array(
            'id_tanggungan'     => $this->id_pegawai_tanggungan_pddkOtomatis(),
            'id_pegawai'        => decrypt_url($id),
            'nama_tanggungan'   => str_replace("'", "", $this->input->post('nama_tanggungan')),
            'hubungan'          => str_replace("'", "", $this->input->post('hubungan')),
            'no_ktp'            => str_replace("'", "", $this->input->post('no_ktp')),
            'tempat_lahir'      => str_replace("'", "", $this->input->post('tempat_lahir')),
            'tgl_lahir'         => str_replace("'", "", $this->input->post('tgl_lahir')),
            'agama'             => str_replace("'", "", $this->input->post('agama_tanggungan')),
            'pendidikan'        => str_replace("'", "", $this->input->post('pendidikan')),
            'pekerjaan'         => str_replace("'", "", $this->input->post('pekerjaan')),
            'golongan_darah'    => str_replace("'", "", $this->input->post('golongan_darah')),

        );

        $insert = $this->pegawai->insert_data_tanggungan("pegawai_tanggungan", $data);
        echo json_encode(array("status" => TRUE));
    }


    public function update_data_tanggungan()
    {
        $this->_validate_data_tanggungan();
        $id_tanggungan                                 = str_replace("'", "", $this->input->post('id_tanggungan'));
        $data  = array(
            'nama_tanggungan'    => str_replace("'", "", $this->input->post('nama_tanggungan')),
            'hubungan' => str_replace("'", "", $this->input->post('hubungan')),
            'no_ktp'               => str_replace("'", "", $this->input->post('no_ktp')),
            'tempat_lahir' => str_replace("'", "", $this->input->post('tempat_lahir')),
            'agama'               => str_replace("'", "", $this->input->post('agama_tanggungan')),
            'pendidikan'           => str_replace("'", "", $this->input->post('pendidikan')),
            'pekerjaan'             => str_replace("'", "", $this->input->post('pekerjaan')),
            'golongan_darah'             => str_replace("'", "", $this->input->post('golongan_darah')),

        );


        $this->pegawai->update_data_tanggungan($id_tanggungan, 'pegawai_tanggungan', $data);
        echo json_encode(array("status" => true));
    }


    public function get_DataEdit_Tanggungan_by_id($id)
    {
        $db = $this->pegawai->get_data_tanggungan_pegawai(decrypt_url($id));
        if (count($db) > 0) {
            $db = $db;
            $db['status_dt'] = true;
        } else {
            $db = null;
            $db['status_dt'] = false;
        }
        echo json_encode($db);
    }


    public function get_cek_tanggungan_by_id($id_pegawai)
    {
        $cek_tanggungan = $this->pegawai->get_cek_tanggungan_by_id(decrypt_url($id_pegawai));
        if ($cek_tanggungan->num_rows() > 0) {
            $data['cek_tanggungan_by_id'] = true;
            $data['id_pegawai'] = $id_pegawai;;
        } else {
            $data['id_pegawai'] = $id_pegawai;;
        }
        echo json_encode($data);
    }

    public function get_tanggungan_by_id($id_pegawai)
    {
        $data = $this->pegawai->get_tanggungan_by_id(decrypt_url($id_pegawai));

        echo json_encode($data);
    }


    public function tanggungan_ajax_list($id_pegawai)
    {
        $list = $this->pegawai->get_data_tanggungan(decrypt_url($id_pegawai));
        $data = array();
        $no = 1;
        foreach ($list as $data_tanggungan) {
            $row = array();

            $row['no'] = $no++;
            $row['button'] = '<a href="javascript:void(0)" onclick="update_tanggungan(' . "'" . encrypt_url($data_tanggungan->id_tanggungan) . "'" . ')" title="Update Data Tanggungan" class="btn-xs btn-info waves-effect waves-light"><i class="fas fa-edit"></i> </a>

            <a href="javascript:void(0)" onclick="delete_tanggungan(' . "'" . encrypt_url($data_tanggungan->id_tanggungan) . "'" . ')" title="Delete Data Tanggungan" class="btn-xs btn-danger waves-effect waves-light"><i class="fas fa-trash"></i> </a>';

            // $row['id_pegawai'] = $data_tanggungan->id_pegawai;
            $row['id_tanggungan'] = $data_tanggungan->id_tanggungan;
            $row['nama_tanggungan'] = $data_tanggungan->nama_tanggungan;
            $row['hubungan'] = $data_tanggungan->hubungan;
            $row['no_ktp'] = $data_tanggungan->no_ktp;
            $row['tempat_lahir'] = $data_tanggungan->tempat_lahir;
            $row['tgl_lahir'] = $data_tanggungan->tgl_lahir;
            $row['agama'] = $data_tanggungan->agama;
            $row['pendidikan'] = $data_tanggungan->pendidikan;
            $row['pekerjaan'] = $data_tanggungan->pekerjaan;
            $row['golongan_darah'] = $data_tanggungan->golongan_darah;
            $data[] = $row;
        }
        $output = array(
            "data"  => $data,
        );
        echo json_encode($output);
    }

    public function delete_tanggungan()
    {
        $id         = str_replace("'", "", $this->input->post('id'));
        $this->pegawai->delete_tanggungan(decrypt_url($id), 'pegawai_tanggungan');
        echo json_encode(array("status" => TRUE));
    }

    private function _validate_data_tanggungan()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('id_pegawai') == '') {
            $data['inputerror'][] = 'id_pegawai';
            $data['error_string'][] = 'ID Pegawai Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if ($this->input->post('nama_tanggungan') == '') {
            $data['inputerror'][] = 'nama_tanggungan';
            $data['error_string'][] = 'Nama Tanggungan Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if ($this->input->post('hubungan') == '') {
            $data['inputerror'][] = 'hubungan';
            $data['error_string'][] = 'Hubungan Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if ($this->input->post('no_ktp') == '') {
            $data['inputerror'][] = 'no_ktp';
            $data['error_string'][] = 'Nomor KTP Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if ($this->input->post('tempat_lahir') == '') {
            $data['inputerror'][] = 'tempat_lahir';
            $data['error_string'][] = 'Tempat Lahir Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($this->input->post('tgl_lahir') == '') {
            $data['inputerror'][] = 'tgl_lahir';
            $data['error_string'][] = 'Tanggal Lahir Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($this->input->post('agama_tanggungan') == '') {
            $data['inputerror'][] = 'agama_tanggungan';
            $data['error_string'][] = 'Agama Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($this->input->post('pendidikan') == '') {
            $data['inputerror'][] = 'pendidikan';
            $data['error_string'][] = 'Pendidikan Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($this->input->post('pekerjaan') == '') {
            $data['inputerror'][] = 'pekerjaan';
            $data['error_string'][] = 'Pekerjaan Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($this->input->post('golongan_darah') == '') {
            $data['inputerror'][] = 'golongan_darah';
            $data['error_string'][] = 'Golongan Darah Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    private function id_pegawai_tanggungan_pddkOtomatis()
    {
        $ci         = get_instance();
        $query      = "SELECT MAX(CAST((substr(id_tanggungan,4)) as unsigned)) as maxKode from pegawai_tanggungan";
        $data       = $ci->db->query($query)->row();
        $kode       = $data->maxKode;
        $kodeBaru   = $kode + 1;
        $id         = 'TG_' . $kodeBaru;
        return $id;
    }

    public function _getImg($idPeg)
    {
        $db = $this->db->get_where('pegawai', ['id_pegawai' => $idPeg])->row()->image;
        return $db;
    }

    private function deleteImages($idpeg)
    {
        if (file_exists("./image/image_pegawai/" . $this->_getImg($idpeg))) {
            unlink("./image/image_pegawai/" . $this->_getImg($idpeg));
        } else {
            return false;
        }
    }

    public function changePhoto()
    {
        $config['upload_path'] = "./image/image_pegawai";
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->load->library('image_lib');
        $up = $this->upload->do_upload("filefoto");
        $idpeg = decrypt_url($this->input->post('idpwg'));
        $fileData = $this->upload->data();
        $fileName = $fileData['file_name'];
        if ($up) {
            $this->deleteImages($idpeg);
            $db = $this->pegawai->changeProfile($idpeg, $fileName);
            $configer =  array(
                'image_library'   => 'gd2',
                'source_image'    =>  $fileData['full_path'],
                'maintain_ratio'  =>  TRUE,
                'width'           =>  250,
                'height'          =>  250,
            );
            $this->image_lib->clear();
            $this->image_lib->initialize($configer);
            $this->image_lib->resize();
            $out['status'] = "sukses";
        } else {
            $db = $this->Pegawai->changeProfile($idpeg, $this->_getImg($idpeg));
            $out['status'] = "gagal";
            $out['msg'] = $this->upload->display_errors();
        }
        echo json_encode($out);
    }

    private function jumlah_jatah_cuti()
    {
        $jumlah_jatah_cuti = 12;
        return $jumlah_jatah_cuti;
    }

    public function codeimage()
    {
        $id         = str_replace("'", "", $this->input->post('id_pegawai'));
        $code       = $this->pegawai->get_nik_no_ktp(decrypt_url($id));

        $this->load->library('ciqrcode'); //pemanggilan library QR CODE
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = 'image/codeimage/assets/'; //string, the default is application/cache/
        $config['errorlog']     = 'image/codeimage/assets/'; //string, the default is application/logs/
        $config['imagedir']     = 'image/codeimage/qrcodeimage/'; //direktori penyimpanan qr code ./image/profileuser/'
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
        $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);

        $rm = $code->nik;

        $image_name = $rm . '.png'; //buat name dari qr code sesuai dengan rm
        $params['data'] = $rm; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 30;
        $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
        $Qrdir = 'image/codeimage/qrcodeimage/';
        $pathQrCode = $Qrdir . $image_name;

        // Barcode
        $this->zend->load('Zend/Barcode');
        $barcode = $code->no_ktp; //nomor id barcode
        $imageResource = Zend_Barcode::factory('code128', 'image', array('text' => $barcode), array())->draw();
        $imageName = $barcode . '.jpg';
        $imagePath = 'image/codeimage/barcodeimage/'; // penyimpanan file barcode
        imagejpeg($imageResource, $imagePath . $imageName);
        $pathBarcode = $imagePath . $imageName; //Menyimpan path image bardcode kedatabase   

        $data  = array(
            'qr_code'       => $pathQrCode,
            'bar_code'      => $pathBarcode,
        );


        if (file_exists('image/codeimage/qrcodeimage' . $code->nik))
            unlink('image/codeimage/qrcodeimage' . $code->nik);

        if (file_exists('image/codeimage/barcodeimage' . $code->no_ktp))
            unlink('image/codeimage/barcodeimage' . $code->no_ktp);

        $this->pegawai->update_codeimage(decrypt_url($id), 'pegawai', $data);

        echo json_encode(array("status" => TRUE));
    }


    public function codeimage_all()
    {
        $code       = $this->pegawai->get();

        foreach ($code as $code) {
            $this->load->library('ciqrcode'); //pemanggilan library QR CODE
            $config['cacheable']    = true; //boolean, the default is true
            $config['cachedir']     = 'image/codeimage/assets/'; //string, the default is application/cache/
            $config['errorlog']     = 'image/codeimage/assets/'; //string, the default is application/logs/
            $config['imagedir']     = 'image/codeimage/qrcodeimage/'; //direktori penyimpanan qr code ./image/profileuser/'
            $config['quality']      = true; //boolean, the default is true
            $config['size']         = '1024'; //interger, the default is 1024
            $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
            $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
            $this->ciqrcode->initialize($config);

            $rm = $code['nik'];

            $image_name = $rm . '.png'; //buat name dari qr code sesuai dengan rm
            $params['data'] = $rm; //data yang akan di jadikan QR CODE
            $params['level'] = 'H'; //H=High
            $params['size'] = 30;
            $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
            $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
            $Qrdir = 'image/codeimage/qrcodeimage/';
            $pathQrCode = $Qrdir . $image_name;

            // Barcode
            $this->zend->load('Zend/Barcode');
            $barcode = $code['nik']; //nomor id barcode
            $imageResource = Zend_Barcode::factory('code128', 'image', array('text' => $barcode), array())->draw();
            $imageName = $barcode . '.jpg';
            $imagePath = 'image/codeimage/barcodeimage/'; // penyimpanan file barcode
            imagejpeg($imageResource, $imagePath . $imageName);
            $pathBarcode = $imagePath . $imageName; //Menyimpan path image bardcode kedatabase   

            $data  = array(
                'qr_code'       => $pathQrCode,
                'bar_code'      => $pathBarcode,
            );


            if (file_exists('image/codeimage/qrcodeimage' . $code['nik']))
                unlink('image/codeimage/qrcodeimage' . $code['nik']);

            if (file_exists('image/codeimage/barcodeimage' . $code['nik']))
                unlink('image/codeimage/barcodeimage' . $code['nik']);

            $this->pegawai->update_codeimage(($code['id_pegawai']), 'pegawai', $data);


        }

        // echo json_encode(array("status" => TRUE));
    }

    public function reset_jatah_cuti()
    {
        $peg       = $this->pegawai->get();
        $no = 0;
        foreach ($peg as $peg) {
            $no++;
            $id_pegawai = $peg['id_pegawai'];
            $ttl_cuti_tolak = $this->pegawai->get_ttl_cuti_tolak($id_pegawai);
            $post  = str_replace("'", "", $this->input->post('Postdata'));
            // $post = $this->input->post('Postdata');
            $date1 = date_create($peg['tgl_kerja']);
            $date2 = date_create($post);
            // $date2 = date_create(date("Y-m-d"));
            $diff  = date_diff($date1,$date2);
            $lama_kerja = $diff->y;

            if ($diff->y > 24) {
                $jatah_cuti = 21;
            } else if ($diff->y > 16){
                $jatah_cuti = 18;
            } else if ($diff->y > 8){
                $jatah_cuti = 15;
            } else if ($diff->y >= 1){
                $jatah_cuti = 12;
            } else {
                $jatah_cuti = 0;
            }

            $data  = array(
                'jatah_cuti'      => $jatah_cuti+$ttl_cuti_tolak->lama,
            );




            // echo "<pre>";
            // print_r($no.'. '.$peg['nama'].' Lama Kerja '.$lama_kerja." Tahun"." Jatah Cuti : ".$jatah_cuti." Hari, dari db : ".$peg['jatah_cuti']." Hari");
            // var_dump($peg['nama'].' :  Total Cuti Ditolak <b>'.$ttl_cuti_tolak->lama).'</b>';
            // echo "</pre>";
            $this->pegawai->reset_jatah_cuti(($peg['id_pegawai']), 'pegawai', $data);


        }

        echo json_encode(array("status" => TRUE));
    }
}

/* End of file pegawai.php */
/* Location: ./application/controllers/admin/pegawai.php */