<?php include_once('../_header.php'); ?>

              <?php 
               
                  $sql = mysqli_query($con,"SELECT * FROM tb_user WHERE user_id='$_SESSION[user_id]'")or die (mysqli_error($con));
                  
                  $data=mysqli_fetch_array($sql);
                
                ?>
<section class="content-header">
 
  <h1>
    <i class="fa fa-user icon-title"></i> Profil User

  </h1>
</section>

 <section class="content">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?=base_url()?>/_assets/dist/img/user4-128x128.jpg" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $_SESSION['nama']; ?></h3>

              <p class="text-muted text-center"><?php echo $_SESSION['level']; ?></p>

              <hr>
            <div class="form-group">
              <label class="col-sm-2 control-label">Username</label>
              <label style="text-align:left;" class="col-sm-10 control-label">: <?php echo $_SESSION['user']; ?> </label>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Nama</label>
              <label style="text-align:left;" class="col-sm-10 control-label">: <?php echo $_SESSION['nama']; ?> </label>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Password</label>
              <label style="text-align:left;" class="col-sm-10 control-label">: ********** </label>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Hak Akses</label>
              <label style="text-align:left" class="col-sm-10 control-label">: <?php echo $_SESSION['level']; ?> </label>
            </div>




  
              </div>
              <!-- /.box-body -->

              <div class="box-footer">

              <a href="edit_profil.php?user_id=<?php echo $_SESSION['user_id']; ?>" class="btn btn-primary btn-block"><b>Edit</b></a>
            </div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        
    </section>

  
<?php include_once('../_footer.php'); ?>
