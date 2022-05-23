<!-- Start Page content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<?php if ($kti->rel_nim == $username): ?>
			<div class="col-12">
				<div class="col-md-12">
					<div class="card-box">
						<h4 class="header-title m-t-0 m-b-30">Karya Tulis Ilmiah</h4>
						<li><strong>Judul KTI :</strong> <?php echo $kti->judul; ?> <?php if ($kti->sub_judul != null): ?>
							<?php echo $kti->sub_judul ?>
						<?php endif?></li>
						<li><strong>Terdaftar Pada : </strong><?php echo $kti->data_created; ?></li>
						<?php if (is_array($check_dosen) && count($check_dosen) > 0): ?>
						<?php foreach ($check_dosen as $dosen): ?>
						<li><strong> Dosen <?php echo $dosen['jenis'] ?> :</strong> <?php echo $dosen['nama'] ?>, <?php echo $dosen['gelarbelakang'] ?>
						</li>
						<?php endforeach?>
						<?php endif?>
						<div class="row">
							<div class="col-md-12">
								<h4 class="header-title m-t-50 m-b-10">Ajukan Surat Pengesahan KTI</h4>
								<ul class="nav nav-tabs tabs-bordered">
									<li class="nav-item">
										<a href="#sebelum" data-toggle="tab" aria-expanded="false" class="nav-link">
											<i class="fi-paper mr-2"></i> Pengesahan Sebelum Sidang KTI
										</a>
									</li>
									<li class="nav-item">
										<a href="#sesudah" data-toggle="tab" aria-expanded="false" class="nav-link">
											<i class="fi-paper-stack mr-2"></i> Pengesahan Sesudah Sidang KTI
										</a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane" id="sebelum">
										<?php if (is_array($get_before) && count($get_before) > 0): ?>
										<?php if (is_array($get_before) && count($get_before) == is_array($get_before_validation) && count($get_before_validation)): ?>
														<div class="text-right">
															<button type="button" class="btn btn-light dropdown-toggle waves-effect" data-toggle="dropdown" aria-expanded="false"> Unduh Surat<span class="caret"></span> </button>
															<div class="dropdown-menu" aria-labelledby="btnGroupDrop2">
																<a class="dropdown-item" href="<?php echo site_url("mahasiswa/cetak_pengesahan_kti_before") ?>">Pengesahan Proposal</a>
																<a class="dropdown-item" href="<?php echo site_url("mahasiswa/cetak_pengesahan_lr_kti_before") ?>">Literatur Review</a>
															</div>
														</div>
														<br>
													<?php endif?>
										<table class="table">
											<thead>
												<tr>
													<th>NIDN</th>
													<th>Nama Dosen</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($get_before as $gb): ?>
												<tr>
													<td><?php echo $gb['rel_nidn'] ?></td>
													<td><?php if ($gb['gelardepan'] != null): ?>
														<?php echo $gb['gelardepan'] ?>
														<?php else: ?>
													<?php endif?><?php echo $gb['nama'] ?>, <?php echo $gb['gelarbelakang'] ?></td>
													<td><?php if ($gb['qrcode_id'] == null): ?>
														<span class="badge badge-danger"> Belum</span>
														<?php else: ?>
														<span class="badge badge-success"> Sudah</span>
													<?php endif?></td>
												</tr>
												<?php endforeach?>
											</tbody>
										</table>
										<?php else: ?>
										<h5 class="m-b-30">Mohon Unggah Syarat Sebelum Sidang KTI</h5>
										<form role="form" action="<?php echo site_url('mahasiswa/queue_upload_log_kti_before') ?>" method="post" enctype="multipart/form-data" >
											<div class="fallback">
												<input name="file" type="file" accept="application/pdf" multiple />
											</div>
											<br>
											<input type="submit" name="queue_before_kti" class="btn btn-block btn-primary" id="kti-timer" value="Ajukan Pengesahan" onclick="var e=this;setTimeout(function(){e.disabled=true;},0);return true;" disabled />
										</form>
										<?php endif?>
										
									</div>
									<div class="tab-pane" id="sesudah">
										<?php if (is_array($get_after) && count($get_after) > 0): ?>
										<?php if (is_array($get_after) && count($get_after) == is_array($get_after_validation) && count($get_after_validation)): ?>
														<div class="text-right">
															<button type="button" class="btn btn-light dropdown-toggle waves-effect" data-toggle="dropdown" aria-expanded="false"> Unduh Surat<span class="caret"></span> </button>
															<div class="dropdown-menu" aria-labelledby="btnGroupDrop2">
																<a class="dropdown-item" href="<?php echo site_url("mahasiswa/cetak_pengesahan_kti_after") ?>">Pengesahan KTI</a>
																<a class="dropdown-item" href="<?php echo site_url("mahasiswa/cetak_pengesahan_lr_kti_after") ?>">Literatur Review</a>
															</div>
														</div>
														<br>
													<?php endif?>
										<table class="table">
											<thead>
												<tr>
													<th>NIDN</th>
													<th>Nama Dosen</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($get_after as $ga): ?>
												<tr>
													<td><?php echo $ga['rel_nidn'] ?></td>
													<td><?php if ($ga['gelardepan'] != null): ?>
														<?php echo $ga['gelardepan'] ?>
														<?php else: ?>
													<?php endif?><?php echo $ga['nama'] ?>, <?php echo $ga['gelarbelakang'] ?></td>
													<td><?php if ($ga['qrcode_id'] == null): ?>
														<span class="badge badge-danger"> Belum</span>
														<?php else: ?>
														<span class="badge badge-success"> Sudah</span>
													<?php endif?></td>
												</tr>
												<?php endforeach?>
											</tbody>
										</table>
										<?php else: ?>
										<h5 class="m-b-30">Mohon Unggah Syarat Sesudah Sidang KTI</h5>
										<form role="form" action="<?php echo site_url('mahasiswa/queue_upload_log_kti_after') ?>" method="post" enctype="multipart/form-data" >
											<div class="fallback">
												<input name="file" type="file" accept="application/pdf" multiple />
											</div>
											<br>
											<input type="submit" name="queue_after_kti" class="btn btn-block btn-primary" id="kti-timer" value="Ajukan Pengesahan" onclick="var e=this;setTimeout(function(){e.disabled=true;},0);return true;" disabled />
										</form>
										<?php endif?>
									</div>
								</div>
								</div> <!-- end col -->
							</div>
						</div>
					</div>
				</div>
				<?php else: ?>
				<div class="col-md-12">
					<div class="card m-b-30 text-white bg-primary">
						<div class="card-body">
							<h5 class="card-title">Daftar Karya Tulis Ilmiah</h5>
							<p class="card-text">Klik salin, untuk menyalin data judul Proposal KTI Anda.</p>
							<form role="form" action="" method="post" enctype="multipart/form-data">
								<input type="submit" name="copy" class="btn btn-success btn-block" id="sign-kti" value="Salin" onclick="var e=this;setTimeout(function(){e.disabled=true;},0);return true;">
							</form>
							<?php echo form_close(); ?>
						</div>
					</div>
				</div>
				<?php endif?>
				</div> <!-- container -->
			</div>
		</div>
		<!-- content -->