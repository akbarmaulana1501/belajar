<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title><?php echo $title ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
  <meta content="Coderthemes" name="author" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- App favicon -->

  <style>
    @page { size: A4 } 
    h1 {
      font-weight: bold;
      font-size: 20pt;
      text-align: center;
    }
    table {
      border-collapse: collapse;
      width: 100%;
    }

    td {
    	font-size: 11pt;
    	font-weight: normal;
    	line-height: 1.5;
    }

    .table th {
      padding: 2px 2px;
      border:1px solid #000000;
      text-align: center;
    }

    .table td {
      padding: 3px 3px;
      border:1px solid #000000;
    }

    .notable th {
      padding: 5px 5px;
      border:0px solid #000000;
      text-align: right;
      padding-right: 40px;
      font-weight: normal;
    }

    .notable td {
      padding: 3px 3px;
      border:0px solid #000000;
    }

    .text-center {
      text-align: center;
    }
  </style>
  <style>
    .line-title{
    	border: 0;
    	border-style: inset;
    	border-top: 1px solid #000;
    }
  </style>
</head>
<body class="A4">
  <section class="sheet padding-10mm">
    <?php $this->load->view('templates/includes/cetak_header') ?>

    <br><br><br><br><br>
    <table >
     <tbody>
      <tr>
        <td align="center"><u><h1>SURAT IZIN MENINGGALKAN PEKERJAAN</h1></u></td>
      </tr>
    </tbody>
  </table>
  <br>
  <table style="padding-top: 15px;" >
    <tbody >

      <tr>
        <td width="210px" style="text-align: justify;" valign="top">Bersama ini diberitahukan bahwa :</td>       
      </tr>

    </table>

    <table style="padding: 20px;">
     <tbody>

      <tr>
        <td width="35%">Nama Pekerja</td>
        <td width="1%">:</td>
        <td ><?= $nama ?></td>
      </tr>  
      <tr>
        <td>NIK</td>
        <td>:</td>
        <td ><?= $nik ?></td>
      </tr> 
      <tr>
        <td>Jabatan</td>
        <td>:</td>
        <td ><?= $jabatan ?></td>
      </tr>  
      <tr>
        <td>Unit Kerja</td>
        <td>:</td>
        <td ><?= $nm_unit_kerja ?></td>
      </tr> 
      <tr>
        <td>Jenis Izin</td>
        <td>:</td>
        <td ><?= $jenis_izin ?></td>
      </tr>
      <tr>
        <td>Lamanya Izin</td>
        <td>:</td>
        <td ><?= $lama . " Hari"?></td>
      </tr>
      <tr>
        <td>Tgl. Pelaksanaan</td>
        <td>:</td>
        <td ><?= date_indo($tgl_mulai) ?></td>
      </tr>
      <tr>
        <td>Alasan Izin Dispensasi</td>
        <td>:</td>
        <td ><?= $alasan ?></td>
      </tr>
      <tr>
        <td>Yang akan dilaksanakan pada </td>
        <td>:</td>
        <td ><?= date_indo($tgl_mulai) ?> hingga <?= date_indo($tgl_akhir) ?></td>
      </tr>

    </tbody>
  </table>

  <table style="margin-top: 10px;" >
    <tbody>
      <tr>
        <td>Demikian permohonan ini, atas perhatiannya diucapkan terimakasih </td>
      </tr>
    </tbody>
  </table>

  <table style="padding-top: 50px;" >
   <tbody>
    <tr>
      <td align="right">Pangkalpinang,<?php echo date_indo(date("Y-m-d")) ?></td>
    </tr>
  </tbody>
</table><br>
<table style="padding-top: 15px; height: 4px; border-collapse: collapse; table-layout: fixed;" >
  <tbody>
    <tr>
      <td align="center"><?php $status; if($status == 1){echo "Disetujui";}else{ echo "Tidak Disetujui"; } ?></td>
      <td align="center"></td>
      <td align="center">Pemohon</td>
    </tr>
    <tr align="center" style="text-align: center";>
      <td align="center" style="text-align: center;">
        <img src="<?= $qr_code ?>" alt="qr_code" width="80" height="80"><br>
        <p style="margin-bottom: 0%; margin-top: 30px; text-align: center;" >
          <?php echo "<u>".$nm_approval."</u>"?>
        </p>
      </td>
      <td align="center"> 
                <!-- <img src="<?= $qr_approval ?>" alt="qr_code" width="80" height="80"><br>
                  <p style="margin-bottom: 0%; margin-top: 30px; text-align: center;">
                      <?php echo "<u>".$nm_approval."</u>" ?>
                    </p> -->
                  </td>
                  <td align="center">
                    <img src="<?= $qr_code ?>" alt="qr_code" width="80" height="80"><br>
                    <p style="margin-bottom: 0%; margin-top: 30px; text-align: center;">
                      <?php echo "<u>".$nama."</u>" ?>
                    </p>
                  </td>
                </tr>
              </tbody>
            </table>


            <table style="padding-top: 35px;">
             <tbody>
              <tr>
                <td width="15%" style="font-size: 18px;" height="23px"><b>Catatan</b></td>
                <td>:</td>
              </tr>           	

            </tbody>
          </table>

          <table >
           <tbody>
            <tr>
              <td width="2%" style="font-size: 18px;" height="23px">-</td>

              <td style="font-size: 15px;">Alasan Jika tidak disetujui : </td>
            </tr>        	

          </tbody>
        </table>

        <table   style="padding-top: 10px; margin-top: 1%; padding-bottom: 0%; border: 1px solid black;" >
        	<tbody>
            <tr>
              <td width="26%">
                <p>Alasan ...</p>
              </td>


            </tr>

          </tbody>
        </table>
      </table>



    </section>

    <?php $this->load->view('templates/includes/cetak_footer') ?>>