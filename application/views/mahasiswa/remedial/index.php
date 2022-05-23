<!-- Start Page content -->


<div class="content">
	<div class="container-fluid">

		<div class="row">
			<div class="col-12">
				<div class="col-md-12">
					<div class="card-box">
						<h4 class="header-title m-t-0 m-b-30"> Halaman Kartu Rencana Remedial Mahasiswa</h4>
						<?php if ($verifikasi !== NULL): ?>
                            <?php 
                            $limit = 12;
                            if ($sks <= $limit): ?>
                                <div class="col col-xs-12 text-right">
                        <a class="btn btn-primary" href="<?php echo site_url('mahasiswa/cetakinvoiceremedial') ?>" role="button" target='new'>Cetak Invoice</a>
                        <?php if ($is_aprove['aprove_by'] == 'keuangan'): ?>
                        	<a class="btn btn-primary" href="<?php echo site_url('mahasiswa/cetakkrsremedial') ?>" role="button" target='new'>Cetak Remedial</a>
                        	<?php else: ?>
                        		<a class="btn btn-danger disabled" href="<?php echo site_url('mahasiswa/cetakinvoiceremedial') ?>" role="button" target='new'>Cetak Remedial</a>
                        <?php endif ?>
                         
                    </div>                    
                    <?php else: ?>
                        <div class="alert alert-danger" role="alert">
                                        Maaf jumlah SKS anda melebihi dari ketentuan batas (12 SKS). Mohon diambil sebijak mungkin.
                                    </div>
                            <?php endif ?>
							
					<br>
						<form action="<?php echo base_url('mahasiswa/insert_krs') ?>" method="post" enctype="multipart/form-data" role="form">
							<table class="table table-sm table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Mata Kuliah </th>
                                <th>Nama Mata Kuliah</th>
                                <th>SKS</th>
                                <th>Semester</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php if (is_array($pickedremedial) && count($pickedremedial) > 0): ?>
                            <?php $no = 1;
foreach ($pickedremedial as $pk): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $pk['kode'] ?></td>
                                <td><?php echo $pk['nama'] ?></td>
                                <td><?php echo $pk['sks'] ?></td>
                                <td><?php echo $pk['semester'] ?></td>
                                <td>
                                    <?php if ($is_aprove['aprove_by'] == 'keuangan'): ?>
                                        <!-- NONE -->
                        	        <?php else: ?>
                                    <a href="<?php echo site_url("mahasiswa/hapuspilihanremedial/$pk[idstudi]/$pk[idmatkul]") ?>" onclick="return confirm('Anda yakin menghapus matakuliah <?php echo $pk['nama']; ?> dari pilihan? ?');" data-toggle="tooltip" title="Hapus?" class="btn btn-danger"><em class="fa fa-trash"></em></a>
                                    <?php endif ?>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                        <?php else: ?>
                        	
                        <?php endif?>
                    </table>
                    <h4 class="header-title m-t-0 m-b-30"> Total SKS yang diambil saat ini : <?php echo $sks; ?> SKS.</h4>
</form>

					</div>
				</div> <!-- end col -->
                            <div class="col-lg-12">
                                <div id="accordion" role="tablist" aria-multiselectable="true" class="m-b-30">
                                    <div class="card">
                                        <div class="card-header" role="tab" id="headingTwo">
                                            <h5 class="mb-0 mt-0">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                   Daftar Mata Kuliah Yang Tersedia
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="card-body">
                                                <form action="<?php echo base_url('mahasiswa/insert_remedial') ?>" method="post" enctype="multipart/form-data" role="form">
                                                	<div class="col col-xs-12 text-right">
                                                 <input type="submit" name="sbmt" class="btn btn-primary" value="Ambil">
                                              </div>
                                              <hr>
							<table class="table table-sm table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Mata Kuliah </th>
                                <th>Nama Mata Kuliah</th>
                                <th>SKS</th>
                                <th>Nilai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php if (count($khs) > 0): ?>

                            <?php $no = 1;
foreach ($khs as $m): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $m['kodematkul'] ?></td>
                                <td><?php echo $m['nama'] ?></td>
                                <td><?php echo $m['sks'] ?></td>
                                <td><?php
$e = '0.00';
$d = '1.00';
$c = '2.00';
$b = '3.00';
$a = '4.00';
$nilai = $m['nilai'];
if ($nilai <= '39.99') {
	$hasile = number_format($e, 2);
	echo $hasile;
} elseif ($nilai >= '40.00' && $nilai <= '50.99') {
	$hasild = number_format($d, 2);
	echo $hasild;
} elseif ($nilai >= '51.00' && $nilai <= '65.99') {
	$hasilc = number_format($c, 2);
	echo $hasilc;
} elseif ($nilai >= '66.00' && $nilai <= '75.99') {
	$hasilb = number_format($b, 2);
	echo $hasilb;
} else {
	echo number_format($a, 2);
}?>
                                	(<?php
$nilai = $m['nilai'];
if ($nilai <= '39.99') {
	echo "E";
} elseif ($nilai >= '40.00' && $nilai <= '50.99') {
	echo "D";
} elseif ($nilai >= '51.00' && $nilai <= '65.99') {
	echo "C";
} elseif ($nilai >= '66.00' && $nilai <= '75.99') {
	echo "B";
} else {
	echo "A";
}?>)
											
                                	
                                </td>
                                <td>
                                    <input type="checkbox" name="kode[]" value="<?php echo $m['kodematkul'] ?>">
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                        <?php else: ?>
                        	-
                        <?php endif?>
                    </table>
                    <div class="col col-xs-12 text-right">
                                                 <input type="submit" name="sbmt" class="btn btn-primary" value="Ambil">
                                              </div>
</form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php else: ?>
						<div class="alert alert-danger" role="alert">
                                        Anda Belum Memverifikasikan <strong>Bukti Pembayaran </strong>Semester
                                        <?php echo $cek->semester; ?> Tahun Ajaran <?php echo $cek->tahunajaran; ?> ke BAAK!
                                    </div>

						<?php endif?>

</div>
			</div>
		</div>

	</div> <!-- container -->

</div> <!-- content -->
