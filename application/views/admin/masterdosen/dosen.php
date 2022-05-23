<div class="content">
    <div class="container-fluid">
      <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <h4 class="m-t-0 header-title">Data Dosen</h4>
                    <div class="text-right">
                        <a href="<?php echo site_url('admin/tambah_data_dosen') ?>" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus m-r-5"></i> Tambah Dosen</a>
                    </div>

                    <table id="datatable" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No </th>
                            <th>NIDN </th>
                            <th>Nama Dosen</th>
                            <th>Gelar</th>
                            <th>Tempat, Tgl Lahir</th>
                            <th>NIP</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
<?php $no=1;
foreach ($dosen as $m): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $m['nidn'] ?></td>
                                <td><?php echo $m['nama'] ?></td>
                                <td><?php echo $m['gelardepan'] ?>, <?php echo $m['gelarbelakang']; ?></td>
                                <td><?php echo $m['tempatlahir'] ?>, <?php echo $m['tanggallahir']; ?></td>
                                <td><?php echo $m['nip'] ?></td>
                                <td>
                                  <a href="<?php echo site_url("admin/detil_dosen/$m[nidn]")?>" data-toggle="tooltip" title="Lihat Data" class="btn btn-link"><em class="fa fa-eye"></em></a>
                                  <a href="<?php echo site_url("admin/hapus_dosen/$m[id]")?>" onclick="return confirm('Anda yakin menghapus Surat Permohonan a.n <?php echo $m['nama'];?> ?');" data-toggle="tooltip" title="Hapus?" class="btn btn-link"><em class="fa fa-trash"></em></a>
                                </td>
                            </tr>
<?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end row -->
        <!-- Modal Ubah -->
      <!-- END Modal Ubah -->




    </div> <!-- container -->

</div> <!-- content -->
