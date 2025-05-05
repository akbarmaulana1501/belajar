<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit_usaha extends CI_Controller {

	public $data = [];

	public function __construct()
		{
			parent::__construct();
        	is_logged_in();
        	$this->load->model('M_unit_usaha','unit_usaha');
		}


    Private function id_unit_usahaOtomatis()
	    {
		    $ci 		= get_instance();
            $query 		= "SELECT MAX(CAST((substr(id_unit_usaha,4)) as unsigned)) as maxKode from unit_usaha";
            $data 		= $ci->db->query($query)->row();
            $kode 		= $data->maxKode;
            $kodeBaru 	= $kode + 1;
            $id 		= sprintf('UTU'."%06s",$kodeBaru);
			return $id;
	    }

	
	public function index()
		{
				$this->data['title'] 		= 'Unit Usaha';
                if (can_create() == 0) {
                  $this->data['TombolCreate']   = ''; 
                } else {
                    $this->data['TombolCreate']   = '<h4 class="page-title"><button type="button" class="btn btn-sm btn-primary waves-effect waves-light" onclick="add()"><i class="fe-plus-square"></i> Create </button></h4>';
                } 
				$this->data['create'] 		= 'Create';
                $this->data['edit']         = 'Update';
				$this->data['delete'] 		= 'Delete';
				$this->data['m'] 			= 'Unit Usaha';
				$this->data['ml'] 			= 'Unit Usaha List';
				$this->template->load('templates/master','admin/master/unit_usaha/list', $this->data);
		}

	public function ajax_list()
		{
        
			$list = $this->unit_usaha->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $rek_tok) {

				$no++;
				$row = array();
				

				$row[] = $no;
				$row[] = $rek_tok->id_unit_usaha;
				$row[] = $rek_tok->nama_unit_usaha;
				$row[] = $rek_tok->alamat;
				$row[] = $rek_tok->kel;
                $row[] = $rek_tok->kec;
                $row[] = $rek_tok->kab_kota;
                $row[] = $rek_tok->prov;
                $row[] = $rek_tok->no_telp;
                $row[] = $rek_tok->email;
                $row[] = $rek_tok->website;

                if (can_edit()) {
                      $row[] =                 
                    '<a href="javascript:void(0)" title="Hapus" class="badge badge-xs badge-danger" '.can_delete().' onclick="delete_data('."'".encrypt_url($rek_tok->id_unit_usaha)."'".')"><i class="fas fa-trash"></i> Delete </a>';
                } else if (can_delete()) {
                     $row[] =                 
                    '<a href="javascript:void(0)" title="Edit" class="badge badge-xs badge-primary"  '.can_edit().'  onclick="edit_data('."'".encrypt_url($rek_tok->id_unit_usaha)."'".')"><i class="fas fa-edit"> </i> Update </a>';
                } else if (can_delete() AND can_edit()) {
                    $row[] =                 
                    '<a href="javascript:void(0)" title="Edit" class="badge badge-xs badge-primary"  '.can_edit().'  onclick="edit_data('."'".encrypt_url($rek_tok->id_unit_usaha)."'".')"><i class="fas fa-edit"> </i> Update </a>

                    <a href="javascript:void(0)" title="Hapus" class="badge badge-xs badge-danger" '.can_delete().' onclick="delete_data('."'".encrypt_url($rek_tok->id_unit_usaha)."'".')"><i class="fas fa-trash"></i> Delete </a>'; 
                } else {
                    $row[] =                 
                    '<a href="javascript:void(0)" title="Edit" class="badge badge-xs badge-primary"  '.can_edit().'  onclick="edit_data('."'".encrypt_url($rek_tok->id_unit_usaha)."'".')"><i class="fas fa-edit"> </i> Update </a>

                    <a href="javascript:void(0)" title="Hapus" class="badge badge-xs badge-danger" '.can_delete().' onclick="delete_data('."'".encrypt_url($rek_tok->id_unit_usaha)."'".')"><i class="fas fa-trash"></i> Delete </a>'; 
                }
               
 
				$data[] = $row;
			}

			$output = array(
							"draw" 				=> $_POST['draw'],
							"recordsTotal" 		=> $this->unit_usaha->count_all(),
							"recordsFiltered" 	=> $this->unit_usaha->count_filtered(),
							"data" 				=> $data,
					);

			echo json_encode($output);
		}



    public function insert()
    {
        $this->_validate();
		$data  = array(
			'id_unit_usaha'	    => $this->id_unit_usahaOtomatis(),
            'nama_unit_usaha'   => str_replace("'", "", $this->input->post('nama_unit_usaha')),
            'alamat'            => str_replace("'", "", $this->input->post('alamat')),
            'kel'               => str_replace("'", "", $this->input->post('kel')),
            'kec'               => str_replace("'", "", $this->input->post('kec')),
            'kab_kota'          => str_replace("'", "", $this->input->post('kab_kota')),
            'prov'              => str_replace("'", "", $this->input->post('prov')),
            'no_telp'           => str_replace("'", "", $this->input->post('no_telp')),
            'email'             => str_replace("'", "", $this->input->post('email')),
            'website'           => str_replace("'", "", $this->input->post('website')),
            'logo'              => str_replace("'", "", $this->input->post('logo')),
            'favicon'           => str_replace("'", "", $this->input->post('favicon'))
        );
            $this->unit_usaha->insert("unit_usaha", $data);
            echo json_encode(array("status" => TRUE));
    }



    public function get_by_id($id_unit_usaha)
    {
            $data = $this->unit_usaha->get_by_id(decrypt_url($id_unit_usaha));
            echo json_encode($data);
    }


    public function update()
    {
        $this->_validate();
        $id         = str_replace("'", "", $this->input->post('id_unit_usaha'));
        // var_dump($id);die;
        $data  = array(
            'id_unit_usaha'     => str_replace("'", "", $this->input->post('id_unit_usaha')),
            'nama_unit_usaha'   => str_replace("'", "", $this->input->post('nama_unit_usaha')),
            'alamat'            => str_replace("'", "", $this->input->post('alamat')),
            'kel'               => str_replace("'", "", $this->input->post('kel')),
            'kec'               => str_replace("'", "", $this->input->post('kec')),
            'kab_kota'          => str_replace("'", "", $this->input->post('kab_kota')),
            'prov'              => str_replace("'", "", $this->input->post('prov')),
            'no_telp'           => str_replace("'", "", $this->input->post('no_telp')),
            'email'             => str_replace("'", "", $this->input->post('email')),
            'website'           => str_replace("'", "", $this->input->post('website')),
            'logo'              => str_replace("'", "", $this->input->post('logo')),
            'favicon'           => str_replace("'", "", $this->input->post('favicon'))
        );
        $this->unit_usaha->update($id, 'unit_usaha', $data);
        echo json_encode(array("status" => TRUE));
    }

    public function delete()
    {
        $id         = str_replace("'", "", $this->input->post('id_unit_usaha'));
        $this->unit_usaha->delete(decrypt_url($id), 'unit_usaha');        
        echo json_encode(array("status" => TRUE));
    }


	

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('nama_unit_usaha') == '')
        {
            $data['inputerror'][] = 'nama_unit_usaha';
            $data['error_string'][] = 'Data Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if($this->input->post('alamat') == '')
        {
            $data['inputerror'][] = 'alamat';
            $data['error_string'][] = 'Data Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if($this->input->post('kel') == '')
        {
            $data['inputerror'][] = 'kel';
            $data['error_string'][] = 'Data Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if($this->input->post('kec') == '')
        {
            $data['inputerror'][] = 'kec';
            $data['error_string'][] = 'Data Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }


        if($this->input->post('kab_kota') == '')
        {
            $data['inputerror'][] = 'kab_kota';
            $data['error_string'][] = 'Data Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if($this->input->post('prov') == '')
        {
            $data['inputerror'][] = 'prov';
            $data['error_string'][] = 'Data Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if($this->input->post('no_telp') == '')
        {
            $data['inputerror'][] = 'no_telp';
            $data['error_string'][] = 'Data Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if($this->input->post('email') == '')
        {
            $data['inputerror'][] = 'email';
            $data['error_string'][] = 'Data Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if($this->input->post('website') == '')
        {
            $data['inputerror'][] = 'website';
            $data['error_string'][] = 'Data Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        // if($this->input->post('logo') == '')
        // {
        //     $data['inputerror'][] = 'logo';
        //     $data['error_string'][] = 'Data Tidak Boleh Kosong';
        //     $data['status'] = FALSE;
        // }

        // if($this->input->post('favicon') == '')
        // {
        //     $data['inputerror'][] = 'favicon';
        //     $data['error_string'][] = 'Data Tidak Boleh Kosong';
        //     $data['status'] = FALSE;
        // }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
}

/* End of file unit_usaha.php */
/* Location: ./application/controllers/admin/unit_usaha.php */