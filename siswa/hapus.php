<?php 
require_once "../_config/config.php";
// menangkap data id yang di kirim dari url
$siswa_id=$_GET['siswa_id'];


// menghapus data dari database
$sql = mysqli_query ($con,"DELETE FROM tb_siswa WHERE siswa_id='$siswa_id'");




// mengalihkan halaman kembali ke index.php
header('location:data_siswa.php');



?>

