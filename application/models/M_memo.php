<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_memo extends CI_Model {

    var $table = 'memo';
    var $id = 'id_memo';
    var $column_order = array('no_memo', 'tgl_memo', 'perihal', 'deskripsi', 'status');
    var $column_search = array('no_memo', 'tgl_memo', 'perihal', 'deskripsi', 'status');
    var $order = array('id_memo' => 'ASC');

    public function __construct() {
        parent::__construct();
    }

    private function _get_datatables_query() {
        $this->db->from($this->table);

        foreach ($this->column_search as $item) {
            if ($_POST['search']['value']) {
                $this->db->like($item, $_POST['search']['value']);
            }
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by(key($this->order), $this->order[key($this->order)]);
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
        $this->_get_datatables_query();
        return $this->db->count_all_results();
    }

    public function get_by_id($id_memo) {
        $this->db->where('id_memo', $id_memo);
        return $this->db->get($this->table)->row();
    }

    public function insert($table, $data) {
        return $this->db->insert($table, $data);
    }

    public function update($id, $table, $data) {
        $this->db->where('id_memo', $id);
        return $this->db->update($table, $data);
    }

    public function delete($id, $table) {
        $this->db->where('id_memo', $id);
        return $this->db->delete($table);
    }

    public function get_memo_like($searchTermmemo = "") {
        $this->db->select('*');
        $this->db->like("no_memo", $searchTermmemo);
        $this->db->or_like("tgl_memo", $searchTermmemo);
        return $this->db->get('memo')->result_array();
    }
}
