<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH.'third_party/PHPExcel/PHPExcel.php';
// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Jenis_izin extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
            is_logged_in();
            $this->load->model('M_jenis_izin');
            $this->load->model('M_jenis_izin','jenis_izin');

    }

    public function index()
    {
                       
        
        $this->data['title']        = 'Jenis Izin';

        $this->data['TombolCreate']   = '

        <h4 class="page-title"><button type="button" class="btn btn-sm btn-primary waves-effect waves-light" onclick="add()"><i class="fe-plus-square"></i> Create </button>

        <button type="button" class="btn btn-sm btn-primary waves-effect waves-light" onclick="reload_table()"><i class="fe-refresh-cw"></i> Reload </button>

        </h4>'; 

            $this->data['create']       = 'Create';
            $this->data['edit']         = 'Update';
            $this->data['delete']       = 'Delete';
            $this->data['m']            = 'Jenis Izin';
            $this->data['ml']           = 'Jenis Izin List';
        $this->data['app']    = $this->App->aplikasi();
        $this->template->load('templates/master','admin/jenis_izin/list', $this->data);
    }

    public function ajax_list()
    {
        $list = $this->jenis_izin->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $jenis_izin) {
            $no++;
            $row = array();    

                $row[] = $no;

                $row[] =                 
                '<a href="javascript:void(0)" title="Update" class="btn-xs btn-primary waves-effect waves-light" onclick="update('."'".encrypt_url($jenis_izin->id_jenis_izin)."'".')"><i class="fas fa-edit"> </i> Update </a>

                <a href="javascript:void(0)" title="Hapus" class="btn-xs btn-danger waves-effect waves-light" onclick="deletedata('."'".encrypt_url($jenis_izin->id_jenis_izin)."'".')"><i class="fas fa-trash"></i> Delete </a>';  
             
                $row[] = $jenis_izin->nm_jenis_izin;
                $row[] = $jenis_izin->lama_jenis_izin;

            $data[] = $row;
        }

        $output = array(
                        "draw"              => $_POST['draw'],
                        "recordsTotal"      => $this->jenis_izin->count_all(),
                        "recordsFiltered"   => $this->jenis_izin->count_filtered(),
                        "data"              => $data,
                );

        echo json_encode($output);
    }

    public function get_jenis_izin_like()
    {
        $searchTermJenisizin  = str_replace("'", "", $this->input->post('searchTermJenisizin'));
        $response           = $this->jenis_izin->get_jenis_izin_like($searchTermJenisizin);
        echo json_encode($response);
    }

    function get_jenis_izin()
    {
        $nm_jenis_izin      = $this->input->post('nm_jenis_izin');
        $data               = $this->jenis_izin->get_data_jenis_izin_by_id($id);
        echo json_encode($data);
    }


    Private function id_jenis_izinOtomatis()
    {
        $ci         = get_instance();
        $query      = "SELECT MAX(CAST((substr(id_jenis_izin,4)) as unsigned)) as maxKode from jenis_izin_list";
        $data       = $ci->db->query($query)->row();
        $kode       = $data->maxKode;
        $kodeBaru   = $kode + 1;
        $id         = 'JI_'.$kodeBaru;
        return $id;
    }

    public function insert()
    {
        $this->_validate();
        $data  = array(
            'id_jenis_izin'        => $this->id_jenis_izinOtomatis(),
            'nm_jenis_izin'        => str_replace("'", "", $this->input->post('addNamajenis_izin')),
            'lama_jenis_izin'      => str_replace("'", "", $this->input->post('addLamajenis_izin')),
        );

            $insert = $this->jenis_izin->insert("jenis_izin_list", $data);
            echo json_encode(array("status" => TRUE));
    }

    public function get_by_id($id_jenis_izin)
    {
            $data = $this->jenis_izin->get_by_id(decrypt_url($id_jenis_izin));

            echo json_encode($data);
    }


    public function update()
    {
        $this->_validate();
        $id    = str_replace("'", "", $this->input->post('id_jenis_izin'));
        $data  = array(
                            'nm_jenis_izin'   => str_replace("'", "", $this->input->post('addNamajenis_izin')),
                            'lama_jenis_izin'          => str_replace("'", "", $this->input->post('addLamajenis_izin')),
                        );

        $this->jenis_izin->update(($id), 'jenis_izin_list', $data);
        echo json_encode(array("status" => true));
    }

    public function delete()
    {
        $id         = str_replace("'", "", $this->input->post('id_jenis_izin'));
        $this->jenis_izin->delete(decrypt_url($id), 'jenis_izin_list');                       
        echo json_encode(array("status" => TRUE));
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        
        if($this->input->post('addNamajenis_izin') == '')
        {
            $data['inputerror'][] = 'addNamajenis_izin';
            $data['error_string'][] = 'Nama jenis izin Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if($this->input->post('addLamajenis_izin') == '')
        {
            $data['inputerror'][] = 'addLamajenis_izin';
            $data['error_string'][] = 'Lama jenis izin Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

public function export_excel()
{
    	 // Load PHPExcel library
    // $this->load->library('excel');

    // Create new PHPExcel object
    $objPHPExcel = new PHPExcel();

    // Set document properties
    $objPHPExcel->getProperties()->setCreator("My Name")
                                 ->setLastModifiedBy("My Name")
                                 ->setTitle("Export Data")
                                 ->setSubject("Export Data")
                                 ->setDescription("Export Data")
                                 ->setKeywords("Export Data")
                                 ->setCategory("Export Data");

    // Add some data
    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Column 1')
                ->setCellValue('B1', 'Column 2')
                ->setCellValue('C1', 'Column 3')
                ->setCellValue('D1', 'Column 4');

    // Set header style
    $header_style = array(
        'font' => array(
            'bold' => true,
            'color' => array('rgb' => 'FFFFFF')
        ),
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => '000000')
        )
    );

    $objPHPExcel->getActiveSheet()->getStyle('A1:C1')->applyFromArray($header_style);

    // Set width for columns
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);

    // Set data from database
    $data = $this->db->get('jenis_izin_list')->result_array;

    $row = 2;
    $no = 1;
    foreach ($data as $item) {
        $objPHPExcel->getActiveSheet()
        							->setCellValue('A' . $row, $no)
        							->setCellValue('B' . $row, $item->id_jenis_izin)
                                    ->setCellValue('C' . $row, $item->nm_jenis_izin)
                                    ->setCellValue('D' . $row, $item->lama_jenis_izin);
        $row++;
        $no++;
    }

    // Rename worksheet
    $objPHPExcel->getActiveSheet()->setTitle('Export Data');

    // Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $objPHPExcel->setActiveSheetIndex(0);

    // Redirect output to a client’s web browser (Excel5)
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="export_data.xls"');
    header('Cache-Control: max-age=0');

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');
    exit();
}

public function downloadData(){
    $data = $this->db->get("jenis_izin_list")->result_array();
    echo "<table id='downloadData'>
    <thead>
        <tr>
          <th>ID</th>
          <th>Nama Izin</th>
          <th>Lama Izin</th>
        </tr>
      </thead>
      <tbody>";
    foreach ($data as $val) {
        echo "<tr>";
        echo "<td>".$val['id_jenis_izin']."</td>";
        echo "<td>".$val['nm_jenis_izin']."</td>";
        echo "<td>".$val['lama_jenis_izin']."</td></tr>";
    }
    echo "</tbody></table>";
    echo "<script>
    document.addEventListener('DOMContentLoaded', function(){ setTimeout(() => { exportTableToExcel('downloadData','data_export');}, 100); });
    function exportTableToExcel(tableID, filename = ''){
        var downloadLink;
        var dataType = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
        var tableSelect = document.getElementById(tableID);
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
      
        // Specify the filename
        filename = filename ? filename + '.xls' : 'export_excel.xls';
      
        // Create download link element
        downloadLink = document.createElement('a');
      
        document.body.appendChild(downloadLink);
      
        if(navigator.msSaveOrOpenBlob){
          var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
          });
          navigator.msSaveOrOpenBlob(blob, filename);
        }else{
          // Create a link to the file
          downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
      
          // Setting the file name
          downloadLink.download = filename;
      
          //triggering the function
          downloadLink.click();
        }

        setTimeout(() => {
            window.close();
        }, 100);
      }
    
    </script>";

    exit();
}


//spreadsheet

    // public function export_excel()
    // {
    //     // ambil semua data dari tabel database
    //     $data = $this->db->get('jenis_izin_list')->result_array();

    //     // inisialisasi objek Spreadsheet
    //     $spreadsheet = new Spreadsheet();

    //     // tambahkan header pada file Excel
    //     $spreadsheet->setActiveSheetIndex(0)
    //                 ->setCellValue('A1', 'Kolom 1')
    //                 ->setCellValue('B1', 'Kolom 2')
    //                 ->setCellValue('C1', 'Kolom 3');

    //     // tambahkan data pada file Excel
    //     $row = 2;
    //     foreach ($data as $row_data) {
    //         $spreadsheet->setActiveSheetIndex(0)
    //                     ->setCellValue('A' . $row, $row_data['id_jenis_izin'])
    //                     ->setCellValue('B' . $row, $row_data['nm_jenis_izin'])
    //                     ->setCellValue('C' . $row, $row_data['lama_jenis_izin']);
    //         $row++;
    //     }

    //     // set nama worksheet
    //     $spreadsheet->getActiveSheet()->setTitle('Sheet1');

    //     // set active worksheet yang akan diekspor
    //     $spreadsheet->setActiveSheetIndex(0);

    //     // set header untuk mengirimkan file Excel ke browser
    //     header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    //     header('Content-Disposition: attachment;filename="data_export.xls"');
    //     header('Cache-Control: max-age=0');

    //     // inisialisasi objek Writer
    //     $writer = new Xlsx($spreadsheet);

    //     // ekspor file Excel ke output
    //     $writer->save('php://output');
    //     exit();
    // }


//youtube

    // public function export_excel(){
    // 	$excel
    // }

}
/* End of file jenis_izin.php */
/* Location: ./application/controllers/Dashboard.php */