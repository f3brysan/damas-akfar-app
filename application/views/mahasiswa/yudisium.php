<!-- Start Page content -->
<div class="content">
	<div class="container-fluid">

		<div class="row">
			<div class="col-12">
				<div class="col-md-12">
					<div class="card-box">
						<h4 class="header-title m-t-0 m-b-30">Pengajuan Wisuda</h4>

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
								<p>Bagi Mahasiswa yang akan mengikuti Yudisium dan Wisuda, dapat mengisi formulir wisuda dengan melampirkan berkas (sesuai urutan).</p>
								<li>1. Formulir Permohonan Wisuda. <a href="https://drive.google.com/open?id=16PrJv7yYZ1knj3xY6pcYnONc8UL0Ewow" target="_blank">Lampiran</a> </li>
								<li>2. Cetak Biodata Mahasiswa. <a href="<?php echo site_url('mahasiswa/data_wisuda') ?>">Link</a> </li>
								<li>3. Upload Formulir Permohonan Mengikuti Yudisium. <a href="<?php echo site_url("mahasiswa/upload_bebas_kuliah/$nav->id") ?>">Link</a> </li>
								<li>4. Cetak Draft Ijazah <a href="<?php echo site_url('mahasiswa/skpi') ?>" target="_blank">Link</a> </li>
								<li>5. Cetak Draft Transkrip. </li>
								<li>6. <strong>Print Out Cover</strong> Judul KTI.</li>
								<li>7. Cetak Data Sertifikat (Seminar, Kunjungan Industri, Organisasi, Pelatihan, dan PKL). <a href="<?php echo site_url('mahasiswa/data_sertifikat') ?>">Link</a> </li>
								<br>
								<p> Berkas tadi disusun secara berurutan dalam sebuah Map yang telah diberi nomer NIM. Lalu diserahkan ke ruang BAAK.</p>
							</div>
							<div class="tab-pane" id="profile1">
								<p>Berikut adalah Link Lampiran dan Borang untuk mengikuti Yudisium dan Wisuda</p>
								<li><a href="https://drive.google.com/open?id=16PrJv7yYZ1knj3xY6pcYnONc8UL0Ewow" target="_blank">1. Formulir Permohonan Wisuda.</a> </li>
								<li><a href="<?php echo site_url('mahasiswa/data_wisuda') ?>">2. Cetak Biodata Mahasiswa. </a> </li>
								<li><a href="<?php echo site_url("mahasiswa/upload_bebas_kuliah/$nav->id") ?>">3. Upload Lampiran Bebas Kuliah. </a> </li>
								<li><a href="<?php echo site_url('mahasiswa/skpi') ?>" target="_blank">4. Cetak Draft Ijazah </a> </li>
								<li><a href="<?php echo site_url('mahasiswa/data_sertifikat') ?>">5. Cetak Data Sertifikat (Seminar, Pelatihan, dan PKL). </a> </li>
							</div>
							<div class="tab-pane" id="messages1">
								<p>Bagi mahasiswa yang mengalami kesulitan, dapat meninggalkan pesan Whatsapp di nomor 081249154642 (BAAK).</p>
							</div>
						</div>
					</div>
				</div> <!-- end col -->
			</div>
		</div>

	</div> <!-- container -->

</div> <!-- content -->
