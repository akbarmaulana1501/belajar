<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SettingApp extends CI_Controller 
{


	public $data = [];

	public function __construct()
		{
			parent::__construct();
        	is_logged_in();
        	is_administor();
            $this->load->library('upload');
        	$this->load->model('M_SettingApp','SettingApp');
		}

	public function index()
		{
			$this->data['dashboard']	= 'Dashboard';
			$this->data['title']		= 'SettingApp';
			$this->data['create'] 		= 'Create';
			$this->data['action'] 		= site_url('SettingApp/create_action');
			$this->data['edit'] 		= 'Edit';
			$this->data['delete'] 		= 'Delete';
			$this->data['deactivate'] 	= 'Deactivate';
			$this->data['activate'] 	= 'Activate';
			$this->data['m'] 			= 'SettingApp';
			$this->data['ml'] 			= 'List';
			$this->template->load('templates/master','SettingApp/SettingApp_update', $this->data);
			
		}

   

    public function get_by_id()
        {
    		$id 						= $this->session->userdata('id_application');
            $data = $this->SettingApp->get_by_id($id);
                
        }

    public function update()
        {
            $this->_validate();
            $id         = str_replace("'", "", $this->input->post('id_application'));
            $data       = array(
                                'nm_application'	=> str_replace("'", "", $this->input->post('nm_application')),
                                'nm_perusahaan'		=> str_replace("'", "", $this->input->post('nm_perusahaan')),
                                'alamat'    		=> str_replace("'", "", $this->input->post('alamat')),
                                'kel'    			=> str_replace("'", "", $this->input->post('kel')),
                                'kec'    			=> str_replace("'", "", $this->input->post('kec')),
                                'kab_kota'    		=> str_replace("'", "", $this->input->post('kab_kota')),
                                'prov'    			=> str_replace("'", "", $this->input->post('prov')),
                                'no_telp'    		=> str_replace("'", "", $this->input->post('no_telp')),
                                'email'    			=> str_replace("'", "", $this->input->post('email')),
                                'website'    		=> str_replace("'", "", $this->input->post('website')),
                            );

            $this->SettingApp->update($id, '_application', $data);
            echo json_encode(array("status" => TRUE));
        }

    public function ajax_update()
    {
        $this->_validate();
        $id   = str_replace("'", "", $this->input->post('id_application'));
        $data = array(
                'nm_application'    => str_replace("'", "", $this->input->post('nm_application')),
                'nm_perusahaan'     => str_replace("'", "", $this->input->post('nm_perusahaan')),
                'alamat'            => str_replace("'", "", $this->input->post('alamat')),
                'kel'               => str_replace("'", "", $this->input->post('kel')),
                'kec'               => str_replace("'", "", $this->input->post('kec')),
                'kab_kota'          => str_replace("'", "", $this->input->post('kab_kota')),
                'prov'              => str_replace("'", "", $this->input->post('prov')),
                'no_telp'           => str_replace("'", "", $this->input->post('no_telp')),
                'email'             => str_replace("'", "", $this->input->post('email')),
                'website'           => str_replace("'", "", $this->input->post('website')),
            );

        if($this->input->post('remove_logo')) // if remove logo checked
        {
            if(file_exists('./image/image_application/'.$this->input->post('remove_logo')) && $this->input->post('remove_logo'))
                unlink('./image/image_application/'.$this->input->post('remove_logo'));
            $data['logo'] = '';
        }

        if(!empty($_FILES['logo']['name']))
        {
            $upload_logo = $this->_do_upload();
            
            //delete file
            $data = $this->SettingApp->by_id($id);
            if(file_exists('./image/image_application/'.$data->logo) && $data->logo)
                unlink('./image/image_application/'.$data->logo);

            $data['logo'] = $upload_logo;
        }

        $this->SettingApp->update(array('id_application' => $id), $data);
        echo json_encode(array("status" => TRUE));
    }

    private function _do_upload()
    {
        $config['upload_path']          = './image/image_application/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100; //set max size allowed in Kilobyte
        $config['max_width']            = 1000; // set max width image allowed
        $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('logo')) //upload and validate
        {
            $data['inputerror'][] = 'logo';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }

	private function _validate()
        {
            $data = array();
            $data['error_string'] = array();
            $data['inputerror'] = array();
            $data['status'] = TRUE;

            if($this->input->post('nm_application') == '')
            {
                $data['inputerror'][] = 'nm_application';
                $data['error_string'][] = 'Data Tidak Boleh Kosong';
                $data['status'] = FALSE;
            }
            
            if($this->input->post('nm_perusahaan') == '')
            {
                $data['inputerror'][] = 'nm_perusahaan';
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

/* End of file company.php */
/* Location: ./SettingApp/controllers/company.php */