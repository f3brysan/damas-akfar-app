<div class="content">
    <div class="container-fluid">
        <div class="text-right">
            <a class="btn btn-link" href="<?php echo site_url("dosen") ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
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
                            <table id="dataverifmhs" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Judul dan Sub Judul</th>
                                        <th>Total Dosen Pembimbing dan Penguji</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (is_array($waiting_kti) && count($waiting_kti) > 0 ): ?>
                                    <?php
                                    $no = 1;
                                    foreach ($waiting_kti as $wait): ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><a href="<?php echo site_url("prodi/detail_mhs_proposal_kti/$wait[rel_nim]") ?>" ><?php echo $wait['rel_nim'] ?></a></td>
                                        <td><?php echo $wait['namalengkap'] ?></td>
                                        <td><?php echo $wait['judul'] ?><br><?php echo $wait['sub_judul'] ?></td>
                                        <td><?php echo $wait['dosen'] ?> Dosen </td>
                                        <td><?php if ($wait['acc_at']==NULL): ?>
                                            <a href="<?php echo site_url("prodi/approve_proposal_kti/$wait[rel_nim]/$wait[rel_tahunajaran]") ?>" class="btn btn-primary"> <span class="fa fa-check"></span></a>
                                        <?php endif ?></td>
                                    </tr>
                                    <?php endforeach;?>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="profile1">
                            <table id="datatable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Judul dan Sub Judul</th>
                                        <th>Total Dosen Pembimbing dan Penguji</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (is_array($all_kti) && count($all_kti) > 0 ): ?>
                                    <?php
                                    $no = 1;
                                    foreach ($all_kti as $all): ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><a href="<?php echo site_url("prodi/detail_mhs_proposal_kti/$all[rel_nim]") ?>"><?php echo $all['rel_nim'] ?></a></td>
                                        <td><?php echo $all['namalengkap'] ?></td>
                                        <td><?php echo $all['judul'] ?><br><?php echo $all['sub_judul'] ?></td>
                                        <td><?php echo $all['dosen'] ?> Dosen</td>
                                        <td><?php if ($all['acc_at']!==NULL): ?>
                                            <a href="<?php echo site_url("prodi/disapprove_proposal_kti/$all[rel_nim]/$all[rel_tahunajaran]") ?>" class="btn btn-danger"> <span class="fa fa-close"></span></a>
                                        <?php endif ?></td>
                                    </tr>
                                    <?php endforeach;?>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                    </div>                   
                    </div> <!-- container -->
                    </div> <!-- content -->