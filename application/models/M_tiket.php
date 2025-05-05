<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class M_tiket extends CI_Model {

    private $table         = 'tiket';
    private $primaryKey    = 'id_tiket';
    private $column_order  = ['tgl_tiket', 'masalah', 'status']; // Harus urut sesuai kolom di DataTable
    private $column_search = ['tiket.tgl_tiket', 'tiket.masalah', 'tiket.status', 'unitkerja.nm_unit', 'user.nm_user'];
    private $order         = ['tiket.id_tiket' => 'ASC'];

    public function __construct() {
        parent::__construct();
    }

    // Datatables helper
    private function _get_datatables_query() {
        $this->db->select('
            tiket.id_tiket,
            tiket.tgl_tiket,
            tiket.masalah,
            tiket.status,
            unitkerja.id_unit,
            unitkerja.nm_unit,
            user.user_id,
            user.nama as nm_user
        ');
        $this->db->from($this->table);
        $this->db->join('user', 'user.user_id = tiket.id_user', 'left');
        $this->db->join('unitkerja', 'unitkerja.id_unit = tiket.id_unit', 'left');

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

    public function delete($id, $table) {
        return $this->db->delete($table, [$this->primaryKey => $id]);
    }

    public function get_tiket_like($term = "") {
        $this->db->like("no_tiket", $term);
        $this->db->or_like("tgl_tiket", $term);
        return $this->db->get($this->table)->result_array();
    }

    public function get_unit() {
        return $this->db
            ->select('unitkerja.id_unit, unitkerja.nm_unit')
            ->get('unitkerja')
            ->result();
    }

}
