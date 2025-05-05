<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyelenggara_peldik extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
            is_logged_in();
            $this->load->model('M_penyelenggara_peldik');
            $this->load->model('M_penyelenggara_peldik','penyelenggara_peldik');

    }

    public function index()
    {
                       
        
        $this->data['title']        = 'Penyelenggara Pelatihan dan Diklat';

                $this->data['TombolCreate']   = '

                <h4 class="page-title"><button type="button" class="btn btn-sm btn-primary waves-effect waves-light" onclick="add()"><i class="fe-plus-square"></i> Create </button>

                <button type="button" class="btn btn-sm btn-primary waves-effect waves-light" onclick="reload_table()"><i class="fe-refresh-cw"></i> Reload </button>

                </h4>';

            $this->data['create']       = 'Create';
            $this->data['edit']         = 'Update';
            $this->data['delete']       = 'Delete';
            $this->data['m']            = 'Penyelenggara Pelatihan dan Diklat';
            $this->data['ml']           = 'Penyelenggara PelDik List';
            
        $this->template->load('templates/master','admin/penyelenggara_peldik/list', $this->data);
    }

    public function ajax_list()
    {
        $list = $this->penyelenggara_peldik->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $penyelenggara_peldik) {
            $no++;
            $row = array();    

                $row[] = $no;

                $row[] =                 
                '<a href="javascript:void(0)" title="Update" class="btn-xs btn-primary waves-effect waves-light"  onclick="update('."'".encrypt_url($penyelenggara_peldik->id_penyelenggara_peldik_list)."'".')"><i class="fas fa-edit"> </i> Update </a>

                <a href="javascript:void(0)" title="Hapus" class="btn-xs btn-danger waves-effect waves-light" onclick="deletedata('."'".encrypt_url($penyelenggara_peldik->id_penyelenggara_peldik_list)."'".')"><i class="fas fa-trash"></i> Delete </a>'; 
            
             
                $row[] = $penyelenggara_peldik->nm_penyelenggara_peldik_list;

            $data[] = $row;
        }

        $output = array(
                        "draw"              => $_POST['draw'],
                        "recordsTotal"      => $this->penyelenggara_peldik->count_all(),
                        "recordsFiltered"   => $this->penyelenggara_peldik->count_filtered(),
                        "data"              => $data,
                );

        echo json_encode($output);
    }

public function get_penyelenggara_peldik_like()
    {
        $searchTermpenyelenggara_peldik  = str_replace("'", "", $this->input->post('searchTermpenyelenggara_peldik'));
        $response           = $this->penyelenggara_peldik->get_penyelenggara_peldik_like($searchTermpenyelenggara_peldik);
        echo json_encode($response);
    }

    function get_penyelenggara_peldik()
    {
        $nm_penyelenggara_peldik_list                = $this->input->post('nm_penyelenggara_peldik_list');
        $data               = $this->penyelenggara_peldik->get_data_penyelenggara_peldik_by_id($id);
        echo json_encode($data);
    }


    Private function id_penyelenggara_peldikOtomatis()
    {
        $ci         = get_instance();
        $query      = "SELECT MAX(CAST((substr(id_penyelenggara_peldik_list,4)) as unsigned)) as maxKode from penyelenggara_peldik_list";
        $data       = $ci->db->query($query)->row();
        $kode       = $data->maxKode;
        $kodeBaru   = $kode + 1;
        $id         = 'PD_'.$kodeBaru;
        return $id;
    }

    public function insert()
    {

        $this->_validate();

        $data  = array(
            'id_penyelenggara_peldik_list'        => $this->id_penyelenggara_peldikOtomatis(),
            'nm_penyelenggara_peldik_list'        => str_replace("'", "", $this->input->post('addNamapenyelenggara_peldik')),
            
        );

            $insert = $this->penyelenggara_peldik->insert("penyelenggara_peldik_list", $data);
            echo json_encode(array("status" => TRUE));
    }

    public function get_by_id($id_penyelenggara_peldik_list)
    {
            $data = $this->penyelenggara_peldik->get_by_id(decrypt_url($id_penyelenggara_peldik_list));

            echo json_encode($data);
    }


    public function update()
    {
        $this->_validate();
        $id                                = str_replace("'", "", $this->input->post('id_penyelenggara_peldik_list'));
        $data  = array(
                            'nm_penyelenggara_peldik_list'         => str_replace("'", "", $this->input->post('addNamapenyelenggara_peldik')),
                                                       
                        );

        $this->penyelenggara_peldik->update(($id), 'penyelenggara_peldik_list', $data);
        echo json_encode(array("status" => true));
    }

    public function delete()
    {
        $id         = str_replace("'", "", $this->input->post('id_penyelenggara_peldik_list'));
        $this->penyelenggara_peldik->delete(decrypt_url($id), 'penyelenggara_peldik_list');                       
        echo json_encode(array("status" => TRUE));
    }

private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        
        if($this->input->post('addNamapenyelenggara_peldik') == '')
        {
            $data['inputerror'][] = 'addNamapenyelenggara_peldik';
            $data['error_string'][] = 'Nama Pengelenggara Pelatihan Diklat Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

                
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

}


/* End of file penyelenggara_peldik.php */
/* Location: ./application/controllers/Dashboard.php */