<?php include_once('../_header.php'); ?>


<?php 
	  	$user_id= $_SESSION['user_id'];
      	$sql = mysqli_query($con,"SELECT * FROM tb_user WHERE user_id='$user_id'");

      	while($data=mysqli_fetch_array($sql)){
    ?>

<section class="content">

      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="aksi_edit_profil.php" role="form">
              <div class="box-body">
                <div class="form-group">
                  <input type="hidden" readonly="" class="form-control" id="exampleInputEmail1" placeholder="username" name="user_id" value="<?php echo $data['user_id']; ?>">
                  <label for="exampleInputNIS">Username</label>
                  <input type="text" readonly="" class="form-control" id="exampleInputEmail1" placeholder="username" name="username" value="<?php echo $data['username']; ?>">
                </div>
                  <div class="form-group">
                  <label for="exampleInputNIS">Password</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="password" name="password" value="">
                </div>
                 
                <div class="form-group">
                  <label for="exampleInputNIS">Nama</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="name" name="nama" value="<?php echo $data['nama']; ?>">
                </div>
                 
                <div class="form-group">
                  <label for="exampleInputNIS">Level</label>
                  <select name="level" class="form-control">
                  	<option value="admin" <?php if($data['level']=='admin'){echo 'selected';}?>>admin</option>
                  	<option value="superadmin" <?php if($data['level']=='superadmin'){echo 'selected';}?>>superadmin</option>
                  </select>

                  <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Edit</button>
                  </div>
</section>

<?php } ?>
<?php include_once('../_footer.php'); ?>
