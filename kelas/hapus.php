<?php 
require_once "../_config/config.php";
// menangkap data id yang di kirim dari url
$kelas_id=$_GET['kelas_id'];


// menghapus data dari database
$sql = mysqli_query ($con,"DELETE FROM tb_kelas WHERE kelas_id='$kelas_id'");




// mengalihkan halaman kembali ke index.php
header("location:data_kelas.php");
?>

