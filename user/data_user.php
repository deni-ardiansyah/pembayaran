<?php include_once('../_header.php'); ?>


<section class="content-header">
 
  <h1>
    <i class="fa fa-user icon-title"></i> Manajemen User

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
                  <th>Username</th>
                  <th>Password</th>
                  <th>Nama</th>
                  <th>level</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
               <?php 
                  $sql = mysqli_query($con,"SELECT * FROM tb_user ");
                  $no=1;
                  while($data=mysqli_fetch_array($sql)){
                ?>
                <tr >
                  <td> <?php echo $no++; ?></td>
                  <td> <?php echo $data['username']; ?></td>
                  <td> <?php echo $data['password']; ?></td>
                  <td> <?php echo $data['nama']; ?></td>
                  <td> <?php echo $data['level']; ?></td>
                  <td>

                   
                   <!-- a  role="button" href="#" class='open_modal' id='<?php echo  $data['user_id']; ?>'>Edit</a>| -->
                  
                    <a class="btn btn-warning" title="Edit" role="button" href="edit_user.php?user_id=<?php echo $data['user_id'];?>"> <i style='color:#fff' class='glyphicon glyphicon-edit'></i></a> 
                    
                    <a class="btn btn-primary" title="Hapus" role="button" href="hapus.php?user_id=<?php echo $data['user_id'];?>" onclick="return confirm ('yakin untuk dihapus?')"> <i style="color:#fff" class="glyphicon glyphicon-trash"></i></a>
                  </td>

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
