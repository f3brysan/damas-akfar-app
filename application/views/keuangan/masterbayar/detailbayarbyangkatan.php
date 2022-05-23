<div class="content">
    <div class="container-fluid">
         <div class="text-right">
                              <a class="btn btn-link" href="<?php echo site_url("admin/lihat_pembayaran/$kode") ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
                          </div>

            <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-30">Data Mahasiswa</h4>

                                    <ul class="nav nav-pills navtab-bg nav-justified pull-in ">
                                        <li class="nav-item">
                                            <a href="#home1" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                                <i class="fi-monitor mr-2"></i> Lulus Verifikasi
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#profile1" data-toggle="tab" aria-expanded="true" class="nav-link">
                                                <i class="fi-head mr-2"></i>All Data
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="home1">
                                            <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM </th>
                                <th>Nama</th>
                                <th>Angkatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($data) == NULL): ?>

                                <?php else: ?>

                            <?php $no = 1;
foreach ($data as $d): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $d['nim'] ?></td>
                                <td><?php echo $d['namalengkap'] ?></td>
                                <td><?php echo $d['angkatan'] ?></td>
                                <td>
                                    <a href="<?php echo site_url("keuangan/hapus_verif_mhs/$d[angkatan]/$kode/$d[nim]") ?>" onclick="return confirm('Anda yakin membatalkan verifikasi dari <?php echo $d['namalengkap']; ?> ?');" data-toggle="tooltip" title="Hapus?" class="btn btn-link"><em class="fa fa-trash"></em></a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                            <?php endif?>
                        </tbody>
                    </table>
                                        </div>
                                        <div class="tab-pane " id="profile1">
                                            <table id="dataverifmhs" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM </th>
                                <th>Nama</th>
                                <th>Angkatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
foreach ($jumlah as $d): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $d['nim'] ?></td>
                                <td><?php echo $d['namalengkap'] ?></td>
                                <td><?php echo $d['angkatan'] ?></td>
                                <td>
                                    <a href="<?php echo site_url("keuangan/permit_krs/$d[angkatan]/$kode/$d[nim]") ?>" data-toggle="tooltip" title="Lihat Data" class="btn btn-link"><em class="fa fa-check"></em> Ijinkan</a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->


            </div> <!-- end row -->
            <!-- Modal Ubah -->
            <!-- END Modal Ubah -->
            </div> <!-- container -->
            </div> <!-- content -->