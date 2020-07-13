<?php
require_once "../_config/config.php";
require "../_assets/bower_components/PHPExcel/Classes/PHPExcel.php";

if(isset($_POST['import'])){
	$file = $_FILES['file']['name'];
	$ekstensi = explode(",", $file);
	$file_name = "file-".round(microtime(true)).".".end($ekstensi);
	$sumber = $_FILES['file']['tmp_name'];
	$target_dir = "../_file/";
	$target_file =($target_dir.$file_name);
	 move_uploaded_file($sumber, $target_file);

	 $obj = PHPExcel_IOFactory::load($target_file);
	 $all_data = $obj->getActiveSheet()->toArray(null, true, true, true);
	 
	 $sql ="INSERT INTO tb_siswa ( nis, nama_siswa, kelas_id, alamat) VALUES";
	 for ($i=4; $i <=count($all_data) ; $i++){	 
		 $nis =$all_data [$i]['A'];
		 $nama_siswa =$all_data [$i]['B'];
		 $kelas_id =$all_data [$i]['C'];
		 $alamat =$all_data [$i]['D'];
		 $sql .=" ( '$nis', '$nama_siswa', '$kelas_id', '$alamat'),";
		}
		 $sql= substr($sql, 0, -1);
		 // echo $sql;
		 mysqli_query($con, $sql) or die(mysqli_error($con));
	 	
	 
	 unlink($target_file);
	 var_dump($sql);
	}
?>