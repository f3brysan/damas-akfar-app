<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <h4 class="m-t-0 header-title">Data Kuliah Pengabdian Masyarakat</h4>
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <td rowspan="2" align="center">No</td>
                                <td rowspan="2" align="center">NIM</td>
                                <td rowspan="2" align="center">Nama</td>
                                <td colspan="7" align="center">Deskripsi Penilaian</td>
                                <td rowspan="2" align="center">Nilai</td>
                                <td rowspan="2" align="center">Aksi</td>
                            </tr>
                            <tr>
                                <td align="center" title="A. Bimbingan dengan DPL" data-toggle="tooltip" data-placement="top">Poin A</td>
                                <td align="center" title="B. Peran dalam Kelompok" data-toggle="tooltip" data-placement="top">Poin B</td>
                                <td align="center" title="C. Saat Persiapan Kegiatan" data-toggle="tooltip" data-placement="top">Poin C</td>
                                <td align="center" title="D. Saat Pelaksanaan Kegiatan" data-toggle="tooltip" data-placement="top">Poin D</td>
                                <td align="center" title="E. Sikap dan Perilaku" data-toggle="tooltip" data-placement="top">Poin E</td>
                                <td align="center" title="F. Nilai Proposal KPM" data-toggle="tooltip" data-placement="top">Poin F</td>
                                <td align="center" title="G. Nilai Naskah Laporan KPM" data-toggle="tooltip" data-placement="top">Poin G</td>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php if (is_array($get_data_kpm) && count($get_data_kpm) > 0): ?>
                            <?php $no = 1;
                            foreach ($get_data_kpm as $kpm): ?>
                            <tr>
                                <td align="right"><?php echo $no++; ?></td>
                                <td align="right"><a href="<?php echo site_url("dosen/input_nilai_kpm/$kpm[nim_rel]/$kpm[tahunajaran]") ?>"><?php echo $kpm['nim_rel'] ?></a> </td>
                                <td align="left"><?php echo $kpm['namalengkap'] ?></td>
                                <td align="right">
                                
                                <?php
                                $poin_a = ($kpm['a1'] + $kpm['a2'] + $kpm['a3'])/3;?>
                                <?php
                                $persen_a = 0.10*$poin_a;
                            echo number_format($persen_a,2); ?></td>
                            
                            <td>
                                <?php
                                $poin_b = ($kpm['b1'] + $kpm['b2'] + $kpm['b3'])/3;?>
                                <?php
                                $persen_b = 0.10*$poin_b;
                            echo number_format($persen_b,2); ?></td>
                            
                            <td><?php
                                $poin_c = ($kpm['c1'] + $kpm['c2'])/2;?>
                                <?php
                                $persen_c = 0.15*$poin_c;
                            echo number_format($persen_c,2); ?></td>
                            
                            <td>
                                <?php
                                $poin_d = ($kpm['d1'] + $kpm['d2'])/2;
                                ?><?php
                                $persen_d = 0.25*$poin_d;
                            echo number_format($persen_d,2); ?></td>
                            
                            <td>
                                <?php
                                $poin_e = ($kpm['e1'] + $kpm['e2'])/2;
                                ?><?php
                                $persen_e = 0.10*$poin_e;
                            echo number_format($persen_e,2); ?></td>                           
                            <td><?php
                                $poin_f = ($kpm['f1'] + $kpm['f2'])/2;
                                ?><?php
                                $persen_f = 0.15*$poin_f;
                            echo number_format($persen_f,2); ?></td>
                            
                            <td>
                                <?php
                                $poin_g = ($kpm['g1'] + $kpm['g2'] + $kpm['g3'])/3;
                            ?><?php
                                $persen_g = 0.15*$poin_g;
                            echo number_format($persen_g,2); ?></td>                            
                            <td><?php $total_persen_kpm = ($persen_a + $persen_b + $persen_c + $persen_d + $persen_e + $persen_f + $persen_g);
                            $nilai_mhs = number_format($total_persen_kpm,2);
                            echo number_format($total_persen_kpm,2); ?></td>
                            <td align="center"><?php if ($kpm['nilai'] == $nilai_mhs): ?>
                                <a class="btn btn-success disabled" href=""><i class="fa fa-check"></i></a>
                                <?php else: ?>
                                <a class="btn btn-primary" href="<?php echo site_url("dosen/input_khs_kpm/$kpm[nim_rel]/A606805317/$kpm[tahunajaran]/$nilai_mhs") ?>"><i class="fa fa-upload"></i></a>
                            <?php endif ?></td>
                        </tr>
                        <?php endforeach;?>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
        </div> <!-- end row -->
        <!-- Modal Ubah -->
        <!-- END Modal Ubah -->
        </div> <!-- container -->
        </div> <!-- content -->