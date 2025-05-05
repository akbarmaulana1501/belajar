<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class memo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        is_logged_in(); // Validasi login
        $this->load->model('M_memo', 'memo');
    }

    public function index() {
        $this->data['title'] = 'Memo';
        $this->data['TombolCreate'] = $this->create_buttons();
        $this->data['create'] = 'Create';
        $this->data['edit'] = 'Update';
        $this->data['delete'] = 'Delete';
        $this->data['m'] = 'Memo';
        $this->data['ml'] = 'Memo List';
        $this->data['app'] = $this->App->aplikasi();

        $this->template->load('templates/master', 'admin/memo/list', $this->data);
    }

    public function print()
    {
        $this->load->library('pdf');
        $this->data['title'] = 'Laporan';

        // Jika data yang dibutuhkan tersedia
        if ($this->data) {
            $html = $this->load->view('admin/memo/print', $this->data, true);
            $this->pdf->createPDF($html, 'FJP', false);         
        } else {
            redirect('memo', 'refresh');
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
        $list = $this->memo->get_datatables();
        $data = [];
        $no = $_POST['start'];

        foreach ($list as $memo) {
            $no++;
            $row = [
                $no,
                $this->generate_action_buttons($memo->id_memo),
                $memo->no_memo,
                $memo->tgl_memo,
                $memo->perihal,
                $memo->deskripsi,
                $memo->status,
            ];
            $data[] = $row;
        }

        $output = [
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->memo->count_all(),
            "recordsFiltered" => $this->memo->count_filtered(),
            "data" => $data,
        ];

        echo json_encode($output);
    }

    private function generate_action_buttons($id_memo) {
        return '
            <a href="javascript:void(0)" title="Update" class="btn-xs btn-primary" onclick="update('."'".encrypt_url($id_memo)."'".')">
                <i class="fas fa-edit"> </i> Update
            </a>&nbsp;
            <a href="javascript:void(0)" title="Delete" class="btn-xs btn-danger" onclick="deletedata('."'".encrypt_url($id_memo)."'".')">
                <i class="fas fa-trash"></i> Delete
            </a>';
    }

    public function get_by_id($id_memo)
    {
            $data = $this->memo->get_by_id(decrypt_url($id_memo));

            echo json_encode($data);
    }

    public function insert() {
        $this->_validate();
        $data = [
            'id_memo' => $this->id_memoOtomatis(),
            'no_memo' => $this->sanitize_input('addno_memo'),
            'tgl_memo' => $this->sanitize_input('addtgl_memo'),
            'perihal' => $this->sanitize_input('addperihal'),
            'perihal' => $this->sanitize_input('addperihal'),
            'deskripsi' => $this->sanitize_input('adddeskripsi'),
            'status' => $this->sanitize_input('addstatus'),
        ];

        $this->memo->insert('memo', $data);
        echo json_encode(["status" => TRUE]);
    }

    public function update() {
        $this->_validate();
        $id = $this->sanitize_input('id_memo');
        $data = [
            'no_memo' => $this->sanitize_input('addno_memo'),
            'tgl_memo' => $this->sanitize_input('addtgl_memo'),
            'perihal' => $this->sanitize_input('addperihal'),
            'deskripsi' => $this->sanitize_input('adddeskripsi'),
            'status' => $this->sanitize_input('addstatus'),
        ];

        $this->memo->update($id, 'memo', $data);
        echo json_encode(["status" => TRUE]);
    }

    public function delete() {
        $id = $this->sanitize_input('id_memo');
        $this->memo->delete(decrypt_url($id), 'memo');
        echo json_encode(["status" => TRUE]);
    }

    private function sanitize_input($input_name) {
        return str_replace("'", "", $this->input->post($input_name));
    }

    private function _validate() {
        $data = [
            'error_string' => [],
            'inputerror' => [],
            'status' => TRUE,
        ];

        $fields = [
            'addno_memo' => 'Nomor Memo',
            'addtgl_memo' => 'Tanggal Memo',
            'addperihal' => 'Perihal',
            'adddeskripsi' => 'Deskripsi',
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

    private function id_memoOtomatis() {
        $query = "SELECT MAX(CAST(SUBSTRING(id_memo, 4) AS UNSIGNED)) AS maxKode FROM memo";
        $data = $this->db->query($query)->row();
        return 'MMO' . ($data->maxKode + 1);
    }

    public function getIdMemo() {
        $idMemo = $this->id_memoOtomatis();
        echo json_encode(['id_memo' => $idMemo]);
    }

}
