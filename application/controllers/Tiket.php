<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiket extends CI_Controller {

    public function __construct() {
        parent::__construct();
        is_logged_in(); // Cek session login
        $this->load->model('M_tiket', 'tiket');
    }

    public function index() {
        $this->data = [
            'title'        => 'Tiket',
            'fileName'     => 'tiket',
            'TombolCreate' => $this->create_buttons(),
            'create'       => 'Create',
            'edit'         => 'Update',
            'delete'       => 'Delete',
            'm'            => 'Tiket',
            'ml'           => 'Tiket List',
            'app'          => $this->App->aplikasi(),
            'unit'         => $this->tiket->get_unit(),
        ];

        $this->template->load('templates/master', 'admin/tiket/list', $this->data);
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
        $list = $this->tiket->get_datatables();
        $data = [];
        $no = $_POST['start'];

        foreach ($list as $row) {
            $data[] = [
                ++$no,
                $this->generate_action_buttons($row->id_tiket),
                $row->tgl_tiket,
                $row->masalah,
                $row->status,
                $row->nm_user,
                $row->nm_unit,
            ];
        }

        echo json_encode([
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->tiket->count_all(),
            "recordsFiltered" => $this->tiket->count_filtered(),
            "data"            => $data,
        ]);
    }

    private function generate_action_buttons($id) {
        $id = encrypt_url($id);
        return '
            <a href="javascript:void(0)" title="Update" class="btn-xs btn-primary" onclick="update(\''.$id.'\')">
                <i class="fas fa-edit"></i> Update
            </a>
            &nbsp;
            <a href="javascript:void(0)" title="Delete" class="btn-xs btn-danger" onclick="deletedata(\''.$id.'\')">
                <i class="fas fa-trash"></i> Delete
            </a>';
    }

    public function get_unit() {
        $data = $this->tiket->get_unit();
        echo json_encode($data);
    }

    public function get_by_id($id = null) {
        $data = $this->tiket->get_by_id(decrypt_url($id));
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function insert() {
        $this->_validate();
        $data = [
            'id_tiket'  => $this->id_tiketOtomatis(),
            'id_unit'   => $this->sanitize_input('addid_unit'),
            'tgl_tiket' => $this->sanitize_input('addtgl_tiket'),
            'masalah'   => $this->sanitize_input('addmasalah'),
            'status'    => 'Diajukan',
            'id_user'    => $this->App->aplikasi()['user_id'],
            // 'status'    => $this->sanitize_input('addstatus'),
        ];

        $this->tiket->insert('tiket', $data);
        echo json_encode(["status" => TRUE]);
    }

    public function update() {
        $this->_validate();
        $id = $this->sanitize_input('id_tiket');
        $data = [
            'tgl_tiket' => $this->sanitize_input('addtgl_tiket'),
            'id_unit'   => $this->sanitize_input('addid_unit'),
            'masalah'   => $this->sanitize_input('addmasalah'),
            'status'    => 'Diajukan',            
            'id_user'   => $this->App->aplikasi()['user_id'],

            // 'status'    => $this->sanitize_input('addstatus'),
        ];

        $this->tiket->update($id, 'tiket', $data);
        echo json_encode(["status" => TRUE]);
    }

    public function delete() {
        $id = $this->sanitize_input('id_tiket');
        $this->tiket->delete(decrypt_url($id), 'tiket');
        echo json_encode(["status" => TRUE]);
    }

    private function sanitize_input($field) {
        return str_replace("'", "", $this->input->post($field));
    }

    private function _validate() {
        $errors = [
            'addid_unit'    => 'Unit',
            'addtgl_tiket'  => 'Tanggal tiket',
            'addmasalah'    => 'Masalah',
        ];

        $data = [
            'error_string' => [],
            'inputerror'   => [],
            'status'       => TRUE,
        ];

        foreach ($errors as $field => $label) {
            if ($this->input->post($field) === '') {
                $data['inputerror'][] = $field;
                $data['error_string'][] = "$label Tidak Boleh Kosong";
                $data['status'] = FALSE;
            }
        }

        if (!$data['status']) {
            echo json_encode($data);
            exit;
        }
    }

    private function id_tiketOtomatis() {
        $query = "SELECT MAX(CAST(SUBSTRING(id_tiket, 4) AS UNSIGNED)) AS maxKode FROM tiket";
        $result = $this->db->query($query)->row();
        return 'TKT' . ($result->maxKode + 1);
    }

    public function getIdtiket() {
        echo json_encode(['id_tiket' => $this->id_tiketOtomatis()]);
    }

}
