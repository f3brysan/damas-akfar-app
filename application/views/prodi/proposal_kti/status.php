<div class="content">
    <div class="container-fluid">
        <div class="text-right">
            <a class="btn btn-link" onclick="goBack()"><i class="fa fa-arrow-left"></i> Kembali</a>
            <script>
            function goBack() {
            window.history.back();
            }
            </script>
        </div>
        <div class="row">
            <h4 class="m-t-0 header-title"><?php echo $bio_yudisium->nim ?> | <?php echo $bio_yudisium->namalengkap ?></h4>
            <div class="col-lg-12">
                <div id="accordion" role="tablist" aria-multiselectable="true" class="m-b-30">
                    <div class="card">
                        <div class="card-header" role="tab" id="headingOne">
                            <h5 class="mb-0 mt-0">
                            <a data-toggle="collapse" data-parent="#accordion" href="#judul" class="text-dark" aria-expanded="false" aria-controls="collapseOne">
                                Judul Proposal KTI
                            </a>
                            </h5>
                        </div>
                        <div id="judul" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Judul & Sub Judul</th>
                                            <th>Daftar Pada</th>
                                            <th>Diverifikasi Pada</th>
                                            <th>Semester</th>
                                            <th>Lampiran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (is_array($detil_proposal_kti) && count($detil_proposal_kti) > 0): ?>
                                        
                                        
                                        <?php foreach ($detil_proposal_kti as $kti): ?>
                                        <tr>
                                            <td><?php echo $kti['judul'] ?> <?php echo $kti['sub_judul'] ?></td>
                                            <td><span class="badge badge-info"><?php echo $kti['data_created'] ?></span></td>
                                            <td><span class="badge badge-success"><?php echo $kti['acc_at'] ?></span></td>
                                            <td><?php echo $kti['semester'] ?> <?php echo $kti['tahunajaran'] ?></td>
                                            <td style="horizontal-align: middle;" width="20%"><a href="<?php echo base_url(); ?>uploads/kti/<?php echo $kti['attachment'] ?>" target="_blank" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lihat Kartu Bimbingan"><span class="fa fa-external-link"></span></a>
                                            <div class="btn-group" role="group">
                                                <button id="btnGroupDrop1" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                               <span class="fa fa-undo"></span>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                    <a href="<?php echo site_url("prodi/reset_unggah_sebelum_proposal_kti/$kti[rel_nim]") ?>" class="dropdown-item">Sebelum Proposal KTI</a>
                                                    <a href="<?php echo site_url("prodi/reset_unggah_sesudah_proposal_kti/$kti[rel_nim]") ?>" class="dropdown-item">Sesudah Proposal KTI</a>
                                                </div>
                                            </div>
                                            
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" role="tab" id="headingOne">
                        <h5 class="mb-0 mt-0">
                        <a data-toggle="collapse" data-parent="#accordion" href="#dosen" class="text-dark" aria-expanded="false" aria-controls="collapseOne">
                            Dosen Proposal KTI
                        </a>
                        </h5>
                    </div>
                    <div id="dosen" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>NIDN</th>
                                        <th>Nama</th>
                                        <th>Jenis</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (is_array($detil_dosen_proposal_kti) && count($detil_dosen_proposal_kti) > 0): ?>
                                    
                                    
                                    <?php foreach ($detil_dosen_proposal_kti as $dosen): ?>
                                    <tr>
                                        <td><?php echo $dosen['rel_nidn'] ?></td>
                                        <td><?php if ($dosen['gelardepan']==NULL): ?>
                                            <?php echo $dosen['nama'] ?>, <?php echo $dosen['gelarbelakang'] ?>
                                            <?php else: ?>
                                            <?php echo $dosen['gelardepan'] ?>. <?php echo $dosen['nama'] ?>, <?php echo $dosen['gelarbelakang'] ?>
                                        <?php endif ?></td>
                                        <td><?php echo $dosen['jenis'] ?></td>
                                    </tr>
                                    <?php endforeach ?>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" role="tab" id="headingOne">
                        <h5 class="mb-0 mt-0">
                        <a data-toggle="collapse" data-parent="#accordion" href="#pengesahan" class="text-dark" aria-expanded="false" aria-controls="collapseOne">
                            Status Pengesahan Proposal KTI
                        </a>
                        </h5>
                    </div>
                    <div id="pengesahan" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>NIDN</th>
                                        <th>Nama</th>
                                        <th>Jenis Pengesahan</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (is_array($detil_status_pengesahan_proposal_kti) && count($detil_status_pengesahan_proposal_kti) > 0): ?>
                                    
                                    
                                    <?php foreach ($detil_status_pengesahan_proposal_kti as $verif): ?>
                                    <tr>
                                        <td><?php echo $verif['rel_nidn'] ?></td>
                                        <td><?php if ($verif['gelardepan']==NULL): ?>
                                            <?php echo $verif['nama'] ?>, <?php echo $verif['gelarbelakang'] ?>
                                            <?php else: ?>
                                            <?php echo $verif['gelardepan'] ?>. <?php echo $verif['nama'] ?>, <?php echo $verif['gelarbelakang'] ?>
                                        <?php endif ?></td>
                                        <td><?php echo $verif['tipe'] ?></td>
                                        <td><?php if ($verif['created_at']==NULL): ?>
                                            <span class="badge badge-danger">Belum</span>
                                            <?php else: ?>
                                            <span class="badge badge-success">Sudah, pada <?php echo $verif['created_at'] ?></span>
                                        <?php endif ?></td>
                                    </tr>
                                    <?php endforeach ?>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                
                
                
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>