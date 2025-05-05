<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
            is_logged_in();
            $this->load->model('M_bank');
            $this->load->model('M_bank','bank');

    }

    public function index()
    {
                       
        
        $this->data['title']        = 'Bank';

            $this->data['TombolCreate']   = '

                <h4 class="page-title"><button type="button" class="btn btn-sm btn-primary waves-effect waves-light" onclick="add()"><i class="fe-plus-square"></i> Create </button>

                <button type="button" class="btn btn-sm btn-primary waves-effect waves-light" onclick="reload_table()"><i class="fe-refresh-cw"></i> Reload </button>

                </h4>';

            $this->data['create']       = 'Create';
            $this->data['edit']         = 'Update';
            $this->data['delete']       = 'Delete';
            $this->data['m']            = 'Bank';
            $this->data['ml']           = 'Bank List';
        $this->data['app']    = $this->App->aplikasi();
        $this->template->load('templates/master','admin/bank/list', $this->data);
    }

    public function ajax_list()
    {
        $list = $this->bank->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $bank) {
            $no++;
            $row = array();    

                $row[] = $no;

                $row[] =                 
                '<a href="javascript:void(0)" title="Update" class="btn-xs btn-primary waves-effect waves-light" onclick="update('."'".encrypt_url($bank->id_bank)."'".')"><i class="fas fa-edit"> </i> Update </a>

                <a href="javascript:void(0)" title="Hapus" class="btn-xs btn-danger waves-effect waves-light" onclick="deletedata('."'".encrypt_url($bank->id_bank)."'".')"><i class="fas fa-trash"></i> Delete </a>';
             
                $row[] = $bank->nm_bank;
                $row[] = $bank->cabang;
                $row[] = $bank->kota;
                          

            $data[] = $row;
        }

        $output = array(
                        "draw"              => $_POST['draw'],
                        "recordsTotal"      => $this->bank->count_all(),
                        "recordsFiltered"   => $this->bank->count_filtered(),
                        "data"              => $data,
                );

        echo json_encode($output);
    }

public function get_bank_like()
    {
        $searchTermBank  = str_replace("'", "", $this->input->post('searchTermBank'));
        $response           = $this->bank->get_bank_like($searchTermBank);
        echo json_encode($response);
    }

    function get_bank()
    {
        $nm_bank                = $this->input->post('nm_bank');
        $data               = $this->bank->get_data_bank_by_id($id);
        echo json_encode($data);
    }


    Private function id_bankOtomatis()
    {
        $ci         = get_instance();
        $query      = "SELECT MAX(CAST((substr(id_bank,4)) as unsigned)) as maxKode from bank_list";
        $data       = $ci->db->query($query)->row();
        $kode       = $data->maxKode;
        $kodeBaru   = $kode + 1;
        $id         = 'BK_'.$kodeBaru;
        return $id;
    }

    public function insert()
    {
        $this->_validate();
        $data  = array(
            'id_bank'        => $this->id_bankOtomatis(),
            'nm_bank'        => str_replace("'", "", $this->input->post('addNamabank')),
            'cabang'         => str_replace("'", "", $this->input->post('addCabangbank')),
            'kota'           => str_replace("'", "", $this->input->post('addKotabank')),
        );

            $insert = $this->bank->insert("bank_list", $data);
            echo json_encode(array("status" => TRUE));
    }

    public function get_by_id($id_bank)
    {
            $data = $this->bank->get_by_id(decrypt_url($id_bank));

            echo json_encode($data);
    }


    public function update()
    {
        $this->_validate();
        $id                                = str_replace("'", "", $this->input->post('id_bank'));
        $data  = array(
                            'nm_bank'         => str_replace("'", "", $this->input->post('addNamabank')),
                            'cabang'          => str_replace("'", "", $this->input->post('addCabangbank')),
                            'kota'            => str_replace("'", "", $this->input->post('addKotabank')),
                            
                        );

        $this->bank->update(($id), 'bank_list', $data);
        echo json_encode(array("status" => true));
    }

    public function delete()
    {
        $id         = str_replace("'", "", $this->input->post('id_bank'));
        $this->bank->delete(decrypt_url($id), 'bank_list');                       
        echo json_encode(array("status" => TRUE));
    }

private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        
        if($this->input->post('addNamabank') == '')
        {
            $data['inputerror'][] = 'addNamabank';
            $data['error_string'][] = 'Nama Bank Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if($this->input->post('addCabangbank') == '')
        {
            $data['inputerror'][] = 'addCabangbank';
            $data['error_string'][] = 'Cabang Bank Data Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if($this->input->post('addKotabank') == '')
        {
            $data['inputerror'][] = 'addKotabank';
            $data['error_string'][] = 'Kota Bank Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

}


/* End of file bank.php */
/* Location: ./application/controllers/Dashboard.php */