<?php
  require_once "../_config/config.php";
  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=Data data siswa.xls");
?>


  <!-- /.box-header -->
    <section class="content">             
        	<div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table border="1" id="example1" class="table table-bordered table-striped">
                <thead>
                <tr class="info">
                  <th>No</th>
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>Kelas</th>
                  <th>Alamat</th>
         
                
                </tr>
                </thead>
                <tbody>
                  <?php 
                 $sql =  mysqli_query($con, "SELECT * FROM tb_siswa
                                    
                                      INNER JOIN tb_kelas ON tb_siswa.kelas_id=tb_kelas.kelas_id")or die (mysql_error($con));
                  $no=1;
                  while($data=mysqli_fetch_array($sql)){
                ?>
                <tr >
                  <td> <?php echo $no++; ?></td>
                  <td> <?php echo $data['nis']; ?></td>
                  <td> <?php echo $data['nama_siswa']; ?></td>
                  <td> <?php echo $data['nama_kelas']; ?></td>
                  <td> <?php echo $data['alamat']; ?></td>
         <?php 
              }
            ?>