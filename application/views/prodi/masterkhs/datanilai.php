<style type="text/css">

    td {
        cursor: pointer;
    }

    .editor{
        display: none;
    }

</style>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="text-right">
                        <a href="<?php echo site_url("/prodi/nilai_semester_by_matkul/$tahunajaran/$kodematkul") ?>" class="btn btn-warning waves-effect waves-light"><i class="fa fa-arrow-left m-r-5"></i> Kembali</a>
                    </div>
                    <hr>
                <div class="card-box table-responsive">
                    <?php if (count($matkul)>0): ?>                                            
                    <?php foreach ($matkul as $matkul): ?>                                        
                    <h4 class="m-t-0 header-title">Data Nilai : Mata Kuliah <?php echo $matkul['nama'] ?></h4>                                 
                  <?php endforeach ?>  
                  <?php endif ?>                 
                    <table id="table-data" class="table table-striped">

                        <thead>
                            <tr>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Nilai</th>
                                <th>Huruf</th>
                                <th>Cek Log</th>
                            </tr>
                        </thead>

                        <tbody id="table-body">
                            <?php
                            $no = 1;
                            
                            ?>
                            <?php foreach ($get as $member): ?>
                                <tr data-id="<?php echo $member['id'] ?>">
                                    <td><span class="span-nim" data-id="<?php echo $member['id'] ?>"></span><?php echo $member['nim'] ?></td>
                                    <td><span class="span-nama" data-id="<?php echo $member['id'] ?>"><?php echo $member['namalengkap'] ?></span></td>
                                    <td><span class="span-nilai caption" data-id="<?php echo $member['id'] ?>"><?php echo $member['nilai'] ?>
                                    </span><input data-id="<?php echo $member['id'] ?>" type="text" class="field-nilai form-control editor" value=<?php echo $member['nilai'] ?>></td>
                                    <td><?php echo $member['huruf'] ?></td>
                                    <td>
                                        <a href="<?php echo site_url("prodi/ceklog/$tahunajaran/$kodematkul/$member[nim]/$kelas") ?>" data-toggle="tooltip" title="Lihat" class="btn btn-link"><em class="fa fa-eye"></em></a>
                                    </tr>
                            <?php endforeach ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div> <!-- end row -->
        <!-- ============ MODAL EDIT BARANG =============== -->           
    
    <!--END MODAL ADD BARANG-->

    </div> <!-- container -->
</div> <!-- content -->
