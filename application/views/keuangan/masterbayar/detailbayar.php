<div class="content">
    <div class="container-fluid">
<div class="text-right">
                              <a class="btn btn-link" href="<?php echo site_url("admin/data_pembayaran") ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
                          </div>
            <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="header-title mb-4">Data <?php echo $kode ?></h4>
<div class="row">
            <?php foreach ($jumlah as $j): ?>


            <div class="col-sm-6 col-lg-6 col-xl-3">
                                <div class="card-box widget-chart-two">
                                    <div class="float-right">
                                        <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                               data-fgColor="#0acf97" value="37" data-skin="tron" data-angleOffset="180"
                                               data-readOnly=true data-thickness=".1"/>
                                    </div>
                                    <div class="widget-chart-two-content">
                                        <p class="text-muted mb-0 mt-2">Angkatan</p>
                                        <h3 class=""><a href="<?php echo site_url("keuangan/bayar_angkatan/$kode/$j[angkatan]") ?>"><?php echo $j['angkatan'] ?></a></h3>
                                    </div>

                                </div>
                            </div>
                             <?php endforeach?>
                         </div>
                     </div>
                 </div>

            </div> <!-- end row -->
            <!-- Modal Ubah -->
            <!-- END Modal Ubah -->
            </div> <!-- container -->
            </div> <!-- content -->