<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public $data = [];

	public function __construct()
	{
    parent::__construct();
    $this->load->library('form_validation');
    is_logged_in();
    $this->load->model('M_profile');
  }


  public function index()
  {
    $this->data['title'] 	= 'Profile User';
    $this->data['create'] 	= 'Create';
    $this->data['edit'] 	= 'Edit';
    $this->data['delete'] 	= 'Delete';
    $this->data['m'] 		= 'Profile';
    $this->data['ml'] 		= 'List';

      // $user = $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      //       $user_id                = $user['user_id'];
			// $this->data['user_id'] 	=  $this->M_profile->get_Profile($user_id );
    $id_pegawai  = $this->session->userdata('id_pegawai');

    $keluarga = $this->M_profile->get_pegawai_keluarga_by_id($id_pegawai);

    $this->template->load('templates/master','admin/profile/list', $this->data, $keluarga);
  }

  private function _getImg($idPeg){
    $db = $this->db->get_where('user',['id_pegawai' => $idPeg])->row()->image;
    return $db;
  }

  public function changePhoto(){
    $config['upload_path']="./image/profileuser";
    $config['allowed_types']='gif|jpg|png|jpeg';
    $config['encrypt_name'] = TRUE;
    $this->load->library('upload',$config);
    $this->upload->initialize($config);
    $this->load->library('image_lib');
    $up = $this->upload->do_upload("filefoto");
    $idpeg = decrypt_url($this->input->post('idpwg'));
    $fileData = $this->upload->data();
    $fileName = $fileData['file_name'];
    if($up){
      unlink("./image/profileuser/".$this->_getImg($idpeg));
      $db = $this->M_profile->changeProfile($idpeg,$fileName);
      $configer =  array(
        'image_library'   => 'gd2',
        'source_image'    =>  $fileData['full_path'],
        'maintain_ratio'  =>  TRUE,
        'width'           =>  250,
        'height'          =>  250,
      );
      $this->image_lib->clear();
      $this->image_lib->initialize($configer);
      $this->image_lib->resize();
      $out['status'] = "sukses";
    }else{
      $db = $this->M_profile->changeProfile($idpeg,$this->_getImg($idpeg));
      $out['status'] = "gagal";
      $out['msg'] = $this->upload->display_errors();
    }
    echo json_encode($out);
  }

  public function get_pegawai_keluarga_by_id($id_pegawai)
  {
    $data = $this->M_profile->get_pegawai_keluarga_by_id(decrypt_url($id_pegawai));

    echo json_encode($data);
  }

  public function get_cek_keluarga_by_id($id_pegawai)
  {
    $cek_jjp = $this->M_profile->get_cek_keluarga_by_id(decrypt_url($id_pegawai));
    if ($cek_jjp->num_rows() > 0) {
      $data['cek_keluarga_by_id'] = true;
      $data['id_pegawai'] = $id_pegawai;;
    } else {
      $data['cek_keluarga_by_id'] = false;
      $data['id_pegawai'] = $id_pegawai;;
    }
    echo json_encode($data);
  }

  public function get_by_id($id_pegawai)
  {
    $data = $this->M_profile->get_by_id(decrypt_url($id_pegawai));

    echo json_encode($data);
  }

  private function _validate_pegawai_keluarga()
  {
    $data = array();
    $data['error_string'] = array();
    $data['inputerror'] = array();
    $data['status'] = TRUE;

    if ($this->input->post('id_pegawai') == '') {
      $data['inputerror'][] = 'id_pegawai';
      $data['error_string'][] = 'ID Pegawai Tidak Boleh Kosong';
      $data['status'] = FALSE;
    }

    if ($this->input->post('nama_ibu') == '') {
      $data['inputerror'][] = 'nama_ibu';
      $data['error_string'][] = 'Nama Ibu Tidak Boleh Kosong';
      $data['status'] = FALSE;
    }

    if ($this->input->post('pekerjaan_ibu') == '') {
      $data['inputerror'][] = 'pekerjaan_ibu';
      $data['error_string'][] = 'Pekerjaan Ibu Tidak Boleh Kosong';
      $data['status'] = FALSE;
    }

    if ($this->input->post('nama_ayah') == '') {
      $data['inputerror'][] = 'nama_ayah';
      $data['error_string'][] = 'Nama Ayah Tidak Boleh Kosong';
      $data['status'] = FALSE;
    }

    if ($this->input->post('pekerjaan_ayah') == '') {
      $data['inputerror'][] = 'pekerjaan_ayah';
      $data['error_string'][] = 'Pekerjaan Ayah Tidak Boleh Kosong';
      $data['status'] = FALSE;
    }

    if ($data['status'] === FALSE) {
      echo json_encode($data);
      exit();
    }
  }

  private function id_pegawai_keluargaOtomatis()
  {
    $ci         = get_instance();
    $query      = "SELECT MAX(CAST((substr(id_pegawai_keluarga,4)) as unsigned)) as maxKode from pegawai_keluarga";
    $data       = $ci->db->query($query)->row();
    $kode       = $data->maxKode;
    $kodeBaru   = $kode + 1;
    $id         = 'KL_' . $kodeBaru;
    return $id;
  }

  public function insert_data_pegawai_keluarga()
  {
    $this->_validate_pegawai_keluarga();
    $id                                     = str_replace("'", "", $this->input->post('id_pegawai'));
    $data  = array(
      'id_pegawai_keluarga'   => $this->id_pegawai_keluargaOtomatis(),
      'id_pegawai'            => decrypt_url($id),
      'nama_ibu'              => str_replace("'", "", $this->input->post('nama_ibu')),
      'pekerjaan_ibu'         => str_replace("'", "", $this->input->post('pekerjaan_ibu')),
      'nama_ayah'             => str_replace("'", "", $this->input->post('nama_ayah')),
      'pekerjaan_ayah'        => str_replace("'", "", $this->input->post('pekerjaan_ayah')),
    );

    $insert = $this->M_profile->insert_pegawai_keluarga("pegawai_keluarga", $data);
    echo json_encode(array("status" => TRUE));
  }

  public function update_data_pegawai_keluarga()
  {
    $this->_validate_pegawai_keluarga();
    $id                                     = str_replace("'", "", $this->input->post('id_pegawai'));
    $data  = array(
      'nama_ibu'              => str_replace("'", "", $this->input->post('nama_ibu')),
      'pekerjaan_ibu'         => str_replace("'", "", $this->input->post('pekerjaan_ibu')),
      'nama_ayah'             => str_replace("'", "", $this->input->post('nama_ayah')),
      'pekerjaan_ayah'        => str_replace("'", "", $this->input->post('pekerjaan_ayah')),
    );


    $this->M_profile->update_pegawai_keluarga(decrypt_url($id), 'pegawai_keluarga', $data);
    echo json_encode(array("status" => true));
  }

}

/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */