<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public $data = [];

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->library('upload');
		$this->load->model('M_user','user');
	}


	public function index()
	{
		$this->data['title']        = 'User';

		// $this->data['TombolCreate']   = '<h4 class="page-title"><button type="button" class="btn btn-sm btn-primary waves-effect waves-light" onclick="add()"><i class="fe-plus-square"></i> Create </button></h4>';

		$this->data['create']       = 'Create';
		$this->data['edit']         = 'Update';
		$this->data['delete']       = 'Delete';
		$this->data['m']            = 'User';
		$this->data['ml']           = 'User List';

		$this->data['role']         = $this->user->get_role();
        $this->data['unit']         = $this->user->get_unit_usaha();
        $this->data['unit_kerja_sub']   = $this->user->get_unit_kerja_sub();

        $this->template->load('templates/master','admin/user/list', $this->data);
    }

    public function ajax_list()
    {

      $list = $this->user->get_datatables();
      $data = array();
      $no = $_POST['start'];
      foreach ($list as $user) {

       $no++;
       $row = array();    

       $row[] = $no;

       $row[] =                 
       '<a href="javascript:void(0)" title="Update" class="btn-xs btn-primary waves-effect waves-light" onclick="update('."'".encrypt_url($user->user_id)."'".')"><i class="fas fa-edit"> </i> Update </a>

       <a href="javascript:void(0)" title="Hapus" class="btn-xs btn-danger waves-effect waves-light" onclick="deletedata('."'".encrypt_url($user->user_id)."'".')"><i class="fas fa-trash"></i> Delete </a>'; 

       if ($user->is_active==1) {
        $user->is_active = '<a href="javascript:void(0)" title="Aktif" class="btn-xs btn-success waves-effect waves-light" onclick="non_active('."'".encrypt_url($user->user_id)."'".')"><i class="fas fa-check"></i> Aktif </a>';
    } else {
        $user->is_active = '<a href="javascript:void(0)" title="Tidak Aktif" class="btn-xs btn-danger waves-effect waves-light" onclick="active('."'".encrypt_url($user->user_id)."'".')"><i class="fe-x"></i> TIdak Aktif </a>';
    }    

    $row[] = $user->email;
    $row[] = $user->nik;
    $row[] = $user->nama;
    $row[] = $user->role;
    $row[] = $user->is_active;
    $row[] = $user->nm_unit_usaha.'-'.$user->nm_unit_kerja_sub.'-'.$user->nm_unit_level;
    $row[] = $user->date_created;


    $data[] = $row;
}

$output = array(
   "draw"              => $_POST['draw'],
   "recordsTotal"      => $this->user->count_all(),
   "recordsFiltered"   => $this->user->count_filtered(),
   "data"              => $data,
);

echo json_encode($output);
}


public function get_pegawai_like()
{

  $searchTermPegawai  = str_replace("'", "", $this->input->post('searchTermPegawai'));
  $response           = $this->user->get_pegawai_like($searchTermPegawai);
  echo json_encode($response);
}

function get_pegawai()
{
  $nik                = $this->input->post('nik');
  $data               = $this->user->get_data_pegawai_by_nik($nik);
  echo json_encode($data);
}

Private function user_idOtomatis()
{
  $ci         = get_instance();
  $query      = "SELECT MAX(CAST((substr(user_id,4)) as unsigned)) as maxKode from user";
  $data       = $ci->db->query($query)->row();
  $kode       = $data->maxKode;
  $kodeBaru   = $kode + 1;
  $id         = sprintf('PEG'."%06s",$kodeBaru);
  return $id;
}

private function _do_upload()
{
  $config['upload_path']          = 'image/profileuser';
  $config['allowed_types']        = 'gif|jpg|jpeg|png|jpe|jfif';
        $config['max_size']             = 1000; //set max size allowed in Kilobyte
        $config['max_width']            = 1000; // set max width image allowed
        $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);
        $this->upload->initialize ($config);
        if(!$this->upload->do_upload('image')) //upload and validate
        {
        	$data['inputerror'][] = 'image';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }

    public function insert()
    {
    	$this->_validate();
    	$data  = array(
    		'user_id'           => $this->user_idOtomatis(),
    		'id_pegawai'        => str_replace("'", "", $this->input->post('id_pegawai')),
    		'nama'              => str_replace("'", "", $this->input->post('nama')),
    		'email'             => str_replace("'", "", $this->input->post('email')),
    		'password'          => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
    		'is_active'         => str_replace("'", "", $this->input->post('is_active')),
    		'role_id'           => str_replace("'", "", $this->input->post('role_id')),
    		'id_application'    => 'EYAB',
    	);

    	$email      = str_replace("'", "", $this->input->post('email'));
    	$role_id    = str_replace("'", "", $this->input->post('role_id'));
    	$cek_email = $this->user->cek_user($email,$role_id);

    	if ($cek_email->num_rows() > 0) {
            // code...
    		echo json_encode(array("status" => FALSE));
    	} else {
    		$insert = $this->user->insert("user", $data);
    		echo json_encode(array("status" => TRUE));            
    	}


    	if(!empty($_FILES['image']['name']))
    	{
    		$upload = $this->_do_upload();
    		$data['image'] = $upload;
    	}

    }

    public function get_by_id($user_id)
    {
    	$data = $this->user->get_by_id(decrypt_url($user_id));
    	echo json_encode($data);
    }


    public function update()
    {
    	$this->_validate_update();
    	$id                                = str_replace("'", "", $this->input->post('user_id'));
        // var_dump($id);die;
    	$data  = array(
    		'id_pegawai'        => str_replace("'", "", $this->input->post('id_pegawai')),
    		'nama'              => str_replace("'", "", $this->input->post('nama')),
    		'email'             => str_replace("'", "", $this->input->post('email')),
    		'password'          => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
    		'is_active'         => str_replace("'", "", $this->input->post('is_active')),
    		'date_created'      => str_replace("'", "", $this->input->post('date_created')),
    		'role_id'           => str_replace("'", "", $this->input->post('role_id')),
    		'id_application'    => 'EYAB',
    	);

        if($this->input->post('remove_image')) // if remove image checked
        {
        	if(file_exists('image/profileuser'.$this->input->post('remove_image')) && $this->input->post('remove_image'))
        		unlink('image/profileuser'.$this->input->post('remove_image'));
        	$data['image'] = '';
        }

        if(!empty($_FILES['image']['name']))
        {
        	$upload     = $this->_do_upload();
        	$user_id    = $this->input->post('user_id');
        	$user       = $this->user->get_by_id(decrypt_url($user_id));
        	if(file_exists('image/profileuser'.$user->image) && $user->image)
        		unlink('image/profileuser'.$user->image);

        	$data['image'] = $upload;
        }

        $this->user->update(decrypt_url($id), 'user', $data);
        echo json_encode(array("status" => true));
    }

    public function delete()
    {
    	$id         = str_replace("'", "", $this->input->post('user_id'));
    	$this->user->delete(decrypt_url($id), 'user');        
    	echo json_encode(array("status" => TRUE));
    }   

    public function active()
    {
    	$id         = str_replace("'", "", $this->input->post('user_id'));
        // $data       = 1;
    	$data  = array(
    		'is_active'         => '1',
    	);
    	$this->user->is_active(decrypt_url($id), 'user',$data);        
    	echo json_encode(array("status" => TRUE));
    }  

    public function non_active()
    {
    	$id         = str_replace("'", "", $this->input->post('user_id'));
        // $data       = 1;
    	$data  = array(
    		'is_active'         => '0',
    	);
    	$this->user->non_active(decrypt_url($id), 'user',$data);        
    	echo json_encode(array("status" => TRUE));
    }    

    private function _validate()
    {
    	$data = array();
    	$data['error_string'] = array();
    	$data['inputerror'] = array();
    	$data['status'] = TRUE;

    	if($this->input->post('cari_pegawai') == '')
    	{
    		$data['inputerror'][] = 'cari_pegawai';
    		$data['error_string'][] = 'Cari Pegawai Tidak Boleh Kosong';
    		$data['status'] = FALSE;
    	}

    	if($this->input->post('nik') == '')
    	{
    		$data['inputerror'][] = 'nik';
    		$data['error_string'][] = 'NIK Tidak Boleh Kosong';
    		$data['status'] = FALSE;
    	}

    	if($this->input->post('id_pegawai') == '')
    	{
    		$data['inputerror'][] = 'id_pegawai';
    		$data['error_string'][] = 'ID Pegawai Data Tidak Boleh Kosong';
    		$data['status'] = FALSE;
    	}
    	if($this->input->post('nama') == '')
    	{
    		$data['inputerror'][] = 'nama';
    		$data['error_string'][] = 'Nama Tidak Boleh Kosong';
    		$data['status'] = FALSE;
    	}
    	if($this->input->post('email') == '')
    	{
    		$data['inputerror'][] = 'email';
    		$data['error_string'][] = 'Email Tidak Boleh Kosong';
    		$data['status'] = FALSE;
    	}
    	if($this->input->post('password') == '')
    	{
    		$data['inputerror'][] = 'password';
    		$data['error_string'][] = 'Password Tidak Boleh Kosong';
    		$data['status'] = FALSE;
    	}

    	if($this->input->post('is_active') == '')
    	{
    		$data['inputerror'][] = 'is_active';
    		$data['error_string'][] = 'Is Active Tidak Boleh Kosong';
    		$data['status'] = FALSE;
    	}
    	// if($this->input->post('image') == '' )
    	// {
    	// 	$data['inputerror'][] = 'image';
    	// 	$data['error_string'][] = 'File Upload Tidak Boleh Kosong';
    	// 	$data['status'] = FALSE;
    	// }
      if($this->input->post('role_id') == '')
      {
          $data['inputerror'][] = 'role_id';
          $data['error_string'][] = 'Role Tidak Boleh Kosong';
          $data['status'] = FALSE;
      }
      if($data['status'] === FALSE)
      {
          echo json_encode($data);
          exit();
      }
  }

  private function _validate_update()
  {
    $data = array();
    $data['error_string'] = array();
    $data['inputerror'] = array();
    $data['status'] = TRUE;

        // if($this->input->post('cari_pegawai') == '')
        // {
        //     $data['inputerror'][] = 'cari_pegawai';
        //     $data['error_string'][] = 'Cari Pegawai Tidak Boleh Kosong';
        //     $data['status'] = FALSE;
        // }

    if($this->input->post('nik') == '')
    {
        $data['inputerror'][] = 'nik';
        $data['error_string'][] = 'NIK Tidak Boleh Kosong';
        $data['status'] = FALSE;
    }

    if($this->input->post('id_pegawai') == '')
    {
        $data['inputerror'][] = 'id_pegawai';
        $data['error_string'][] = 'ID Pegawai Data Tidak Boleh Kosong';
        $data['status'] = FALSE;
    }
    if($this->input->post('nama') == '')
    {
        $data['inputerror'][] = 'nama';
        $data['error_string'][] = 'Nama Tidak Boleh Kosong';
        $data['status'] = FALSE;
    }
    if($this->input->post('email') == '')
    {
        $data['inputerror'][] = 'email';
        $data['error_string'][] = 'Email Tidak Boleh Kosong';
        $data['status'] = FALSE;
    }
    if($this->input->post('password') == '')
    {
        $data['inputerror'][] = 'password';
        $data['error_string'][] = 'Password Tidak Boleh Kosong';
        $data['status'] = FALSE;
    }

    if($this->input->post('is_active') == '')
    {
        $data['inputerror'][] = 'is_active';
        $data['error_string'][] = 'Is Active Tidak Boleh Kosong';
        $data['status'] = FALSE;
    }
        // if($this->input->post('image') == '' )
        // {
        //  $data['inputerror'][] = 'image';
        //  $data['error_string'][] = 'File Upload Tidak Boleh Kosong';
        //  $data['status'] = FALSE;
        // }
    if($this->input->post('role_id') == '')
    {
      $data['inputerror'][] = 'role_id';
      $data['error_string'][] = 'Role Tidak Boleh Kosong';
      $data['status'] = FALSE;
  }
  if($data['status'] === FALSE)
  {
      echo json_encode($data);
      exit();
  }
}
}

/* End of file user.php */
/* Location: ./application/controllers/admin/user.php */