<!-- Start Page content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="col-md-12">
					<div class="card-box">
						<h4 class="header-title m-t-0 m-b-30">Persetujuan Nilai</h4>						
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
								<p>Laman pengecekan Nilai Semestet 1 - 5 : </p>
								<li>Cek Nilai Semester 1 - 5. <?php if ($check['0']['nilai'] > 0): ?>
									<?php if ($app['0']['id'] != null): ?>
									<em>Disetejui pada : <?php echo $app['0']['create_at'] ?></em>	<a href="<?php echo site_url('mahasiswa/cetak_nilai_sementara') ?>" target="_blank"><button class="btn btn-sm btn-link"> <em class="fa fa-eye"></em> Lihat.</button></a>
									<?php else: ?>									
									<a href="<?php echo site_url('mahasiswa/cetak_nilai_sementara') ?>" target="_blank"><button class="btn btn-sm btn-link"> <em class="fa fa-eye"></em> Lihat.</button></a>
									<a href="<?php echo site_url('mahasiswa/approve_nilai') ?>" onclick="return confirm('Anda sudah yakin dengan Nilai tersebut? ');"><button class="btn btn-sm btn-link"> <em class="fa fa-check"></em> Approve.</button></a>
									<?php endif ?>									
									<?php else: ?>
									<strong>Maaf, Anda belum mencapai minimal semester 5</strong>
									<?php endif ?>
									
								</li>							
							</div>							
							<div class="tab-pane" id="messages1">
								<p>Bagi mahasiswa yang mengalami kesulitan, dapat menghubungi .</p>
							</div>
						</div>
						
					</div>
					</div> <!-- end col -->
				</div>
			</div>
			</div> <!-- container -->
			</div> <!-- content -->