<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unitkerja extends CI_Controller {

    public function __construct() {
        parent::__construct();
        is_logged_in(); // Validasi login
        $this->load->model('M_unit', 'unit');
    }

    public function index() {
        $this->data['title'] = 'unit';
        $this->data['TombolCreate'] = $this->create_buttons();
        $this->data['create'] = 'Create';
        $this->data['edit'] = 'Update';
        $this->data['delete'] = 'Delete';
        $this->data['m'] = 'unit';
        $this->data['ml'] = 'unit List';
        $this->data['app'] = $this->App->aplikasi();

        $this->template->load('templates/master', 'admin/unitkerja/list', $this->data);
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
        $list = $this->unit->get_datatables();
        $data = [];
        $no = $_POST['start'];

        foreach ($list as $unit) {
            $no++;
            $row = [
                $no,
                $this->generate_action_buttons($unit->id_unit),
                $unit->nm_unit,
                $unit->kontak,
            ];
            $data[] = $row;
        }

        $output = [
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->unit->count_all(),
            "recordsFiltered" => $this->unit->count_filtered(),
            "data" => $data,
        ];

        echo json_encode($output);
    }

    private function generate_action_buttons($id_unit) {
        return '
            <a href="javascript:void(0)" title="Update" class="btn-xs btn-primary" onclick="update('."'".encrypt_url($id_unit)."'".')">
                <i class="fas fa-edit"> </i> Update
            </a>&nbsp;
            <a href="javascript:void(0)" title="Delete" class="btn-xs btn-danger" onclick="deletedata('."'".encrypt_url($id_unit)."'".')">
                <i class="fas fa-trash"></i> Delete
            </a>';
    }

    public function get_by_id($id_unit)
    {
            $data = $this->unit->get_by_id(decrypt_url($id_unit));

            echo json_encode($data);
    }

    public function insert() {
        $this->_validate();
        $data = [
            'id_unit' => $this->id_unitOtomatis(),
            'nm_unit' => $this->sanitize_input('addnm_unit'),
            'kontak' => $this->sanitize_input('addkontak'),
        ];

        $this->unit->insert('unitkerja', $data);
        echo json_encode(["status" => TRUE]);
    }

    public function update() {
        $this->_validate();
        $id = $this->sanitize_input('id_unit');
        $data = [
            'nm_unit' => $this->sanitize_input('addnm_unit'),
            'kontak' => $this->sanitize_input('addkontak'),
        ];

        $this->unit->update($id, 'unitkerja', $data);
        echo json_encode(["status" => TRUE]);
    }

    public function delete() {
        $id = $this->sanitize_input('id_unit');
        $this->unit->delete(decrypt_url($id), 'unitkerja');
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
            'addnm_unit' => 'Nama Unit',
            'addkontak' => 'Kontak',
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

    private function id_unitOtomatis() {
        $query = "SELECT MAX(CAST(SUBSTRING(id_unit, 4) AS UNSIGNED)) AS maxKode FROM unitkerja";
        $data = $this->db->query($query)->row();
        return 'UNK' . ($data->maxKode + 1);
    }

}
