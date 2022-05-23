<section class="showcase">
    <div class="container">
      <div class="row padall border-bottom">  
      <div class="col-lg-12">
      <div class="float-right">  
          <a href="<?php print site_url();?>phpspreadsheet" class="btn btn-info btn-sm"><i class="fa fa-file-upload"></i> Kembali </a>
        </div> 
      </div>
      </div>
      <div class="row padall">
        
        <table class="table table-striped">
          <thead>
            <tr class="table-primary">
              <th scope="col">ID</th>
              <th scope="col">NIM</th>
              <th scope="col">NAMA</th>
              <th scope="col">NILAI</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($dataInfo as $key=>$element) { ?>
            <tr>
              <td><?php print $element['ID'];?></td>
              <td><?php print $element['NIM'];?></td>
              <td><?php print $element['NAMA'];?></td>
              <td><?php print $element['NILAI'];?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
        
      </div>
    </div>
  </section>