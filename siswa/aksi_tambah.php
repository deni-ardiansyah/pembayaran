<!-- simpan data -->
<?php
require_once "../_config/config.php";
	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		//variabel untuk menampung inputan dari form
		$nis 		= $_POST['nis'];
		$nama 		= $_POST['nama_siswa'];
		$kelas_id 	= $_POST['nama_kelas'];
		$alamat		= $_POST['alamat'];
	
		//proses simpan
		if($nis=='' || $nama=='' || $kelas_id==''){
			echo "Form belum lengkap...";
		}else{
			$simpan = mysqli_query($con, "INSERT INTO tb_siswa(nis, nama_siswa, alamat, kelas_id)
					VALUES('$nis','$nama','$alamat','$kelas_id')");
			if(!$simpan){
				echo "Penyimpanan data gagal..";
			}else{
				
				//ambil data siswa id terakhir
				$ds=mysqli_fetch_array(mysqli_query($con, "SELECT nis FROM tb_siswa ORDER BY nis DESC LIMIT 1"));
				$siswa_id = $ds['nis'];

				header('location:data_siswa.php');
			}
		}

	}
?>
