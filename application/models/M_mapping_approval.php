<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mapping_approval extends CI_Model 
{
    var $table          = 'pegawai_approval';
    var $id             = 'id_pegawai_approval';
    var $column_search   =array('pegawai_approval.approval','pegawai_approval.pengajuan','p1.nama','p2.nama');
    var $column_order   = array('pegawai_approval.approval','pegawai_approval.pengajuan','p1.nama','p2.nama');
    var $order          = array('id_pegawai_approval' => 'ASC' , 'approval' => 'ASC', 'pengajuan' => 'ASC');  

    public function __construct()
        {
            parent::__construct();
        }

    function get()
        {
            $query = $this->db->get($this->table)->result_array();
            return $query;  
        } 

    private function _get_datatables_query()
        {
            // $this->db->select('pegawai.id_pegawai,pegawai.nama as nama_pengajuan,pegawai_approval.id_pegawai_approval');
            // $this->db->join('pegawai', 'pegawai.id_pegawai = pegawai_approval.pengajuan', 'left');
            // // $this->db->or_where('pegawai_approval.pengajuan','pegawai.id_pegawai');
            // $this->db->from($this->table);
            $this->db->select('p2.nama as nama_approve, p1.nama as nama_pengajuan, pegawai_approval.id_pegawai_approval,pegawai_approval.approval');
            $this->db->from($this->table);
            $this->db->join('pegawai p1', 'p1.id_pegawai = pegawai_approval.pengajuan');
            $this->db->join('pegawai p2', 'p2.id_pegawai = pegawai_approval.approval');
            $i = 0;
        
            foreach ($this->column_search as $item) 
            {
                if($_POST['search']['value']) 
                {
                    
                    if($i===0) // first loop
                    {
                        $this->db->group_start();
                        $this->db->like($item, $_POST['search']['value']);
                    }
                    else
                    {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if(count($this->column_search) - 1 == $i)
                        $this->db->group_end(); 
                }
                $i++;
            }
            
            if(isset($_POST['order'])) 
            {
                $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            } 
            else if(isset($this->order))
            {
                $order = $this->order;
                $this->db->order_by(key($order), $order[key($order)]);
            }
        }

        function get_datatables()
        {
            $this->_get_datatables_query();
            if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
            $query = $this->db->get();
            return $query->result_array();
        }

        function count_filtered()
        {
            $this->_get_datatables_query();
            $query = $this->db->get();
            return $query->num_rows();
        }

        public function count_all()
        {
            $this->_get_datatables_query();
            return $this->db->count_all_results();
        }

        function get_by_id($id_pegawai) {   
            $this->db->where('approval',$id_pegawai);
            $this->db->select('
                                pegawai_approval.approval,
                                ');

            return $this->db->get($this->table)->row();
        }

        function insert($table, $data)
        {
            $query = $this->db->insert($table, $data);
            return $query;
        } 


        function update($dataBaru, $dataLama)
        {
            $data = array('approval' => $dataBaru);
            $this->db->update($this->table,$data);
            $this->db->where("approval",$dataLama);
        }

        function delete($id, $table,$type)
        {
            if($type === "all"){
                $this->db->where("approval",$id);
            }else{
                $this->db->where('id_pegawai_approval', $id);
            }
            $this->db->delete($table);
        }
        
        function get_mapping_approval_like($searchTermJenisizin="")
        {
            $this->db->select('*');
            $this->db->where("approval like '%".$searchTermJenisizin."%' OR pengajuan like '%".$searchTermJenisizin."%'");
            $fetched_records = $this->db->get('pegawai_approval');
            $pegawai_approval = $fetched_records->result_array();

            $data = array();
            foreach($pegawai_approval as $pegawai_approval){
                $data[] = array("id_pegawai_approval"=>$pegawai_approval['approval'], "text"=>$pegawai_approval['pengajuan']);
            }
            return $data;
        }

        function get_select_list($var){
            return $this->db->get($var)->result();
        }

        function get_nama_by_id($id_pegawai) {
            $this->db->where('pegawai.id_pegawai',$id_pegawai);
            $this->db->select(' 
                    pegawai.id_pegawai,
                    pegawai.nama,

                    pegawai_approval.id_pegawai_approval,
                    pegawai_approval.approval,
                    pegawai_approval.pengajuan,
            ');

            $this->db->join('pegawai_approval', 'pegawai_approval.approval = pegawai.id_pegawai', 'left');
            $this->db->join('pegawai_approval', 'pegawai_approval.pengajuan = pegawai.id_pegawai', 'left');
            return $this->db->get($this->table)->row();
        }

        // function get_data_jenis_izin_by_nama_jenis_izin($nm_jenis_izin)
        // {
        //     $hsl = $this->db->query("SELECT * FROM jenis_izin_list WHERE nm_jenis_izin='$nm_jenis_izin'");
        //             if($hsl->num_rows()>0){
        //                 foreach ($hsl->result() as $data) {
                           
        //                     $hasil=array(
        //                         'id_jenis_izin'        => $data->id_jenis_izin,
        //                         'nm_jenis_izin'        => $data->nm_jenis_izin,
        //                         'lama_jenis_izin'      => $data->lama_jenis_izin,
        //                         );
        //                 }
        //             }
        //     return $hasil;
        // }
}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */
// $2y$10$ocTikbJfbC4Plas6pbFXlOVPr1ZVBvgi0epI/uvHX5IPThdp04D/C