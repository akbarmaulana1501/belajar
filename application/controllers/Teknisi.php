<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class teknisi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        is_logged_in(); // Validasi login
        $this->load->model('M_teknisi', 'teknisi');
    }

    public function index() {
        $this->data['title'] = 'Teknisi';
        $this->data['TombolCreate'] = $this->create_buttons();
        $this->data['create'] = 'Create';
        $this->data['edit'] = 'Update';
        $this->data['delete'] = 'Delete';
        $this->data['m'] = 'Teknisi';
        $this->data['ml'] = 'Teknisi List';
        $this->data['app'] = $this->App->aplikasi();

        $this->template->load('templates/master', 'admin/teknisi/list', $this->data);
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
        $list = $this->teknisi->get_datatables();
        $data = [];
        $no = $_POST['start'];

        foreach ($list as $teknisi) {
            $no++;
            $row = [
                $no,
                $this->generate_action_buttons($teknisi->id_teknisi),
                $teknisi->nm_teknisi,
                $teknisi->spesialisasi,
            ];
            $data[] = $row;
        }

        $output = [
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->teknisi->count_all(),
            "recordsFiltered" => $this->teknisi->count_filtered(),
            "data" => $data,
        ];

        echo json_encode($output);
    }

    private function generate_action_buttons($id_teknisi) {
        return '
            <a href="javascript:void(0)" title="Update" class="btn-xs btn-primary" onclick="update('."'".encrypt_url($id_teknisi)."'".')">
                <i class="fas fa-edit"> </i> Update
            </a>&nbsp;
            <a href="javascript:void(0)" title="Delete" class="btn-xs btn-danger" onclick="deletedata('."'".encrypt_url($id_teknisi)."'".')">
                <i class="fas fa-trash"></i> Delete
            </a>';
    }

    public function get_by_id($id_teknisi)
    {
            $data = $this->teknisi->get_by_id(decrypt_url($id_teknisi));

            echo json_encode($data);
    }

    public function insert() {
        $this->_validate();
        $data = [
            'id_teknisi' => $this->id_teknisiOtomatis(),
            'nm_teknisi' => $this->sanitize_input('addnm_teknisi'),
            'spesialisasi' => $this->sanitize_input('addspesialisasi'),
        ];

        $this->teknisi->insert('teknisi', $data);
        echo json_encode(["status" => TRUE]);
    }

    public function update() {
        $this->_validate();
        $id = $this->sanitize_input('id_teknisi');
        $data = [
            'nm_teknisi' => $this->sanitize_input('addnm_teknisi'),
            'spesialisasi' => $this->sanitize_input('addspesialisasi'),
        ];

        $this->teknisi->update($id, 'teknisi', $data);
        echo json_encode(["status" => TRUE]);
    }

    public function delete() {
        $id = $this->sanitize_input('id_teknisi');
        $this->teknisi->delete(decrypt_url($id), 'teknisi');
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
            'addnm_teknisi' => 'Nama Teknisi',
            'addspesialisasi' => 'Spesialisasi',
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

    private function id_teknisiOtomatis() {
        $query = "SELECT MAX(CAST(SUBSTRING(id_teknisi, 4) AS UNSIGNED)) AS maxKode FROM teknisi";
        $data = $this->db->query($query)->row();
        return 'TKN' . ($data->maxKode + 1);
    }

}
