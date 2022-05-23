<?php
$g = $grafika;
$b = $grafikb;
$m = $matkul;
//dump($g); ?>
<script>
    window.onload = function () {

        var charta = new CanvasJS.Chart("a", {
            exportEnabled: true,
            animationEnabled: true,
            title:{
                text: "Grafik Perolehan Nilai <?php echo $m[0]['nama'] ?> Reguler A"
            },
            subtitles: [{
                text: "Tahun Ajaran <?php echo $m[0]['tahunajaran'] ?>",
                fontSize: 16
            }],
            legend:{
                cursor: "pointer",
                itemclick: explodePie
            },
            data: [{
                type: "pie",
                showInLegend: true,
                toolTipContent: "Nilai {name}: <strong>{y} Mahasiswa</strong>",
                indexLabel: "Nilai {name} - {y} Mahasiswa",
                dataPoints: <?php echo json_encode($g, JSON_NUMERIC_CHECK); ?>
            }]
        });
        var chartb = new CanvasJS.Chart("b", {
            exportEnabled: true,
            animationEnabled: true,
            title:{
                text: "Grafik Perolehan Nilai <?php echo $m[0]['nama'] ?> Reguler B"
            },
            subtitles: [{
                text: "Tahun Ajaran <?php echo $m[0]['tahunajaran'] ?>",
                fontSize: 16
            }],
            legend:{
                cursor: "pointer",
                itemclick: explodePie
            },
            data: [{
                type: "pie",
                showInLegend: true,
                toolTipContent: "Nilai {name}: <strong>{y} Mahasiswa</strong>",
                indexLabel: "Nilai {name} - {y} Mahasiswa",
                dataPoints: <?php echo json_encode($b, JSON_NUMERIC_CHECK); ?>
            }]
        });
        charta.render();
        chartb.render();
    }

    function explodePie (e) {
        if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
            e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
        } else {
            e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
        }
        e.chart.render();

    }
</script>


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="header-title mb-4">Grafik Nilai</h4>

                    <div class="row">
                        <div class="col-md-6">                                             
                          <!-- Morris chart - Sales -->
                          <div id="a" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>

                      </div>                                                                            
                      <div class="col-md-6 ">
                        <div id="b" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-12">               
                    </div>
                </div>
                <div class="card-box table-responsive">
                    <h4 class="m-t-0 header-title">Data Matakuliah</h4>                    
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode dan Nama Mata Kuliah</th>    
                                <th>Reguler </th>
                                <th>Telah Terisi</th>                                                             
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($get as $m): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $m['kodematkul'] ?> - <?php echo $m['nama'] ?></td>                                
                                    <td><?php echo $m['kelas'] ?></td>
                                    <td><?php echo $m['done'] ?>/<?php echo $m['total'] ?></td>
                                    <td>
                                        <a href="<?php echo site_url("prodi/nilai_semester_by_kelas/$tahunajaran/$kodematkul/$m[kelas]") ?>" data-toggle="tooltip" title="Lihat Data" class="btn btn-link"><em class="fa fa-list"></em></a>
                                        <a href="<?php echo site_url("prodi/cetakkhsperkelas/$tahunajaran/$kodematkul/$m[kelas]") ?>" target="_blank" data-toggle="tooltip" title="Cetak" class="btn btn-link"><em class="fa fa-print"></em></a>
                                        <a href="<?php echo site_url("prodi/nilai_semester_by_kelas_excel/$tahunajaran/$kodematkul/$m[kelas]") ?>" data-toggle="tooltip" title="Download Data" class="btn btn-link"><em class="fa fa-download"></em></a>                   </td>
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
        <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->

          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#persenkms" data-toggle="tab">Grafik Pie</a></li>
              <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
          </ul>
          <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="persenkms" style="position: relative; height: 300px;"></div>
          </div>
      </div>
      <!-- /.nav-tabs-custom -->

      <!-- Chat box -->
      <!-- /.box (chat box) -->

      <!-- TO DO List -->

      <!-- /.box -->

      <!-- quick email widget -->

  </section>
            </div> <!-- content -->