<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card-box table-responsive">
					<h4 class="m-t-0 header-title">Data Wisuda</h4>
					<table id="datatable" class="table table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Kode Wisuda</th>
								<th>Tahun</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							foreach ($get as $g): ?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $g['kode'] ?></td>
								<td>Tahun <?php echo $g['tahun'] ?></td>
								<td> <?php echo $g['status'] ?> </td>
								<td>
									<a href="<?php echo site_url("admin/get_data_wisudawan/$g[kode]") ?>" data-toggle="tooltip" title="Lihat Data Mahasiswa" class="btn btn-link"><em class="fa fa-list"></em></a>
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
