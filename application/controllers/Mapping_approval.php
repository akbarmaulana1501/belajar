<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapping_approval extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
            is_logged_in();
            $this->load->model('M_mapping_approval','mapping_approval');

    }

    public function index()
    {
                       
        
        $this->data['title']        = 'Mapping Approval';

        $this->data['TombolCreate']   = '

        <h4 class="page-title"><button type="button" class="btn btn-sm btn-primary waves-effect waves-light" onclick="add()"><i class="fe-plus-square"></i> Create </button>

        <button type="button" class="btn btn-sm btn-primary waves-effect waves-light" onclick="reload_table()"><i class="fe-refresh-cw"></i> Reload </button>

        </h4>'; 

            $this->data['create']       = 'Create';
            $this->data['edit']         = 'Update';
            $this->data['delete']       = 'Delete';
            $this->data['m']            = 'Approval';
            $this->data['ml']           = 'Mapping Approval';
        $this->data['app']    = $this->App->aplikasi();
        $this->template->load('templates/master','admin/mapping_approval/list', $this->data);
    }


    private function dataGet(){
        $data = $this->mapping_approval->get_datatables();
        $approvedBy = [];
        foreach($data as $item) {
            $nama = "<li style='list-style-type: none;' ><a href='#' onclick='update(\"".encrypt_url($item["approval"])."\")'><i style='color:##338bd3;' class='mdi mdi-pencil-circle'></i></a>".$item["nama_approve"] .",". $item["approval"];
            if(!isset($approvedBy[$nama])) {
                $approvedBy[$nama] = null;
            }
            $approvedBy[$nama] .= "<li style='list-style-type: none;' ><a href='#' onclick='singleDelete(\"".encrypt_url($item["id_pegawai_approval"])."\")'><i style='color:#f7531f;' class='mdi mdi-minus-circle'></i></a>".$item["nama_pengajuan"]."</li>";
        }

        $output = [];
        foreach($approvedBy as $namaApprove => $namaPengaju) {
            $val = explode(",",$namaApprove);
            $output[] = [
                "nama_approve" => $val[0],
                "nama_pengajuan" => $namaPengaju,
                "id_pegawai_approval" => $val[1]
            ];
        }
        return $output;
    }

    public function ajax_list()
    {
        $list = $this->dataGet();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $mapping_approval) {
            $no++;
            $row = array();    

                $row[] = $no;

                $row[] =                 
                '<a href="javascript:void(0)" title="Hapus" class="btn-xs btn-danger waves-effect waves-light" onclick="deletedata('."'".encrypt_url($mapping_approval["id_pegawai_approval"])."'".')"><i class="fas fa-trash"></i> Delete </a>';
             
             
                $row[] = $mapping_approval["nama_approve"];
                $row[] = $mapping_approval["nama_pengajuan"];

            $data[] = $row;
        }
        

        $output = array(
                        "draw"              => $_POST['draw'],
                        "recordsTotal"      => $this->mapping_approval->count_all(),
                        "recordsFiltered"   => $this->mapping_approval->count_filtered(),
                        "data"              => $data,
                );

        echo json_encode($output);
    }

public function get_mapping_approval_like()
    {
        $searchTermApproval  = str_replace("'", "", $this->input->post('searchTermApproval'));
        $response           = $this->mapping_approval->get_mapping_approval_like($searchTermApproval);
        echo json_encode($response);
    }

    function get_mapping_approval()
    {
        $approval      = $this->input->post('approval');
        $data               = $this->mapping_approval->get_data_mapping_approval_by_id($id);
        echo json_encode($data);
    }


    Private function id_mapping_approvalOtomatis()
    {
        $ci         = get_instance();
        $query      = "SELECT MAX(CAST((substr(id_pegawai_approval,6)) as unsigned)) as maxKode from pegawai_approval";
        $data       = $ci->db->query($query)->row();
        $kode       = $data->maxKode;
        $kodeBaru   = $kode + 1;
        $id         = 'APRV_'.$kodeBaru;
        return $id;
    }

    public function insert()
    {
        $this->_validate(null);
        $data = array();
        $pengajuan = $this->input->post("addPengajuan");
        // $dtArray = explode(",",$pengajuan);
        $approval = $this->input->post('addApproval');
        for ($i=0; $i < count($pengajuan); $i++) {
            $data  = array(
                'id_pegawai_approval'        => $this->id_mapping_approvalOtomatis(),
                'approval'                     => $approval,
                'pengajuan'                     => $pengajuan[$i],
            );
            $this->mapping_approval->insert("pegawai_approval", $data);
        }
            echo json_encode(array("status" => TRUE));
    }

    public function get_by_id(){
            $id_pegawai = $this->input->post('id_peg');
            $data = $this->mapping_approval->get_by_id(decrypt_url($id_pegawai));
            echo json_encode($data);
    }


    public function update()
    {
        $this->_validate("update");
        $dataBaru    = str_replace("'", "", $this->input->post('addApproval'));
        $dataLama = str_replace("'","",$this->input->post('addPengajuan'));
        $this->mapping_approval->update($dataBaru,$dataLama);
        echo json_encode(array("status" => true));
    }

    public function delete()
    {
        $id         = str_replace("'", "", $this->input->post('id_pegawai_approval'));
        $this->mapping_approval->delete(decrypt_url($id), 'pegawai_approval','all');                       
        echo json_encode(array("status" => TRUE));
    }

    public function singleDelete()
    {
        $id         = str_replace("'", "", $this->input->post('id'));
        $this->mapping_approval->delete(decrypt_url($id), 'pegawai_approval','single');                       
        echo json_encode(array("status" => TRUE));
    }

private function _validate($params){
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        switch ($params) {
            case 'update':
                if($this->input->post('addApproval') == ''){
                    $data['inputerror'][] = 'addApproval';
                    $data['error_string'][] = 'Nama Approval Tidak Boleh Kosong';
                    $data['status'] = FALSE;
                }
                break;
            
            default:
                if($this->input->post('addApproval') == ''){
                    $data['inputerror'][] = 'addApproval';
                    $data['error_string'][] = 'Nama Approval Tidak Boleh Kosong';
                    $data['status'] = FALSE;
                }
        
                if($this->input->post('addPengajuan') == ''){
                    $data['inputerror'][] = 'addPengajuan';
                    $data['error_string'][] = 'Nama Pengajuan Tidak Boleh Kosong';
                    $data['status'] = FALSE;
                }
                break;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    public function get_list_pegawai(){
        $data = $this->mapping_approval->get_select_list('pegawai');
        echo json_encode($data);
    }

}


/* End of file jenis_izin.php */
/* Location: ./application/controllers/Dashboard.php */