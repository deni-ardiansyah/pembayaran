<?php include_once('../_header.php'); ?>

<?php
$nis = $_GET['nis'];
$sql = mysqli_query($con, "SELECT * FROM tb_siswa 
          INNER JOIN tb_kelas ON tb_kelas.kelas_id=tb_siswa.kelas_id
          WHERE nis='$nis'") or die(mysqli_error($con));

while ($data = mysqli_fetch_array($sql)) {
  ?>
  <!-- Main content -->
  <section class="content">

    <div class="row">
      <!-- left column -->
      <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Siswa</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" method="post" action="aksi_edit.php">
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInputNIS">NIS</label>
                <input type="text" readonly class="form-control" id="exampleInputEmail1" name="nis" placeholder="Enter NIS" value="<?php echo $data['nis']; ?>">
              </div>
              <div class="form-group">
                <label for="exampleInputNama">Nama</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="nama_siswa" placeholder="Nama" value="<?php echo $data['nama_siswa']; ?>">
              </div>
              <div class="form-group">
                <label>Kelas</label>
                <select class="form-control" name="nama_kelas">
                  <!-- <option value="">- Pilih Kelas -</option> -->
                  <?php
                    $sqlKelas = mysqli_query($con, "SELECT * FROM tb_kelas ORDER BY nama_kelas ASC") or die(mysqli_error($con));
                    while ($k = mysqli_fetch_array($sqlKelas)) {
                      ?>
                    <option value="<?php echo $k['kelas_id'] ?>" <?php if ($data['kelas_id'] ==  $k['kelas_id']) 
                                                { echo 'selected'; } ?>><?php echo $k['nama_kelas'] ?></option>
                  <?php
                    }
                    ?>
                </select>

              </div>
              <div class="form-group">
                <label for="exampleInputAlamat">Alamat</label>
                <textarea type="text" class="form-control" name="alamat" rows="3" id="exampleInputPassword1" placeholder="Alamat"><?php echo $data['alamat']; ?></textarea>
              </div>

              <!--box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </form>
        </div>
  </section>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script type="text/javascript">
    function prosess() {
      var xonchange = document.getElementById("tahun_ajaran").value;
      document.getElementById("nominal_spp").value = xonchange;
    };
  </script>

<?php
}
?>

<?php include_once('../_footer.php'); ?>