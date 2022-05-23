<!-- Start Page content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card-box">
					<h4 class="m-t-0 header-title text-center">Data Nilai KPM <?php echo $nilai['0']['namalengkap'] ?> | <?php echo $nilai['0']['nim_rel'] ?></h4>
					<div class="row">
						<div class="col-12">
							<div class="p-20">
								<div class="box-body">
									<form role="form" action="" method="post" enctype="multipart/form-data">
										<div class="form-group has-feedback">
											<label class="col-4 col-form-label">A. Bimbingan dengan DPL
												</label>
											<div class="form-group row">
												<label class="col-4 col-form-label">Jumlah/Intensitas Bimbingan
												</label>
												<div class="col-3">
													<input type="text"
													onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" class="form-control" name="a1" value="<?php echo $nilai['0']['a1'] ?>" required>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-4 col-form-label">Kedisiplinan saat bimbingan
												</label>
												<div class="col-3">
													<input type="text"
													onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" class="form-control" name="a2" value="<?php echo $nilai['0']['a2'] ?>" required>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-4 col-form-label">Tanggap dengan diskusi
												</label>
												<div class="col-3">
													<input type="text"
													onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" class="form-control" name="a3" value="<?php echo $nilai['0']['a3'] ?>" required>
												</div>
											</div>
											<label class="col-4 col-form-label">B. Peran dalam Kelompok
												</label>
											<div class="form-group row">
												<label class="col-4 col-form-label">Mengerjakan tugas sesuai dengan tupoksinya
												</label>
												<div class="col-3">
													<input type="text"
													onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" class="form-control" name="b1" value="<?php echo $nilai['0']['b1'] ?>" required>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-4 col-form-label">Menyelesaikan tugasnya dengan tepat waktu
												</label>
												<div class="col-3">
													<input type="text"
													onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" class="form-control" name="b2" value="<?php echo $nilai['0']['b2'] ?>" required>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-4 col-form-label">Dapat bekerjasama dengan tim
												</label>
												<div class="col-3">
													<input type="text"
													onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" class="form-control" name="b3" value="<?php echo $nilai['0']['b3'] ?>" required>
												</div>
											</div>
											<label class="col-4 col-form-label">C. Saat Persiapan Kegiatan
												</label>
											<div class="form-group row">
												<label class="col-4 col-form-label">Ikut andil dalam menyusul proposal
												</label>
												<div class="col-3">
													<input type="text"
													onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" class="form-control" name="c1" value="<?php echo $nilai['0']['c1'] ?>" required>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-4 col-form-label">Aktif dalam mempersiapkan kebutuhan kegiatan
												</label>
												<div class="col-3">
													<input type="text"
													onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" class="form-control" name="c2" value="<?php echo $nilai['0']['c2'] ?>" required>
												</div>
											</div>
											<label class="col-4 col-form-label">D. Saat Pelaksanaan Kegiatan
												</label>
											<div class="form-group row">
												<label class="col-4 col-form-label">Melaksanakan tugas yang telah diberikan 
												</label>
												<div class="col-3">
													<input type="text"
													onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" class="form-control" name="d1" value="<?php echo $nilai['0']['d1'] ?>" required>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-4 col-form-label">Kehadiran saat kegiatan berlangsung
												</label>
												<div class="col-3">
													<input type="text"
													onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" class="form-control" name="d2" value="<?php echo $nilai['0']['d2'] ?>" required>
												</div>												
											</div>
											<label class="col-4 col-form-label">E. Sikap dan Perilaku
												</label>
											<div class="form-group row">
												<label class="col-4 col-form-label">Sopan, santun dan etika selama kegiatan berlangsung
												</label>
												<div class="col-3">
													<input type="text"
													onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" class="form-control" name="e1" value="<?php echo $nilai['0']['e1'] ?>" required>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-4 col-form-label">Memiliki sikap saling menghormati dan menghargai
												</label>
												<div class="col-3">
													<input type="text"
													onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" class="form-control" name="e2" value="<?php echo $nilai['0']['e2'] ?>" required>
												</div>
											</div>
											</div>
											<label class="col-4 col-form-label">F. Nilai Proposal KPM
												</label>
											<div class="form-group row">
												<label class="col-4 col-form-label">Kesesuaian tema dengan isi naskah proposal
												</label>
												<div class="col-3">
													<input type="text"
													onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" class="form-control" name="f1" value="<?php echo $nilai['0']['f1'] ?>" required>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-4 col-form-label">Tata bahasa dan kesesuaian aturan penulisan
												</label>
												<div class="col-3">
													<input type="text"
													onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" class="form-control" name="f2" value="<?php echo $nilai['0']['f2'] ?>" required>
												</div>
											</div>
											</div>
											<label class="col-4 col-form-label">G. Nilai Naskah Laporan KPM
												</label>
											<div class="form-group row">
												<label class="col-4 col-form-label">Kesesuaian isi naskah laporan KPM (data, hasil analisa dan capaian yang dihasilkan) dengan isi naskah proposal
												</label>
												<div class="col-3">
													<input type="text"
													onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" class="form-control" name="g1" value="<?php echo $nilai['0']['g1'] ?>" required>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-4 col-form-label">Tata bahasa dan kesesuaian aturan penulisan
												</label>
												<div class="col-3">
													<input type="text"
													onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" class="form-control" name="g2" value="<?php echo $nilai['0']['g2'] ?>" required>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-4 col-form-label">Kedalaman pembahasan yang dikerjakan
												</label>
												<div class="col-3">
													<input type="text"
													onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" class="form-control" name="g3" value="<?php echo $nilai['0']['g3'] ?>" required>
												</div>
											</div>
										</div>
									</div>
									<div class="box-footer">
										<div class="col col-xs-12 text-right">
											<?php $tahunajaran = $nilai['0']['tahunajaran']; ?>
											<a class="btn btn-warning" href="<?php echo site_url("dosen/nilai_kpm/$tahunajaran");?>"><i class="fa fa-arrow-left"></i> Kembali</a> <input type="submit" name="sbmt" class="btn btn-primary" value="Update">
										</div>
									</div>
									<?php echo form_close(); ?>
								</div>
							</div>
						</div>
						<!-- end row -->
						</div> <!-- end card-box -->
						</div><!-- end col -->
					</div>
					<!-- end row -->
					</div> <!-- container -->
					</div> <!-- content -->