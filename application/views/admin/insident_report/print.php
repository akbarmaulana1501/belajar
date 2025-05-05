<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?= $title ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="<?= base_url('templates/') ?>assets/images/favicon.ico">
  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 12px;
      margin: 20px;
    }
    .header {
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
    h2.title {
      text-align: center;
      margin: 10px 0 20px;
      text-transform: uppercase;
      font-size: 18px;
    }
    .border-box {
      border: 1px solid #000;
      padding: 10px;
      margin-bottom: 10px;
      width: 100%;
    }
    .line {
      border-bottom: 1px solid #000;
      height: 25px;
      padding-left: 5px;
    }
    .label {
      font-weight: bold;
    }
    .signature-line {
      height: 60px;
      border-bottom: 1px solid #000;
      margin: 10px auto 5px auto;
      width: 80%;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    td {
      vertical-align: top;
      padding: 4px;
    }
    .text-center {
      text-align: center;
    }
    .mt-4 {
      margin-top: 1.5rem;
    }
    .mb-2 {
      margin-bottom: 0.75rem;
    }
  </style>
</head>
<body>

  <div class="header">
    <div class="left">
      <p><strong>RS. Bakti Timah Pangkalpinang</strong></p>
      <p>Jl. Bukit Baru No. 1 Pangkalpinang 33121</p>
      <p>Bangka Belitung – Indonesia</p>
    </div>
    <div class="right">
      <p>Phone : +62 - 717 - 421 - 091</p>
      <p>Fax   : +62 - 717 - 424 - 212</p>
      <p><em>Form Edp VI </em></p>
    </div>
  </div>

  <h2 class="title">Insident Report</h2>

  <div class="border-box">
    <table>
      <tr>
        <td style="width: 40%;">
          <span class="label">Hari/ Tanggal:</span>
          <div class="line"><?= longdate_indo($data->tgl_insident) ?></div>
        </td>
        <td style="width: 40%;">
          <span class="label">Unit Kerja:</span>
          <div class="line"><?= $data->nm_unit ?></div>
        </td>
        <td style="width: 20%;">
          <span class="label">ID Insident:</span>
          <div class="line"><?= $data->id_insident_report ?></div>
        </td>
        <td style="width: 20%;">
          <span class="label">ID Tiket:</span>
          <div class="line"><?= $data->id_tiket ?></div>
        </td>
      </tr>
    </table>

    <div class="mb-2">
      <span class="label">Identifikasi (oleh <?= $data->nm_teknisi ?>):</span>
      <div class="line"><?= $data->identifikasi ?></div>
    </div>

    <div class="mb-2">
      <span class="label">Solusi Perbaikan:</span>
      <div class="line"><?= $data->solusi ?></div>
    </div>

    <div class="mb-2">
      <span class="label">Hasil Perbaikan:</span>
      <div class="line"><?= $data->hasilperbaikan ?></div>
    </div>

    <div class="mb-2">
      <span class="label">Rekomendasi:</span>
      <div class="line"><?= $data->rekomendasi ?></div>
    </div>

    <table class="mt-4">
      <tr class="text-center">
        <td style="width: 50%;">
          <div class="signature-line"><strong>Petugas <?= $data->nm_unit ?></strong></div>
          <span><?= $data->nm_user ?></span>
        </td>
        <td style="width: 50%;">
          <div class="signature-line"><strong>Petugas EDP</strong></div>
          <span><?= $data->nm_teknisi ?></span>
          
        </td>
      </tr>
    </table>

    <div class="text-center mt-4">
      <em>Mitra Terpercaya Layanan Kesehatan Keluarga dan Masyarakat</em>
    </div>
  </div>

</body>
</html>
