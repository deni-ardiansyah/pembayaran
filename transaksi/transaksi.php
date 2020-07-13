<?php include_once('../_header.php'); ?>
 <section class="content-header">
  <h1>
   <i class="fa fa-folder-o"></i> Transaksi
 
  </h1>
  <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dollar"></i></a></li>
      <li class="active">Transaksi</li>
 </section>

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
          
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">

           		<h3>Transaksi Pembayaran SPP</h3>

			<form method="get" action="" class="form-horizontal">
              <div class="box-body">
             <!--  	<div class="form-group">
                  <label>Tingkat</label>
                  <select class="form-control" name="tingkat">
                    <option value="" selected>- Tahun Ajaran -</option>
                 	<?php
                    $sqlPeriode = mysqli_query($con, "SELECT * FROM tb_periode order by tahun_ajaran ASC");
                    while($p=mysqli_fetch_array($sqlPeriode)){
                      ?>
                      <option value="<?php echo $p['periode_id']; ?>"><?php echo $p['tahun_ajaran']; ?></option>
                      <?php
                    }
                    ?>
                  </select>
                  </div> -->
                <div class="form-group">
                  <label for="nis" class="col-sm-1 control-label">NIS : </label>
              <div class="input-group col-sm-6 input-group-sm">
                <input type="text" class="form-control" name="nis" id="nis">
                    <span class="input-group-btn">
                      <button type="submit" name="cari" class=" btn btn-info btn-flat">Cari</button>
                    </span>
              </div>
              <!-- /input-group -->
            </div>
				
</form>


<?php
if(isset($_GET['nis']) && $_GET['nis']!=''){
	$sqlSiswa = mysqli_query($con, "SELECT tb_siswa.*, tb_kelas.* FROM tb_siswa
		INNER JOIN tb_kelas ON tb_siswa.kelas_id=tb_kelas.kelas_id
	 	WHERE nis='$_GET[nis]'") or die (mysqli_error($con));
	$ds=mysqli_fetch_array($sqlSiswa);
	$nis = $ds['nis'];
?>
<?php 
echo  "<a class='btn btn-info' title='Print' target='_blank' role='button' href='../laporan2/tr.php?nis=$nis'> <i style='color:#fff' class='glyphicon glyphicon-print'></i></a>"
 ?>
<h3>Biodata Siswa</h3>
<table class="table table-hover table-bordered">

	<tr>
		<td class="col-sm-2">NIS</td>
		<td class="col-sm-1">:</td>
		<td class="col-sm-6"><?php echo $ds['nis']; ?></td>
	</tr>
	<tr>
		<td class="col-sm-2">Nama Siswa</td>
		<td class="col-sm-1">:</td>
		<td class="col-sm-6"><?php echo $ds['nama_siswa']; ?></td>
	</tr>
	<tr>
		<td class="col-sm-2">Kelas</td>
		<td class="col-sm-1">:</td>
		<td class="col-sm-6"><?php echo $ds['nama_kelas']; ?></td>
	</tr>
	<tr>
		<td class="col-sm-2">Alamat</td>
		<td class="col-sm-1">:</td>
		<td class="col-sm-6"><?php echo $ds['alamat']; ?></td>
	</tr>
</table>


 <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tagihan SPP Siswa</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
    <table class="table table-hover table-bordered">
	<tr>
		<th>No</th>
		<th>Bulan</th>	
		<th>No. Bayar</th>
		<th>Tgl. Bayar</th>
		<th>jumlah</th>
		<th>Keterangan</th>
		<th>Aksi</th>
	</tr>
<?php	
	$sql = mysqli_query($con, "SELECT * FROM tb_transaksi 
							INNER JOIN tb_siswa ON tb_siswa.nis=tb_transaksi.nis
							INNER JOIN tb_kelas ON tb_kelas.kelas_id=tb_siswa.kelas_id
							INNER JOIN tb_periode ON tb_periode.periode_id=tb_transaksi.periode_id
							WHERE tb_siswa.nis='$nis' ORDER BY tb_siswa.nis ASC , ket DESC,tahun_ajaran ASC , bulan ASC ") or die(mysqli_error($con));
	$no=1;
	while($d=mysqli_fetch_array($sql)){
		echo "<tr>
			<td>$no</td>

			<td>$d[bulan] $d[tahun_ajaran]</td>
			<td>$d[no_bayar]</td>
			<td>$d[tgl_bayar]</td>
			<td>";
					if($d['tingkat']==1){
						echo rupiah( $d ['nom_tingkat1']);
					}elseif ($d ['tingkat']==2) {
						echo rupiah( $d ['nom_tingkat2']);
					}elseif ($d ['tingkat']==3) {
						echo rupiah( $d ['nom_tingkat3']);
					}elseif ($d ['tingkat']==4) {
						echo rupiah($d ['nom_tingkat4']);
					}elseif ($d ['tingkat']==5) {
						echo rupiah($d ['nom_tingkat5']);
					}else{
						echo rupiah($d ['nom_tingkat6']);
					}
				echo"</td>

			<td align='center'>";
				if($d['ket']==''){
					echo "<span class='badge bg-red'>Belum Lunas</span>";
				}else{
					echo " <span class='badge bg-green'> Lunas</span>";
				}
			echo "</td>
		
			<td align='center'>";
				if($d['no_bayar']==''){
					echo "<a class='btn btn-xs btn-info' href='proses_transaksi.php?nis=$nis&act=bayar&id=$d[transaksi_id]'>Bayar</a>";
				}else{
					echo " <a class='btn btn-warning' title='Print' role='button' target='_blank' href='../laporan2/kw.php?id=$d[transaksi_id]'> <i style='color:#fff' class='glyphicon glyphicon-print'></i></a>";
				}
			echo "</td>
		</tr>";
		$no++;
	}
	?>
</table>

<?php
}
?>
	<p>Pembayaran SPP dilakukan dengan cara mencari tagihan siswa dengan NIS melalui form di atas, kemudian proses pembayaran</p>
	</div>
  
             
  </form>
</section>
                
<?php include_once('../_footer.php'); ?>
