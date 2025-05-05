<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class M_terima_barang extends CI_Model {

    private $table         = 'ttb';
    private $primaryKey    = 'no_ttb';
    private $column_order  = ['ttb.tgl', 'ttb.ket']; // Harus urut sesuai kolom di DataTable
    private $column_search = ['ttb.tgl', 'ttb.ket'];
    private $order         = ['ttb.no_ttb' => 'ASC'];

    public function __construct() {
        parent::__construct();
    }

    // Datatables helper
    private function _get_datatables_query() {
        $this->db->select('
            ttb.no_ttb,
            ttb.tgl,
            ttb.ket,
        ');
        $this->db->from($this->table);

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

    public function delete($id, $table) {
       // Hapus data detail terlebih dahulu
        $this->db->delete('punya', ['no_ttb' => $id]);

        // Lalu hapus data header di tabel yang ditentukan
        return $this->db->delete($table, [$this->primaryKey => $id]);
    }


    public function _get_cetak_by_id($id)
    {   
        $this->db->join('insident_report', 'insident_report.id_insident_report = ttb.id_insident_report', 'left');
        $this->db->join('tiket', 'tiket.id_tiket = insident_report.id_tiket', 'left');
        $this->db->join('teknisi', 'teknisi.id_teknisi = insident_report.id_teknisi', 'left');
        $this->db->join('unitkerja', 'unitkerja.id_unit = tiket.id_unit', 'left');
        $this->db->select('ttb.no_ttb,ttb.tgl,ttb.ket, ttb.serah, ttb.terima, insident_report.id_insident_report, insident_report.tgl_insident,insident_report.identifikasi,insident_report.solusi,insident_report.rekomendasi,insident_report.hasilperbaikan, tiket.id_tiket,tiket.tgl_tiket,tiket.masalah,tiket.status status_tiket, unitkerja.id_unit,unitkerja.nm_unit,unitkerja.kontak,teknisi.nm_teknisi,teknisi.spesialisasi');
        $this->db->from('ttb');
        $this->db->where('ttb.no_ttb', $id);
        return $this->db->get()->row(); // return as object, cocok untuk dipakai di view
    }

    public function get_barang() {
        return $this->db
            ->select('barang.id_barang, barang.nm_barang')
            ->get('barang')
            ->result();
    }

    public function get_punya_by_no_ttb($id) {
        $this->db->join('barang', 'barang.id_barang = punya.id_barang', 'left');
        return $this->db
            ->select('barang.id_barang, barang.nm_barang, barang.noinventaris, , barang.satuan')
            ->where('punya.id_barang', $id)
            ->get('punya')
            ->result();
    }

    public function get_insident_report() {
        return $this->db->select('id_insident_report, tgl_insident')
                        ->from('insident_report')
                        ->order_by('id_insident_report', 'asc')
                        ->get()
                        ->result();
    }

    public function get_insident_report_by_id($id) {
                        $this->db->join('teknisi', 'teknisi.id_teknisi = insident_report.id_teknisi', 'left');
        return $this->db->select('insident_report.*,teknisi.id_teknisi,teknisi.nm_teknisi')
                        ->from('insident_report')
                        ->where('id_insident_report', $id)
                        ->get()
                        ->row();
    }

    public function get_punya($no_ttb)
    {
        $this->db->select('barang.id_barang, barang.nm_barang'); // contoh ambil nama supplier
        $this->db->from('punya');
        $this->db->join('barang', 'barang.id_barang = punya.id_barang');
        $this->db->where('punya.no_ttb', $no_ttb);
        return $this->db->get()->result();
    }
}
