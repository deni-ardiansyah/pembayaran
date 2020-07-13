<?php include_once('../_header.php'); ?>

	<?php 
	  	$kelas_id= $_GET['kelas_id'];
      	$sql = mysqli_query($con,"SELECT * FROM tb_kelas WHERE kelas_id='$kelas_id'");

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
              <h3 class="box-title">Edit Kelas</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="aksi_edit.php" role="form">
             <fieldset>
              <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="kelas_id" value="<?php echo $data['kelas_id']?>">
                  <label for="exampleInputNIS">Nama Kelas</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Kelas" name="nama_kelas" value="<?php echo $data['nama_kelas']; ?>">
                </div>
                <div class="form-group">
                  <label>Tingkat</label>
                  <select class="form-control" name="tingkat">
                    <option value="<?php echo $data ['tingkat'] ?>" selected> <?php echo $data['tingkat']; ?></option>
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
             </fieldset>
            </form>
          </div>
</section>

<?php 
}
 ?>

<?php include_once('../_footer.php'); ?>