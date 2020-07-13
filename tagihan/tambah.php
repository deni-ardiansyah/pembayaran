<?php include_once('../_header.php'); ?>

<?php 
        $nis= $_GET['nis'];
        $sql = mysqli_query($con,"SELECT * FROM tb_siswa  INNER JOIN tb_kelas ON tb_kelas.kelas_id=tb_siswa.kelas_id WHERE nis='$nis'")or die(mysqli_error($con));

        while($data=mysqli_fetch_array($sql)){
    ?>
 <!-- Main content -->
<section class="content">

      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Tagihan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form"  method="post" action="aksi_tambah.php">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputNIS">NIS</label>
                  <input type="text" readonly class="form-control"   name="nis" placeholder="Enter NIS" value="<?php echo $data['nis']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputNama">Nama</label>
                  <input readonly type="text" class="form-control" id="exampleInputPassword1" name="nama_siswa" placeholder="Nama" value="<?php echo $data['nama_siswa']; ?>">
                </div>
                <div class="form-group">
                  <label>Kelas</label>
                  <select readonly class="form-control" name="nama_kelas">                
                       <option value="<?php $data['kelas_id']?>" <?php if ($data['nama_kelas']==$data['kelas_id']){echo"selected";} ?>><?php echo $data['nama_kelas'] ?></option>                    
                  </select>
                </div>
                <div class="form-group">
                  <label>Tahun Ajaran</label>
                  <select class="form-control"  id="tahun_ajaran" name="tahun_ajaran">
                    <option value="">-Pilih Tahun Ajaran-</option>
                    <?php
                      $sqlAjaran = mysqli_query($con, "SELECT * FROM tb_periode order by tahun_ajaran ASC");
                      while($a=mysqli_fetch_array($sqlAjaran)){
                        ?>
                    <option value="<?php echo $a['periode_id']; ?>" ><?php echo $a['tahun_ajaran']; ?></option>
                     <?php 
                      }
                      ?>
                  </select>
                </div>
                 <div class="form-group">
                  <label for="exampleInputAlamat">Jatuh Tempo Pertama</label>
                  <input type="text" class="form-control" name="jatuh_tempo"  readonly value="10 Juli 2019 ">
                </div>
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
</script>

<?php 
}
 ?>

<?php include_once('../_footer.php'); ?>