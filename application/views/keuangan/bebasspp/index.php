<div class="content">
    <div class="container-fluid">
         <div class="text-right">
                              <a class="btn btn-link" href="<?php echo site_url("keuangan/data_peserta_yudisium") ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
                          </div>

            <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-30">Data Mahasiswa</h4>

                                    <ul class="nav nav-pills navtab-bg nav-justified pull-in ">
                                        <li class="nav-item">
                                            <a href="#home1" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                                <i class="fi-monitor mr-2"></i> Menunggu Verifikasi
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#profile1" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                <i class="fi-head mr-2"></i> All Data
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="home1">
                                            <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No Reg</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Status</th> 
                                <th>Aksi</th>                                                           
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($belum_spp as $spp): ?>
                                <tr>
                                    <td><?php echo $spp['id'] ?></td>
                                    <td><?php echo $spp ['nim']?></td>
                                    <td><?php echo $spp['namalengkap'] ?></td>
                                    <td><?php if ($spp['status'] == NULL): ?>
                                    <span class="badge badge-danger"> Belum</span> 
                                        <?php else: ?>
                                    <span class="badge badge-success"> Sudah</span>
                                    <?php endif ?></td>  
                                    <td>
                                        <?php if ($spp['status'] == NULL): ?>
                                        <?php $kode = substr($spp['id'],0,7) ?>
                                        <a href="<?php echo site_url("keuangan/spp_allow/$spp[nim]/$kode") ?>" class="btn btn-xs btn-success"><i class="fa fa-check"></i> Ijinkan</a>
                                        <?php else: ?>
                                        <a href="<?php echo site_url("keuangan/spp_disallow/$spp[nim]") ?>" class="btn btn-xs btn-danger"><i class="fa fa-close"></i> Tolak</a>
                                    <?php endif ?></td>                                                                      
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                                        </div>
                                        <div class="tab-pane" id="profile1">
                                            <table id="dataverifmhs" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No Reg</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Status</th> 
                                <th>Aksi</th>                                                           
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($bebas_spp as $spp): ?>
                                <tr>
                                    <td><?php echo $spp['id'] ?></td>
                                    <td><?php echo $spp ['nim']?></td>
                                    <td><?php echo $spp['namalengkap'] ?></td>
                                    <td><?php if ($spp['status'] == NULL): ?>
                                    <span class="badge badge-danger"> Belum</span> 
                                        <?php else: ?>
                                    <span class="badge badge-success"> Sudah</span>
                                    <?php endif ?></td>  
                                    <td>
                                        <?php if ($spp['status'] == NULL): ?>
                                        <a href="<?php echo site_url("keuangan/spp_allow/$spp[nim]") ?>" class="btn btn-xs btn-success"><i class="fa fa-check"></i> Ijinkan</a>
                                        <?php else: ?>
                                        <?php $kode = substr($spp['id'],0,7) ?>
                                        <a href="<?php echo site_url("keuangan/spp_disallow/$spp[nim]/$kode") ?>" class="btn btn-xs btn-danger"><i class="fa fa-close"></i> Tolak</a>
                                    <?php endif ?></td>                                                                      
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