<?php 
require_once "_config/config.php";
require_once "fungsi.php";
if (!isset($_SESSION['user'])){
    echo "<script>window.location='".base_url('auth/login.php')."';</script>";

	}	?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aplikasi Pembayaran SPP</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url()?>/_assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>/_assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>/_assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>/_assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url()?>/_assets/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="<?=base_url()?>/_assets/dist/css/skins/_all-skins.min.css">


  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>   
<body class="hold-transition skin-blue sidebar-mini logo-mini">
<div class="wrapper">

  <header class="main-header">
    <a href="<?=base_url('dashboard')?>" class="logo">
      <span class="logo-mini"><b>A</b>LT</span>
      <span class="logo-lg"><b>Pembayaran SPP</b></span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- User Account-->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url()?>/_assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['nama']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url()?>/_assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['nama']; ?>
                  <small><?php echo $_SESSION['level']; ?></small>
                </p>
              </li>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="../user/profil_user.php" class="btn btn-default btn-flat">Profile</a>
                </div>


                          <!-- Modal Logout -->
               <!--  <div class="modal fade" id="logout">
                  <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><i class="fa fa-sign-out"> Logout</i></h4>
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin logout? </p>
                        </div>
                        <div class="modal-footer">
                            <a type="button" class="btn btn-danger" href="<?=base_url('auth/logout.php')?>">Ya, Logout</a>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                        </div>
                      </div> //.modal-content
                  </div> //.modal-dialog
                </div> //.modal
 -->

                 <div class="pull-right">
                  <a href="<?=base_url('auth/logout.php')?>" class="btn btn-default btn-flat">Sign out</a>
                </div> 
              </li>
            </ul>
          </li>        
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url()?>/_assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p> <?php echo $_SESSION['nama']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
  
      
      <!-- sidebar menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li >
          <a href="<?=base_url('dashboard')?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
       
        
         <li>
          <a href="<?=base_url('periode/data_periode.php')?>">
            <i class="fa fa-th"></i> <span>Data Periode</span>
            <span class="pull-right-container"></span>
          </a>
        </li>

        <li>
          <a href="<?=base_url('transaksi/transaksi.php')?>">
            <i class="fa fa-money"></i> <span>Transaksi</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <li>
          <a href="<?=base_url('tagihan/tagih.php')?>">
            <i class="fa fa-user"></i> <span>Tagihan</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <li>
          <a href="<?=base_url('siswa/data_siswa.php')?>">
            <i class="fa fa-group"></i> <span>Data Siswa</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <li>
          <a href="<?=base_url('kelas/data_kelas.php')?>">
            <i class="fa fa-institution"></i> <span>Kelas</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
       

        <li class="treeview">
          <a href="#">
            <i class="fa fa-file-text"></i>
            <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
            <li><a  target="_blank" href="<?=base_url('laporan2/blm_l.php')?>"><i class="fa fa-circle-o"></i>Belum Lunas</a></li>
            <li><a target="_blank" href="<?=base_url('laporan2/cetak_siswa.php')?>"><i class="fa fa-circle-o"></i>Data Siswa</a></li>
          </ul>
        </li>

       <?php  
                         
          if($_SESSION['level']=='superadmin'){
        ?>

        <li class="header">Super Admin</li>

        <li>
          <a href="<?=base_url('user/data_user.php')?>">
            <i class="fa fa-user"></i> <span>Manajemen User</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
<!-- 
        <li>
          <a href="<?=base_url('backup database/download_database.php')?>">
            <i class="fa fa-database"></i> <span>Database</span>
            <span class="pull-right-container"></span>
          </a>
        </li> -->
    <?php
     }
     ?>
    </section>
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


