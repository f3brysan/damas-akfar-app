<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="col-4 offset-4">
                    <div class="col-md-4-2">
                        <h4 align="center">RAPOT EVALUASI KINERJA DOSEN (EKD)</h4>
                        <p class="b" align="center"> Semester <?php echo $get_ekd['0']['semester'] ?> Tahun Ajaran <?php echo $get_ekd['0']['ta'] ?> </p>
                    </div>
                </div>
                <div class="col-md-6 offset-4">
                    <table width="100%" border="0">
                        <tr>
                            <td width="28%">Nama Dosen </td>
                            <td width="2%">:</td>
                            <td width="70%"> <?php echo $get_ekd['0']['nama'] ?>, <?php if ($get_ekd['0']['gelarbelakang'] != NULL): ?>
                                <?php echo $get_ekd['0']['gelarbelakang'] ?>
                                <?php else: ?>
                            <?php endif ?> </td>
                        </tr>
                        <tr>
                            <td>Mata Kuliah </td>
                            <td>:</td>
                            <td> <?php echo $get_ekd['0']['kodematkul'] ?> - <?php echo $get_ekd['0']['matkul'] ?></td>
                        </tr>
                        <tr>
                            <td>Responden Ideal </td>
                            <td>:</td>
                            <td><?php echo $get_ekd['0']['responden'] ?> Responden</td>
                        </tr>
                        <tr>
                            <td>Responden Mengisi </td>
                            <td>:</td>
                            <td><?php echo $get_ekd['0']['hasil'] ?> Responden</td>
                        </tr>
                    </table>
                </div>
                <br>                               
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Klasifikasi Aspek</th>
                                    <th>Aspen Penilaian</th>
                                    <th>Realisasi Nilai</th>
                                    <th>Standarisasi Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($hasil_ekd as $ekd): ?>
                                <tr>
                                    <td><?php echo $ekd['order'] ?>.</td>
                                    <td><?php echo $ekd['klasifikasi'] ?> </td>
                                    <td><?php echo $ekd['soal'] ?></td>
                                    <td align="right"><?php echo number_format($ekd['rata_nilai'],2) ?></td>
                                    <td align="right">4.00 </td>
                                </tr>
                                <?php endforeach ?>
                                <tr>
                                    <td colspan="3" align="right"><strong>Nilai Kinerja Dosen</strong> </td>
                                    <td colspan="2" align="center">
                                    <!-- Menghitung Nilai Rata2 EKD -->                                        
                                        <?php $key = 'rata_nilai';
                                        $sum = array_sum(array_column($hasil_ekd,$key)); 
                                        $count = count($hasil_ekd);
                                        $rata = $sum/$count;?>  
                                        <!-- Hasil Perhitungan Nilai EKD -->                                      
                                        <?php echo number_format($rata,2); ?>
                                        <?php if ($rata <= '2.39'): ?>
                                            <strong> (D)</strong>
                                            <?php elseif($rata >= '2.40' && $rata <= '2.99' ): ?>
                                                <strong> (C)</strong>
                                                <?php elseif($rata >= '3.00' && $rata <= '3.59' ): ?>
                                                    <strong> (B)</strong>
                                                    <?php else: ?>
                                                        <strong> (A)</strong>
                                        <?php endif ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" align="right"><strong>Keterangan</strong></td>
                                    <td colspan="2" align="center"><?php if ($rata <= '2.39'): ?>
                                            <strong>Kurang</strong>
                                            <?php elseif($rata >= '2.40' && $rata <= '2.99' ): ?>
                                                <strong>Cukup</strong>
                                                <?php elseif($rata >= '3.00' && $rata <= '3.59' ): ?>
                                                    <strong>Baik</strong>
                                                    <?php else: ?>
                                                        <strong>Sangat Baik</strong>
                                        <?php endif ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <div>
                            <p> Keterangan :
                                <br>
                            1. NPK : Nilai Persiapan Kuliah. 
                            <br>
                        2. NPBM : Nilai Persiapan PBM.
                        <br>
                    3. NEVA : Nilai Evaluasi.</p>
                        </div>
                        <div class="text-right">
                            <?php $nidn = $get_ekd['0']['rel_nidn'];
                            $kodematkul = $get_ekd['0']['kodematkul'];
                            $tahun_ajaran = $get_ekd['0']['tahunajaran']; ?>
                        <a href="<?php echo site_url("prodi/cetak_hasil_ekd_dosen/$tahun_ajaran/$nidn/$kodematkul") ?>" class="btn btn-primary waves-effect waves-light"><i class="fa fa-print m-r-5"></i> Cetak KHS</a>
                    </div>
                    </div>
                </div>
            </div>
            </div> <!-- end row -->
            <!-- Modal Ubah -->
            <!-- END Modal Ubah -->
            </div> <!-- container -->
            </div> <!-- content -->