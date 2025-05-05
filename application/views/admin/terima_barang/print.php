<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tanda Terima Barang</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 12px;
      margin: 20px;
    }
    .header, .footer-sign {
      width: 100%;
    }
    .header .left, .header .right {
      display: inline-block;
      vertical-align: top;
    }
    .header .left {
      width: 60%;
    }
    .header .right {
      width: 40%;
      text-align: right;
      font-size: 11px;
    }
    .header p {
      margin: 2px 0;
    }
    /* Center judul dan atur margin */
    h2.title {
      text-align: center;
      margin: 10px 0 20px;
      text-transform: uppercase;
      font-size: 18px;
    }
    .info {
      margin-bottom: 20px;
    }
    .info table {
      width: 100%;
    }
    .info td {
      padding: 4px 0;
    }
    .info .label {
      width: 15%;
      font-weight: bold;
    }
    .info .value {
      width: 35%;
      border-bottom: 1px solid #000;
    }
    /* Tabel barang dengan border tegas: */
    .items {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 10px;
    }
    .items th, .items td {
      border: 1px solid #000;
      padding: 6px;
      vertical-align: top;
    }
    .items th {
      text-align: center;
      font-weight: bold;
    }
    .items .no   { width: 5%; }
    .items .nama { width: 65%; }
    .items .satuan, .items .jumlah {
      width: 15%;
      text-align: center;
    }
    .keterangan {
      width: 100%;
      border: 1px solid #000;
      padding: 10px 6px;
      height: 50px;
      margin-bottom: 30px;
    }
    .footer-sign {
      text-align: center;
    }
    .footer-sign .sign-block {
      display: inline-block;
      width: 45%;
      margin: 0 2.5%;
    }
    .footer-sign .line {
      border-bottom: 1px dotted #000;
      height: 1px;
      margin-bottom: 4px;
    }
    .footer-sign p {
      margin: 2px 0;
      font-size: 12px;
      font-weight: bold;
    }

    .surat-resmi {
      font-family: "Times New Roman", Times, serif;
      font-size: 14px;
      line-height: 1.8;
      text-align: justify;
      color: #000;
    }

    .surat-resmi strong {
      font-weight: bold;
    }

    .surat-resmi i {
      font-style: italic;
      color: #444;
    }

    .surat-resmi br {
      line-height: 2;
    }

  </style>
</head>
<body>
  <!-- HEADER -->
  <div class="header">
    <div class="left">
      <p><strong>RS. Bakti Timah Pangkalpinang</strong></p>
      <p>Jl. Bukit Baru No. 1 Pangkalpinang 33121</p>
      <p>Bangka Belitung – Indonesia</p>
    </div>
    <div class="right">
      <p>Phone : +62 - 717 - 421 - 091</p>
      <p>Fax   : +62 - 717 - 424 - 212</p>
      <p><em>Form Edp VI</em></p>
    </div>
  </div>

  <!-- JUDUL CENTER -->
  <h2 class="title">Tanda Terima Barang</h2>

  <!-- INFO TANGGAL & UNIT KERJA -->
  <div class="info">
    <table>
      <tr>
        <td class="label">Hari / Tanggal :</td>
        <td class="value"><?php echo longdate_indo($data->tgl) ?></td>
        <td class="label">Unit Kerja :</td>
        <td class="value"><?php echo $data->nm_unit ?></td>
      </tr>
    </table>
    <p class="surat-resmi">
      Berdasarkan <strong>ID Tiket : <?= $data->id_tiket ?> </strong> 
      dari unit kerja  <strong><?= $data->nm_unit ?> </strong> pada hari/tanggal <strong><?= longdate_indo($data->tgl_tiket) ?> </strong> dengan masalah <strong><i>"<?= $data->masalah ?>"</i></strong> dan status tiket <strong><?= $data->status_tiket ?></strong> maka kami melakukan pengecekan/perbaikan pada hari/tanggal <strong><?= longdate_indo($data->tgl_insident) ?></strong>. Hasil indentifikasi-nya <strong><?= $data->identifikasi ?></strong> , solusi-nya <strong><?= $data->solusi ?></strong> dan rekomendasi <strong><?= $data->rekomendasi ?></strong> kemudian hasil perbaikan <strong><?= $data->hasilperbaikan ?></strong> yang dilakukan oleh teknisi <strong><?= $data->nm_teknisi ?></strong> spesialisasi <strong><?= $data->spesialisasi ?></strong>.
      <br><br>
      Berikut ini adalah daftar barang yang diserahkan kembali kepada unit kerja terkait setelah dilakukan pengecekan/perbaikan:



    </p>
  </div>

  <!-- TABEL BARANG DENGAN BORDER TEGAS -->
  <table class="items">
    <thead>
      <tr>
        <th class="no">No.</th>
        <th class="nama">Nama Barang</th>
        <th class="satuan">No Inv</th>
        <th class="satuan">Satuan</th>
        <th class="jumlah">Jumlah</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($barang as $key => $row): ?>
          <tr>
              <td><?= $key + 1 ?></td>
              <td><?= $row->nm_barang ?></td>
              <td><?= $row->noinventaris ?></td>
              <td><?= $row->satuan ?></td>
              <td>1</td>
          </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <!-- KETERANGAN -->
  <div class="keterangan">
    <strong>Keterangan:</strong> <br>
    <span><?php echo $data->ket ?></span> 
  </div>

  <!-- TANDA TANGAN -->
  <div class="footer-sign">
    <div class="sign-block">
      <p>Yang Menerima</p>
      <div class="line"></div>
      <span><?= $data->terima ?></span>
    </div>
    <div class="sign-block">
      <p>Yang Menyerahkan</p>
      <div class="line"></div>
      <span><?= $data->serah ?></span>
    </div>
  </div>

</body>
</html>
