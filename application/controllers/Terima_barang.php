<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Terima_barang extends CI_Controller {

    public function __construct() {
        parent::__construct();
        is_logged_in(); // Cek session login
        $this->load->model('M_terima_barang', 'terima_barang');
    }

    public function index() {
        $this->data = [
            'title'        => 'Terima Barang',
            'fileName'     => 'terima_barang',
            'TombolCreate' => $this->create_buttons(),
            'create'       => 'Create',
            'edit'         => 'Update',
            'delete'       => 'Delete',
            'm'            => 'Terima Barang',
            'ml'           => 'Terima Barang List',
            'app'          => $this->App->aplikasi(),
        ];

        $this->template->load('templates/master', 'admin/terima_barang/list', $this->data);
    }

    private function _get_cetak_by_id($id = null) {
        // Ambil data insident report berdasarkan ID yang sudah didekripsi
        return $this->terima_barang->_get_cetak_by_id(decrypt_url($id));
    }

    private function _get_punya_by_no_ttb($id = null) {
        // Ambil data insident report berdasarkan ID yang sudah didekripsi
        return $this->terima_barang->get_punya_by_no_ttb(decrypt_url($id));
    }

    public function print($id) {
        $this->load->library('pdf');

        $data = $this->_get_cetak_by_id($id);
        $id = $data->no_ttb;
        $barang = $this->_get_punya_by_no_ttb($id);

        if ($data) {
            $this->data['title'] = 'Print Terima Barang';
            $this->data['data']  = $data;
            $this->data['barang']  = $barang;

            $html = $this->load->view('admin/terima_barang/print', $this->data, true);
            $this->pdf->createPDF($html, 'Terima Barang', false);
        } else {
            redirect('terima_barang', 'refresh');
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
        $list = $this->terima_barang->get_datatables();
        $data = [];
        $no = $_POST['start'];

        foreach ($list as $row) {
            $punya = $this->terima_barang->get_punya($row->no_ttb);
            
                // Gabung semua nama barang jadi satu string
            $barang_list = '-';
            if ($punya && count($punya) > 0) {
                $barang_list = '<table style="border:none;">';
                $i = 1;
                foreach ($punya as $b) {
                    $barang_list .= '<tr style="border:none; background-color: transparent;">
                                        <td style="border:none; padding-right:5px;">' . $i++ . '.</td>
                                        <td style="border:none;">' . htmlspecialchars($b->nm_barang) . '</td>
                                     </tr>';
                }
                $barang_list .= '</table>';
            }



            $data[] = [
                ++$no,
                $this->generate_action_buttons($row->no_ttb),
                $row->no_ttb,
                $row->tgl,
                $row->ket,
                $barang_list,
            ];
        }

        echo json_encode([
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->terima_barang->count_all(),
            "recordsFiltered" => $this->terima_barang->count_filtered(),
            "data"            => $data,
        ]);
    }

    private function generate_action_buttons($id) {
        $id_enc = encrypt_url($id);

        $terima = $this->db->select('terima')
                           ->where('no_ttb', decrypt_url($id))
                           ->get('ttb')
                           ->row('terima');

        $status_terima = $terima === null ? 'belum' : 'sudah';

        // Pilih ikon berdasarkan status
        $icon = $status_terima === 'sudah' ? 'fa-check-double' : 'fa-check';

        return '
            <a href="javascript:void(0)" title="Delete" class="btn-xs btn-danger" onclick="deletedata(\'' . $id_enc . '\')">
                <i class="fas fa-trash"></i> Delete
            </a>
            &nbsp;
            <a href="' . base_url('terima_barang/print/' . $id_enc) . '" title="Print" class="btn btn-xs btn-primary" target="_blank">
                <i class="fas fa-print"></i> Print
            </a>
            &nbsp;
            <a href="javascript:void(0)" title="Terima" class="btn-xs btn-success" onclick="terima(\'' . $id_enc . '\', \'' . $status_terima . '\')">
                <i class="fas ' . $icon . '"></i> Terima
            </a>';
    }


    public function terima(){
        $id = $this->input->post('id');
        $data = [
            'terima' => $this->App->aplikasi()['nama']
        ];

        $this->db->where('no_ttb', decrypt_url($id));
        $this->db->update('ttb', $data);

        echo json_encode(['status' => 'ok']);
    }


    public function get_insident_report() {
        $data = $this->terima_barang->get_insident_report();
        echo json_encode(['datas' => $data]);
    }

    public function get_insident_report_by_id($id) {
        $data = $this->terima_barang->get_insident_report_by_id($id);
        echo json_encode($data);
    }


    public function get_barang() {
        $data = $this->terima_barang->get_barang();
        echo json_encode($data);
    }

    public function get_by_id($id = null) {
        $data = $this->terima_barang->get_by_id(decrypt_url($id));
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function insert() {
        $this->_validate();

        $data = [
            'no_ttb'  => $this->no_ttbOtomatis(),
            'tgl' => $this->sanitize_input('addtgl'),
            'ket'   => $this->sanitize_input('addket'),
            'serah'   => $this->App->aplikasi()['nama'],
            'terima'   => null,
            'id_insident_report'   => $this->sanitize_input('addid_insident_report'),
        ];
        // Insert into ttb table
        $this->terima_barang->insert('ttb', $data);

        // Insert into punya table (barang and quantity)
        $barang = $this->input->post('barang'); // Array of barang with quantities
        foreach ($barang as $item) {
            $punyaData = [
                'no_ttb'   => $data['no_ttb'],
                'id_barang' => $item['id_barang'],
                'jumlah'    => $item['jumlah']
            ];
            $this->terima_barang->insert('punya', $punyaData);
        }

        echo json_encode(["status" => TRUE]);
    }

    public function update() {
        $this->_validate();
        $id = $this->sanitize_input('no_ttb');
        $data = [
            'id_unit'   => $this->sanitize_input('addid_unit'),
            'tgl' => $this->sanitize_input('addtgl'),
            'ket'   => $this->sanitize_input('addket'),
            'id_insident_report'   => $this->sanitize_input('addid_insident_report'),
        ];

        // Update ttb table
        $this->terima_barang->update($id, 'ttb', $data);

        // Remove existing barang data and re-insert
        $this->terima_barang->delete_barang_by_ttb($id);

        $barang = $this->input->post('barang');
        foreach ($barang as $item) {
            $punyaData = [
                'no_ttb'   => $id,
                'id_barang' => $item['id_barang'],
                'jumlah'    => $item['jumlah']
            ];
            $this->terima_barang->insert('punya', $punyaData);
        }

        echo json_encode(["status" => TRUE]);
    }

    public function delete() {
        $id = $this->sanitize_input('no_ttb');
        // var_dump(decrypt_url($id));
        // die;
        $this->terima_barang->delete(decrypt_url($id), 'ttb');
        echo json_encode(["status" => TRUE]);
    }

    private function sanitize_input($field) {
        return str_replace("'", "", $this->input->post($field));
    }

    private function _validate() {
        $errors = [
            'addtgl'  => 'Tanggal',
            'addket'  => 'Keterangan',
            'addid_insident_report'  => 'ID Insident Report',
            'barang'  => 'Barang',
            'jumlah'  => 'Jumlah', // Jumlah barang
        ];

        $data = [
            'error_string' => [],
            'inputerror'   => [],
            'status'       => TRUE,
        ];

        // Validasi untuk tanggal
        if ($this->input->post('addtgl') === '') {
            $data['inputerror'][] = 'addtgl';
            $data['error_string'][] = "$errors[addtgl] Tidak Boleh Kosong";
            $data['status'] = FALSE;
        }

        // Validasi untuk keterangan
        if ($this->input->post('addket') === '') {
            $data['inputerror'][] = 'addket';
            $data['error_string'][] = "$errors[addket] Tidak Boleh Kosong";
            $data['status'] = FALSE;
        }

        // Validasi untuk barang yang dipilih
        $barang = $this->input->post('barang');
        if (empty($barang) || !is_array($barang)) {
            $data['inputerror'][] = 'barang';
            $data['error_string'][] = "$errors[barang] Tidak Boleh Kosong";
            $data['status'] = FALSE;
        } else {
            // Validasi setiap item barang
            foreach ($barang as $key => $item) {
                // Validasi id_barang
                if (empty($item['id_barang'])) {
                    $data['inputerror'][] = 'barang';
                    $data['error_string'][] = "ID Barang pada item $key Tidak Boleh Kosong";
                    $data['status'] = FALSE;
                }

                // Validasi jumlah barang
                if (empty($item['jumlah']) || !is_numeric($item['jumlah'])) {
                    $data['inputerror'][] = 'barang';
                    $data['error_string'][] = "Jumlah pada item $key Tidak Boleh Kosong atau Harus Angka";
                    $data['status'] = FALSE;
                }
            }
        }

        // Jika status false, return error message
        if (!$data['status']) {
            echo json_encode($data);
            exit;
        }
    }


    private function no_ttbOtomatis() {
        $query = "SELECT MAX(CAST(SUBSTRING(no_ttb, 4) AS UNSIGNED)) AS maxKode FROM ttb";
        $result = $this->db->query($query)->row();
        return 'TTB' . ($result->maxKode + 1);
    }

    public function getIdterima_barang() {
        echo json_encode(['no_ttb' => $this->no_ttbOtomatis()]);
    }

}
