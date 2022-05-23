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
								<th>NIM</th>
								<th>Berkas KTI</th>
								<th>Berkas Yudisium</th>
								<th>Draft Ijazah</th>
								<th>Draft Transkrip</th>
								<th>Berkas SKPI</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							foreach ($mhs as $m): ?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $m['nim'] ?></td>
								<td><?php if ($m['picture']==NULL): ?>
									<span class="badge badge-warning"><em class="fa fa-close"></em> Belum</span>
									<?php else: ?>
									<a href="<?php echo base_url(); ?>uploads/wisuda/<?php echo $m['picture'] ?>" target="_blank" ><span class="badge badge-success"><em class="fa fa-check"></em> Sudah</span></a></td>
									<?php endif ?>
									<td><?php if ($m['id_berkas']!= NULL): ?>
										<a href="<?php echo base_url(); ?>uploads/wisuda/<?php echo $m['nama_file'] ?>" target="_blank" ><span class="badge badge-success"><em class="fa fa-check"></em> Sudah</span></a>
										<a href="<?php echo site_url("admin/reset_upload_yudisium/$m[id_berkas]/$m[wisuda_rel]") ?>"><span class="badge badge-danger"><em class="fa fa-trash"></em></span></a>
										<?php else: ?>
										<span class="badge badge-warning"><em class="fa fa-close"></em> Belum</span>
										<?php endif ?>
									</td>
									<td><?php if ($m['id_ijazah']!= NULL): ?>
										<a href="<?php echo site_url("admin/skpi/$m[nim]") ?>" target="_blank"><span class="badge badge-success"><em class="fa fa-check"></em> Sudah</span></a>
										<a href="<?php echo site_url("admin/delete_app_ijazah/$m[id_ijazah]/$m[wisuda_rel]") ?>"><span class="badge badge-danger"><em class="fa fa-trash"></em></span></a>
										<?php else: ?>
										<span class="badge badge-warning"><em class="fa fa-close"></em> Belum</span>
										<?php endif ?>
									</td>
									<td><?php if ($m['id_transkrip']!= NULL): ?>
										<a href="<?php echo site_url("admin/cetak_transkrip_sementara/$m[nim]") ?>" target="_blank"><span class="badge badge-success"><em class="fa fa-check"></em> Sudah</span></a>
										<a href="<?php echo site_url("admin/delete_app_transkrip/$m[id_transkrip]/$m[wisuda_rel]") ?>"><span class="badge badge-danger"><em class="fa fa-trash"></em></span></a>
										<a href="<?php echo site_url("admin/edit_kti/$m[nim]") ?>" target="_blank"><span class="badge badge-warning"><em class="fa fa-pencil"></em></span></a>										
										<?php else: ?>
										<span class="badge badge-warning"><em class="fa fa-close"></em> Belum</span>
										<?php endif ?>
									</td>
									<td> <a href="<?php echo site_url("admin/data_sertifikat_mhs/$m[nim]") ?>" target="_blank"><span class="badge badge-success"><em class="fa fa-eyes"></em> <?php echo $m['total_skpi'] ?> berkas </span></a> </td>
									<td>
										<?php if ($m['approved']!= NULL): ?>
										<?php echo $m['approved'] ?>
										<?php else: ?>
										<a href="<?php echo site_url("admin/approve_wisda/$m[wisuda_rel]/$m[id]") ?>" data-toggle="tooltip" class="btn btn-sm btn-primary"><em class="fa fa-check"></em></a>						
										<?php endif ?>
										<a href="<?php echo site_url("admin/cetak_transkrip_sementara/$m[nim]") ?>" data-toggle="tooltip" class="btn btn-sm btn-info"  target="_blank"><em class="fa fa-copy"></em></a>
										<a href="<?php echo site_url("admin/cetak_transkrip/$m[nim]") ?>" data-toggle="tooltip" class="btn btn-sm btn-warning"  target="_blank"><em class="fa fa-print"></em></a>
										<a data-toggle="modal" data-target="#modal<?php echo $m['id'] ?>" class="btn btn-sm btn-success"><em class="fa fa-pencil"></em></a>
										<a data-toggle="modal" data-target="#modal<?php echo $m['id'] ?>" class="btn btn-sm btn-danger"><em class="fa fa-trash"></em></a>
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
				<!-- sample modal content -->
				<?php foreach ($modal as $modal): ?>
				<div id="modal<?php echo $modal['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h4 class="modal-title" id="myModalLabel">Kirim Pesan ke <?php echo $modal['nim'] ?></h4>
							</div>
							<div class="modal-body">
								<form role="form" action="" method="post" enctype="multipart/form-data">
									<div class="form-group"><input type="hidden" id="nim" name="nim" class="form-control" value="<?php echo $modal['nim'] ?>"></div>
								
								<div class="form-group">
									<label for="validationDefault02">Isi Pesan</label>
									<textarea class="form-control" name="isi" id='textarea' rows="8"></textarea>
								</div>
							</div>
							<div class="card-footer">
                  <div class="col col-xs-12 text-right">
                                <input type="submit" name="submit" class="btn btn-primary" value="Kirim">
                              </div>
                </div>
              <?php echo form_close(); ?>
							</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
							</div><!-- /.modal -->
							<?php endforeach ?>
							</div> <!-- container -->
							</div> <!-- content -->