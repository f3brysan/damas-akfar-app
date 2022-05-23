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
                                        <span class="badge badge-success"> Dibuka</span>
                                        <?php else: ?>
                                        <span class="badge badge-danger"> Ditutup</span>
                                    <?php endif ?></td>                                    
                                    <td>
                                       <a href="<?php echo site_url("perpus/waiting_list_kti/$y[kode]") ?>" data-toggle="tooltip" title="Lihat Data" class="btn btn-link"><span class="fa fa-folder-open"> Lihat Data</span></a>
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