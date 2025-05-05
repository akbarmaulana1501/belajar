<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berkas extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
            is_logged_in();
            $this->load->model('M_berkas');
            $this->load->model('M_berkas','berkas');

    }

    public function index()
    {
                       
        
        $this->data['title']        = 'berkas';

        $this->data['TombolCreate']   = '

        <h4 class="page-title"><button type="button" class="btn btn-sm btn-primary waves-effect waves-light" onclick="add()"><i class="fe-plus-square"></i> Create </button>

        <button type="button" class="btn btn-sm btn-primary waves-effect waves-light" onclick="reload_table()"><i class="fe-refresh-cw"></i> Reload </button>

        </h4>';

            $this->data['create']       = 'Create';
            $this->data['edit']         = 'Update';
            $this->data['delete']       = 'Delete';
            $this->data['m']            = 'Berkas';
            $this->data['ml']           = 'Berkas List';
            
        $this->template->load('templates/master','admin/berkas/list', $this->data);
    }

    public function ajax_list()
    {
        $list = $this->berkas->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $berkas) {
            $no++;
            $row = array();    

                $row[] = $no;

                $row[] =                 
                '<a href="javascript:void(0)" title="Update" class="btn-xs btn-primary waves-effect waves-light" onclick="update('."'".encrypt_url($berkas->id_berkas)."'".')"><i class="fas fa-edit"> </i> Update </a>

                <a href="javascript:void(0)" title="Hapus" class="btn-xs btn-danger waves-effect waves-light"  onclick="deletedata('."'".encrypt_url($berkas->id_berkas)."'".')"><i class="fas fa-trash"></i> Delete </a>'; 
             
                $row[] = $berkas->nm_berkas;

            $data[] = $row;
        }

        $output = array(
                        "draw"              => $_POST['draw'],
                        "recordsTotal"      => $this->berkas->count_all(),
                        "recordsFiltered"   => $this->berkas->count_filtered(),
                        "data"              => $data,
                );

        echo json_encode($output);
    }

public function get_berkas_like()
    {
        $searchTermBerkas  = str_replace("'", "", $this->input->post('searchTermBerkas'));
        $response           = $this->berkas->get_berkas_like($searchTermBerkas);
        echo json_encode($response);
    }

    function get_berkas()
    {
        $nm_berkas                = $this->input->post('nm_berkas');
        $data               = $this->berkas->get_data_berkas_by_id($id);
        echo json_encode($data);
    }


    Private function id_berkasOtomatis()
    {
        $ci         = get_instance();
        $query      = "SELECT MAX(CAST((substr(id_berkas,4)) as unsigned)) as maxKode from berkas_list";
        $data       = $ci->db->query($query)->row();
        $kode       = $data->maxKode;
        $kodeBaru   = $kode + 1;
        $id         = 'BS_'.$kodeBaru;
        return $id;
    }

    public function insert()
    {

        $this->_validate();

        $data  = array(
            'id_berkas'        => $this->id_berkasOtomatis(),
            'nm_berkas'        => str_replace("'", "", $this->input->post('addNamaberkas')),
            
        );

            $insert = $this->berkas->insert("berkas_list", $data);
            echo json_encode(array("status" => TRUE));
    }

    public function get_by_id($id_berkas)
    {
            $data = $this->berkas->get_by_id(decrypt_url($id_berkas));

            echo json_encode($data);
    }


    public function update()
    {
        $this->_validate();
        $id                                = str_replace("'", "", $this->input->post('id_berkas'));
        $data  = array(
                            'nm_berkas'         => str_replace("'", "", $this->input->post('addNamaberkas')),
                                                       
                        );

        $this->berkas->update(($id), 'berkas_list', $data);
        echo json_encode(array("status" => true));
    }

    public function delete()
    {
        $id         = str_replace("'", "", $this->input->post('id_berkas'));
        $this->berkas->delete(decrypt_url($id), 'berkas_list');                       
        echo json_encode(array("status" => TRUE));
    }

private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        
        if($this->input->post('addNamaberkas') == '')
        {
            $data['inputerror'][] = 'addNamaberkas';
            $data['error_string'][] = 'Nama berkas Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

                
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

}


/* End of file berkas.php */
/* Location: ./application/controllers/Dashboard.php */