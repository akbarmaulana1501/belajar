<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    public function __construct() {
        parent::__construct();
        is_logged_in(); // Validasi login
        $this->load->model('M_barang', 'barang');
    }

    public function index() {
        $this->data['title'] = 'Barang';
        $this->data['TombolCreate'] = $this->create_buttons();
        $this->data['create'] = 'Create';
        $this->data['edit'] = 'Update';
        $this->data['delete'] = 'Delete';
        $this->data['m'] = 'Barang';
        $this->data['ml'] = 'Barang List';
        $this->data['app'] = $this->App->aplikasi();

        $this->template->load('templates/master', 'admin/barang/list', $this->data);
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
        $list = $this->barang->get_datatables();
        $data = [];
        $no = $_POST['start'];

        foreach ($list as $barang) {
            $no++;
            $row = [
                $no,
                $this->generate_action_buttons($barang->id_barang),
                $barang->nm_barang,
                $barang->noinventaris,
                $barang->satuan,
            ];
            $data[] = $row;
        }

        $output = [
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->barang->count_all(),
            "recordsFiltered" => $this->barang->count_filtered(),
            "data" => $data,
        ];

        echo json_encode($output);
    }

    private function generate_action_buttons($id_barang) {
        return '
            <a href="javascript:void(0)" title="Update" class="btn-xs btn-primary" onclick="update('."'".encrypt_url($id_barang)."'".')">
                <i class="fas fa-edit"> </i> Update
            </a>&nbsp;
            <a href="javascript:void(0)" title="Delete" class="btn-xs btn-danger" onclick="deletedata('."'".encrypt_url($id_barang)."'".')">
                <i class="fas fa-trash"></i> Delete
            </a>';
    }

    public function get_by_id($id_barang)
    {
            $data = $this->barang->get_by_id(decrypt_url($id_barang));

            echo json_encode($data);
    }
    
    public function insert() {
        $this->_validate();
        $data = [
            'id_barang' => $this->id_barangOtomatis(),
            'nm_barang' => $this->sanitize_input('addNamabarang'),
            'noinventaris' => $this->sanitize_input('addnoinventaris'),
            'satuan' => $this->sanitize_input('addSatuan'),
        ];

        $this->barang->insert('barang', $data);
        echo json_encode(["status" => TRUE]);
    }

    public function update() {
        $this->_validate();
        $id = $this->sanitize_input('id_barang');
        $data = [
            'nm_barang' => $this->sanitize_input('addNamabarang'),
            'noinventaris' => $this->sanitize_input('addnoinventaris'),
            'satuan' => $this->sanitize_input('addSatuan'),
        ];

        $this->barang->update($id, 'barang', $data);
        echo json_encode(["status" => TRUE]);
    }

    public function delete() {
        $id = $this->sanitize_input('id_barang');
        $this->barang->delete(decrypt_url($id), 'barang');
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
            'addNamabarang' => 'Nama barang',
            'addnoinventaris' => 'No Inventaris',
            'addSatuan' => 'Satuan',
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

    private function id_barangOtomatis() {
        $query = "SELECT MAX(CAST(SUBSTRING(id_barang, 4) AS UNSIGNED)) AS maxKode FROM barang";
        $data = $this->db->query($query)->row();
        return 'BRG' . ($data->maxKode + 1);
    }
}
