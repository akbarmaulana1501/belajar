<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller 
{

	public $data = [];

	public function __construct()
		{
			parent::__construct();
			$this->load->library('form_validation');
        	is_logged_in();
        	$this->load->model('M_role');
        	$this->load->model('M_menu');
		}


	public function index()
		{
			$this->data['title'] 		= 'Role';
			$this->data['create'] 		= 'Create';
			$this->data['edit'] 		= 'Edit';
			$this->data['delete'] 		= 'Delete';
			$this->data['m'] 			= 'role';
			$this->data['ml'] 			= 'role List';
			$this->data['role'] 		= $this->M_role->get_all_role();
			$this->template->load('templates/master','admin/role/list', $this->data);
		}

	 public function create() 
	    {
	        $data = array(
	        	'm'				=> 'role',	
	        	'ml'			=> 'role List',	
	            'button' 		=> 'Create',
	            'action' 		=> site_url('admin/role/create_action'),
		    	'role' 			=> set_value('role'),
			);

	        $this->template->load('templates/master','admin/role/form', $data);
	    }
    
    function create_action() 
	    {
	        $data = array(
				'role' 			=> str_replace("'", "", $this->input->post('role',TRUE)),
			    );

	            $query = $this->M_role->insert($data);
	            $this->session->set_flashdata('message', '<div class="alert alert-success fade show">
                                                          <span class="close" data-dismiss="alert">×</span>
                                                          <strong>Success!</strong>
                                                          Create Record Success
                                                        </div>');
	            
	            redirect(site_url('role'));
	    }

	function edit_action()
		{
            // $kode=str_replace("'", "", $this->input->post('kode'));
            $id=str_replace("'", "", $this->input->post('id'));
            $role=str_replace("'", "", $this->input->post('role'));

            $this->M_role->edit($id,$role);

           	$this->session->set_flashdata('message', '<div class="alert alert-primary fade show">
                                                          <span class="close" data-dismiss="alert">×</span>
                                                          <strong>Success!</strong>
                                                          Edit Record Success
                                                        </div>');
           	redirect(site_url('role'));
        } 


	function delete_action()
		{
			$id = str_replace("'", "", $this->input->post('id'));
			$this->M_role->delete($id);
		    $this->session->set_flashdata('message', '<div class="alert alert-danger fade show">
                                                          <span class="close" data-dismiss="alert">×</span>
                                                          <strong>Success!</strong>
                                                          Delete Record Success
                                                        </div>');
		    redirect(site_url('role'));
		}


    public function access($role_id)
	    {

			$data['title'] 		= 'Access Modul';
			$data['create'] 	= 'Create';
			$data['edit'] 		= 'Edit';
			$data['delete'] 	= 'Delete';
	        $data['m'] 			= 'Role';
	        $data['ml'] 		= 'Access Role';

	        $data['user'] 		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

	        $data['role'] 		= $this->db->get_where('_user_role', ['id' => $role_id])->row_array();

	        // if ($role_id != 1) {
	        // $this->db->where('id !=', 1);
	        // $this->db->where('_user_menu.id !=', 2);
	        // $this->db->where('_user_menu.id !=', 3);
	        // $this->db->where('_user_menu.id !=', 4);
	        // $this->db->where('_user_menu.id !=', 5);
	        // // }
	        // $this->db->where('is_main_menu =', 0);
	        $data['menu'] 		= $this->db->get('_user_menu')->result_array();

			$this->template->load('templates/master','admin/role/access', $data);
	    }

    public function changeAccess()
	    {
	        $menu_id = $this->input->post('menuId');
	        $role_id = $this->input->post('roleId');

	        $data = [
	            'role_id' => $role_id,
	            'menu_id' => $menu_id
	        ];

	        $result = $this->db->get_where('_user_access_menu', $data);

	        if ($result->num_rows() < 1) {
	            $this->db->insert('_user_access_menu', $data);
	        } else {
	            $this->db->delete('_user_access_menu', $data);
	        }

	        $this->session->set_flashdata('message', '<div class="alert alert-success fade show">
                                                          <span class="close" data-dismiss="alert">×</span>
                                                          <strong>Success!</strong>
                                                          Access Changed! Success
                                                        </div>');
	    }

    public function changeAccess_create()
	    {
	        $menu_id = $this->input->post('menuId');
	        $role_id = $this->input->post('roleId');

	        $data = [
	            'role_id' => $role_id,
	            'menu_id' => $menu_id,
	            'can_create' => 1
	        ];

	        $result = $this->db->get_where('_user_access_menu', $data);

	        if ($result->num_rows() < 1) {
	            // $this->db->insert('_user_access_menu', $data);
	            $data = array(
											        'can_create' => 1
											);

											$this->db->where('role_id', $role_id);
											$this->db->where('menu_id', $menu_id);
											$this->db->update('_user_access_menu', $data);
	        } else {
	             $data = array(
											        'can_create' => 0
											);

											$this->db->where('role_id', $role_id);
											$this->db->where('menu_id', $menu_id);
											$this->db->update('_user_access_menu', $data);
	        }

	        $this->session->set_flashdata('message', '<div class="alert alert-success fade show">
                                                          <span class="close" data-dismiss="alert">×</span>
                                                          <strong>Success!</strong>
                                                          Access Changed! Created Success
                                                        </div>');
	    }

    public function changeAccess_edit()
	    {
	        $menu_id = $this->input->post('menuId');
	        $role_id = $this->input->post('roleId');

	        $data = [
	            'role_id' => $role_id,
	            'menu_id' => $menu_id,
	            'can_edit' => 1
	        ];

	        $result = $this->db->get_where('_user_access_menu', $data);

	        if ($result->num_rows() < 1) {
	            // $this->db->insert('_user_access_menu', $data);
	            $data = array(
											        'can_edit' => 1
											);

											$this->db->where('role_id', $role_id);
											$this->db->where('menu_id', $menu_id);
											$this->db->update('_user_access_menu', $data);
	        } else {
	             $data = array(
											        'can_edit' => 0
											);

											$this->db->where('role_id', $role_id);
											$this->db->where('menu_id', $menu_id);
											$this->db->update('_user_access_menu', $data);
	        }

	        $this->session->set_flashdata('message', '<div class="alert alert-success fade show">
                                                          <span class="close" data-dismiss="alert">×</span>
                                                          <strong>Success!</strong>
                                                          Access Changed! Edited Success 
                                                        </div>');
	    }

    public function changeAccess_delete()
	    {
	        $menu_id = $this->input->post('menuId');
	        $role_id = $this->input->post('roleId');

	        $data = [
	            'role_id' => $role_id,
	            'menu_id' => $menu_id,
	            'can_delete' => 1
	        ];

	        $result = $this->db->get_where('_user_access_menu', $data);

	        if ($result->num_rows() < 1) {
	            // $this->db->insert('_user_access_menu', $data);
	            $data = array(
											        'can_delete' => 1
											);

											$this->db->where('role_id', $role_id);
											$this->db->where('menu_id', $menu_id);
											$this->db->update('_user_access_menu', $data);
	        } else {
	             $data = array(
											        'can_delete' => 0
											);

											$this->db->where('role_id', $role_id);
											$this->db->where('menu_id', $menu_id);
											$this->db->update('_user_access_menu', $data);
	        }

	        $this->session->set_flashdata('message', '<div class="alert alert-success fade show">
                                                          <span class="close" data-dismiss="alert">×</span>
                                                          <strong>Success!</strong>
                                                          Access Changed! deleted Success 
                                                        </div>');
	    }

}

/* End of file Role.php */
/* Location: ./application/controllers/Role.php */