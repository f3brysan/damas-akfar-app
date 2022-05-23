<!doctype html>
<title>Verifikator QRCode DAMAS Akfar Surabaya</title>
<style>
body { text-align: center; padding: 150px; }
h1 { font-size: 50px; }
body { font: 20px Helvetica, sans-serif; color: #333; }
article { display: block; text-align: left; width: 650px; margin: 0 auto; }
a { color: #dc8100; text-decoration: none; }
a:hover { color: #333; text-decoration: none; }
</style>
<?php if (is_array($get) && count($get) > 0): ?>
<article>
  <h1>Selamat, Anda Telah Lolos Untuk Sidang Karya Tulis Ilmiah.</h1>
  <div>
    <?php foreach ($get as $g): ?>
    <p>Proposal KTI oleh saudara <?php echo $g['namalengkap'] ?> dengan NIM <?php echo $g['nim'] ?>, yang berjudul : </p>    
    <?php echo $g['judul'] ?>
    <?php echo $g['sub_judul'] ?>
    <p>Telah disetujui oleh Pihak <?php echo $g['jenis'] ?> : <?php if ($g['gelardepan'] != NULL): ?> <?php echo $g['gelardepan'] ?>  
    <?php endif ?>
      <?php echo $g['nama'] ?>, <?php echo $g['gelarbelakang'] ?> (NIDN/NUP : <?php echo $g['nidn'] ?>) pada <?php $date = date_create($g['created_at']) ?> 
              <?php $date = date_format($date, "Y-m-d"); ?><?php echo tanggal($date); ?>.
    </p>
    <hr>
    <p style="size:5pt">Kode Unik : <?php echo $g['qrcode_id'] ?></p>    
    <?php endforeach ?>
  </div>
</article>
<?php else: ?>
<?php endif?>