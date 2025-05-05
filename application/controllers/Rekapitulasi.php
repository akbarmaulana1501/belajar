<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekapitulasi extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('M_rekapitulasi');
		$this->load->model('M_rekapitulasi','rekapitulasi');

        // $this->chartUnitUsaha();
	}

	public function index()
	{

        // $data['title']  = 'Rekapitulasi'; 
        // $data['app']    = $this->App->aplikasi();

        // $data['jumlah_pegawai_per_unit'] = json_decode(json_encode($this->rekapitulasi->getJumlahPegawaiPerUnitUsaha()));

        // $pegawai_per_unit = array();
        // foreach ($data['jumlah_pegawai_per_unit'] as $row) {
        //     $unit = $row->nm_unit_usaha; 
        //     $jumlah_pegawai = $row->{'COUNT(*)'};
        //     $pegawai_per_unit[] = array('label' => $unit, 'data' => $jumlah_pegawai);
        // }

        // $pegawai_per_unit_json = json_encode($pegawai_per_unit);

        // $data = array(
        //     'pegawai_per_unit' => $pegawai_per_unit_json
        // );
        // $this->template->load('templates/master','admin/rekapitulasi/list', $data);

		$this->data['title']        = 'Rekapitulasi';
		$this->data['m']            = 'Rekapitulasi';
		$this->data['ml']           = 'Rekapitulasi';
		$this->data['app']    = $this->App->aplikasi();
		$this->template->load('templates/master','admin/rekapitulasi/list', $this->data);

	}

	public function chartUnitUsaha()
	{
		$data['jumlah_pegawai_per_unit'] = $this->rekapitulasi->getJumlahPegawaiPerUnitUsaha();

		header('Content-Type: application/json');
		echo json_encode($data['jumlah_pegawai_per_unit']);
	}

	public function chartUnitUsahaPerGender()
	{
		$data['jumlah_pegawai_per_unit'] = $this->rekapitulasi->getJumlahPegawaiPerGender();

		header('Content-Type: application/json');
		echo json_encode($data['jumlah_pegawai_per_unit']);
	}

	public function chartPendidikanPegawai()
	{
		$data['jumlah_pegawai_per_pendidikan'] = $this->rekapitulasi->getJumlahPegawaiPerPendidikan();

		header('Content-Type: application/json');
		echo json_encode($data['jumlah_pegawai_per_pendidikan']);
	}

	public function chartDonutPendidikanPegawai()
	{
		$data['jumlah_pegawai_per_pendidikan'] = $this->rekapitulasi->getJumlahPegawaiPerPendidikan();
		
		$donutData = array();
		foreach ($data['jumlah_pegawai_per_pendidikan'] as $row) {
			$donutData[] = array(
				'label' => $row->pend_terakhir,
				'value' => $row->jumlah_pegawai,
			);
		}

		header('Content-Type: application/json');
		echo json_encode($donutData);
	}

	public function chartDonutAgamaPegawai()
	{
		$data['jumlah_pegawai_per_agama'] = $this->rekapitulasi->getJumlahPegawaiPerAgama();
		
		$donutData = array();
		foreach ($data['jumlah_pegawai_per_agama'] as $row) {
			$donutData[] = array(
				'label' => $row->agama,
				'value' => $row->agama_pegawai,
			);
		}

		header('Content-Type: application/json');
		echo json_encode($donutData);
	}

	public function chartPegawaiPerTahun()
	{
		$data['jumlah_pegawai_per_tahun'] = $this->rekapitulasi->getJumlahPegawaiPerTahun();

		header('Content-Type: application/json');
		echo json_encode($data['jumlah_pegawai_per_tahun']);
	}


}


/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */