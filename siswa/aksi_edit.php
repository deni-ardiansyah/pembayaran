<!-- proses edit data -->
<?php
require_once "../_config/config.php";

if($_SERVER['REQUEST_METHOD']=='POST'){

	//variabel untuk menampung inputan dari form

    $nis   		= $_POST['nis'];
    $nama_siswa	= $_POST ['nama_siswa'];
    $kelas_id   = $_POST ['nama_kelas'];
    $alamat		= $_POST['alamat'];
    


	if($nis==''|| $nama_siswa==''|| $kelas_id==''){
		echo "Form Belum lengkap....";
	}else{
		$update = mysqli_query($con, "UPDATE tb_siswa SET nama_siswa 	='$nama_siswa',
 														 	kelas_id	='$kelas_id',
 												 			alamat		='$alamat'
 														WHERE nis='$nis'") or die(mysqli_error($con));

		if(!$update){
			echo "Update data gagal...";

		}else{
			header('location:data_siswa.php');
		}
	}
}
?>
