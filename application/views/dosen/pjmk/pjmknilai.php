<style type="text/css">

    td {
        cursor: pointer;
    }

    .editor{
        display: show;
        float: right;
        width: 70%;
    }
    div.span-nilai {
        width: 25%;
        float: left;
    }

</style>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <?php foreach ($matkul as $matkul): ?>                                        
                    <h4 class="m-t-0 header-title">Data Nilai : Mata Kuliah <?php echo $matkul['nama'] ?> Semester <?php echo $matkul['semester'] ?> Tahun Ajaran <?php echo $matkul['tahunajaran'] ?></h4>
                        <p>Petunjuk Penggunaan Editor Nilai :<br><strong>Tekan Enter</strong> untuk menyimpan<br><strong>Tekan Tab</strong> untuk next ke field berikutnya</p>                                 
                  <?php endforeach ?>           
                    <table id="table-data" class="table table-striped">

                        <thead>
                            <tr>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>

                        <tbody id="table-body">
                            <?php
                            $no = 1;
                            foreach ($get as $member) {
                                echo "
                                <tr data-id='$member[id]'>
                                <td><span class='span-nim' data-id='$member[id]'>$member[nim]</span></td>
                                <td><span class='span-nama' data-id='$member[id]'>$member[namalengkap]</span></td>
                                <td><div class='span-nilai caption' data-id='$member[id]'>$member[nilai]</div><input step=0.01 type='number' class='field-nilai form-control editor' value='' data-id='$member[id]' /></td>
                                </tr>";
                            }
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div> <!-- end row -->
        <!-- Modal Ubah -->
        <!-- END Modal Ubah -->
    </div> <!-- container -->
</div> <!-- content -->
