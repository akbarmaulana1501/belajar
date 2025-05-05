<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model 
{
	var $table          = 'user';
	var $id             = 'user_id';
	var $column_order   = array('user_id','pegawai.id_pegawai','user.nama','user.email','user.role_id','user.is_active','user.date_created');
	var $column_search  = array('user_id','pegawai.id_pegawai','user.nama','user.email','user.role_id','user.is_active','user.date_created');
	var $order          = array('_user_role.id' => 'ASC','unit_usaha.id_unit_usaha' => 'ASC'); 

	public function __construct()
	{
		parent::__construct();
	}

	// function get()
	// {
	// 	$query = $this->db->get($this->table)->result_array();
	// 	return $query;  
	// }  

	private function _get_datatables_query()
	{
		// $this->db->select('*');

		// $this->db->where(array("user.id_pegawai" => $this->session->userdata('id_pegawai')));

		// $this->db->join('_application', '_application.id_application = user.id_application', 'left');
		// $this->db->join('_user_role', '_user_role.id = user.role_id', 'left');
		// $this->db->join('pegawai', 'pegawai.id_pegawai = user.id_pegawai', 'left');
		// $this->db->join('pegawai_penempatan', 'pegawai_penempatan.id_pegawai = pegawai.id_pegawai', 'left');
		// $this->db->join('unit_usaha', 'unit_usaha.id_unit_usaha = pegawai_penempatan.id_unit_usaha', 'left');
		// $this->db->join('unit_level', 'unit_level.id_unit_level = pegawai_penempatan.id_unit_level', 'left');
		// $this->db->join('unit_kerja_sub', 'unit_kerja_sub.id_unit_kerja_sub = pegawai_penempatan.id_unit_kerja_sub', 'left');
		// $this->db->from($this->table);

		//

		//jika yang login bukan role id 1 = Administrator      
		if ($this->session->userdata('role_id') == 1) {
			$this->db->select('user.user_id,user.is_active,user.email,pegawai.nik,pegawai.nama,_user_role.role,unit_usaha.nm_unit_usaha,unit_kerja_sub.nm_unit_kerja_sub,unit_level.nm_unit_level,user.date_created');

            if ($this->input->post('filter_unit') AND $this->input->post('filter_role')) {
            $this->db->where(array("pegawai_penempatan.id_unit_usaha" => $this->input->post('filter_unit'),"user.role_id" => $this->input->post('filter_role')));

            } elseif ($this->input->post('filter_unit')) {
                
            $this->db->where(array("pegawai_penempatan.id_unit_usaha" => $this->input->post('filter_unit')));
            } elseif ($this->input->post('filter_role')) {
                $this->db->where(array("user.role_id" => $this->input->post('filter_role')));
            }


            $this->db->join('_application', '_application.id_application = user.id_application', 'left');
            $this->db->join('_user_role', '_user_role.id = user.role_id', 'left');
            $this->db->join('pegawai', 'pegawai.id_pegawai = user.id_pegawai', 'left');
            $this->db->join('pegawai_penempatan', 'pegawai_penempatan.id_pegawai = pegawai.id_pegawai', 'left');
            $this->db->join('unit_usaha', 'unit_usaha.id_unit_usaha = pegawai_penempatan.id_unit_usaha', 'left');
            $this->db->join('unit_level', 'unit_level.id_unit_level = pegawai_penempatan.id_unit_level', 'left');
            $this->db->join('unit_kerja_sub', 'unit_kerja_sub.id_unit_kerja_sub = pegawai_penempatan.id_unit_kerja_sub', 'left');
            $this->db->from($this->table);

        } else if ($this->session->userdata('role_id') == 2) { 
           $this->db->select('user.user_id,user.is_active,user.email,pegawai.nik,pegawai.nama,_user_role.role,unit_usaha.nm_unit_usaha,unit_kerja_sub.nm_unit_kerja_sub,unit_level.nm_unit_level,user.date_created');

        if ($this->input->post('filter_unit') AND $this->input->post('filter_role')) {
            $this->db->where(array("pegawai_penempatan.id_unit_usaha" => $this->input->post('filter_unit')));
            $this->db->where('user.role_id !=', 1);
            $this->db->or_where('user.role_id', $this->input->post('filter_role'));
        } elseif ($this->input->post('filter_unit')) {
            
            $this->db->where(array("pegawai_penempatan.id_unit_usaha" => $this->input->post('filter_unit')));

            $this->db->where('user.role_id !=', 1);
        } elseif ($this->input->post('filter_role')) {

            $this->db->where('user.role_id !=', 1);
            $this->db->where('user.role_id', $this->input->post('filter_role'));
        } else {
            
            $this->db->where('user.role_id !=', 1);
        }

        $this->db->join('_application', '_application.id_application = user.id_application', 'left');
        $this->db->join('_user_role', '_user_role.id = user.role_id', 'left');
        $this->db->join('pegawai', 'pegawai.id_pegawai = user.id_pegawai', 'left');
        $this->db->join('pegawai_penempatan', 'pegawai_penempatan.id_pegawai = pegawai.id_pegawai', 'left');
        $this->db->join('unit_usaha', 'unit_usaha.id_unit_usaha = pegawai_penempatan.id_unit_usaha', 'left');
        $this->db->join('unit_level', 'unit_level.id_unit_level = pegawai_penempatan.id_unit_level', 'left');
        $this->db->join('unit_kerja_sub', 'unit_kerja_sub.id_unit_kerja_sub = pegawai_penempatan.id_unit_kerja_sub', 'left');
        $this->db->from($this->table);

    }
    else if ($this->session->userdata('role_id') == 3) { 
       $this->db->select('user.user_id,user.is_active,user.email,pegawai.nik,pegawai.nama,_user_role.role,unit_usaha.nm_unit_usaha,unit_kerja_sub.nm_unit_kerja_sub,unit_level.nm_unit_level,user.date_created');

       if ($this->input->post('filter_unit_kerja_sub') AND $this->input->post('filter_role')) {
            
            $this->db->where('pegawai_penempatan.id_unit_kerja_sub', $this->input->post('filter_unit_kerja_sub'));
            $this->db->where('pegawai_penempatan.id_unit_usaha', $this->App->aplikasi()['id_unit_usaha']);
            $this->db->where('user.role_id', $this->input->post('filter_role'));
            $this->db->where('pegawai_penempatan.id_unit_kerja_sub', $this->input->post('filter_unit_kerja_sub'));
            $this->db->where('user.role_id !=', 1);
            $this->db->where('pegawai.status_aktif', 1);

        } elseif ($this->input->post('filter_unit_kerja_sub')) {
            
            $this->db->where('pegawai_penempatan.id_unit_usaha', $this->App->aplikasi()['id_unit_usaha']);
            $this->db->where('pegawai_penempatan.id_unit_kerja_sub', $this->input->post('filter_unit_kerja_sub'));
            $this->db->where('user.role_id !=', 1);
            $this->db->where('pegawai.status_aktif', 1);

        } elseif ($this->input->post('filter_role')) {

            $this->db->where('pegawai_penempatan.id_unit_usaha', $this->App->aplikasi()['id_unit_usaha']);
            $this->db->where('user.role_id', $this->input->post('filter_role'));
            $this->db->where('user.role_id !=', 1);
            $this->db->where('pegawai.status_aktif', 1);
        } else {
            
            $this->db->where('pegawai_penempatan.id_unit_usaha', $this->App->aplikasi()['id_unit_usaha']);
            $this->db->where('user.role_id !=', 1);
            $this->db->where('pegawai.status_aktif', 1);
        }

       $this->db->join('_application', '_application.id_application = user.id_application', 'left');
       $this->db->join('_user_role', '_user_role.id = user.role_id', 'left');
       $this->db->join('pegawai', 'pegawai.id_pegawai = user.id_pegawai', 'left');
       $this->db->join('pegawai_penempatan', 'pegawai_penempatan.id_pegawai = pegawai.id_pegawai', 'left');
       $this->db->join('unit_usaha', 'unit_usaha.id_unit_usaha = pegawai_penempatan.id_unit_usaha', 'left');
       $this->db->join('unit_level', 'unit_level.id_unit_level = pegawai_penempatan.id_unit_level', 'left');
       $this->db->join('unit_kerja_sub', 'unit_kerja_sub.id_unit_kerja_sub = pegawai_penempatan.id_unit_kerja_sub', 'left');

       $this->db->from($this->table);

   }
		//

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

        function get_by_id($user_id) {   
        	$this->db->where('user_id',$user_id);
        	$this->db->select('
        		pegawai.id_pegawai,
        		pegawai.nik,
        		pegawai.nama,
        		pegawai.email,

        		_user_role.id as role_id,

        		unit_usaha.nm_unit_usaha,
        		unit_level.nm_unit_level,
        		unit_kerja_sub.nm_unit_kerja_sub,
        		user.image,
        		user.is_active,

        		');

        	$this->db->join('_user_role', '_user_role.id = user.role_id', 'left');
        	$this->db->join('pegawai', 'pegawai.id_pegawai = user.id_pegawai', 'left');
        	$this->db->join('pegawai_penempatan', 'pegawai_penempatan.id_pegawai = pegawai.id_pegawai', 'left');
        	$this->db->join('unit_usaha', 'unit_usaha.id_unit_usaha = pegawai_penempatan.id_unit_usaha', 'left');
        	$this->db->join('unit_level', 'unit_level.id_unit_level = pegawai_penempatan.id_unit_level', 'left');
        	$this->db->join('unit_kerja_sub', 'unit_kerja_sub.id_unit_kerja_sub = pegawai_penempatan.id_unit_kerja_sub', 'left');
        	return $this->db->get($this->table)->row();
        }


        function cek_user($email,$role_id) {   

        	$this->db->where(array(
        		'user.email'=>$email,
        		'user.role_id'=> $role_id,
        	)
        );



        	return $this->db->get('user');
        }

        function insert($table, $data)
        {
        	$query = $this->db->insert($table, $data);
        	return $query;
        } 


        function update($id,$table, $data)
        {
        	$this->db->where('user_id', $id);
        	$this->db->update($table, $data);
        }


        function delete($id, $table)
        {
        	$this->db->where('user_id', $id);
        	$this->db->delete($table);
        }

        function is_active($id,$table, $data)
        {
        	$this->db->where('user_id', $id);
        	$this->db->update($table, $data);
        }
        
        function non_active($id,$table, $data)
        {
        	$this->db->where('user_id', $id);
        	$this->db->update($table, $data);
        }

        function get_pegawai_like($searchTermPegawai="")
        {
            if ($this->session->userdata('role_id') == 1) {

                $this->db->select('*');
                $this->db->where("nik like '%".$searchTermPegawai."%' OR nama like '%".$searchTermPegawai."%'");
                $fetched_records = $this->db->get('pegawai');
                $pegawai = $fetched_records->result_array();

                $data = array();
                foreach($pegawai as $pegawai){
                    $data[] = array("id"=>$pegawai['nik'], "text"=>$pegawai['nik'].' - '.$pegawai['nama']);
                }
                return $data;

            }

            else if ($this->session->userdata('role_id') == 2) { 

                $this->db->select('*');
                $this->db->where("nik like '%".$searchTermPegawai."%' OR nama like '%".$searchTermPegawai."%'");
                $fetched_records = $this->db->get('pegawai');
                $pegawai = $fetched_records->result_array();

                $data = array();
                foreach($pegawai as $pegawai){
                    $data[] = array("id"=>$pegawai['nik'], "text"=>$pegawai['nik'].' - '.$pegawai['nama']);
                }
                return $data;

            }

            else if ($this->session->userdata('role_id') == 3) { 

                // $id_unt_lvl = $this->get_id_unit_level_by_id_pegawai();
                $id_unt_ush = $this->get_id_unit_usaha_by_id_pegawai();

                $this->db->select('*');
                $this->db->where("nik like '%".$searchTermPegawai."%' OR nama like '%".$searchTermPegawai."%'");
                // $this->db->where_in('id_unit_level', ['A2', 'A113', 'A14', 'A15']);
                $this->db->where('id_unit_usaha',$id_unt_ush);
                $this->db->join('pegawai_penempatan', 'pegawai_penempatan.id_pegawai = pegawai.id_pegawai', 'left');
                $fetched_records = $this->db->get('pegawai');
                $pegawai = $fetched_records->result_array();

                $data = array();
                foreach($pegawai as $pegawai){
                    $data[] = array("id"=>$pegawai['nik'], "text"=>$pegawai['nik'].' - '.$pegawai['nama']);
                }
                return $data;

            }
        }

        function get_data_pegawai_by_nik($nik)
        {
            $hsl = $this->db->query("SELECT * FROM pegawai WHERE nik='$nik'");
            if($hsl->num_rows()>0){
                foreach ($hsl->result() as $data) {

                    $hasil=array(
                        'id_pegawai'        => $data->id_pegawai,
                        'nik'               => $data->nik,
                        'nama'              => $data->nama,
                        'email'              => $data->email,
                    );
                }
            }
            return $hasil;
        }

        function get_id_unit_usaha_by_id_pegawai(){
            $this->db->select('unit_usaha.id_unit_usaha');
            $this->db->where(array("pegawai_penempatan.id_pegawai" => $this->session->userdata('id_pegawai')));
            $this->db->join('unit_usaha', 'unit_usaha.id_unit_usaha = pegawai_penempatan.id_unit_usaha', 'left');
            $query = $this->db->get('pegawai_penempatan');
            $results = $query->row_array();
            return $results['id_unit_usaha'];
        } 


        // SELECT pegawai.nama, pegawai_penempatan.id_unit_level, pegawai_penempatan.id_unit_usaha FROM pegawai, pegawai_penempatan WHERE pegawai.id_pegawai=pegawai_penempatan.id_pegawai AND pegawai_penempatan.id_unit_level >= 'A12' AND;

        // function get_id_unit_level_by_id_pegawai(){
        //     $id_pegawai     = $this->session->userdata('id_pegawai');
        //     $this->db->select('pegawai_penempatan.id_unit_level');
        //     $this->db->where('pegawai_penempatan.id_pegawai',$id_pegawai);
        //     $query = $this->db->get('pegawai_penempatan');
        //     $results = $query->row_array();
        //     return $results['id_unit_level'];
        // }

        // function increment_id_unit_level($id_unit_level, $n) {
        //     $prefix = substr($id_unit_level, 0, 1); // ambil huruf awal
        //     $suffix = substr($id_unit_level, 1); // ambil angka
        //     $new_suffix = intval($suffix) + $n; // tambahkan nilai n ke angka dan ubah ke integer
        //     $new_values = array(); // array untuk menampung hasil increment
        //     for ($i = 1; $i <= $n; $i++) {
        //         $new_values[] = $prefix . strval($new_suffix - $n + $i); // tambahkan nilai hasil increment ke array
        //     }
        //     return $new_values; // kembalikan array hasil increment
        // }

        public function get_role(){

            if ($this->session->userdata('role_id') == 1) {

                $role = $this->db->get('_user_role');

                return $role->result_array();

            } else if ($this->session->userdata('role_id') == 2) {

                $this->db->where('id !=',1);
                $role = $this->db->get('_user_role');

                return $role->result_array();

            }else if ($this->session->userdata('role_id') == 3) {

                $this->db->where('id !=',1);
                $this->db->where('id !=',2);
                $role = $this->db->get('_user_role');

                return $role->result_array();

            }

        }

        public function get_unit_usaha(){
            $this->db->select('unit_usaha.id_unit_usaha, unit_usaha.nm_unit_usaha');

            $unit = $this->db->get('unit_usaha');

            return $unit->result_array();
        }

        public function get_unit_kerja_sub(){
            $this->db->select('unit_kerja_sub.id_unit_kerja_sub, unit_kerja_sub.nm_unit_kerja_sub');
            $this->db->where('pegawai_penempatan.id_unit_usaha',$this->App->aplikasi()['id_unit_usaha']);
            $this->db->join('pegawai', 'pegawai.id_pegawai = user.id_pegawai', 'left');
            $this->db->join('pegawai_penempatan', 'pegawai_penempatan.id_pegawai = pegawai.id_pegawai', 'left');
            $this->db->join('unit_kerja_sub', 'unit_kerja_sub.id_unit_kerja_sub = pegawai_penempatan.id_unit_kerja_sub', 'left');
            $this->db->group_by('pegawai_penempatan.id_unit_kerja_sub');
            $unit = $this->db->get('user');

            return $unit->result_array();
        }

    }

    /* End of file M_user.php */
    /* Location: ./application/models/M_user.php */
// $2y$10$ocTikbJfbC4Plas6pbFXlOVPr1ZVBvgi0epI/uvHX5IPThdp04D/C