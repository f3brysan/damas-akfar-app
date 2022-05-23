<!-- Start Page content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="alert alert-info alert-dismissible fade show" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					Silahkan pilih sesuai <strong>Jenis Data</strong> yang Anda akan inputkan. Untuk jenis data <strong>Seminar dan Pelatihan</strong> hanya isi tanggal selesai saja.
				</div>
				<?php if ($this->session->flashdata('success_message') == TRUE): ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					<?php echo $this->session->flashdata('success_message');?>
				</div>
				<?php elseif ($this->session->flashdata('failed_message') == TRUE): ?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					<?php echo $this->session->flashdata('failed_message');?>
				</div>
				<?php endif ?>
				
				<!-- <div class="col-md-12">
					<div class="col col-xs-12 text-right">
						<a class="btn btn-primary" href="<?php echo site_url('mahasiswa/cetakSKPI') ?>" role="button" target='new'>Cetak</a>
						<a class="btn btn-success" href="<?php echo site_url('mahasiswa/wisuda') ?>" role="button" >Kembali</a>
					</div> -->
					<br>
					<div class="card-box">
						<h4 class="header-title m-t-0 m-b-30">Input Data</h4>
						<div class="box-body">
							<form action="<?php echo base_url('mahasiswa/input_data_sertifikasi')?>" method="post" enctype="multipart/form-data" role="form">
								<div class="form-group has-feedback">
									<div class="form-group row">
										<label class="col-2 col-form-label" for="example-email">NIM</label>
										<div class="col-10">
											<input type="text" id="nim" name="nim" class="form-control" value="<?php echo $nav->nim ?>" disabled>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-2 col-form-label">Jenis</label>
										<div class="col-10">
											<select class="form-control" name="jenis">
												<?php if ($count > 0 ): ?>
												<?php foreach ($jenis_sertifikasi as $js): ?>
												<option value="<?php echo $js['kode'] ?>"><?php echo $js['nama'] ?></option>
												<?php endforeach ?>
												<option value="Seminar">Seminar</option>
												<option value="Pelatihan">Pelatihan</option>
												<option value="Organisasi">Organisasi</option>
												<option value="PKL">PKL</option>
												<?php else: ?>
												<option value="Seminar">Seminar</option>
												<option value="Pelatihan">Pelatihan</option>
												<option value="Organisasi">Organisasi</option>
												<option value="PKL">PKL</option>
												<?php endif ?>
												
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="validationDefault02">Nama Kegiatan Sertifikasi</label>
										<textarea class="form-control" name="nama" id='textarea' rows="8"></textarea>
									</div>
									<div class="form-group row">
										<label class="col-2 col-form-label" for="example-email">Sebagai</label>
										<div class="col-10">
											<input type="text" id="nik" name="sebagai" class="form-control" placeholder="Contoh : Peserta" >
										</div>
									</div>
									<div class="form-group row">
										<label class="col-2 col-form-label" for="example-email">Tanggal Mulai Acara</label>
										<div class="col-4">
											<input type="date" id="datetimepicker"  name="mulai" class="form-control" >
											</div><label class="col-2 col-form-label" for="example-email">Tanggal Selesai</label>
											<div class="col-4">
												<input type="date" id="datepicker" name="selesai" class="form-control"  >
											</div>
										</div>
										<div class="form-group row">
											<label class="col-2 col-form-label">Upload Scan Sertifikat</label>
											<div class="col-10">
												<input type="file" class="form-control" name="file">
											</div>
										</div>
									</div>
								</div>
								<div class="box-footer">
									<div class="col col-xs-12 text-right">
										<input type="submit" name="sbmt" class="btn btn-primary" value="Simpan">
									</div>
								</div>
							</div>
							</div> <!-- end col -->
						</div>
						<div class="col-12">
							<div class="col-md-12">
								<div class="card-box table-responsive">
									<h4 class="m-t-0 header-title">Data Sertifikasi : <a><?php echo $nav->namalengkap ?></a> </h4>
									<table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>No</th>
												<th>Jenis</th>
												<th>Nama Kegiatan</th>
												<th>Sebagai</th>
												<th>Mulai</th>
												<th>Selesai</th>
												<th>Gambar</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<?php
										$no = 1;
										if (is_array($sertifikasi) && count($sertifikasi) > 0) {
										foreach ($sertifikasi as $s) {
										?>
										<tr>
											<td>
												<?php echo $no++; ?>
											</td>
											<td>
												<?php echo $s['jenis']; ?>
											</td>
											<td>
												<?php echo $s['nama']; ?>
											</td>
											<td>
												<?php echo $s['sebagai']; ?>
											</td>
											<td>
												<?php echo $s['mulai']; ?>
											</td>
											<td>
												<?php echo $s['selesai']; ?>
											</td>
											<td><img src="<?php echo base_url() ?>uploads/sertifikasi/<?php echo $s['gambar']; ?>" width="55"</td>
											<td>
												<a href="<?php echo site_url("mahasiswa/hapus_data_sertifikasi/$s[id]") ?>" type="button" class="btn btn-icon waves-effect waves-light btn-danger"> <i class="fa fa-remove"></i> </a>
											</td>
										</tr>
										<?php }} else {
										echo "-";
										} ?>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						</div> <!-- end row -->
						</div> <!-- container -->