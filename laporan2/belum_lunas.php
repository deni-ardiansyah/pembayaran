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
    <h3>Daftar Siswa Belum Lunas</h3>
    <table border="1" style="width:100%"  >
        
        <tr class="info">
          <th>No</th>
          <th>NIS</th>
          <th>Nama</th>
          <th>Kelas</th>
          <th>Bulan</th>
          <th>Jumlah</th>
          <th>Keterangan</th>
      </tr>';

    $sql =  mysqli_query($con, "SELECT * FROM tb_transaksi
            INNER JOIN tb_siswa ON tb_siswa.nis=tb_transaksi.nis
			INNER JOIN tb_kelas ON tb_kelas.kelas_id=tb_siswa.kelas_id
			INNER JOIN tb_periode ON tb_periode.periode_id=tb_transaksi.periode_id
            WHERE ket='' ORDER BY tb_siswa.nis ASC") or die(mysqli_error($con));
    $no=1;
    while($d=mysqli_fetch_array($sql)){
        $html .='<tr>
            <td>'.$no++.'</td>
            <td>'.$d["nis"].'</td>
            <td>'.$d["nama_siswa"].'</td>
            <td>'.$d["nama_kelas"].'</td>
            <td>'.$d["bulan"].' '.$d["tahun_ajaran"].'</td>
                <td>';
            
           
            	 {if ($d["tingkat"]==1){
						 rupiah($d["nom_tingkat1"]);
					}elseif ($d["tingkat"]==2){
						 rupiah($d["nom_tingkat2"]);
                    }elseif ($d["tingkat"]==3){
						 rupiah($d["nom_tingkat3"]);
					}elseif ($d["tingkat"]==4){
						 rupiah($d["nom_tingkat4"]);
					}elseif ($d["tingkat"]==5){
						 rupiah($d["nom_tingkat5"]);
					}else{
						 rupiah($d["nom_tingkat6"]);
                    }}
                    
        $html .='</td>
            
            <td align="center">';
			  if($d["ket"]==""){
					echo "BELUM LUNAS";
				}else{
					echo "LUNAS";
                }
            $html .='</td>
        </tr>';
    }
$html .=  '</table>
</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output('belum-lunas.pdf', \Mpdf\Output\Destination::INLINE);
?>
