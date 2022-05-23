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
                                <th>NIM</th>
                                <th>Nama</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							foreach ($get as $a): ?>
							<tr>
								<td><?php echo $no++; ?></td>
                                <td><?php echo $a['nim'] ?></td>
                                <td><?php echo $a['namalengkap']?></td>
								<td>
									<a href="<?php echo site_url("admin/getdataskpi/$a[nim]") ?>" data-toggle="tooltip" title="Lihat Data" class="btn btn-link"><em class="fa fa-list"></em></a>
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