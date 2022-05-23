<!-- Start Page content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="col-md-12">
					<div class="card-box">
						<h4 class="header-title m-t-0 m-b-30">Pendaftaran Yudisium</h4>
						<?php if ($yudisium->nim == $username): ?>
						<ul class="nav nav-pills navtab-bg nav-justified pull-in ">
							<li class="nav-item">
								<a href="#home1" data-toggle="tab" aria-expanded="true" class="nav-link active">
									<i class="fi-eye mr-2"></i> Informasi
								</a>
							</li>
							<li class="nav-item">
								<a href="#profile1" data-toggle="tab" aria-expanded="false" class="nav-link">
									<i class="fi-file mr-2"></i> Borang dan Lampiran
								</a>
							</li>
							<li class="nav-item">
								<a href="#messages1" data-toggle="tab" aria-expanded="false" class="nav-link">
									<i class="fi-mail mr-2"></i> Narahubung
								</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane show active" id="home1">
								<p>Telah memenuhi semua persyaratan akademis serta administratif yang ditetapkan (Nilai, SPP, pinjaman buku, lab, dll) untuk mengikuti Yudisium. Terlampir adalah berkas persyaratan yang diperlukan :</p>
								
								<li>Lunas SPP Semester 1 - 6.
									<?php if (is_array($spp) && count($spp) > 0): ?>
									<span class="badge badge-success"><em class="fa fa-check"></em> Sudah</span>
									<?php else: ?>
									<span class="badge badge-danger"><em class="fa fa-close"></em> Belum</span>
									<?php endif ?>
								</li>
								<li>Bukti Bebas Perpustakaan (Pengumpulan Pinjaman Buku, Naskah Proposal, PKL dan KTI).
									<?php if ($yudisium->bukti_perpus == NULL): ?>
									<span class="badge badge-danger"><em class="fa fa-close"></em> Belum Unggah Bukti</span>
									<?php elseif (is_array($bebas_perpus) && count($bebas_perpus) > 0): ?><span class="badge badge-success"><em class="fa fa-check"></em> Sudah</span>
									<?php else: ?>
									<span class="badge badge-warning"><em class="fa fa-exclamation-triangle"></em> Menunggu Verifikasi</span>
									<?php endif ?>
								</li>
								<li>Bebas Laboratorium.
									<?php foreach ($uncheck_lab as $un): ?>
									<span class="badge badge-danger"><em class="fa fa-close"></em> <?php echo $un['jenis'] ?></span>
									<?php endforeach ?>
									<?php if (is_array($bebas_lab) && count($bebas_lab) > 0): ?>
									<?php foreach ($bebas_lab as $lab): ?>
									<?php if ($lab['status'] == 'allow'): ?>
									<span class="badge badge-success"><em class="fa fa-check"></em> <?php echo $lab['jenis_lab'] ?></span>
									<?php else: ?>
									<span class="badge badge-warning" data-toggle="tooltip" title="Catatan : <?php echo $lab['catatan'] ?>"><em class="fa fa-check"></em> <?php echo $lab['jenis_lab'] ?></span>
									<?php endif ?>
									<?php endforeach ?>
									<?php else: ?>
									<span class="badge badge-danger"><em class="fa fa-close"></em> Belum</span>
									<?php endif ?>
								</li>
								<li>Unggah Artikel KTI.
									<?php if (is_array($bebas_kti) && count($bebas_kti) > 0): ?>
									<span class="badge badge-success"><em class="fa fa-check"></em> Sudah</span>
									<?php else: ?>
									<span class="badge badge-danger"><em class="fa fa-close"></em> Belum</span>
									<?php endif ?>
								</li>
								<li>Telah Menempuh PKL dan SE.
									<?php $nim = $username; ?>
									<?php if (strpos($nim, '13516') !== false): ?>
									<span class="badge badge-success"><em class="fa fa-check"></em> Sudah</span>
									<?php else: ?>
									<?php if ($nilai_se['0']['nilai'] == NULL): ?>
									<span class="badge badge-danger"><em class="fa fa-close"></em> Belum</span>
									<?php else: ?>
									<span class="badge badge-success"><em class="fa fa-check"></em> Sudah</span>
									<?php endif ?>
									<?php endif ?>
								</li>
								<li>Telah Menempuh Kuliah Pengabdian Masyarakat.
									<?php if (strpos($nim, '13516') !== false): ?>
									<span class="badge badge-success"><em class="fa fa-check"></em> Sudah</span>
									<?php else: ?>
									<?php if ($nilai_kpm['0']['nilai'] == NULL): ?>
									<span class="badge badge-danger"><em class="fa fa-close"></em> Belum</span>
									<?php else: ?>
									<span class="badge badge-success"><em class="fa fa-check"></em> Sudah</span>
									<?php endif ?>
									<?php endif ?>
								</li>
								<li>Tidak Ada Nilai D dan E Pada KHS.
									<?php if (strpos($nim, '13516') !== false): ?>
									<span class="badge badge-success"><em class="fa fa-check"></em> Sudah</span>
									<?php else: ?>
									<?php if (is_array($min_nilai) && count($min_nilai) > 0): ?>
									<?php foreach ($min_nilai as $nilai): ?>
									<span class="badge badge-warning"><em class="fa fa-exclamation"></em> <?php echo $nilai['nama'] ?></span>
									<?php endforeach ?>
									<?php else: ?>
									<span class="badge badge-success"><em class="fa fa-check"></em> Sudah</span>
									<?php endif ?>
									<?php endif ?>
								</li>
								<br>
								<br>
								<p> Apabila telah memenuhi seluruh persyaratan tersebut. Anda dapat mencetak surat pernyataan Pendaftaran Yudisum, dengan mengklik tombol cetak dibawah ini.</p>
								<?php $syarat = 'allow';
								$lab_count = array_count_values(array_column($bebas_lab, 'status'))[$syarat]; ?>
								<?php if (strpos($nim, '13516') !== false): ?>
								<?php if (is_array($spp) && count($spp) > 0 &&
								is_array($bebas_perpus) && count($bebas_perpus) > 0 &&
								$lab_count >= 6 &&
								is_array($bebas_kti) && count($bebas_kti) > 0 ): ?>
								<?php if ($yudisium->acc_at == NULL): ?>
								<form role="form" action="" method="post" enctype="multipart/form-data" >
									<input type="submit" name="cetak" class="btn btn-block btn-primary" value="Cetak/Unduh Surat Pernyataan Yudisium">
								</form>
								<?php echo form_close(); ?>
								<?php else: ?>
								<a href="<?php echo site_url("mahasiswa/cetak_bukti_yudisium") ?>"><button class="btn btn-block btn-primary"> Cetak/Unduh Surat Pernyataan Yudisium</button></a>
								<?php endif ?>
								<?php else: ?>
								<a><button class="btn btn-block btn-danger" disabled=""> Maaf, Belum Dapat Cetak/Unduh Surat Pernyataan Yudisium</button></a>
								<?php endif ?>
								<?php else: ?>
								<?php if (is_array($spp) && count($spp) > 0 &&
									is_array($bebas_perpus) && count($bebas_perpus) > 0 &&
									$lab_count >= 6 &&
									is_array($bebas_kti) && count($bebas_kti) > 0 &&
									$nilai_kpm['0']['nilai'] > 0 &&
									$nilai_se['0']['nilai'] > 0 &&
								$min_nilai == NULL): ?>
								<?php if ($yudisium->acc_at == NULL): ?>
								<form role="form" action="" method="post" enctype="multipart/form-data" >
									<input type="submit" name="cetak" class="btn btn-block btn-primary" value="Cetak/Unduh Surat Pernyataan Yudisium">
								</form>
								<?php echo form_close(); ?>
								<?php else: ?>
								<a href="<?php echo site_url("mahasiswa/cetak_bukti_yudisium") ?>"><button class="btn btn-block btn-primary"> Cetak/Unduh Surat Pernyataan Yudisium</button></a>
								<?php endif ?>
								<?php else: ?>
								<a><button class="btn btn-block btn-danger" disabled=""> Maaf, Belum Dapat Cetak/Unduh Surat Pernyataan Yudisium</button></a>
								<?php endif ?>
								<?php endif ?>
							</div>
							<div class="tab-pane" id="profile1">
								<p>Berikut adalah Link Unduh dan Unggah untuk melengkapi berkas Yudisium.</p>
								<li>Bukti Bebas Perpustakaan (Pengumpulan Pinjaman Buku, Naskah Proposal, PKL dan KTI).
									<a href="https://drive.google.com/file/d/11XZBRpazcw3GO0v5wHDaS-f9_tfSsRKP/view?usp=sharing"  target="_blank"><button class="btn btn-sm btn-primary"> <em class="fa fa-download"></em> Unduh Borang.</button></a>
									<a href="<?php echo site_url('mahasiswa/upload_bebas_perpus') ?>"><button class="btn btn-sm btn-success"> <em class="fa fa-upload"></em> Unggah Berkas.</button></a>
								</li>
								<!-- <li>Bukti Bebas Unggah Artikel KTI.
										<a href="https://drive.google.com/file/d/1BOY4EhYBBdz8fQTr9V4s7Wf_2vnjqV-c/view?usp=sharing"  target="_blank"><button class="btn btn-sm btn-primary"> <em class="fa fa-download"></em> Unduh Borang.</button></a>
									<a href="<?php echo site_url('mahasiswa/upload_bebas_kti') ?>"><button class="btn btn-sm btn-success"> <em class="fa fa-upload"></em> Unggah Berkas.</button></a>
								</li> -->
								<!-- <li>Bukti Bebas Laboratorium.
													<a href="https://drive.google.com/file/d/1JkbKrP0iKb0DELZ4rKzcqr35Qp8rY30g/view?usp=sharing"  target="_blank"><button class="btn btn-sm btn-primary"> <em class="fa fa-download"></em> Unduh Borang.</button></a>
									<a href="<?php echo site_url('mahasiswa/upload_bebas_lab') ?>"><button class="btn btn-sm btn-success"> <em class="fa fa-upload"></em> Unggah Berkas.</button></a>
								</li> -->
							</div>
							<div class="tab-pane" id="messages1">
								<p>Bagi mahasiswa yang mengalami kesulitan, dapat menemui Admin Prodi.</p>
							</div>
						</div>
						<?php elseif ($check[0]['status'] == 'open'): ?>
						<div class="text-center"> Pendaftaran Yudisium Sudah Dibuka, Silahkan Klik Tombol Daftar di Bawah.</div>
						<br>
						<form role="form" action="" method="post" enctype="multipart/form-data" >
							<input type="submit" name="sbmt" class="btn btn-block btn-primary" id="sa-timer" value="Daftar disini" onclick="var e=this;setTimeout(function(){e.disabled=true;},0);return true;">
						</form>
						<?php echo form_close(); ?>
						<?php else: ?>
						<div class="text-center"> Pendaftaran Yudisium Masih Ditutup.</div>
						<br>
						<a><button class="btn btn-block btn-danger" disabled=""> Daftar disini</button></a>
						<?php endif ?>
					</div>
					</div> <!-- end col -->
				</div>
			</div>
			</div> <!-- container -->
			</div> <!-- content -->