<?php include_once('../_header.php'); ?>

 <!-- Main content -->
<section class="content">

      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="aksi_tambah.php" role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputNIS">Username</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="username" name="username">
                </div>
                  <div class="form-group">
                  <label for="exampleInputNIS">Password</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="password" name="password">
                </div>
                 
                <div class="form-group">
                  <label for="exampleInputNIS">Nama</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="name" name="nama">
                </div>
                 
                <div class="form-group">
                  <label for="exampleInputNIS">Level</label>
                  <select name="level" class="form-control">
                    <option>admin</option>
                    <option>superadmin</option>

                  </select>
               
                
                
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
</section>



<?php include_once('../_footer.php'); ?>