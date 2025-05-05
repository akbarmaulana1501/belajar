<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class insident_report extends CI_Controller {

    public function __construct() {
        parent::__construct();
        is_logged_in(); // Cek session login
        $this->load->model('M_insident_report', 'insident_report');
    }

    public function index() {
        $this->data = [
            'title'        => 'Insident Report',
            'fileName'     => 'insident_report',
            'TombolCreate' => $this->create_buttons(),
            'create'       => 'Create',
            'edit'         => 'Update',
            'delete'       => 'Delete',
            'm'            => 'Insident Report',
            'ml'           => 'Insident Report List',
            'app'          => $this->App->aplikasi(),
        ];

        $this->template->load('templates/master', 'admin/insident_report/list', $this->data);
    }

    private function _get_cetak_by_id($id = null) {
        // Ambil data insident report berdasarkan ID yang sudah didekripsi
        return $this->insident_report->_get_cetak_by_id(decrypt_url($id));
    }

    public function print($id) {
        $this->load->library('pdf');

        $data = $this->_get_cetak_by_id($id);

        if ($data) {
            $this->data['title'] = 'Print Insident Report';
            $this->data['data']  = $data;

            $html = $this->load->view('admin/insident_report/print', $this->data, true);
            $this->pdf->createPDF($html, 'Print Insident Report', false);
        } else {
            redirect('insident_report', 'refresh');
        }
    }


    private function create_buttons() {
        return '
            <h4 class="page-title">
                <button type="button" class="btn btn-sm btn-primary" onclick="add()">
                    <i class="fe-plus-square"></i> Create
                </button>
                <button type="button" class="btn btn-sm btn-primary" onclick="reload_table()">
                    <i class="fe-refresh-cw"></i> Reload
                </button>
            </h4>';
    }

    public function ajax_list() {
        $list = $this->insident_report->get_datatables();
        $data = [];
        $no = $_POST['start'];

        foreach ($list as $row) {
            $data[] = [
                ++$no,
                $this->generate_action_buttons($row->id_insident_report),
                $row->tgl_insident,
                $row->identifikasi,
                $row->solusi,
                $row->rekomendasi,
                $row->hasilperbaikan,
                $row->nm_teknisi,
                $row->id_tiket,
            ];
        }

        echo json_encode([
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->insident_report->count_all(),
            "recordsFiltered" => $this->insident_report->count_filtered(),
            "data"            => $data,
        ]);
    }

    private function generate_action_buttons($id) {
        $id = encrypt_url($id);
        return '
            <a href="javascript:void(0)" title="Update" class="btn btn-xs btn-primary" onclick="update(\'' . $id . '\')">
                <i class="fas fa-edit"></i> Update
            </a>
            &nbsp;
            <a href="javascript:void(0)" title="Delete" class="btn btn-xs btn-danger" onclick="deletedata(\'' . $id . '\')">
                <i class="fas fa-trash"></i> Delete
            </a>
            &nbsp;
            <a href="' . base_url('insident_report/print/' . $id) . '" title="Print" class="btn btn-xs btn-success" target="_blank">
                <i class="fas fa-print"></i> Print
            </a>';

    }

    public function get_teknisi() {
        $this->load->model('insident_report');
        $data = $this->insident_report->get_teknisi();
        echo json_encode(['datas' => $data]);
    }

    public function get_tiket() {
        $this->load->model('insident_report');
        $data = $this->insident_report->get_tiket();
        echo json_encode(['datas' => $data]);
    }

    public function get_by_id($id = null) {
        $data = $this->insident_report->get_by_id(decrypt_url($id));
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function insert() {
        $this->_validate();
        $data = [
            'id_insident_report'  => $this->id_insident_reportOtomatis(),
            'tgl_insident' => $this->sanitize_input('addtgl_insident'),
            'identifikasi'   => $this->sanitize_input('addidentifikasi'),
            'solusi'   => $this->sanitize_input('addsolusi'),
            'rekomendasi'   => $this->sanitize_input('addrekomendasi'),
            'hasilperbaikan'   => $this->sanitize_input('addhasilperbaikan'),
            'id_teknisi'   => $this->sanitize_input('addid_teknisi'),
            'id_tiket'   => $this->sanitize_input('addid_tiket'),
        ];

        if ($this->insident_report->insert('insident_report', $data)) {
            $this->insident_report->update_status_tiket(
                $data['id_tiket'], 'tiket', ['status' => 'selesai']
            );

            echo json_encode(["status" => TRUE]);
        }
    }

    public function update() {
        $this->_validate();
        $id = $this->sanitize_input('addid_insident_report');
        $data = [
            'tgl_insident' => $this->sanitize_input('addtgl_insident'),
            'identifikasi'   => $this->sanitize_input('addidentifikasi'),
            'solusi'   => $this->sanitize_input('addsolusi'),
            'rekomendasi'   => $this->sanitize_input('addrekomendasi'),
            'hasilperbaikan'   => $this->sanitize_input('addhasilperbaikan'),
            'id_teknisi'   => $this->sanitize_input('addid_teknisi'),
            'id_tiket'   => $this->sanitize_input('addid_tiket'),
        ];

        $this->insident_report->update($id, 'insident_report', $data);
        echo json_encode(["status" => TRUE]);
    }

    public function delete() {
        $id = $this->sanitize_input('id_insident_report');
        $this->insident_report->delete(decrypt_url($id), 'insident_report');
        echo json_encode(["status" => TRUE]);
    }

    private function sanitize_input($field) {
        return str_replace("'", "", $this->input->post($field));
    }

    private function _validate() {
        $data = [
            'error_string' => [],
            'inputerror' => [],
            'status' => TRUE,
        ];

        $fields = [
            'addid_insident_report'  => 'ID Insident Report',
            'addtgl_insident'  => 'Tanggal Insident Report',
            'addidentifikasi'    => 'Identifikasi',
            'addsolusi'    => 'Solusi',
            'addrekomendasi'    => 'Rekomendasi',
            'addhasilperbaikan'    => 'Hasil Perbaikan',
            'addid_teknisi'    => 'Teknisi',
            'addid_tiket'    => 'Tiket',
        ];

        foreach ($fields as $field => $label) {
            if ($this->input->post($field) == '') {
                $data['inputerror'][] = $field;
                $data['error_string'][] = "$label Tidak Boleh Kosong";
                $data['status'] = FALSE;
            }
        }

        if (!$data['status']) {
            echo json_encode($data);
            exit();
        }
    }

    private function id_insident_reportOtomatis() {
        $query = "SELECT MAX(CAST(SUBSTRING(id_insident_report, 4) AS UNSIGNED)) AS maxKode FROM insident_report";
        $result = $this->db->query($query)->row();
        return 'IR_' . ($result->maxKode + 1);
    }

    public function getIdinsident_report() {
        echo json_encode(['id_insident_report' => $this->id_insident_reportOtomatis()]);
    }

}
