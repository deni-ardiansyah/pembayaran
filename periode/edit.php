<?php include_once('../_header.php'); ?>

<?php 
    $periode_id= $_GET['periode_id'];
        $sql = mysqli_query($con,"SELECT * FROM tb_periode WHERE periode_id='$periode_id'");

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
              <h3 class="box-title">Edit Periode</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="aksi_edit.php" role="form">
              <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="periode_id" value="<?php echo $data['periode_id']; ?>">
                  <label for="exampleInputNIS">Tahun Ajaran</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tahun Ajaran" name="tahun_ajaran" value="<?php echo $data['tahun_ajaran']; ?>" >
                </div>
                <div class="form-group">
                  <label for="exampleInputNIS">Tingkat 1</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tingkat 1" name="tingkat1" value="<?php echo $data['nom_tingkat1']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputNIS">Tingkat 2</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tingkat 2" name="tingkat2" value="<?php echo $data['nom_tingkat2']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputNIS">Tingkat 3</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tingkat 3" name="tingkat3" value="<?php echo $data['nom_tingkat3']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputNIS">Tingkat 4</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tingkat 4" name="tingkat4" value="<?php echo $data['nom_tingkat4']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputNIS">Tingkat 5</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tingkat 5" name="tingkat5" value="<?php echo $data['nom_tingkat5']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputNIS">Tingkat 6</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tingkat 6" name="tingkat6" value="<?php echo $data['nom_tingkat6']; ?>">
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
</section>

<?php 
}
 ?>
<?php include_once('../_footer.php'); ?>