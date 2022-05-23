<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card-box">
					<h4 class="header-title mb-4">Koresponden Evaluasi Kinerja Dosen</h4>
					<table id="datatable" class="table table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Kode Matkul</th>
								<th>Nama Matkul</th>
								<th>Nama Dosen</th>
								<th>Aksi </th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							foreach ($get as $get): ?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $get['kodematkul'] ?></td>
								<td><?php echo $get['nama_matkul'] ?></td>
								<td><?php echo $get['gelardepan'] ?> <?php echo $get['nama_dosen'] ?> <?php echo $get['gelarbelakang'] ?></td>
								<td><?php if ($get['total'] == NULL ): ?>
									<a href="<?php echo site_url("mahasiswa/borang_ekd/$get[rel_nidn]/$get[kodematkul]") ?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Isi Kuisioner</a>
									<?php else: ?>
									<a href="" class="btn btn-xs btn-danger disabled"><i class="fa fa-close"></i> Sudah Terisi</a>
								<?php endif?></td>
							</tr>
							<?php endforeach?>
						</tbody>
					</table>
					<!-- end row -->
				</div>
			</div>
		</div>
		<!-- end row -->
		</div> <!-- container -->
		</div> <!-- content -->