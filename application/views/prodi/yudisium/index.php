<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <h4 class="m-t-0 header-title">Data Yudisium</h4>                    
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode </th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Menunggu Konfirmasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($yudisum as $y): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $y['kode'] ?></td>
                                    <td>Yudisium Tahun Ajaran <?php echo $y['tahun_ajaran'] ?></td>
                                    <td><?php if ($y['status'] == 'open'): ?>
                                        <a href="<?php echo site_url("prodi/yudisium_close/$y[kode]") ?>"><span class="badge badge-success"> Dibuka</span></a> 
                                        <?php else: ?>
                                        <a href="<?php echo site_url("prodi/yudisium_open/$y[kode]") ?>"><span class="badge badge-danger"> Ditutup</span></a> 
                                    <?php endif ?></td>
                                    <td><?php if ($y['waiting_list_lab']+$y['waiting_list_perpus']<=0): ?>
                                        <span class="badge badge-success"> <?php echo $y['waiting_list_lab']+$y['waiting_list_perpus'] ?> Berkas</span></td>
                                        <?php else: ?>
                                            <span class="badge badge-warning"> <?php echo $y['waiting_list_lab']+$y['waiting_list_perpus'] ?> Berkas</span>
                                    <?php endif ?>
                                        </td>
                                    <td>
                                       <a href="<?php echo site_url("prodi/detail_peserta_yudisium/$y[kode]") ?>" data-toggle="tooltip" title="Lihat Data" class="btn btn-link"><span class="fa fa-folder-open"> Lihat Data</span></a>
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