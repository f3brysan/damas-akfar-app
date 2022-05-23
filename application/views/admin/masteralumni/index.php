<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card-box table-responsive">
					<h4 class="m-t-0 header-title">Tahun Wisuda</h4>
					<table id="datatable" class="table table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Kode Wisuda</th>
								<th>Wisuda</th>
								<th>Tahun Wisuda</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							foreach ($get as $a): ?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $a['kode']?> </td>
								<td><?php echo $a['nama']?></td>
								<td>Tahun <?php echo $a['tahun']?></td>								
								<td>
									<a href="<?php echo site_url("admin/getdataalumni/$a[kode]") ?>" data-toggle="tooltip" title="Lihat Data" class="btn btn-link"><em class="fa fa-list"></em></a>
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