<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Draft Ijazah <?php echo $mhs->namalengkap; ?></title>
    <style>
    #watermark {
    position: fixed;
    top: 35%;
    width: 100%;
    text-align: center;
    opacity: .3;
    transform: rotate(-45deg);
    transform-origin: 50% 50%;
    z-index: -1000;
    }
    </style>
    <style>
    @font-face /*perintah untuk memanggil font eksternal*/
    {
    font-family: 'Eras'; /*memberikan nama bebas untuk font*/
    src: url('assets/ijazah-fonts/ERASDEMI.TTF');/*memanggil file font eksternalnya di folder nexa*/
    }
    @font-face /*perintah untuk memanggil font eksternal*/
    {
    font-family: 'Bernhc'; /*memberikan nama bebas untuk font*/
    src: url('assets/ijazah-fonts/BERNHC.TTF');/*memanggil file font eksternalnya di folder nexa*/
    }
    </style>
    <style>
    p.itcmed9
    {
    font-family:"Eras Medium ITC",sans-serif;
    letter-spacing:.8pt;
    font-size: 8pt; /*nama yang sudah didefinisikan pada @font-face*/
    }
    td.f12b
    {
    font-size: 11pt;
    text-align: center;
    font-family:"Bernard MT Condensed",serif;
    letter-spacing:-.15pt;
    }
    td.f11b
    {
    font-size: 10pt;
    text-align: center;
    font-family:"Bernard MT Condensed",serif;
    letter-spacing:-.15pt;
    }
    td.f9e
    {
    font-size: 8pt;
    text-align: center;
    font-family:"Eras Medium ITC",sans-serif;
    letter-spacing:.8pt;
    }
    td.f10e
    {
    font-size: 9pt;
    text-align: center;
    font-family:"Eras Medium ITC",sans-serif;
    letter-spacing:.8pt;
    }
    td.f11e
    {
    font-size: 10pt;
    text-align: center;
    font-family:"Eras Medium ITC",sans-serif;
    letter-spacing:.8pt;
    }
    td.f12e
    {
    font-size: 11pt;
    text-align: center;
    font-family:"Eras Medium ITC",sans-serif;
    letter-spacing:.8pt;
    }
    td.f11bb
    {
    font-size: 10pt;
    text-align: center;
    font-family:"Britannic Bold",sans-serif;
    color:black;
    letter-spacing:.3pt;
    }
    td.f18bb
    {
    font-size: 14pt;
    text-align: center;
    font-family:"Britannic Bold",sans-serif;
    color:black;
    letter-spacing:.3pt;
    }
    td.f20bb
    {
    font-size: 16pt;
    text-align: center;
    font-family:"Britannic Bold",sans-serif;
    color:black;
    letter-spacing:.3pt;
    }
    h1{
    font-size: 72pt;
    }
    
    </style>
    <style>
    @page { margin: 0cm 1cm; }
    </style>
  </head>
  <body>
    <div id="watermark"><h1>D  R  A  F  T</h1></div>
    <table width="100%" border="0">
      <tr>
        <td><p class="itcmed9">No.  ljazah / Cert. No. : <br />
          <strong><?php if ($no_surat['0']['no_ijazah'] == null): ?>
          ___/074129/<?php echo date("Y") ?>
          <?php else: ?>
          <?php echo $no_surat['0']['no_ijazah']; ?>
        <?php endif ?></strong><br>
        Disetujui pada : <?php echo $ijazah['0']['create_at'] ?></p></td>
        <td width="60%">&nbsp;</td>
        <td><p class="itcmed9" align="right">Nomor PIN/ PIN Number :<br />
          <strong><?php if ($no_surat['0']['no_ijazah'] == null): ?>
          ***********************
          <?php else: ?>
          <?php echo $no_surat['0']['no_ijazah']; ?>
        <?php endif ?></strong></p></td>
      </tr>
    </table>
    <table width="100%" border="0">
      <tr>
        <td class="f12b"><strong>dengan ini menyatakan bahwa</strong></td>
      </tr>
      <tr>
        <td class="f11e">
          herewith declares that
        </td>
      </tr>
      <tr>
        <td class="f20bb">
          <strong><u><?php echo $mhs->namalengkap; ?></u></strong>
        </td>
      </tr>
      <tr>
        <td class="f11bb">
          <strong>Nomor Induk Mahasiswa : </strong><strong><?php echo $mhs->nim ?></strong>
        </td>
      </tr>
      <tr>
        <td class="f11e">
          student registration number : <?php echo $mhs->nim ?>
        </td>
      </tr>
      <tr>
        <td class="f11bb">
          <strong>Tahun Masuk : </strong><strong><?php echo $mhs->angkatan; ?></strong>
        </td>
      </tr>
      <tr>
        <td class="f11e">
          enrollment  year : <?php echo $mhs->angkatan; ?>
        </td>
      </tr>
      <tr>
        <td class="f11bb">
          <strong>Lahir di </strong><strong><?php echo $mhs->lahirmahasiswa ?></strong><strong>, </strong><strong><?php echo tanggal($mhs->tgllahirmahasiswa) ?></strong><strong>
        </td>
      </tr>
      <tr>
        <td class="f11e">
          born in <?php echo $mhs->lahirmahasiswa ?>, <?php $date=date_create($mhs->tgllahirmahasiswa); echo date_format($date,"F jS, Y"); ?>
        </td>
      </tr>
      <tr>
        <td class="f11b">
          telah menyelesaikan pendidikan  dengan baik dan memenuhi segala persyaratan studi pada
        </td>
      </tr>
      <tr>
        <td class="f10e">
          has successfully accomplished and fulfilled  all the study requirements of
        </td>
      </tr>
      <tr>
        <td class="f18bb"><strong>PROGRAM PENDIDIKAN DIPLOMA III</strong></td>
      </tr>
      <tr>
        <td class="f12e">
          DIPLOMA DEGREE (D3)
        </td>
      </tr>
      <tr>
        <td class="f18bb">
          <strong>PROGRAM STUDI  FARMASI</strong>
        </td>
      </tr>
      <tr>
        <td class="f12e">
          PHARMACY STUDY PROGRAM
        </td>
      </tr>
      <tr>
        <td class="f9e">
          Terakreditasi Institusi BAN-PT SK Nomor : 4268/SK/BAN-PT/Akred/PT/XI/2017  tanggal 7 November 2017<br />
          Decree BAN-PT, SK Number : 4268/SK/BAN-PT/Akred/PT/XI/2017 dated November 7th 2017
        </td>
      </tr>
      <tr>
        <td class="f9e">
          Terakreditasi Prodi LAM-PTKes, SK Nomor : 0208/LAM-PTKes/Akr/Dip/IV/2019  tanggal 27 April 2019 <br />
          Decree LAM-PTKes, SK Number : 0208/LAM-PTKes/Akr/Dip/IV/2019 dated April 27th 2019
        </td>
      </tr>
      <tr>
        <td class="f12b">
          Tanggal kelulusan 30 September 2021
        </td>
      </tr>
      <tr>
        <td class="f9e">
          date of judicium September 30, 2021
        </td>
      </tr>
      <tr>
        <td class="f12b">karena itu kepadanya diberikan ijazah dan gelar</td>
      </tr>
      <tr>
        <td class="f9e">
          <?php $gender = $mhs->kelaminmhs;
?>
<?php if ($gender=="L"): ?>
  henceforth he is awarded the certificate and degree of
<?php else: ?>
  henceforth she is awarded the certificate and degree of
<?php endif; ?>
        </td>
      </tr>
      <tr>
        <td class="f20bb">
          AHLI MADYA FARMASI (A.Md.Farm.)
        </td>
      </tr>
      <tr>
        <td class="f11b">
          beserta segala hak dan  kewajiban yang melekat pada gelar tersebut
        </td>
      </tr>
      <tr>
        <td class="f9e">
          with all the rights and responsibilities appertaining to  the degree
        </td>
      </tr>
      <tr>
        <td class="f10e">
          diberikan di Surabaya, 30 September 2021
        </td>
      </tr>
      <tr>
        <td class="f9e">
          gave in  Surabaya, 30 September 2021
        </td>
      </tr>
    </table>
    
    <table width="100%" border="0">
  <tr>
    <td class="f12b" width="47%"><strong>WAKIL DIREKTUR I <br>BIDANG AKADEMIK DAN KEMAHASISWAAN</strong></td>
    <td width="8%">&nbsp;</td>
    <td class="f12b" width="45%"><strong>DIREKTUR</strong></td>
  </tr>
  <tr>
    <td class="f9e">Vice Director</td>
    <td>&nbsp;</td>
    <td class="f9e">Director</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="f12b"><strong>M.A. Hanny Ferry Fernanda, S.Farm., M.Farm., Apt.</strong></td>
    <td>&nbsp;</td>
    <td class="f12b"><strong>Ninik Mas Ulfa, S.Si., Apt., Sp-FRS.</strong></td>
  </tr>
</table>
    
  </body>
</html>