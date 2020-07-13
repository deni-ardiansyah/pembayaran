<?php include_once('../_header.php'); ?>

 <!-- Main content -->
<section class="content">

      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Kelas</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="aksi_tambah.php" role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputNIS">Nama Kelas</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Kelas" name="nama_kelas">
                </div>                
                <div class="form-group">
                  <label>Tingkat</label>
                  <select class="form-control" name="tingkat">
                    <option value="" selected>- Pilih Kelas -</option>
                    <option value="1"> 1 </option>
                    <option value="2"> 2 </option>
                    <option value="3"> 3 </option>
                    <option value="4"> 4 </option>
                    <option value="5"> 5 </option>
                    <option value="6"> 6</option>
                  </select>
                  </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
</section>



<?php include_once('../_footer.php'); ?>