<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card-box table-responsive">
					<h4 class="m-t-0 header-title">Data Akademik Mahasiswa</h4>
					<table id="datatable" class="table table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Tahun Masuk / Angkatan</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							foreach ($angkatan as $a): ?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td>Tahun <?php echo $a['angkatan'] ?></td>
								<td>
									<a href="<?php echo site_url("admin/get_data_akademik_by_angkatan/$a[angkatan]") ?>" data-toggle="tooltip" title="Lihat Data" class="btn btn-success"><em class="fa fa-folder"></em></a>
								</td>
							</tr>
							<?php endforeach;?>
						</tbody>
					</table>
				</div>
			</div>
			</div> <!-- end row -->
			<!-- Modal Ubah -->
			<!-- END Modal Ubah -->
			</div> <!-- container -->
			</div> <!-- content -->