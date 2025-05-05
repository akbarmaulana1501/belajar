<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_pesanan extends CI_Controller {

	public $data = [];

	public function __construct()
		{
			parent::__construct();
        	is_logged_in();
        	$this->load->model('M_lap_pesanan','lapes');
        	$this->load->model('M_admin');
		}

	public function index()
		{
				$this->data['title'] 		= 'Laporan po';
				$this->data['create'] 		= 'Create';
				$this->data['edit'] 		= 'Edit';
				$this->data['delete'] 		= 'Delete';
				$this->data['m'] 			= 'Laporan po';
				$this->data['ml'] 			= 'List';
				$this->template->load('templates/master','admin/laporan/lap_pesanan', $this->data);
		}

	public function ajax_list()
	{
		$list = $this->lapes->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $lapes) {

			$no++;
			$row = array();
			

			$row[] = $no;
			$row[] = $lapes->tgl_order;
			$row[] = $lapes->nm_barang;
			$row[] = $lapes->qty;
			$row[] = rupiah($lapes->hrg_barang);
			$row[] = rupiah($lapes->jumlah);
			$data[] = $row;
		}

		$output = array(
						"draw" 				=> $_POST['draw'],
						"recordsTotal" 		=> $this->lapes->count_all(),
						"recordsFiltered" 	=> $this->lapes->count_filtered(),
						"data" 				=> $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function cetak()
		{
	        $this->load->library('pdf');

			$this->data['title'] 	= 'Laporan';

    	$this->data['user'] = $user = $data['user']       = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
	    $id_company                 = $user['company_id'];
	    $data['company']            = $this->M_admin->get_all_company($id_company);

	    foreach ($data['company']->result_array() as $a) 
	    {                           
	        $this->data['nama_company']    = $a['nama_company']; 
	        $this->data['alamat']          = $a['alamat']; 
	        $this->data['kel']          	= $a['kel']; 
	        $this->data['kec']          	= $a['kec']; 
	        $this->data['kab_kota']         = $a['kab_kota']; 
	        $this->data['prov']          	= $a['prov']; 
	        $this->data['no_telp']          = $a['no_telp']; 
	        $this->data['email_company']    = $a['email_company']; 
	        $this->data['website']          = $a['website']; 
	    }


	    if ($_GET['start_date'] AND $_GET['end_date']) {
				$start_date = $_GET['start_date'];
				$end_date 	= $_GET['end_date'];

		$this->data['lap'] 	=  $this->lapes->get_cetak($start_date,$end_date);


		        $html = $this->load->view('admin/laporan/pdf_lap_pesanan', $this->data, true);
				$this->pdf->createPDF($html, 'FJP', false);	    	
	    } else {
				redirect('admin/lap_pesanan','refresh');
	    }
				
		}

	public function search()
		{
				$valid = $this->form_validation;
				$valid->set_error_delimiters('<i style="color: red;">', '</i>');
			    $valid->set_rules('start_date', 'Field Start Date', 'required|trim|strip_tags|htmlspecialchars');
				$valid->set_rules('end_date', 'Field Start Date', 'required|trim|strip_tags|htmlspecialchars');
				
				if ($valid->run() === TRUE)
				    {
						$input 	= $this->input->post(NULL, TRUE);
						$data 	= $this->lapes->filter($input["start_date"], $input["end_date"]);
							return $this->response([
					                'data'      => array_values($data)
					    	]);
					} else return  $this->response(['success' => FALSE, 'error' => validation_errors()]);
		}

	public function response($data)
		{
		    $this->output
		            ->set_status_header(200)
		            ->set_content_type('application/json', 'utf-8')
		            ->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
		            ->_display();
		    exit();
		}


}

/* End of file lap_po.php */
/* Location: ./application/controllers/lap_po.php */