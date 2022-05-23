<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <h4 class="m-t-0 header-title">Data Verifikasi Pembayaran</h4>
                    <div class="text-right">
                        <a href="<?php echo site_url('admin/tambah_matkul') ?>" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus m-r-5"></i> Tambah Mata Kuliah</a>
                    </div>
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode </th>
                                <th>Tahun Ajaran</th>
                                <th>Semester</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
foreach ($bayar as $m): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $m['kode'] ?></td>
                                <td><?php echo $m['tahunajaran'] ?></td>
                                <td><?php echo $m['semester'] ?></td>
                                <td>
                                    <a href="<?php echo site_url("keuangan/lihat_pembayaran/$m[kode]") ?>" data-toggle="tooltip" title="Lihat Data" class="btn btn-link"><em class="fa fa-list"></em></a>                                    
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