<?php
require_once "../_config/config.php";
require_once "../fungsi.php";
require_once __DIR__ . '/../_assets/tambahan/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$html='<!DOCTYPE html>
<html>
<head>
    <title>Daftar Siswa</title>
 </head>
 <body>
    <h1>Daftar </h1>';
	$kode   = $_GET['nis'];
	if(isset($_GET['nis']) && $_GET['nis']!=''){
    $sqlSiswa = mysqli_query($con, "SELECT tb_siswa.*, tb_kelas.* FROM tb_siswa
		INNER JOIN tb_kelas ON tb_siswa.kelas_id=tb_kelas.kelas_id
	 	WHERE nis='".$kode."'") or die (mysqli_error($con));
    $ds=mysqli_fetch_array($sqlSiswa);
	$nis = $ds['nis'];
        $html .='<h3>Biodata Siswa</h3>
        <table>	
			<tr>
				<td class="col-sm-2">NIS</td>
				<td class="col-sm-1">:</td>
				<td class="col-sm-6">'.$ds["nis"].'</td>
			</tr>
			<tr>
				<td class="col-sm-2">Nama Siswa</td>
				<td class="col-sm-1">:</td>
				<td class="col-sm-6">'.$ds["nama_siswa"].'</td>
			</tr>
			<tr>
				<td class="col-sm-2">Kelas</td>
				<td class="col-sm-1">:</td>
				<td class="col-sm-6">'.$ds["nama_kelas"].'</td>
			</tr>
			<tr>
				<td class="col-sm-2">Alamat</td>
				<td class="col-sm-1">:</td>
				<td class="col-sm-6">'.$ds["alamat"].'</td>
			</tr>';
	
		$html .=  '</table >
			 <h3 class="box-title">Tagihan SPP Siswa</h3>
            <!-- /.box-header -->
       
        <table style="width:100%" border="1"> class="table table-hover table-bordered">

		<h3>Tagihan SPP Siswa</h3>
			<tr>
				<th>No</th>
				<th>Bulan</th>	
				<th>No. Bayar</th>
				<th>Tgl. Bayar</th>
				<th>jumlah</th>
				<th>Keterangan</th>
				
			</tr>
		</table>';
	$sql = mysqli_query($con, "SELECT * FROM tb_transaksi 
							INNER JOIN tb_siswa ON tb_siswa.nis=tb_transaksi.nis
							INNER JOIN tb_kelas ON tb_kelas.kelas_id=tb_siswa.kelas_id
							INNER JOIN tb_periode ON tb_periode.periode_id=tb_transaksi.periode_id
							WHERE tb_siswa.nis='".$nis."' ORDER BY tahun_ajaran ASC") or die(mysqli_error($con));
	$no=1;
	while($d=mysqli_fetch_array($sql)){
		$html .= '<tr>
				<td>'.$no++.'</td>
            	<td>'.$d["bulan"].$d["tahun_ajaran"].'</td>
            	<td>'.$d["no_bayar"].'</td>
            	<td>'.$d["tgl_bayar"].'</td>
            	<td>';
					if($d["tingkat"]==1){
						echo rupiah( $d ["nom_tingkat1"]);
					}elseif ($d ["tingkat"]==2) {
						echo rupiah( $d ["nom_tingkat2"]);
					}elseif ($d ["tingkat"]==3) {
						echo rupiah( $d ["nom_tingkat3"]);
					}elseif ($d ["tingkat"]==4) {
						echo rupiah( $d ["nom_tingkat4"]);
					}elseif ($d ["tingkat"]==5) {
						echo rupiah( $d ["nom_tingkat5"]);
					}else{
						echo rupiah($d ["nom_tingkat6"]);
					}
        			$html.='
            	</td>
            	<td>'.$d["ket"].'</td>
		</tr>';
	 }
}
	$html.='</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output('cetak-transaksi.pdf', \Mpdf\Output\Destination::INLINE);
?>
