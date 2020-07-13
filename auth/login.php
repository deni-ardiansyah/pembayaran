<?php
require_once "../_config/config.php";
if (isset($_SESSION['user'])){
    echo "<script>window.location='".base_url()."';</script>";

}else {

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pembayaran SPP | Log in</title>
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
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a ><b>Pembayaran SPP</b>Login</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <?php
    if(isset($_POST['login'])){
        $username = trim(mysqli_real_escape_string($con, $_POST['username']));
        $pass = sha1(trim(mysqli_real_escape_string($con, $_POST['password'])));
        $sql_login = mysqli_query($con, "SELECT * FROM tb_user WHERE username = '$username' AND password = '$pass'") or die (mysqli_error($con));
        if (mysqli_num_rows($sql_login) > 0) {

          $data =mysqli_fetch_assoc($sql_login);

          $_SESSION['user_id'] =$data['user_id'];
          $_SESSION['user'] = $data['username'];
          $_SESSION['password'] = $data['password'];
          $_SESSION['nama'] = $data['nama'];
          $_SESSION['level'] = $data['level'];


          echo "<script>window.location='".base_url()."';</script>";
        } else { ?>
            <div class="row">
                <div class = "col-lg-10 col-lg-offset-1">
                    <div class= "alert alert-danger alert-dismissable" role="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <span class="glyphicon glypicon-excllamation-sign" aria-hidden="true"></span>
                        <strong> login gagal! </strong> Username / Password salah
                    </div>
                </div>   
            </div> 
        <?php
        }
      }
    ?>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="username" name="username" class="form-control" placeholder="Username" required autofocus>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8"> 
          <div class="checkbox icheck">
            <label>
           
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      </div>
    </form>
  </div>
</div>



<script src="<?=base_url()?>/_assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?=base_url()?>/_assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>
<?php
}
?>