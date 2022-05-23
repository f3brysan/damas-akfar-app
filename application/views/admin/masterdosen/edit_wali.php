<!-- Start Page content -->
<div class="content">
	<div class="container-fluid">

		<div class="row">
			<div class="col-12">
				<div class="alert alert-info alert-dismissible fade show" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
					Silahkan Pilih Mahasiswa Untuk Dosen <?php foreach ($getdosen as $gd): ?> <?php if ($gd['jeniskelamin']=='P'): ?>
            <?php echo "Ibu "; ?>
          <?php else: ?>
            <?php echo "Bapak ";  ?>
          <?php endif; ?> <strong><?php echo $gd['nama']; ?></strong>.


				</div>
        <h3 align="center"> Data Anak Wali Dosen : <?php echo $gd['gelardepan']; echo " "; ;echo $gd['nama']; echo " "; echo $gd['gelarbelakang'];?> </h3>

        <div class="col-12">
  				<div class="col-md-12">
  					<div class="card-box table-responsive">
              <table id="datawali" class="table table-bordered">
                  <thead>
                  <tr>
                      <th>No </th>
                      <th>NIM </th>
                      <th>Nama Mahasiswa</th>
                      <th>Reguler</th>
                      <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if (is_array($wali) && count($wali) > 0) { ?>
  <?php $no=1;
  foreach ($wali as $w): ?>
                      <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $w['nim'] ?></td>
                          <td><?php echo $w['namalengkap'] ?></td>
                          <td><?php echo $w['reguler'] ?></td>
                          <td>
                            <a href="<?php echo site_url("admin/detil_dosen/$w[nim]")?>" data-toggle="tooltip" title="Lihat Data" class="btn btn-link"><em class="fa fa-plus"></em></a>
                            <a href="<?php echo site_url("admin/hapus_mahasiswa_from_wali/$w[kode]/$w[nidn]")?>" onclick="return confirm('Anda yakin menghapus <?php echo $w['namalengkap'];?> dari Data Wali Anda?');" data-toggle="tooltip" title="Hapus?" class="btn btn-link"><em class="fa fa-trash"></em></a>
                          </td>
                      </tr>
  <?php endforeach; ?>
  <?php } ?>
                  </tbody>
              </table>
  					</div>
  				</div>
  			</div>
      </div>

			</div>
			<div class="col-12">
				<div class="col-md-12">
					<div class="card-box table-responsive">
            <table id="datatable" class="table table-bordered">
                <thead>
                <tr>
                    <th>No </th>
                    <th>NIM </th>
                    <th>Nama Mahasiswa</th>
                    <th>Reguler</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php if (is_array($other) && count($other) > 0) { ?>
<?php $no=1;
foreach ($other as $o): ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $o['nim'] ?></td>
                        <td><?php echo $o['namalengkap'] ?></td>
                        <td><?php echo $o['reguler'] ?></td>
                        <td>
                          <a href="<?php echo site_url("admin/add_mahasiswa_to_wali/$o[nim]/$gd[nidn]")?>" data-toggle="tooltip" title="Lihat Data" class="btn btn-link"><em class="fa fa-plus"></em></a>
                          <a href="<?php echo site_url("admin/hapus_dosen/$gd[nidn]")?>" onclick="return confirm('Anda yakin menghapus <?php echo $o['namalengkap'];?> dari Data Wali Anda?');" data-toggle="tooltip" title="Hapus?" class="btn btn-link"><em class="fa fa-trash"></em></a>
                        </td>
                    </tr>
<?php endforeach; ?>
<?php } ?>
                </tbody>
            </table>
					</div>
				</div>
			</div>
		</div> <!-- end row -->


	</div> <!-- container -->
  <?php endforeach; ?>
