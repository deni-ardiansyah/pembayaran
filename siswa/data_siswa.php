<?php include_once('../_header.php'); ?>

<section class="content-header">
 
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Data Siswa

    <a class="btn btn-primary btn-social pull-right" href="tambah.php" title="Tambah Data" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Tambah
    </a>
    <a class="btn btn-success btn-social pull-right" href="import.php" title="Import Data" data-toggle="tooltip">
      <i class="fa fa-upload"></i> Import
    </a>
    <a class="btn btn-warning btn-social pull-right" href="export.php" title="Export Data" data-toggle="tooltip">
      <i class="fa fa-file"></i> Export XLS
    </a>

  </h1>
</section>
   <!-- /.box-header -->
    <section class="content">             
        	<div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table  id="example1" class="table table-bordered table-striped">
                <thead>
                <tr class="info">
                  <th>No</th>
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>Kelas</th>
                  <th>Alamat</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                  $sql =  mysqli_query($con, "SELECT tb_siswa.*, tb_kelas.* FROM tb_siswa
                                      INNER JOIN tb_kelas ON tb_siswa.kelas_id=tb_kelas.kelas_id");
                  $no=1;
                  while($data=mysqli_fetch_array($sql)){
                ?>
                <tr >
                  <td> <?php echo $no++; ?></td>
                  <td> <?php echo $data['nis']; ?></td>
                  <td> <?php echo $data['nama_siswa']; ?></td>
                  <td> <?php echo $data['nama_kelas']; ?></td>
                  <td> <?php echo $data['alamat']; ?></td>
                  
                  <td>
 
                     <!-- a  role="button" href="#" class='open_modal' id='<?php echo  $data['user_id']; ?>'>Edit</a>| -->
                    <a class="btn btn-warning" title="Edit" role="button" href="edit.php?nis=<?php echo $data['nis'];?>"> <i style='color:#fff' class='glyphicon glyphicon-edit'></i></a> 
                    
                    <a class="btn btn-danger" title="Hapus" role="button" href="hapus.php?nis=<?php echo $data['nis'];?>" onclick="return confirm ('yakin untuk dihapus?')"> <i style="color:#fff" class="glyphicon glyphicon-trash"></i></a>
                  </td>
                <?php 
                } 
                ?>
                </tr>
                
            	   </tbody>
              </table>
         </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

               
<?php include_once('../_footer.php'); ?>
