<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_insident_report extends CI_Model {

    private $table         = 'insident_report';
    private $primaryKey    = 'id_insident_report';
    private $column_order  = ['tgl_insident', 'identifikasi', 'solusi', 'rekomendasi', 'hasilperbaikan', 'status']; // Update kolom yang sesuai
    private $column_search = [
        'insident_report.tgl_insident', 
        'insident_report.identifikasi', 
        'insident_report.solusi', 
        'insident_report.rekomendasi', 
        'insident_report.hasilperbaikan',  
        'tiket.id_tiket',
        'teknisi.nm_teknisi as nm_teknisi'
    ];
    private $order         = ['insident_report.id_insident_report' => 'ASC'];

    public function __construct() {
        parent::__construct();
    }

    // Datatables helper
    private function _get_datatables_query() {
        $this->db->select('
            insident_report.id_insident_report,
            insident_report.tgl_insident,
            insident_report.identifikasi,
            insident_report.solusi,
            insident_report.rekomendasi,
            insident_report.hasilperbaikan,
            tiket.id_tiket,
            teknisi.nm_teknisi as nm_teknisi
        ');
        $this->db->from($this->table);
        $this->db->join('tiket', 'tiket.id_tiket = insident_report.id_tiket', 'left');
        $this->db->join('teknisi', 'teknisi.id_teknisi = insident_report.id_teknisi', 'left');

        // Pencarian global
        if (!empty($_POST['search']['value'])) {
            $search = $_POST['search']['value'];
            $this->db->group_start();
            foreach ($this->column_search as $i => $item) {
                if ($i === 0) {
                    $this->db->like($item, $search);
                } else {
                    $this->db->or_like($item, $search);
                }
            }
            $this->db->group_end();
        }

        // Order by kolom
        if (isset($_POST['order'])) {
            $order_col = $_POST['order'][0]['column'];
            $order_dir = $_POST['order'][0]['dir'];
            if (isset($this->column_order[$order_col])) {
                $this->db->order_by($this->column_order[$order_col], $order_dir);
            }
        } else {
            $this->db->order_by(key($this->order), current($this->order));
        }
    }

    public function get_datatables() {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        return $this->db->get()->result();
    }

    public function count_filtered() {
        $this->_get_datatables_query();
        return $this->db->get()->num_rows();
    }

    public function count_all() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // CRUD
    public function get_by_id($id) {
        return $this->db->get_where($this->table, [$this->primaryKey => $id])->row();
    }

    public function insert($table, $data) {
        return $this->db->insert($table, $data);
    }

    public function update($id, $table, $data) {
        return $this->db->update($table, $data, [$this->primaryKey => $id]);
    }

    public function update_status_tiket($id_tiket, $table, $data_tiket) {
        return $this->db->update($table, $data_tiket, ['id_tiket'=> $id_tiket]);
    }

    public function delete($id, $table) {
        return $this->db->delete($table, [$this->primaryKey => $id]);
    }

    public function _get_cetak_by_id($id)
    {
        $this->db->select('
            ir.*, 
            tk.nm_teknisi, 
            tkt.id_tiket, 
            tkt.id_tiket,
            uk.nm_unit,
            us.nama nm_user,
        ');
        $this->db->from('insident_report ir');
        $this->db->join('teknisi tk', 'tk.id_teknisi = ir.id_teknisi', 'left');
        $this->db->join('tiket tkt', 'tkt.id_tiket = ir.id_tiket', 'left');
        $this->db->join('user us', 'us.user_id = tkt.id_user', 'left');
        $this->db->join('unitkerja uk', 'uk.id_unit = tkt.id_unit', 'left');
        $this->db->where('ir.id_insident_report', $id);
        return $this->db->get()->row(); // return as object, cocok untuk dipakai di view
    }


    public function get_insident_report_like($term = "") {
        $this->db->like("no_insident_report", $term);
        $this->db->or_like("tgl_insident", $term);
        return $this->db->get($this->table)->result_array();
    }

    public function get_teknisi() {
        return $this->db->select('id_teknisi, nm_teknisi')
                        ->from('teknisi')
                        ->order_by('nm_teknisi', 'asc')
                        ->get()
                        ->result();
    }

    public function get_tiket() {
        return $this->db->select('id_tiket, id_tiket')
                        ->from('tiket')
                        ->order_by('id_tiket', 'desc')
                        ->get()
                        ->result();
    }
}
