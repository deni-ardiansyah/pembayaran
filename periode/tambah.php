<?php include_once('../_header.php'); ?>

 <!-- Main content -->
<section class="content">

      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border ">
              <h3 class="box-title">Tambah Periode</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="aksi_tambah.php" role="form">
              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputNIS">Tahun Ajaran</label>
                    <input type="text" autofocus="" class="form-control" id="exampleInputEmail1" placeholder="Tahun Ajaran" name="tahun_ajaran">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputNIS">SPP Kelas 1</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="SPP Kelas 1" name="tingkat1">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputNIS">SPP Kelas 2</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="SPP Kelas 2" name="tingkat2">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputNIS">SPP Kelas 3</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="SPP Kelas 3" name="tingkat3">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputNIS">SPP Kelas 4</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="SPP Kelas 4" name="tingkat4">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputNIS">SPP Kelas 5</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="SPP Kelas 5" name="tingkat5">
                  </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputNIS">SPP Kelas 6</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="SPP Kelas 6" name="tingkat6">
                </div>
              </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <div class="col-md-">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </div>
            </form>
          </div>
      </div>
</section>



<?php include_once('../_footer.php'); ?>