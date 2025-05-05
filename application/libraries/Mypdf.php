<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(dirname(__FILE__) . '/dompdf/autoload.inc.php');
use Dompdf\Dompdf;

class Mypdf
{
	protected $ci;
	public function __construct()
	{
		$this->ci =& get_instance();
	}

    public function generate($view, $data = array(), $filename='Laporan', $paper='A4', $orientation='portrait')
    {
    	$dompdf = new dompdf();
    	$html =$this->ci->load->view($view, $data, TRUE);
        $dompdf->load_html($html);
        $dompdf->set_paper($paper, $orientation);
        $dompdf->render();
            $dompdf->stream($filename.'.pdf', array('Attachment' => FALSE));
	}    	
}