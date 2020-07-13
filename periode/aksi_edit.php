
<!-- proses edit data -->
<?php
require_once "../_config/config.php";

if($_SERVER['REQUEST_METHOD']=='POST'){

	//variabel untuk menampung inputan dari form

    $periode_id = $_POST['periode_id'];
    $tahun_ajaran=$_POST['tahun_ajaran'];
	$tingkat1	= $_POST['tingkat1'];
	$tingkat2	= $_POST['tingkat2'];
	$tingkat3	= $_POST['tingkat3'];
	$tingkat4	= $_POST['tingkat4'];
	$tingkat5	= $_POST['tingkat5'];
	$tingkat6	= $_POST['tingkat6'];

	if($periode_id=='' ||$tingkat1==''||$tingkat2==''||$tingkat3==''||$tingkat4==''||$tingkat5==''||$tingkat6==''){
		echo "Form Belum lengkap....";
	}else{
		$update = mysqli_query($con, "UPDATE tb_periode SET periode_id='$periode_id',
 												 tahun_ajaran='$tahun_ajaran',
 												 nom_tingkat1='$tingkat1',
 												 nom_tingkat2='$tingkat2',
 												 nom_tingkat3='$tingkat3',
 												 nom_tingkat4='$tingkat4',
 												 nom_tingkat5='$tingkat5',
 												 nom_tingkat6='$tingkat6'
 											WHERE periode_id='$periode_id'");

		if(!$update){
			echo "Update data gagal...";

		}else{
			header('location:data_periode.php');
		}
	}
}
?>
