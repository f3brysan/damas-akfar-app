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
            <h4 class="m-t-0 header-title"><?php echo $yudisium->nim ?> | <?php echo $bio_yudisium->namalengkap ?></h4>
            <div class="col-lg-12">
                <div id="accordion" role="tablist" aria-multiselectable="true" class="m-b-30">
                    <div class="card">
                        <div class="card-header" role="tab" id="headingOne">
                            <h5 class="mb-0 mt-0">
                            <a data-toggle="collapse" data-parent="#accordion" href="#spp" class="text-dark" aria-expanded="false" aria-controls="collapseOne">
                                Bebas SPP <?php if (is_array($spp) && count($spp) > 0): ?>
                                <span class="badge badge-success"> Sudah</span>
                                <?php else: ?>
                                <span class="badge badge-success"> Belum</span>
                                <?php endif ?>
                            </a>
                            </h5>
                        </div>
                        <div id="spp" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>NIM</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($spp as $spp): ?>
                                        <tr>
                                            <td><?php echo $spp['nim'] ?></td>
                                            <td><?php echo $spp['status'] ?></td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" role="tab" id="headingTwo">
                            <h5 class="mb-0 mt-0">
                            <a class="collapsed text-dark" data-toggle="collapse" data-parent="#accordion" href="#bukti_perpus" aria-expanded="false" aria-controls="collapseTwo">
                                Bebas Perpustakaan <?php if ($yudisium->bukti_perpus == NULL): ?>
                                <span class="badge badge-danger"> Belum Mengunggah</span>
                                <?php elseif(is_array($bebas_perpus) and count($bebas_perpus) > 0): ?>
                                <span class="badge badge-success"> Sudah</span>
                                <?php else: ?>
                                <span class="badge badge-warning"> Menunggu Approval</span>
                                <?php endif ?>
                            </a>
                            </h5>
                        </div>
                        <div id="bukti_perpus" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>NIM</th>
                                            <th>Status</th>
                                            <th>Diapprove Pada</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($bebas_perpus as $perpus): ?>
                                        <tr>
                                            <td><?php echo $perpus['nim'] ?></td>
                                            <td><?php echo $perpus['status'] ?></td>
                                            <td><?php $date = date_create($perpus['created_at']);
                                            echo date_format($date, "d/M/y H:i"); ?></td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" role="tab" id="headingThree">
                            <h5 class="mb-0 mt-0">
                            <a class="collapsed text-dark" data-toggle="collapse" data-parent="#accordion" href="#bebas_lab" aria-expanded="false" aria-controls="collapseThree">
                                Bebas Lab <?php if (is_array($bebas_lab) && count($bebas_lab) >= 6): ?>
                                <span class="badge badge-success"> Sudah</span>
                                <?php else: ?>
                                <?php $hitung = count($bebas_lab) ?>
                                <span class="badge badge-warning"> Diapprove oleh <?php echo $hitung; ?> Laboran</span>
                                <?php endif ?>
                            </a>
                            </h5>
                        </div>
                        <div id="bebas_lab" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>NIM</th>
                                            <th>Status</th>
                                            <th>Diapprove Pada</th>
                                            <th>Jenis Lab/Biro</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($bebas_lab as $lab): ?>
                                        <tr>
                                            <td><?php echo $lab['nim'] ?></td>
                                            <td><?php echo $lab['status'] ?></td>
                                            <td><?php $date = date_create($lab['approve_at']);
                                            echo date_format($date, "d/M/y H:i"); ?></td>
                                            <td> <?php echo $lab['jenis_lab'] ?></td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" role="tab" id="headingOne">
                                <h5 class="mb-0 mt-0">
                                <a data-toggle="collapse" data-parent="#accordion" href="#bebas_kti" class="text-dark" aria-expanded="false" aria-controls="collapseOne">
                                    Bebas KTI (PPPM) <?php if (is_array($bebas_kti) && count($bebas_kti) > 0): ?>
                                    <span class="badge badge-success"> Sudah</span>
                                    <?php else: ?>
                                    <span class="badge badge-warning"> Menunggu Approval</span>
                                    <?php endif ?>
                                </a>
                                </h5>
                            </div>
                            <div id="bebas_kti" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>NIM</th>
                                                <th>Status</th>
                                                <th>Diapprove Pada</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($bebas_kti as $kti): ?>
                                            <tr>
                                                <td><?php echo $kti['nim'] ?></td>
                                                <td><?php echo $kti['status'] ?></td>
                                                <td><?php $date = date_create($kti['created_at']);
                                                echo date_format($date, "d/M/y H:i"); ?></td>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" role="tab" id="headingOne">
                                    <h5 class="mb-0 mt-0">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#pkl" class="text-dark" aria-expanded="false" aria-controls="collapseOne">
                                        Telah Menempuh PKL dan SE <?php if ($nilai_se['0']['nilai'] == NULL): ?>
                                        <span class="badge badge-danger"> Belum</span>
                                        <?php else: ?>
                                        <span class="badge badge-success"> Sudah</span>
                                        <?php endif ?>
                                    </a>
                                    </h5>
                                </div>
                                <div id="pkl" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>NIM</th>
                                                    <th>Kode Matkul</th>
                                                    <th>Kode TA</th>
                                                    <th>Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($nilai_se as $se): ?>
                                                <tr>
                                                    <td><?php echo $se['nim'] ?></td>
                                                    <td><?php echo $se['kodematkul'] ?></td>
                                                    <td><?php echo $se['tahunajaran'] ?></td>
                                                    <td>
                                                        <?php
                                                        $nilai = $se['nilai'];
                                                        if ($nilai == "") {
                                                        echo "NA";
                                                        } elseif ($nilai <= '39.99') {
                                                        echo "E";
                                                        } elseif ($nilai >= '40.00' && $nilai <= '50.99') {
                                                        echo "D";
                                                        } elseif ($nilai >= '51.00' && $nilai <= '65.99') {
                                                        echo "C";
                                                        } elseif ($nilai >= '66.00' && $nilai <= '75.99') {
                                                        echo "B";
                                                        } else {
                                                        echo "A";
                                                        }?>
                                                    </td>
                                                </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" role="tab" id="headingOne">
                                    <h5 class="mb-0 mt-0">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#kpm" class="text-dark" aria-expanded="false" aria-controls="collapseOne">
                                        Telah Menempuh Kuliah Pengabdian Masyarakat <?php if ($nilai_kpm['0']['nilai'] == NULL): ?>
                                        <span class="badge badge-danger"> Belum</span>
                                        <?php else: ?>
                                        <span class="badge badge-success"> Sudah</span>
                                        <?php endif ?>
                                    </a>
                                    </h5>
                                </div>
                                <div id="kpm" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>NIM</th>
                                                    <th>Kode Matkul</th>
                                                    <th>Kode TA</th>
                                                    <th>Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($nilai_kpm as $kpm): ?>
                                                <tr>
                                                    <td><?php echo $kpm['nim'] ?></td>
                                                    <td><?php echo $kpm['kodematkul'] ?></td>
                                                    <td><?php echo $kpm['tahunajaran'] ?></td>
                                                    <td>
                                                        <?php
                                                        $nilai = $kpm['nilai'];
                                                        if ($nilai == "") {
                                                        echo "NA";
                                                        } elseif ($nilai <= '39.99') {
                                                        echo "E";
                                                        } elseif ($nilai >= '40.00' && $nilai <= '50.99') {
                                                        echo "D";
                                                        } elseif ($nilai >= '51.00' && $nilai <= '65.99') {
                                                        echo "C";
                                                        } elseif ($nilai >= '66.00' && $nilai <= '75.99') {
                                                        echo "B";
                                                        } else {
                                                        echo "A";
                                                        }?>
                                                    </td>
                                                </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" role="tab" id="headingOne">
                                    <h5 class="mb-0 mt-0">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#min_nilai" class="text-dark" aria-expanded="false" aria-controls="collapseOne">
                                        Tidak Memiliki Nilai D / E 
                                        <?php if (is_array($min_nilai) && count($min_nilai) > 0): ?>
                                        <?php $count_nilai = count($min_nilai) ?>
                                        <span class="badge badge-danger"> Ada <?php echo $count_nilai; ?> Mata Kuliah</span>
                                        <?php else: ?>
                                        <span class="badge badge-success"> Sudah</span>
                                        <?php endif ?>
                                    </a>
                                    </h5>
                                </div>
                                <div id="min_nilai" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>NIM</th>
                                                    <th>Kode Matkul</th>
                                                    <th>Nama Matkul</th>
                                                    <th>Kode TA</th>
                                                    <th>Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($min_nilai as $min): ?>
                                                <tr>
                                                    <td><?php echo $min['nim'] ?></td>
                                                    <td><?php echo $min['kodematkul'] ?></td>
                                                    <td><?php echo $min['nama'] ?></td>
                                                    <td><?php echo $min['kode1'] ?></td>
                                                    <td>
                                                        <?php
                                                        $nilai = $min['nilai'];
                                                        if ($nilai == "") {
                                                        echo "NA";
                                                        } elseif ($nilai <= '39.99') {
                                                        echo "E";
                                                        } elseif ($nilai >= '40.00' && $nilai <= '50.99') {
                                                        echo "D";
                                                        } elseif ($nilai >= '51.00' && $nilai <= '65.99') {
                                                        echo "C";
                                                        } elseif ($nilai >= '66.00' && $nilai <= '75.99') {
                                                        echo "B";
                                                        } else {
                                                        echo "A";
                                                        }?>
                                                    </td>
                                                </tr>
                                                <?php endforeach ?>
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