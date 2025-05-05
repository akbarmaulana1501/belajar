<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Memorandum</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 12px;
      margin: 30px;
      line-height: 1.4;
    }
    
    .header {
      width: 100%;
      margin-bottom: 10px;
    }
    
    .header .left, .header .right {
      display: inline-block;
      vertical-align: top;
    }
    
    .header .left {
      width: 50%;
    }
    
    .header .right {
      width: 50%;
      text-align: right;
      font-size: 10px;
    }
    
    .header .logo {
      height: 50px;
      margin-bottom: 2px;
    }
    
    h3.title {
      text-align: right;
      text-transform: uppercase;
      margin: 0;
      font-size: 16px;
      letter-spacing: 1px;
    }
    
    .meta table {
      width: 100%;
      border-collapse: collapse;
    }
    
    .meta td {
      padding: 6px 8px;
      vertical-align: middle;
    }
    
    .meta .label {
      width: 20%;
      font-weight: bold;
    }
    
    .meta .sep {
      width: 2px;
      text-align: center;
    }
    
    .meta .value {
      width: 100%;
      border-bottom: 1px dotted #000;
      padding-bottom: 4px;
    }
    
    .meta .value.full {
      border-bottom: none;
      padding-bottom: 8px;
      font-weight: bold;
    }
    
    .meta .empty {
      width: 20%;
    }
    
    .content {
      margin-bottom: 30px;
      text-align: justify;
      margin-left: 7px; /* Adjusted left margin */
    }
    
    .signatures {
      width: 100%;
      margin-top: 40px;
    }
    
    .signatures .sig-block {
      display: inline-block;
      width: 45%;
      text-align: center;
      vertical-align: top;
    }
    
    .signatures .sig-line {
      border-bottom: 1px dotted #000;
      width: 80%;
      margin: 0 auto 4px auto;
      height: 1px;
    }
    
    .signatures p {
      margin: 2px 0;
      font-weight: bold;
    }
    
    /* MEMORANDUM SECTION RIGHT ALIGN */
    .memo-section {
      text-align: right;
      margin-top: 40px;
    }
  </style>
</head>
<body>

  <!-- HEADER -->
  <div class="header">
    <div class="left">
      <img src="templates/assets/images/logo-blue.png" style="position: absolute; width: 60%; height: auto;">
    </div>
    <div class="right">
      <strong>Rumah Sakit Bakti Timah Pangkalpinang</strong><br>
      Jl. Bukit Baru No.1, Kelurahan Taman Sari, Kecamatan Gerunggang<br>
      Kota Pangkalpinang, Prov. Kepulauan Bangka Belitung – Indonesia<br>
      Telp. +62(717)431191 • +62(717)431292 • Fax +62(717)431212
    </div>
  </div>

  <!-- MEMORANDUM SECTION (RIGHT ALIGNED) -->
  <div class="memo-section">
    <h3 class="title">Memorandum</h3>

    <!-- META DATA -->
    <div class="meta">
      <table>
        <tr>
          <td class="value full" colspan="3">
            <span>Pangkalpinang,</span> <span>26 Agustus 2024</span>
          </td>
        </tr>

        <tr>
          <td class="label">Nomor</td>
          <td class="sep">:</td>
          <td class="value">33/BTMMO-2314/2024-S</td>
          <td class="empty"></td>
        </tr>
        <tr>
          <td class="label">Kepada Yth.</td>
          <td class="sep">:</td>
          <td class="value">Chief HC & GA</td>
          <td class="empty"></td>
        </tr>
        <tr>
          <td class="label">Dari</td>
          <td class="sep">:</td>
          <td class="value">Sro IGD</td>
          <td class="empty"></td>
        </tr>
        <tr>
          <td class="label">Lampiran</td>
          <td class="sep">:</td>
          <td class="value">1 (satu) lembar</td>
          <td class="empty"></td>
        </tr>
        <tr>
          <td class="label">Perihal</td>
          <td class="sep">:</td>
          <td class="value"><em>Usulan “Perbaikan printer”</em></td>
          <td class="empty"></td>
        </tr>
      </table>
    </div>

    <!-- ISI MEMO -->
    <div class="content">
      <p>Sehubungan dengan printer di ruang UGD rusak, tidak bisa digunakan, dan perlu perbaikan, sehingga mengganggu pelayanan pasien di UGD.</p>
      <p>Maka dengan ini mengajukan perbaikan printer sebanyak 1 pcs.</p>
      <p>Demikian permohonan ini kami sampaikan, atas perhatian dan kerjasamanya kami ucapkan terimakasih.</p>
    </div>

    <!-- TANDA TANGAN -->
    <div class="signatures">
      <div class="sig-block">
        <div class="sig-line"></div>
        <p>RSBT Pangkalpinang<br>Chief Medical</p>
        <p><em>Dr. Muhamad Febry</em></p>
      </div>
      <div class="sig-block">
        <div class="sig-line"></div>
        <p>SRO IGD</p>
        <p><em>Jauhara, S.Kep Ns</em></p>
      </div>
    </div>
  </div>

</body>
</html>
