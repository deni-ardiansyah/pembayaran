<?php include_once('../_header.php'); ?>

<section class="content-header">
  <h1>
    <i class="fa fa-dashboard"></i> Dashboard

  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Dashboard</li>

  </ol>
</section>


<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-12 col-xs-12">
      <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <p style="font-size:15px">
          <i class="icon fa fa-user"></i> Selamat datang <strong><?php echo $_SESSION['nama']; ?></strong> di Aplikasi Pembayaran SPP.
        </p>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">

          <?php
          $query = mysqli_query($con, "SELECT COUNT(nis) as jumlah FROM tb_siswa")
            or die('Ada kesalahan pada query tampil Data Siswa: ' . mysqli_error($con));
          // tampilkan data
          $data = mysqli_fetch_assoc($query);
          ?>
          <h3><?php echo $data['jumlah']; ?></h3>
          <p>Data Siswa</p>
        </div>
        <div class="icon">
          <i class="ion ion-person"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <?php
          $query = mysqli_query($con, "SELECT COUNT(transaksi_id) as jumlah FROM tb_transaksi")
            or die('Ada kesalahan pada query tampil Data Siswa: ' . mysqli_error($con));
          // tampilkan data
          $data = mysqli_fetch_assoc($query);
          ?>
          <h3><?php echo $data['jumlah']; ?></h3>
          <p>Transaksi</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <?php
          $query = mysqli_query($con, "SELECT COUNT(ket) as jumlah FROM tb_transaksi")
            or die('Ada kesalahan pada query tampil Data Siswa: ' . mysqli_error($con));
          // tampilkan data
          $data = mysqli_fetch_assoc($query);
          ?>
          <h3><?php echo $data['jumlah']; ?></h3>
          <p>Jumlah Belum Lunas</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="../laporan2/blm_l.php" target="_blank" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>1.0</h3>

          <p>Version</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
</section>
<?php include_once('../_footer.php'); ?>