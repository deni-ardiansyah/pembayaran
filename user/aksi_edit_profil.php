<!-- proses edit data -->
<?php
require_once "../_config/config.php";

if($_SERVER['REQUEST_METHOD']=='POST'){

	//variabel untuk menampung inputan dari form

    $user_id    = $_POST['user_id'];
    $username   = $_POST['username'];
    $password   = sha1 ($_POST ['password']);
    $nama		= $_POST['nama'];
    $level		= $_POST['level'];


	if($user_id=='' || $username =='' || $password==''|| $nama==''|| $level==''){
		echo "Form Belum lengkap....";
	}else{
		$update = mysqli_query($con, "UPDATE tb_user SET username='$username',
 												 password='$password',
 												 nama 	 ='$nama',
 												 level 	 ='$level'
 											WHERE user_id='$user_id'");

		if(!$update){
			echo "Update data gagal...";

		}else{
			header('location:profil_user.php');
		}
	}
}
?>
