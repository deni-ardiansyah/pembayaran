<?php 
require_once "../_config/config.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
    //variabel dari elemen form
	$kelas	 =$_POST['nama_kelas'];
	$tingkat =$_POST['tingkat'];

	if ($kelas==''||$tingkat=='') {
		echo "From Belum lengkap";
	}else{
		$simpan =mysqli_query($con, "INSERT INTO tb_kelas (nama_kelas, tingkat) VALUES ('$kelas', '$tingkat')");

		if (!$simpan) {
			echo "Data Gagal SIMPAN";

		}else{
			header('location:tambah.php');
		}
	}

}



 ?>