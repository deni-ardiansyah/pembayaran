
<!-- simpan data -->
<?php
require_once "../_config/config.php";
	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		//variabel untuk menampung inputan dari form
		$nis 		= $_POST['nis'];
		$periode_id = $_POST['tahun_ajaran'];
		$awaltempo 	= $_POST['jatuh_tempo']; 
					
		// Membuat Array untuk menampung bulan bahasa indonesia
		$bulanIndo = array(
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember'
		);


			//proses simpan

			if($nis==''|| $periode_id==''|| $awaltempo==''){
				echo "Form belum lengkap...";
				}else{
				//ambil data siswa id terakhir
				$ds=mysqli_fetch_array(mysqli_query($con, "SELECT nis FROM tb_siswa"));
				// $nis1 = $ds['nis'];

				//membuat tagihan (12 bulan dimulai dari Juli 2019 dan menyimpan tagihan di tabel spp
				for($i=0; $i<12; $i++){
					//membuat tanggal jatuh tempo nya setiap tanggal 10
					$jatuhtempo = date("Y-m-d", strtotime("+$i month", strtotime($awaltempo)));

					$bulan = $bulanIndo[date('m', strtotime($jatuhtempo))];

					mysqli_query($con, "INSERT INTO tb_transaksi(nis,jatuh_tempo,bulan,periode_id)
								values('$nis','$jatuhtempo','$bulan','$periode_id')");
				}

				header('location:tagih.php');
			}
		}
	?>