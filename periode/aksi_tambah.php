<?php 
require_once "../_config/config.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
    //variabel dari elemen form
$tahun_ajaran=$_POST['tahun_ajaran'];
$tingkat1	= $_POST['tingkat1'];
$tingkat2	= $_POST['tingkat2'];
$tingkat3	= $_POST['tingkat3'];
$tingkat4	= $_POST['tingkat4'];
$tingkat5	= $_POST['tingkat5'];
$tingkat6	= $_POST['tingkat6'];


	if ($tahun_ajaran==''||$tingkat1==''||$tingkat2==''||$tingkat3==''||$tingkat4==''||$tingkat5==''||$tingkat6=='') {
		echo "From Belum lengkap";
	}else{
		$simpan =mysqli_query($con, "INSERT INTO tb_periode tahun_ajaran,nom_tingkat1,nom_tingkat2,nom_tingkat3,nom_tingkat4,nom_tingkat5,nom_tingkat6)
		 VALUES ('$tahun_ajaran', '$tingkat1','$tingkat2','$tingkat3','$tingkat4','$tingkat5','$tingkat6')");

		if (!$simpan) {
			echo "Data Gagal SIMPAN";

		}else{
			header('location:tambah.php');
		}
	}

}



 ?>