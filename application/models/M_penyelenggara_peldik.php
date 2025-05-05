<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penyelenggara_peldik extends CI_Model 
{
    var $table          = 'penyelenggara_peldik_list';
    var $id             = 'id_penyelenggara_peldik_list';
    var $column_order   = array('','','nm_penyelenggara_peldik_list');
    var $column_search  = array('nm_penyelenggara_peldik_list');

    var $order          = array('id_penyelenggara_peldik_list' => 'ASC',''  => 'ASC','nm_penyelenggara_peldik_list' => 'ASC');  

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

        function get_by_id($id_penyelenggara_peldik_list) {   
            $this->db->where('id_penyelenggara_peldik_list',$id_penyelenggara_peldik_list);
            $this->db->select('
            					id_penyelenggara_peldik_list,
                                nm_penyelenggara_peldik_list,

                                ');

            return $this->db->get($this->table)->row();
        }

/*

        function cek_user($email,$role_id) {   
            
                $this->db->where(array(
                    'user.email'=>$email,
                    'user.role_id'=> $role_id,
                    )
                );



            return $this->db->get('user');
        }

*/

        function insert($table, $data)
        {
            $query = $this->db->insert($table, $data);
            return $query;
        } 


        function update($id,$table, $data)
        {
            $this->db->where('id_penyelenggara_peldik_list', $id);
            $this->db->update($table, $data);
        }


        function delete($id, $table)
        {
            $this->db->where('id_penyelenggara_peldik_list', $id);
            $this->db->delete($table);
        }
        
        function get_penyelenggara_peldik_list_like($searchTermpenyelenggara_peldik_list="")
        {
            $this->db->select('*');
            $this->db->where("nm_penyelenggara_peldik_list like '%".$searchTermpenyelenggara_peldik_list."%'");
            $fetched_records = $this->db->get('penyelenggara_peldik_list_list');
            $penyelenggara_peldik_list = $fetched_records->result_array();

            $data = array();
            
            return $data;
        }

/*

        function get_data_bank_by_nama_bank($nm_bank)
        {
            $hsl = $this->db->query("SELECT * FROM bank_list WHERE nm_bank='$nm_bank'");
                    if($hsl->num_rows()>0){
                        foreach ($hsl->result() as $data) {
                           
                            $hasil=array(
                                'id_bank'        => $data->id_bank,
                                'nm_bank'               => $data->nm_bank,
                                'cabang'              => $data->cabang,
                                'kota'              => $data->kota,
                                );
                        }
                    }
            return $hasil;
        }

*/

}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */
// $2y$10$ocTikbJfbC4Plas6pbFXlOVPr1ZVBvgi0epI/uvHX5IPThdp04D/C