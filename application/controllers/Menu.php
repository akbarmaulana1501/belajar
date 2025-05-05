<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller 
{

	public $data = [];

	public function __construct()
		{
			parent::__construct();
			$this->load->library('form_validation');
        	is_logged_in();
        	$this->load->model('M_menu');
		}

	
	public function index()
		{
				$this->data['title'] 		= 'Menu';
				$this->data['create'] 		= 'Create';
				$this->data['edit'] 		= 'Edit';
				$this->data['delete'] 		= 'Delete';
				$this->data['deactivate'] 	= 'Deactivate';
				$this->data['activate'] 	= 'Activate';
				$this->data['m'] 			= 'Menu';
				$this->data['ml'] 			= 'Menu List';
				$this->data['menu'] 		= $this->M_menu->get_all_menu();
				$this->template->load('templates/master','admin/menu/list', $this->data);
		}

    public function create() 
	    {
	        $data = array(
	        	'title'			=> 'Create',	
	        	'm'				=> 'Menu',	
	        	'ml'			=> 'Menu List',	
	            'button' 		=> 'Create',
	            'action' 		=> site_url('menu/create_action'),
		    	'title' 		=> set_value('title'),
		    	'url' 			=> set_value('url'),
		    	'ket' 			=> set_value('ket'),
		    	'icon' 			=> set_value('icon'),
		    	'is_main_menu' 	=> set_value('is_main_menu'),
		    	'is_aktif' 		=> set_value('is_aktif'),
			);

	        $this->template->load('templates/master','admin/menu/form', $data);
	    }
    
    public function create_action() 
	    {
	        $data = array(
				'title' 		=> str_replace("'", "", $this->input->post('title',TRUE)),
				'url' 			=> str_replace("'", "", $this->input->post('url',TRUE)),
				'ket' 			=> str_replace("'", "", $this->input->post('ket',TRUE)),
				'icon' 			=> str_replace("'", "", $this->input->post('icon',TRUE)),
				'is_main_menu' 	=> str_replace("'", "", $this->input->post('is_main_menu',TRUE)),
				'is_aktif' 		=> str_replace("'", "", $this->input->post('is_aktif',TRUE)),
			    );

	            $query = $this->M_menu->insert($data);
	            $this->session->set_flashdata('message', '<div class="alert alert-success fade show">
                                                          <span class="close" data-dismiss="alert">×</span>
                                                          <strong>Success!</strong>
                                                          Create Record Success
                                                        </div>');
	            
	            redirect(site_url('menu'));
	    }

	public function edit_action()
		{
            // $kode=str_replace("'", "", $this->input->post('kode'));
            $id 				=str_replace("'", "", $this->input->post('id'));
            $title 				=str_replace("'", "", $this->input->post('title'));
            $url 				=str_replace("'", "", $this->input->post('url'));
            $ket 				=str_replace("'", "", $this->input->post('ket'));
            $icon 				=str_replace("'", "", $this->input->post('icon'));
            $is_main_menu 		=str_replace("'", "", $this->input->post('is_main_menu'));
            $is_aktif 			=str_replace("'", "", $this->input->post('is_aktif'));

            $this->M_menu->edit($id,$title,$url,$ket,$icon,$is_main_menu,$is_aktif);

           	$this->session->set_flashdata('message', '<div class="alert alert-primary fade show">
                                                          <span class="close" data-dismiss="alert">×</span>
                                                          <strong>Success!</strong>
                                                          Edit Record Success
                                                        </div>');
           	redirect(site_url('menu'));
        } 

	function active_action()
		{
            // $kode=str_replace("'", "", $this->input->post('kode'));
            $id=str_replace("'", "", $this->input->post('id'));
            $is_aktif=str_replace("'", "", $this->input->post('is_aktif'));

            $this->M_menu->activation($id,$is_aktif);

           	$this->session->set_flashdata('message', '<div class="alert alert-success fade show">
                                                          <span class="close" data-dismiss="alert">×</span>
                                                          <strong>Success!</strong>
                                                          Activated Record Success
                                                        </div>');
           	redirect(site_url('menu'));
        } 

	function deactive_action()
		{
            // $kode=str_replace("'", "", $this->input->post('kode'));
            $id=str_replace("'", "", $this->input->post('id'));
            $is_aktif=str_replace("'", "", $this->input->post('is_aktif'));

            $this->M_menu->activation($id,$is_aktif);

           	$this->session->set_flashdata('message', '<div class="alert alert-warning fade show">
                                                          <span class="close" data-dismiss="alert">×</span>
                                                          <strong>Success!</strong>
                                                          Deactivated Record Success
                                                        </div>');
           	redirect(site_url('menu'));
        } 

		function delete_action()
		{
			$id = str_replace("'", "", $this->input->post('id'));
			$this->M_menu->delete($id);
		    $this->session->set_flashdata('message', '<div class="alert alert-danger fade show">
                                                          <span class="close" data-dismiss="alert">×</span>
                                                          <strong>Success!</strong>
                                                          Delete Record Success
                                                        </div>');
		    redirect(site_url('menu'));
		}	

}



/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */