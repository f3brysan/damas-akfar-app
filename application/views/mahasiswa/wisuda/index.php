<!-- Start Page content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="col-md-12">
					<div class="card-box">
						<?php if ($notif['0']['id']!=NULL): ?>
							<div class="alert alert-danger">
<strong>Informasi.</strong>
<p><?php echo $notif['0']['isi'] ?></p>
</div>
						<?php endif ?>
						
						<h4 class="header-title m-t-0 m-b-30">Pendaftaran Wisuda</h4>
						<?php if ($get[0]['nim'] == $username): ?>
						<?php if ($get['0']['approved'] != NULL): ?>
						<h2>SELAMAT ANDA TELAH MENYELESAIKAN PENDAFTARAN WISUDA.</h2>
						<p align="center">Silahkan menghubungi panitia wisuda, untuk informasi lebih lanjut.</p>
						<?php else: ?>
						<ul class="nav nav-pills navtab-bg nav-justified pull-in ">
							<li class="nav-item">
								<a href="#home1" data-toggle="tab" aria-expanded="true" class="nav-link active">
									<i class="fi-eye mr-2"></i> Informasi
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
								<p>Telah memenuhi semua persyaratan akademis serta administratif yang ditetapkan untuk mengikuti Wisuda. Terlampir adalah berkas persyaratan yang diperlukan :</p>
								<li>Unggah Bukti Yudisium. <?php if ($yudisium['0']['id'] != NULL): ?>
									<em>Diunggah pada : <?php echo $yudisium['0']['upload_at'] ?></em>
									<?php else: ?>
									<a href="<?php echo site_url('mahasiswa/upload_berkas_yudisium') ?>"><button class="btn btn-sm btn-link"> <em class="fa fa-upload"></em> Upload.</button></a>
								<?php endif ?> </li>
								<li>Cek Draft Ijazah. <?php if ($ijazah['0']['id'] != NULL): ?>
									<em>Disetejui pada : <?php echo $ijazah['0']['create_at'] ?> </em> <a href="<?php echo site_url('mahasiswa/cetak_draft_ijazah') ?>" target="_blank" ><button class="btn btn-sm btn-link"> <em class="fa fa-eye"></em> Lihat.</button></a>
									<?php else: ?>
									<a href="<?php echo site_url('mahasiswa/approve_ijazah') ?>" onclick="return confirm('Anda sudah yakin dengan Draft Ijazah tersebut? ');"><button class="btn btn-sm btn-link"> <em class="fa fa-check"></em> Approve.</button></a>
									<a href="<?php echo site_url('mahasiswa/cetak_draft_ijazah') ?>" target="_blank"><button class="btn btn-sm btn-link"> <em class="fa fa-eye"></em> Lihat.</button></a>
									<?php endif ?>
								</li>
								<li>Cek Transkrip Sementara. <?php if (is_array($kti) && count($kti) > 0): ?>
									<?php if ($transkrip['0']['id'] != null): ?>
									<em>Disetejui pada : <?php echo $transkrip['0']['create_at'] ?></em>	<a href="<?php echo site_url('mahasiswa/cetak_transkrip_sementara') ?>" target="_blank"><button class="btn btn-sm btn-link"> <em class="fa fa-eye"></em> Lihat.</button></a>
									<?php else: ?>
									<a href="<?php echo site_url('mahasiswa/approve_transkrip') ?>" onclick="return confirm('Anda sudah yakin dengan Draft Transkrip tersebut? ');"><button class="btn btn-sm btn-link"> <em class="fa fa-check"></em> Approve.</button></a>
									<a href="<?php echo site_url('mahasiswa/cetak_transkrip_sementara') ?>"><button class="btn btn-sm btn-link"> <em class="fa fa-eye"></em> Lihat.</button></a>
									<?php endif ?>
									<?php else: ?>
									<strong>Harap mengisi Judul KTI terlebih dahulu.</strong>
									<?php endif ?>
									
								</li>
								<li>Judul KTI. <a href="<?php echo site_url('mahasiswa/berkas_kti') ?>"><button class="btn btn-sm btn-link"> <em class="fa fa-file"></em> Form KTI.</button></a>
							</li>
							<li>SKPI. <a href="<?php echo site_url('mahasiswa/data_sertifikat') ?>"><button class="btn btn-sm btn-link"> <em class="fa fa-pencil"></em> Form SKPI.</button></a>
						</li>
					</div>
					<div class="tab-pane" id="profile1">
						<p>Berikut adalah Link Unduh dan Unggah untuk melengkapi berkas Yudisium.</p>
						<li>Bukti Bebas Perpustakaan (Pengumpulan Pinjaman Buku, Naskah Proposal, PKL dan KTI).
							<a href="https://drive.google.com/file/d/1_Hfv-gi8-kYPHYbO6okNcZnmXz6edFCm/view?usp=sharing"  target="_blank"><button class="btn btn-sm btn-primary"> <em class="fa fa-download"></em> Unduh Borang.</button></a>
							<a href="<?php echo site_url('mahasiswa/upload_bebas_perpus') ?>"><button class="btn btn-sm btn-success"> <em class="fa fa-file"></em> Unggah Berkas.</button></a>
						</li>
						<!-- <li>Bukti Bebas Laboratorium.
								<a href="https://drive.google.com/file/d/1JkbKrP0iKb0DELZ4rKzcqr35Qp8rY30g/view?usp=sharing"  target="_blank"><button class="btn btn-sm btn-primary"> <em class="fa fa-download"></em> Unduh Borang.</button></a>
							<a href="<?php echo site_url('mahasiswa/upload_bebas_lab') ?>"><button class="btn btn-sm btn-success"> <em class="fa fa-upload"></em> Unggah Berkas.</button></a>
						</li> -->
					</div>
					<div class="tab-pane" id="messages1">
						<p>Bagi mahasiswa yang mengalami kesulitan, dapat menghubungi admin BAAK di 082228825619.</p>
					</div>
				</div>
				<?php endif ?>
				<?php elseif ($check[0]['status'] == 'open'): ?>
				<div class="text-center"> Pendaftaran Wisuda Sudah Dibuka, Silahkan Klik Tombol Daftar di Bawah.</div>
				<br>
				<form role="form" action="" method="post" enctype="multipart/form-data">
					<input type="submit" name="sbmt" class="btn btn-block btn-primary" value="Daftar disini">
				</form>
				<?php echo form_close(); ?>
				<?php else: ?>
				<div class="text-center"> Pendaftaran Wisuda Masih Ditutup.</div>
				<br>
				<a><button class="btn btn-block btn-danger" disabled=""> Daftar disini</button></a>
				<?php endif ?>
			</div>
			</div> <!-- end col -->
		</div>
	</div>
	</div> <!-- container -->
	</div> <!-- content -->