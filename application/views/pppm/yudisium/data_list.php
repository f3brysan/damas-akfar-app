<div class="content">
    <div class="container-fluid">
         <div class="text-right">
                              <a class="btn btn-link" href="<?php echo site_url("pppm/waiting_list_kti") ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
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
                                                <i class="fi-head mr-2"></i> Telah Diverifikasi
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
                                <th>Berkas</th> 
                                <th>Waktu Mendaftar</th>
                                <th>Aksi</th>                                                           
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($unapprove_list as $u): ?>
                                <tr>
                                    <td><?php echo $u['id'] ?></td>
                                    <td><?php echo $u ['nim']?></td>
                                    <td><?php echo $u['namalengkap'] ?></td>
                                    <td><?php if ($u['upload_kti'] == NULL): ?>
                                    <a><span class="badge badge-danger"> Belum</span> </a>                                    
                                        <?php else: ?>
                                    <a href="<?php echo base_url();?>uploads/yudisium/<?php echo $u['upload_kti'] ?>" target="_blank"><span class="badge badge-success"> Lihat</span></a>
                                    <?php endif ?></td>
                                    <td><?php $date = date_create($u['created_at']);
                                    echo date_format($date, "d/M/y H:i"); ?> </td>  
                                    <td>
                                        <?php if ($u['status'] == NULL): ?>
                                        <?php $kode = substr($u['id'],0,7) ?>
                                        <a href="<?php echo site_url("pppm/approve_mhs_kti/$kode/$u[nim]") ?>" class="btn btn-xs btn-success"><i class="fa fa-check"></i> Ijinkan</a>
                                        <?php else: ?>
                                        <a href="<?php echo site_url("pppm/unapprove_mhs_kti/$kode/$u[nim]") ?>" class="btn btn-xs btn-danger"><i class="fa fa-close"></i> Tolak</a>
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
                                <th>Berkas</th> 
                                <th>Diapprove pada</th>
                                <th>Aksi</th>                                                        
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($approve_list as $a): ?>
                                <tr>
                                    <td><?php echo $a['id'] ?></td>
                                    <td><?php echo $a ['nim']?></td>
                                    <td><?php echo $a['namalengkap'] ?></td>
                                    <td><?php if ($a['upload_kti'] == NULL): ?>
                                   <a><span class="badge badge-danger"> Belum</span> </a>                                    
                                        <?php else: ?>
                                    <a href="<?php echo base_url();?>uploads/yudisium/<?php echo $a['upload_kti'] ?>" target="_blank"><span class="badge badge-success"> Lihat</span></a>
                                    <?php endif ?></td>
                                    <td><?php $date = date_create($a['approve_at']);
                                    echo date_format($date, "d/M/y H:i"); ?> </td>  
                                    <td>
                                        <?php if ($a['status'] == NULL): ?>                                       
                                        <a href="<?php echo site_url("pppm/approve_mhs_kti/$a[nim]/$kode") ?>" class="btn btn-xs btn-success"><i class="fa fa-check"></i> Ijinkan</a>
                                        <?php else: ?>
                                        <?php $kode = substr($a['id'],0,7); ?>
                                        <a href="<?php echo site_url("pppm/unapprove_mhs_kti/$kode/$a[nim]") ?>" class="btn btn-xs btn-danger"><i class="fa fa-close"></i> Tolak</a>
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