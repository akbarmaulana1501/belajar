<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jenis_izin extends CI_Model 
{
    var $table          = 'jenis_izin_list';
    var $id             = 'id_jenis_izin';
    var $column_order   = array('','','nm_jenis_izin','lama_jenis_izin');
    var $column_search  = array('nm_jenis_izin','lama_jenis_izin');
    var $order          = array('id_jenis_izin' => 'ASC','','nm_jenis_izin' => 'ASC','lama_jenis_izin' => 'ASC');  

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
            $this->db->select('*');
            $this->db->from($this->table);

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
            return $query->result();
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

        function get_by_id($id_jenis_izin) {   
            $this->db->where('id_jenis_izin',$id_jenis_izin);
            $this->db->select('
            					id_jenis_izin,
                                nm_jenis_izin,
                                lama_jenis_izin,

                                ');

            return $this->db->get($this->table)->row();
        }

        function insert($table, $data)
        {
            $query = $this->db->insert($table, $data);
            return $query;
        } 


        function update($id,$table, $data)
        {
            $this->db->where('id_jenis_izin', $id);
            $this->db->update($table, $data);
        }


        function delete($id, $table)
        {
            $this->db->where('id_jenis_izin', $id);
            $this->db->delete($table);
        }
        
        function get_jenis_izin_like($searchTermJenisizin="")
        {
            $this->db->select('*');
            $this->db->where("nm_jenis_izin like '%".$searchTermJenisizin."%' OR lama_jenis_izin like '%".$searchTermJenisizin."%'");
            $fetched_records = $this->db->get('jenis_izin_list');
            $jenis_izin_list = $fetched_records->result_array();

            $data = array();
            foreach($jenis_izin_list as $jenis_izin_list){
                $data[] = array("id_jenis_izin"=>$jenis_izin_list['nm_jenis_izin'], "text"=>$jenis_izin_list['lama_jenis_izin']);
            }
            return $data;
        }

        function get_data_jenis_izin_by_nama_jenis_izin($nm_jenis_izin)
        {
            $hsl = $this->db->query("SELECT * FROM jenis_izin_list WHERE nm_jenis_izin='$nm_jenis_izin'");
                    if($hsl->num_rows()>0){
                        foreach ($hsl->result() as $data) {
                           
                            $hasil=array(
                                'id_jenis_izin'        => $data->id_jenis_izin,
                                'nm_jenis_izin'        => $data->nm_jenis_izin,
                                'lama_jenis_izin'      => $data->lama_jenis_izin,
                                );
                        }
                    }
            return $hasil;
        }

}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */
// $2y$10$ocTikbJfbC4Plas6pbFXlOVPr1ZVBvgi0epI/uvHX5IPThdp04D/C