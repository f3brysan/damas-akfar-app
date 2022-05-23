<!-- Start Page content -->


<div class="content">
	<div class="container-fluid">

		<div class="row">
			<div class="col-12">
				<div class="col-md-12">
					<div class="card-box">
						<h4 class="header-title m-t-0 m-b-30"> Halaman Kartu Rencana Studi Mahasiswa</h4>
<div class="row">
            <?php foreach ($jumlah as $j): ?>


            <div class="col-sm-6 col-lg-6 col-xl-3">
                                <div class="card-box widget-chart-two">
                                    <div class="float-right">
                                        <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                               data-fgColor="#0acf97" value="37" data-skin="tron" data-angleOffset="180"
                                               data-readOnly=true data-thickness=".1"/>
                                    </div>
                                    <div class="widget-chart-two-content">
                                        <p class="text-muted mb-0 mt-2">Angkatan</p>
                                        <h3 class=""><a href="<?php echo site_url("admin/bayar_angkatan/$kode/$j[angkatan]") ?>"><?php echo $j['angkatan'] ?></a></h3>
                                    </div>

                                </div>
                            </div>
                             <?php endforeach?>
                         </div>
						<?php if ($verifikasi !== NULL): ?>

							<?php else: ?>
						<div class="alert alert-danger" role="alert">
                                        Anda Belum Memverifikasikan <strong>Bukti Pembayaran </strong>Semester
                                        <?php echo $cek->semester; ?> Tahun Ajaran <?php echo $cek->tahunajaran; ?>!
                                    </div>

						<?php endif?>

					</div>
				</div> <!-- end col -->
			</div>
		</div>

	</div> <!-- container -->

</div> <!-- content -->
