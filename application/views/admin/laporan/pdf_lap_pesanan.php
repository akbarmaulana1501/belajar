

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
     <img src="templates/assets/images/logo-blue.png" style="position: absolute; width: 25%; height: auto;">
        <table style="width: 100%; margin-left: 180px;">
          <tr>
            <td align="left">
              <span style="line-height: 1.8; font-weight: bold; font-size: 12px; ">
                <?php echo strtoupper($nama_company) ?>        
              </span>
               <span style="font-size: 12px; font-weight: normal;">
                <br><?php echo $alamat ?>, <?= $kel ?>
                <br><?= $kec ?>, <?= $kab_kota ?>,
                <br><?= $prov ?>, <?= $no_telp ?>, <?= $website ?>
                </span>     
            </td>
          </tr>
        </table>
        
        <p class="line-title"></p>
        
        <table style=" padding-top: 15px;">
          <tbody >
            <tr>
              <td width="18%">Periode</td>
              <td width="2%">:</td>
              <td width="80%">
                  <?php echo date_indo(date('Y-m-d',strtotime($_GET['start_date']))).' s.d '.date_indo(date('Y-m-d',strtotime($_GET['end_date']))) ?>
              </td>
            </tr>
            <tr>
              <td width="18%">Dicetak Oleh</td>
              <td width="2%">:</td>
              <td width="80%">
                  <?= $user['name'] ?>
              </td>
            </tr>
            <tr>
              <td width="18%">Tanggal Cetak</td>
              <td width="2%">:</td>
               <td><?php echo longdate_indo(date('Y-m-d')) ?></td>
            </tr>        
           </tbody>
        </table>


        <table class="table" style=" padding-top: 15px;font-size: 12px;">
            <thead>
                <tr>
                    <th width="2%">No</th>
                    <th>ID Pesanan</th>
                    <th>Tanggal Pesanan</th>
                    <th>Nama Pelanggan</th>
                    <th>Item</th>
                    <th>Banyak</th>
                    <th>Harga Barang (Rp)</th>
                    <th>Total (Rp)</th>
                </tr>
            </thead>


        <tbody>
        	<?php $no = 0;$sum = 0; foreach ($lap as $value) { 
              $no++;
              $total = $value['qty']*$value['hrg_barang'];
              $jumlah = $value['jumlah'];
              $sum += $value['jumlah'];
          ?>
	
                <tr>
                    <td><?= $no ?></td>
                    <td align="left"><?php echo $value['id_order']; ?></td>
                    <td align="left"><?php echo date_indo($value['tgl_order']); ?></td>
                    <td align="left"><?php echo $value['nm_pelanggan']; ?></td>
                    <td><?php echo $value['nm_barang'] ?></td>
                    <td align="center"><?php echo rupiah($value['qty']) ?></td>
                    <td align="center"><?php echo '@ '. rupiah($value['hrg_barang']) ?></td>
                    <td align="right"><?php echo rupiah($jumlah) ?></td>
                </tr>
                
<?php } ?>

            
                <tr>
                	<td colspan="7" align="right"><b>Total</b></td>
                	<td align="right"><?php echo rupiah($sum); ?></td>
                </tr>    
            </tbody>
        </table>
          <p style="margin-left: 500px;"><?php echo $kab_kota ?>, <?= date_indo(date('Y-m-d')) ?></p>
          <p style="margin-left: 600px; padding-top: 27.5px;"></p>

    </section>
  

</body>
<script type="text/javascript"> try { this.print(); } catch (e) { window.onload = window.print; } </script>
</html>