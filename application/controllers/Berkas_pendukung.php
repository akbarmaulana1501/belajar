<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'third_party/vendor/autoload.php';

class Berkas_pendukung extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
            is_logged_in();
            $this->load->library('upload');
            $this->load->model('M_berkas_pendukung');
            $this->load->model('M_berkas_pendukung','berkas_pendukung');

    }

    public function index()
    {
                       
        
        $this->data['title']        = 'Berkas Pendukung';

        $this->data['TombolCreate']   = '

        <h4 class="page-title"><button type="button" class="btn btn-sm btn-primary waves-effect waves-light" onclick="add()"><i class="fe-plus-square"></i> Create </button>

        <button type="button" class="btn btn-sm btn-primary waves-effect waves-light" onclick="reload_table()"><i class="fe-refresh-cw"></i> Reload </button>

        </h4>';

            $this->data['create']       = 'Create';
            $this->data['edit']         = 'Update';
            $this->data['delete']       = 'Delete';
            $this->data['m']            = 'Berkas';
            $this->data['ml']           = 'Berkas List';

        $id_pegawai  = $this->session->userdata('id_pegawai');
        $this->template->load('templates/master','admin/berkas_pendukung/list', $this->data);
    }

    public function ajax_list()
    {
        $list = $this->berkas_pendukung->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $berkas_pendukung) {
            $no++;
            $row = array();    

                $row[] = $no;

                $row[] =                 
                '<a href="javascript:void(0)" title="Update" class="btn-xs btn-primary waves-effect waves-light" onclick="update('."'".encrypt_url($berkas_pendukung->id_berkas_pendukung)."'".')"><i class="fas fa-edit"> </i> Update </a>

                <a href="javascript:void(0)" title="Hapus" class="btn-xs btn-danger waves-effect waves-light"  onclick="deletedata('."'".encrypt_url($berkas_pendukung->id_berkas_pendukung)."'".')"><i class="fas fa-trash"></i> Delete </a>'; 
             
                $row[] = $berkas_pendukung->nama_berkas_pendukung;
                // $row[] = $berkas_pendukung->upload_berkas_pendukung;
                $row[] = '<a href="'.base_url("image/berkas_pendukung/".$berkas_pendukung->upload_berkas_pendukung).'" title="Download" class="btn-xs btn-success waves-effect waves-light" download><i class="fas fa-download"></i> Download</a>';
                $row[] = $berkas_pendukung->time_upload;

            $data[] = $row;
        }

        $output = array(
                        "draw"              => $_POST['draw'],
                        "recordsTotal"      => $this->berkas_pendukung->count_all(),
                        "recordsFiltered"   => $this->berkas_pendukung->count_filtered(),
                        "data"              => $data,
                );

        echo json_encode($output);
    }

    public function do_upload(){
        if (!$this->upload->do_upload('image')) //upload and validate
        {
            $data['inputerror'][] = 'image';
            $data['error_string'][] = 'Upload error: ' . $this->upload->display_errors('', ''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }

    public function get_upload_berkas_by_id($id_pegawai)
    {
        $data = $this->pegawai->get_upload_berkas_by_id(decrypt_url($id_pegawai));
        echo json_encode($data);
    }

    public function get_berkas_like()
    {
        $searchTermBerkas  = str_replace("'", "", $this->input->post('searchTermBerkas'));
        $response           = $this->berkas_pendukung->get_berkas_like($searchTermBerkas);
        echo json_encode($response);
    }

    function get_berkas()
    {
        $nm_berkas                = $this->input->post('nm_berkas');
        $data               = $this->berkas_pendukung->get_data_berkas_by_id($id);
        echo json_encode($data);
    }

    // public function delete()
    // {
    //     $id         = str_replace("'", "", $this->input->post('id_berkas_pendukung'));
    //     $this->berkas_pendukung->delete(decrypt_url($id), 'berkas_pendukung');                       
    //     echo json_encode(array("status" => TRUE));
    // }

    Private function id_berkasOtomatis()
    {
        $ci         = get_instance();
        $query      = "SELECT MAX(CAST((substr(id_berkas_pendukung,9)) as unsigned)) as maxKode from berkas_pendukung";
        $data       = $ci->db->query($query)->row();
        $kode       = $data->maxKode;
        $kodeBaru   = $kode + 1;
        $id         = 'B_PDKNG_'.$kodeBaru;
        return $id;
    }

    public function insert()
    {

        // $this->_validate();
        $config['upload_path'] = "./image/berkas_pendukung";
        $config['allowed_types'] = 'pdf';
        $config['encrypt_name'] = TRUE;
        $config['overwrite'] = FALSE;
        $config["max_size"] = 4096;
        $config['file_name'] = round(microtime(true) * 1000);

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        //get Payload
        $upload = $this->upload->do_upload("BerkasPend");

        //id_berkas_pegawai
        $id_pegawai  = $this->session->userdata('id_pegawai');
        $fileData = $this->upload->data();
        if (!$upload) {
            $status = FALSE;
            $msg = $this->upload->display_errors("", "");
        } else {
            $status = TRUE;
            $msg = "Berkas Berhasil dihapus";
            $newFileName = $this->input->post('addNamaberkas') . '.' . pathinfo($fileData['file_name'], PATHINFO_EXTENSION);
            rename($fileData['full_path'], $fileData['file_path'] . $newFileName);
            $data = [
                'id_berkas_pendukung' => $this->id_berkasOtomatis(),
                'id_pegawai' => $id_pegawai,
                'nama_berkas_pendukung' => $this->input->post('addNamaberkas'),
                'upload_berkas_pendukung' => $newFileName,
                'time_upload' => date("Y-m-d H:i:s")
            ];

            $insert = $this->berkas_pendukung->insert("berkas_pendukung", $data);
        }

        echo json_encode(array("status" => $status, "msg" => $msg));
    }

    public function update()
    {
        // $this->_validate();
        $config['upload_path'] = "./image/berkas_pendukung";
        $config['allowed_types'] = 'pdf';
        $config['encrypt_name'] = TRUE;
        $config['overwrite'] = FALSE;
        $config["max_size"] = 4096;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $upload = $this->upload->do_upload("BerkasPend");
        $fileData = $this->upload->data();
        
        $id = $this->input->post('id_berkas_pendukung');
        $fileName = null;
        $fileName = $this->_getFileNameBerkas($id);
        $id_pegawai  = $this->session->userdata('id_pegawai');
        if (!$upload) {
            $status = FALSE;
            $msg = $this->upload->display_errors($id);
        } else {
            if ($fileName != null) {
                unlink("./image/berkas_pendukung/". $fileName);
            }
            $status = TRUE;
            $msg = "Berkas Berhasil di Upload";
            $newFileName = $this->input->post('addNamaberkas') . '.' . pathinfo($fileData['file_name'], PATHINFO_EXTENSION);
            rename($fileData['full_path'], $fileData['file_path'] . $newFileName);
            $data = [
                'id_pegawai' => $id_pegawai,
                'nama_berkas_pendukung' => $this->input->post('addNamaberkas'),
                'upload_berkas_pendukung' => $newFileName,
                'time_upload' => date("Y-m-d H:i:s")
            ];
            $insert = $this->berkas_pendukung->update_berkas_pend($id, $data);
        }
        echo json_encode(array("status" => $status, "msg" => $msg));
    }

    public function delete()
    {
        $fileName = null;
        $id = decrypt_url($this->input->post('id_berkas_pendukung'));

        $fileName = $this->_getFileNameBerkas($id);
        if ($fileName != null) {
            unlink("./image/berkas_pendukung/" . $fileName);
            $this->berkas_pendukung->delete($id);

            echo json_encode(array("status" => TRUE));
        } else {
            echo json_encode(array("status" => FALSE));
        }
    }

    private function _getFileNameBerkas($id)
    {
        return $this->db->get_where('berkas_pendukung', array('id_berkas_pendukung' => $id))->row()->upload_berkas_pendukung;
    }

    public function get_by_id($id_berkas_pendukung)
    {
            $data = $this->berkas_pendukung->get_by_id(decrypt_url($id_berkas_pendukung));

            echo json_encode($data);
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
            $data['error_string'][] = 'Nama berkas_pendukung Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if($this->input->post('BerkasPend') == '')
        {
            $data['inputerror'][] = 'BerkasPend';
            $data['error_string'][] = 'File Upload Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

                
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

}


/* End of file berkas_pendukung.php */
/* Location: ./application/controllers/Dashboard.php */