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
     <img src="templates/assets/images/logo_kepegawaian.jpeg" style="position: absolute; width: 30%; height: 100%;">
                
        <br><br><br><br><br>
        
        <table style="padding-top: 15px;"  >
        	<tbody>
        		<tr>
              		<td colspan="4" align="center" style="font-weight: 900; font-size: 13pt">SURAT PERMOHONAN CUTI TAHUNAN</td>
            	</tr>
        	</tbody>
        </table>
        <br>
        <table style="padding-top: 15px;">
          <tbody >
            
            <tr>
              <td width="210px" style="padding-top: 0px; margin-top: 0px; font-weight: bold; text-align: justify;" valign="top">MOHON PERHATIAN : </td>

              <td width="15px" style="padding-top: 0; margin-top: 0%; text-align: left;" valign="top">1.</td>
              <td style="padding-top: 0" style="text-align: justify;">
              	Surat Permohonan Cuti Tahunan di bawah ini diisi dengan lengkap dan cermat.              	            	
              </td>              
            </tr>
            <tr>
              <td width="210px" style="padding-top: 0px; margin-top: 0px; font-weight: bold; text-align: justify;"></td>
              <td width="15px" style="padding-top: 0; margin-top: 0%; text-align: left;" valign="top">2.</td>
              <td style="padding-top: 0" style="text-align: justify;">
              	Dalam Permohonan Cuti ini, agar dapat melampirkan Surat Permohonan Cuti Tahunan sebelumnya.              	            	
              </td>              
            </tr>

            <tr>
              <td width="210px" style="padding-top: 0px; margin-top: 0px; font-weight: bold; text-align: justify;"></td>
              <td width="15px" style="padding-top: 0; margin-top: 0%; text-align: left;" valign="top">3.</td>
              <td style="padding-top: 0" style="text-align: justify;">
              	Permohonan cuti harap disampaikan kepada Bagian HC 1 (satu) minggu sebelumnya.
              </td>              
            </tr>

			<!-- <tr>
				<td width="15px">2.</td>
            	<td style="padding-top: 0" style="text-align: justify;"><br>
              	Dalam Permohonan Cuti ini, agar dapat melampirkan Surat Permohonan Cuti Tahunan sebelumnya.
              </td>
            </tr>    
            <tr>
            	<td width="15px">3.</td>
            	<td style="padding-top: 0" style="text-align: justify;"><br>
              	Permohonan cuti harap disampaikan kepada Bagian HC 1 (satu) minggu sebelumnya.
              </td>
            </tr>   -->     
                     
            
           </tbody>
        </table>

        <table style="padding-top: 15px; border-top: 1px solid black" >
        	<tbody>
        		<tr>
              		<td colspan="4" align="left">
              			Saya yang bertanda tangan di bawah ini :              		
              	</td>
            	</tr>
        	</tbody>
        </table>

        <table style="padding-top: 15px;" >
        	<tbody>
        		  
            <tr>
              <td width="20%">Nama</td>
              <td width="5px">:</td>
              <td colspan="2"><?php echo $nama ?></td>
            </tr>  
            <tr>
              <td>NIK</td>
              <td width="5px">:</td>
              <td colspan="2"><?php echo $nik ?></td>
            </tr> 
            <tr>
              <td>Jabatan</td>
              <td width="5px">:</td>
              <td colspan="2"><?php echo $nm_unit_level ?></td>
            </tr> 
            <tr>
              <td>Unit Organisasi</td>
              <td width="5px">:</td>
              <td  colspan="2"><?php echo $nm_unit_organisasi?></td>
            </tr> 
            <tr>
              <td>Unit Kerja</td>
              <td width="5px">:</td>
              <td colspan="2"><?php echo $nm_unit_kerja?></td>
            </tr> 
s
            
            <tr>
              <td colspan="4" style="text-align: justify;"><br>
              	Dengan ini mohon izin untuk melaksanakan cuti tahunan Periode Tahun <?php echo date("Y"); ?> selama <?php echo $lama ?>  hari kerja terhitung mulai tanggal <?php echo date_indo($tgl_mulai) ?> sampai dengan <?php echo date_indo($tgl_akhir) ?> yang akan dilaksanakan di <?php echo $pelaksanaan_cuti ?>.<br>

              	Sehingga cuti tahunan saya untuk Periode Tahun <?php echo date("Y"); ?> masih sisa <?php echo $jatah_cuti ?> hari kerja.<br><br>

				Demikian permohonan cuti ini, atas perhatiannya saya ucapkan terima kasih.
              </td>
            </tr>

        	</tbody>
        </table>

        <table style="padding-top: 35px;" >
        	<tbody>
        		  <tr>
              		<td> </td>
              		<td align="right">Pangkalpinang, <?php echo date_indo(date("d-m-y")); ?></td>
            	</tr>
        	</tbody>
        </table>
        <br>
        <table style="padding-top: 15px;">
            <tbody>
              <tr>
                <td align="center">Diketahui oleh,</td>
                <td align="center">Disetujui / tidak disetujui oleh,</td>
                <td align="center">Pemohon,</td>
              </tr>
              <tr align="center" style="text-align: center";>
                <td align="center" style="text-align: center;">
                  <p style="margin-bottom: 0%; margin-top: 50px; text-align: center;" >
                    <?php echo "<u>".$nama."</u>" ?>
                  </p>
                </td>
                <td align="center">
                  <p style="margin-bottom: 0%; margin-top: 50px; text-align: center;">
                    <?php echo "<u>".$nm_approval."</u>" ?>
                  </p>
                </td>
                <td align="center">
                  <p style="margin-bottom: 0%; margin-top: 50px; text-align: center;">
                    <?php echo "<u>".$nama."</u>" ?>
                  </p>
                </td>
              </tr>
            </tbody>
          </table>


        <table style="padding-top: 35px; margin-bottom: 0%; padding-bottom: 0%" >
        	<tbody>
        		  <tr>
              		<td width="15%" height="23px">Catatan</td>
              		<td width="5%">:</td>
              		<td> 
                    <?php echo$keterangan ?> 
                  </td>
            	</tr>
            	<tr>
              		<td width="15%" valign="top" >
              			Alasan 
              		</td>
              		<td width="5%" valign="top">
              			: 
              		</td>
              		<td style="border: 1px solid black; padding-left: 2%; padding-right: 2%">
                    <p style="text-align: justify; "><?php echo$alasan?></p>
              		</td>
            	</tr>            	
            	
        	</tbody>
        </table>

    </section>
  

</body>
<!-- <script type="text/javascript"> try { this.print(); } catch (e) { window.onload = window.print; } </script>
 --></html>