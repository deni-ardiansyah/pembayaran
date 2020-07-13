<?php include_once('../_header.php'); ?>
<section class="content-header">
 
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Data Kelas

    <a class="btn btn-primary btn-social pull-right" href="tambah.php" title="Tambah Data" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Tambah
    </a>
  </h1>
</section>


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
                  <th>ID Kelas</th>
                  <!-- <th>Tingkat</th> -->
                  <th>Nama Kelas</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                  $sql = mysqli_query($con,"SELECT * FROM tb_kelas");
                  $no=1;
                  while($data=mysqli_fetch_array($sql)){
                ?>
                <tr >
                  <td> <?php echo $no++; ?></td>

                  <td> <?php echo $data['kelas_id']; ?></td>
                  <!-- <td> <?php echo $data['tingkat']; ?></td> -->
                  <td> <?php echo $data['nama_kelas']; ?></td>
                  <td>
                  
                     <!-- a  role="button" href="#" class='open_modal' id='<?php echo  $data['user_id']; ?>'>Edit</a>| -->
            

                      <a class="btn btn-warning" title="Edit" role="button" href="edit.php?kelas_id=<?php echo $data['kelas_id'];?>"> <i style='color:#fff' class='glyphicon glyphicon-edit'></i></a> 

                    <a class="btn btn-danger" title="Hapus" role="button" href="hapus.php?kelas_id=<?php echo $data['kelas_id'];?>"  onclick="return confirm ('yakin untuk dihapus?')"> <i style="color:#fff" class="glyphicon glyphicon-trash"></i></a>    

                  </td>

                <?php 
                } 
                ?>
                </tr>
              </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </section>

               
<?php include_once('../_footer.php'); ?>
