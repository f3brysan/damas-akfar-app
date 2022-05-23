<div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title" align="center">DATA BIODATA MAHASISWA</h4>
                                    <?php $date = strtotime (date('Y-m-d').'+1 year');
                                    $data2= date('Y',$date);?>
                                    <h4 class="m-t-0 header-title" align="center">BUKU WISUDA TA. <?php echo date("Y") ?>/<?php echo $data2 ?></h4>
                                  <h3 align="center"><b>AKADEMI FARMASI SURABAYA</b></h3>
                                  <hr>

                                    <table class="table table-lg">
                                        <tbody>
                                          <?php foreach ($wisuda as $w): ?>


                                        <tr>
                                            <th>Nama Mahasiswa</th>
                                            <td>:</td>
                                            <td><?php echo $w['namalengkap'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>NIM</th>
                                            <td>:</td>
                                            <td><?php echo $w['nim'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>TTL</th>
                                            <td>:</td>
                                            <td><?php echo $w['lahirmahasiswa'] ?>, <?php if (is_array($wisuda) && count($wisuda) > 0) {
                                            foreach($wisuda as $w): ?>
                                             <?php echo $w['tgllahirmahasiswa']; ?>
                                            <?php endforeach; } else { ?>
                                            <?php echo "-" ?>
                                            <?php } ?> </td>
                                        </tr>
                                        <tr>
                                            <th>No Handphone</th>
                                            <td>:</td>
                                            <td><?php echo $w['hp'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>:</td>
                                            <td><?php echo $w['email'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Pesan & Kesan</th>
                                            <td>:</td>
                                            <td>Pesan : <?php echo $w['pesan'] ?> <br> Kesan : <?php echo $w['kesan'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Judul KTI</th>
                                            <td>:</td>
                                            <td><?php echo $w['kti'] ?></td>
                                        </tr>
                                          <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                          </div>
                        </div>
                        <div class="hidden-print mt-4 mb-4">
                                                                <div class="text-right">
                                                                    <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="fa fa-print m-r-5"></i> Print</a>
                                                                    <a href="<?php echo site_url("mahasiswa/edit_data_wisuda/$w[id]") ?>" class="btn btn-info waves-effect waves-light"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                </div>

                    </div>
                      </div>
