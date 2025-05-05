<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_unit extends CI_Model {

    var $table = 'unitkerja';
    var $id = 'id_unit';
    var $column_order = array('nm_unit', 'kontak');
    var $column_search = array('nm_unit', 'kontak');
    var $order = array('id_unit' => 'ASC');

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

    public function get_by_id($id_unit) {
        $this->db->where('id_unit', $id_unit);
        return $this->db->get($this->table)->row();
    }

    public function insert($table, $data) {
        return $this->db->insert($table, $data);
    }

    public function update($id, $table, $data) {
        $this->db->where('id_unit', $id);
        return $this->db->update($table, $data);
    }

    public function delete($id, $table) {
        $this->db->where('id_unit', $id);
        return $this->db->delete($table);
    }

    public function get_unit_like($searchTermunitkerja = "") {
        $this->db->select('*');
        $this->db->like("nm_unit", $searchTermunitkerja);
        $this->db->or_like("kontak", $searchTermunitkerja);
        return $this->db->get('unitkerja')->result_array();
    }
}
