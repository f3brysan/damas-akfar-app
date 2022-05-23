<!-- Start Page content -->


<div class="content">
	<div class="container-fluid">

		<div class="row">
			<div class="col-12">
				<div class="col-md-12">
					<div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30"> Halaman Kartu Rencana Studi Mahasiswa</h4>
                        
						<?php if ($verifikasi !== NULL): ?>
                            <?php 
                            $limit = 24;
                            if ($sks <= $limit): ?>
                                <div class="col col-xs-12 text-right">
                                <?php
                                    if($ajukan_krs->status == 0) {
                                        echo '<a class="btn btn-success" href="'.site_url('dosen_wali/setujui_krs/').$nim.'/'.$ajukan_krs->tahun_ajaran.'" role="button"><i class="fi-circle-check"></i>&nbsp;Setujui KRS</a>';
                                    } elseif($ajukan_krs->status == 1) {
                                        echo '<a class="btn btn-success" href="javascript:void(0)" role="button" ><i class="fi-circle-check"></i>&nbsp;KRS Disetujui</a>&nbsp;';
                                        echo '<a class="btn btn-danger" href="'.site_url('dosen_wali/batalkan_krs/').$nim.'/'.$ajukan_krs->tahun_ajaran.'" role="button"><i class="fi-trash"></i>&nbsp;Batalkan KRS</a>';
                                    }
                                ?>
                                   <a class="btn btn-primary" href="<?php echo site_url("dosen_wali/cetak_krs/$nim") ?>" role="button" target='new'>Cetak</a>
                                </div>
                            <?php else: ?>
                        <div class="alert alert-danger" role="alert">
                                        Maaf jumlah SKS anda melebihi dari ketentuan batas (24 SKS). Mohon diambil sebijak mungkin.
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
                            <?php 
                               if($pickedkrs == NULL) {
                                $krsDiambil = 0; 
                                } else {
                                $krsDiambil = count($pickedkrs);
                                }
                            ?>
                        	<?php if ($krsDiambil > 0): ?>

                            <?php $no = 1;
foreach ($pickedkrs as $pk): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $pk['kode'] ?></td>
                                <td><?php echo $pk['nama'] ?></td>
                                <td><?php echo $pk['sks'] ?></td>
                                <td><?php echo $pk['semester'] ?></td>
                                <td>
                                    <a href="<?php echo site_url("mahasiswa/hapuspilihankrs/$pk[idstudi]/$pk[idmatkul]") ?>" onclick="return confirm('Anda yakin menghapus matakuliah <?php echo $pk['nama']; ?> dari pilihan? ?');" data-toggle="tooltip" title="Hapus?" class="btn btn-danger"><em class="fa fa-trash"></em></a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                        <?php else: ?>
                        	<div class="alert alert-danger" role="alert">
                                        Anda Belum Mengambil KRS Untuk Semester
                                        <?php echo $cek->semester; ?> Tahun Ajaran <?php echo $cek->tahunajaran; ?>!
                                    </div>
                        <?php endif?>
                    </table>
                    <h4 class="header-title m-t-0 m-b-30"> Total SKS yang diambil saat ini : <?php echo $sks; ?> SKS.</h4>
</form>

					</div>
				</div> <!-- end col -->
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
