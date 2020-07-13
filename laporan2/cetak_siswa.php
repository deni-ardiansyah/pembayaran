<?php
require_once "../_config/config.php";
require_once __DIR__ . '/../_assets/tambahan/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$html= '<!DOCTYPE html>
<html>
<head>
    <title>Daftar Siswa</title>

 </head>
 <body>
  <table  width="100%">
      <tr>
        <td width="25"  align="justify">
          <h3 align="justify" width="50" height="70" style="float:left;"> <img src="../_assets/_img/muhammadiyah_logo.png" width="70" height="67" style="float:left; margin:0 8px 2px 0;"> 
          </h3>
          <hr/>
        </td>
        <td width="100%"  align="center">  
            <h5 style="float:center; margin:0 8px 2px 0;">PIMPINAN CABANG MUHAMMADIYAH KECAMATAN JUMAPOLO</h5>
            <h5 style="float:center; margin:0 8px 2px 0;">Majelis Pendidikan Dasar dan Menengah</h5>
            <h4 style="float:center; margin:0 8px 2px 0;">SDIT JUMAPOLO</h4>
            <h5 style="float:center; margin:0 8px 2px 0;">Integrated Islamic Elementary School</h5>
            <h6 style="float:center; margin:0 8px 2px 0;">Alamat: Jl.Raya Jumapolo - Karanganyar Km. 01, Kode Pos 57783 
            <br>Telp. 20714990221, email: sdit75polo@gmail.com </h6>
            <hr/>
        </td>
        <td width="25" align="justify">
          <h3 align="justify" width="50" height="70" style="float:right;"><img src="../_assets/_img/sdit_logo.png" width="70" height="67" style="float:right; margin:0 8px 2px 0;"></h3>
          <hr/>
        </td>
      </tr>
    </table>
    <table border="1" style="width:100%; border-collapse: collapse;"  >
        
        <tr class="info">
          <th>No</th>
          <th>NIS</th>
          <th>Nama</th>
          <th>Kelas</th>
        
      </tr>';
    $sql =  mysqli_query($con, "SELECT tb_siswa.*, tb_kelas.* FROM tb_siswa
            INNER JOIN tb_kelas ON tb_siswa.kelas_id=tb_kelas.kelas_id");
    $no=1;
    while($data=mysqli_fetch_array($sql)){
        $html .='<tr>
            <td align="center">'.$no++.'</td>
            <td align="center">'.$data["nis"].'</td>
            <td>'.$data["nama_siswa"]. '</td>
            <td align="center">'.$data["nama_kelas"].'</td>
            </tr>';
    }
$html .=  '</table>
</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output('cetak-siswa.pdf', \Mpdf\Output\Destination::INLINE);
?>