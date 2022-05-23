<!-- Start Page content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="col-md-12">
					<div class="card-box">
						<?php if (is_array($get_before) && count($get_before) > 0): ?>
						
						
						<?php elseif ($check_sign['0']['acc_at'] !== null): ?>
							<div class="alert alert-info">
								<p>Data Anda telah diverifikasi oleh Prodi. Anda bisa mengajukan surat pengesahan kepada dosen Pembimbing/Penguji dengan melampirkan/mengunggah bukti kartu bimbingan, dengan ekstensi .pdf.</p>
							</div>
							<?php elseif (is_array($check_dosen) && count($check_dosen) > 0): ?>
							<div class="alert alert-success">
								<strong>Informasi.</strong>
								<p>Data Anda, sedang diproses oleh admin Prodi. Mohon ditunggu. Terimakasih.</p>
							</div>
							<?php else: ?>
								<div class="alert alert-info">
									<strong>Informasi.</strong>
									<p>Mohon pilih dosen Pembimbing beserta dosen Penguji Anda. Terimakasih.</p>
								</div>
							<?php endif ?>
							<h4 class="header-title m-t-0 m-b-30">Pendaftaran Proposal Karya Tulis Ilmiah</h4>
							<?php if (is_array($check_sign) && count($check_sign) > 0): ?>
							<?php foreach ($check_sign as $kti): ?>
								<li><strong>Judul KTI : <a href="<?php echo site_url('mahasiswa/edit_judul_kti') ?>"><span class="fa fa-pencil"></span> Edit</a></strong> <?php echo $kti['judul'] ?> </li>
								<?php if ($kti['sub_judul'] == ''): ?>
									<?php else: ?>
										<li><strong>Sub Judul :</strong> <?php echo $kti['sub_judul'] ?></li>
									<?php endif?>
									<li><strong>Terdaftar pada :</strong> <?php $date = date_create($kti['data_created']);
									echo date_format($date, "d/M/y H:i");?></li>
									<?php if ($kti['acc_at'] !== null): ?>
										<li><strong>Diverifikasi Prodi pada :</strong> <?php $date = date_create($kti['acc_at']);
										echo date_format($date, "d/M/y H:i");?></li>
									<?php endif ?>
								<?php endforeach?>
								<?php if (is_array($check_dosen) && count($check_dosen) > 0): ?>
								<?php foreach ($check_dosen as $dosen): ?>
									<li><strong> Dosen <?php echo $dosen['jenis'] ?> :</strong> <?php echo $dosen['nama'] ?>, <?php echo $dosen['gelarbelakang'] ?>
									<?php if ($check_sign['0']['acc_at'] == NULL): ?>
										| <a href="<?php echo site_url("mahasiswa/hapus_dosen_kti/$dosen[nidn]/$username") ?>">Hapus</a>
										<?php endif ?></li>
									<?php endforeach?>
								<?php endif?>
								<br>
								<?php if ($check_sign['0']['acc_at'] == NULL): ?>
									<form role="form" action="" method="post" enctype="multipart/form-data" >
										<div class="form-group row">
											<label class="col-2 col-form-label">Dosen</label>
											<div class="col-6">
												<select class="form-control js-example-basic-single" name="rel_nidn">
													<?php foreach ($get_dosen as $d): ?>
														<option value="<?php echo $d['nidn'] ?>"><?php echo $d['nidn'] ?> - <?php echo $d['gelardepan'] ?> <?php echo $d['nama'] ?>, <?php echo $d['gelarbelakang'] ?></option>
													<?php endforeach;?>
												</select>
											</div>
											<div class="col-4">
												<select class="form-control js-example-basic-single" name="jenis">
													<?php if (is_array($check_dosen) && count($check_dosen) > 0 ): ?>
													<option value="Pembimbing Serta">Pembimbing Serta</option>
													<option value="Penguji">Penguji</option>
													<?php else: ?>
														<option value="Pembimbing">Pembimbing</option>
													<?php endif?>
												</select>
											</div>
										</div>
										<input type="submit" name="add_dosen" class="btn btn-block btn-primary" value="Tambah Dosen" onclick="var e=this;setTimeout(function(){e.disabled=true;},0);return true;">
									</form>
									<?php echo form_close(); ?>
									<?php else: ?>
										<div class="col-md-12">
											<h4 class="header-title m-t-0 m-b-30">Ajukan Surat Pengesahan Proposal KTI</h4>
											<ul class="nav nav-tabs">
												<li class="nav-item">
													<a href="#sebelum" data-toggle="tab" aria-expanded="false" class="nav-link">
														<i class="fi-paper mr-2"></i> Surat Pengesahan Proposal KTI (Sebelum Sidang)
													</a>
												</li>
												<li class="nav-item">
													<a href="#sesudah" data-toggle="tab" aria-expanded="false" class="nav-link">
														<i class="fi-paper-stack mr-2"></i> Surat Pengesahan Proposal KTI (Sesudah Sidang)
													</a>
												</ul>
												<div class="tab-content">
													<div class="tab-pane" id="sebelum">
														<?php if (is_array($get_before) && count($get_before) > 0 ): ?>
														<?php if (count($get_before) == count($get_before_validation)): ?>
														<div class="text-right">
															<button type="button" class="btn btn-light dropdown-toggle waves-effect" data-toggle="dropdown" aria-expanded="false"> Unduh Surat<span class="caret"></span> </button>
															<div class="dropdown-menu" aria-labelledby="btnGroupDrop2">
																<a class="dropdown-item" href="<?php echo site_url("mahasiswa/cetak_pengesahan_proposal_kti_before") ?>">Pengesahan Proposal</a>
																<a class="dropdown-item" href="<?php echo site_url("mahasiswa/cetak_pengesahan_lr_proposal_kti_before") ?>">Literatur Review</a>
															</div>
														</div>
														<br>
													<?php endif?>
												<?php endif ?>
												<?php if (is_array($get_before) && count($get_before) > 0): ?>
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
															<form role="form" action="<?php echo site_url('mahasiswa/queue_upload_log_proposal_kti') ?>" method="post" enctype="multipart/form-data" >
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
														<?php if (count($get_after) == count($get_after_validation)): ?>
														<div class="text-right">
															<button type="button" class="btn btn-light dropdown-toggle waves-effect" data-toggle="dropdown" aria-expanded="false"> Unduh Surat<span class="caret"></span> </button>
															<div class="dropdown-menu" aria-labelledby="btnGroupDrop2">
																<a class="dropdown-item" href="<?php echo site_url("mahasiswa/cetak_pengesahan_proposal_kti_after") ?>">Pengesahan Proposal</a>
																<a class="dropdown-item" href="<?php echo site_url("mahasiswa/cetak_pengesahan_lr_proposal_kti_after") ?>">Literatur Review</a>
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
															<?php foreach ($get_after as $gb): ?>
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
																<form role="form" action="<?php echo site_url('mahasiswa/queue_upload_log_proposal_kti_after') ?>" method="post" enctype="multipart/form-data" >
																	<div class="fallback">
																		<input name="file" type="file" accept="application/pdf" multiple />
																	</div>
																	<br>
																	<input type="submit" name="queue_after_kti" class="btn btn-block btn-primary" id="kti-timer" value="Ajukan Pengesahan" onclick="var e=this;setTimeout(function(){e.disabled=true;},0);return true;" disabled />
																</form>
															<?php endif?>
														</div>
													</div>
												</div>
												
											<?php endif ?>
											
											
											<!-- end col -->
											<!-- CEK APAKAH SUDAH MENGAMBIL MATKUL KTI-->
											<?php elseif (is_array($check_semester) && count($check_semester) > 0): ?>
											<div class="text-center">Silahkan Masukan Judul Proposal KTI Anda.</div>
											<br>
											<form role="form" action="" method="post" enctype="multipart/form-data" >
												<div class="form-group">
													<label for="validationDefault02">Judul Karya Tulis Ilmiah</label>
													<textarea class="form-control" name="judul" id='textarea' rows="8"></textarea>
												</div>
												<div class="form-group">
													<label for="validationDefault02">Sub Judul</label>
													<textarea class="form-control" name="sub_judul" id='textarea_subjudul' rows="8"></textarea>
												</div>
												<input type="submit" name="sign" class="btn btn-block btn-primary" id="sign-kti" value="Daftar disini" onclick="var e=this;setTimeout(function(){e.disabled=true;},0);return true;">
											</form>
											<?php echo form_close(); ?>
											<?php else: ?>
												<h2>Anda Belum Bisa Mengajukan Proposal KTI.</h2>
											<?php endif?>
										</div>
									</div>
								</div>
							</div>
						</div> <!-- container -->
					</div>
		<!-- content -->