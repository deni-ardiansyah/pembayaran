<?php include_once('../_header.php'); ?>

 <!-- Main content -->
<section class="content">

      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Siswa</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form"  method="post" action="aksi_tambah.php">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputNIS">NIS</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="nis" placeholder="Enter NIS">
                </div>
                <div class="form-group">
                  <label for="exampleInputNama">Nama</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" name="nama_siswa" placeholder="Nama">
                </div>

                <div class="form-group">
                	<label>Nama Kelas</label>
                	<select class="form-control" name="nama_kelas">
                    <option value="" selected>- Nama Kelas -</option>
                    <?php
                    $sqlKelas = mysqli_query($con, "SELECT * FROM tb_kelas order by nama_kelas ASC");
                    while($k=mysqli_fetch_array($sqlKelas)){
                      ?>
                      <option value="<?php echo $k['kelas_id']; ?>"><?php echo $k['nama_kelas']; ?></option>
                      <?php
                    }
                    ?>
                	</select>
                </div>
                <div class="form-group">
                  <label for="exampleInputAlamat">Alamat</label>
                  <textarea type="password" class="form-control" name="alamat" rows="3" id="exampleInputPassword1" placeholder="Alamat"></textarea>
                </div>
               
              <!--box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
</section>

<script type="text/javascript">


</script>



<?php include_once('../_footer.php'); ?>