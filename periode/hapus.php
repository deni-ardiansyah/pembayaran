<?php 
require_once "../_config/config.php";
// menangkap data id yang di kirim dari url
$periode_id=$_GET['periode_id'];


// menghapus data dari database
$sql = mysqli_query ($con,"DELETE FROM tb_periode WHERE periode_id='$periode_id'");




// mengalihkan halaman kembali ke index.php
header("location:data_periode.php");
?>

