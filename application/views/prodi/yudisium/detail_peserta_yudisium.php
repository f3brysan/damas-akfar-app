<div class="content">
    <div class="container-fluid">
        <div class="text-right">
            <a class="btn btn-link" href="<?php echo site_url("prodi/data_peserta_yudisium") ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <h4 class="m-t-0 header-title">Data Yudisium</h4>
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No Yudisium</th>
                                <th>NIM </th>
                                <th>Nama</th>
                                <th>Daftar</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list as $l): ?>
                            <tr>
                                <td><?php echo $l['id'] ?></td>
                                <td><?php echo $l['nim'] ?></td>
                                <td><?php echo $l['namalengkap'] ?></td>
                                <td><span class="badge badge-primary"> <?php $date = date_create($l['created_at']);
                                    echo date_format($date, "d/M/y H:i"); ?> </span></td>
                                <td><?php if ($l['acc_at'] == NULL): ?>
                                    <span class="badge badge-danger"> Belum</span>
                                    <?php else: ?>
                                    <span class="badge badge-success"> <?php $date = date_create($l['acc_at']);
                                    echo date_format($date, "d/M/y H:i"); ?></span>
                                <?php endif ?></td>
                                <td>
                                    <a href="<?php echo site_url("prodi/detail_status_peserta_yudisium/$l[nim]") ?>" data-toggle="tooltip" title="Lihat Data" class="btn btn-link"><span class="fa fa-folder-open"> Lihat Data</span></a>
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