<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Hasil EKD <?php echo $mhs->namalengkap; ?></title>
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
    font-size: 9pt;
    font-family:"Eras Medium ITC",sans-serif;
    }
    th.f10e
    {
    font-size: 10pt;
    font-family:"Eras Medium ITC",sans-serif;
    }    
    table.b {
    font-size: 10pt;
    color: black; 
    padding: 10px;   
    }
    
    </style>
    <style>
    @page { margin: 0cm 1cm; }
    </style>
  </head>
  <body>
    <table width="100%" border="0">
    <tr>
      <td width="100%" align="center"><img src="assets/images/kop_2021.png" alt="" width="650px""></td>
    </tr>
  </table>    
      <h4 align="center">RAPOT EVALUASI KINERJA DOSEN (EKD)</h4>
      <p style="font-size: 10pt;" align="center"> Semester <?php echo $get_ekd['0']['semester'] ?> Tahun Ajaran <?php echo $get_ekd['0']['ta'] ?> </p>    
      <table width="100%" border="0">
        <tr>
          <td class="f9e" width="28%">Nama Dosen </td>
          <td class="f9e" width="2%">:</td>
          <td class="f9e" width="70%"> <?php echo $get_ekd['0']['nama'] ?>, <?php if ($get_ekd['0']['gelarbelakang'] != NULL): ?>
            <?php echo $get_ekd['0']['gelarbelakang'] ?>
            <?php else: ?>
          <?php endif ?> </td>
        </tr>
        <tr>
          <td class="f9e">Mata Kuliah </td>
          <td class="f9e">:</td>
          <td class="f9e"> <?php echo $get_ekd['0']['kodematkul'] ?> - <?php echo $get_ekd['0']['matkul'] ?></td>
        </tr>
        <tr>
          <td class="f9e">Responden Ideal </td>
          <td class="f9e">:</td>
          <td class="f9e"><?php echo $get_ekd['0']['responden'] ?> Responden</td>
        </tr>
        <tr>
          <td class="f9e">Responden Mengisi </td>
          <td class="f9e">:</td>
          <td class="f9e"><?php echo $get_ekd['0']['hasil'] ?> Responden</td>
        </tr>
      </table>
    </div>
    <table width="100%" border="1" class="b" style="border-collapse: collapse;">
      <thead>
        <tr>
          <th class="f10e">No.</th>
          <th class="f10e">Klasifikasi Aspek</th>
          <th class="f10e">Aspen Penilaian</th>
          <th class="f10e">Realisasi Nilai</th>
          <th class="f10e">Standarisasi Nilai</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($hasil_ekd as $ekd): ?>
        <tr>
          <td class="f9e"><?php echo $ekd['order'] ?>.</td>
          <td class="f9e"><?php echo $ekd['klasifikasi'] ?> </td>
          <td class="f9e"><?php echo $ekd['soal'] ?></td>
          <td class="f9e" align="right"><?php echo number_format($ekd['rata_nilai'],2) ?></td>
          <td class="f9e" align="right">4.00 </td>
        </tr>
        <?php endforeach ?>
        <tr>
          <td colspan="3" align="right"><strong>Nilai Kinerja Dosen</strong> </td>
          <td colspan="2" align="center">
            <!-- Menghitung Nilai Rata2 EKD -->
            <?php $key = 'rata_nilai';
            $sum = array_sum(array_column($hasil_ekd,$key));
            $count = count($hasil_ekd);
            $rata = $sum/$count;?>
            <!-- Hasil Perhitungan Nilai EKD -->
            <?php echo number_format($rata,2); ?>
            <?php if ($rata <= '2.39'): ?>
            <strong> (D)</strong>
            <?php elseif($rata >= '2.40' && $rata <= '2.99' ): ?>
            <strong> (C)</strong>
            <?php elseif($rata >= '3.00' && $rata <= '3.59' ): ?>
            <strong> (B)</strong>
            <?php else: ?>
            <strong> (A)</strong>
            <?php endif ?>
          </td>
        </tr>
        <tr>
          <td colspan="3" align="right"><strong>Keterangan</strong></td>
          <td colspan="2" align="center"><?php if ($rata <= '2.39'): ?>
            <strong>Kurang</strong>
            <?php elseif($rata >= '2.40' && $rata <= '2.99' ): ?>
            <strong>Cukup</strong>
            <?php elseif($rata >= '3.00' && $rata <= '3.59' ): ?>
            <strong>Baik</strong>
            <?php else: ?>
            <strong>Sangat Baik</strong>
          <?php endif ?></td>
        </tr>
      </tbody>
    </table>
    
  </body>
</html>