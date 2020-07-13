<?php 
require_once "../_config/config.php";
if(isset($_SESSION['user'])){

	if($_GET['act']=='bayar'){

		$transaksi_id 	= $_GET['id'];
		$nis			= $_GET['nis'];


	
		//membuat nomor pembayaran
		$today = date("ymd");
		$query = mysqli_query($con, "SELECT max(no_bayar) AS last FROM tb_transaksi WHERE no_bayar LIKE '$today%'") or die (mysqli_error($con));
		$data = mysqli_fetch_array($query);
		$lastNoBayar	= $data['last'];
		$lastNoUrut		= substr($lastNoBayar, 6, 4);
		$nextNoUrut		= $lastNoUrut + 1;
		$nextNoBayar	= $today.sprintf('%04s', $nextNoUrut);

		//tanggal Bayar
		$tglBayar 	= date('Y-m-d');

		//id admin
		

		mysqli_query($con, "UPDATE tb_transaksi SET no_bayar='$nextNoBayar',
											tgl_bayar='$tglBayar',
											ket='LUNAS'
									WHERE transaksi_id='$transaksi_id'");

		header('location:transaksi.php?nis='.$nis);
	}
}
?>