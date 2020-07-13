<?php
require_once "../_config/config.php";
require_once "../fungsi.php";
require_once __DIR__ . '/../_assets/tambahan/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$html='<!DOCTYPE html>
<html>
<head>
<title>cetak kwitansi</title>
</head>
  <body>';
    $kode   = $_GET['id'];

    $sql = mysqli_query($con, "SELECT * FROM tb_transaksi 
              INNER JOIN tb_siswa ON tb_siswa.nis=tb_transaksi.nis
              INNER JOIN tb_kelas ON tb_kelas.kelas_id=tb_siswa.kelas_id
              INNER JOIN tb_periode ON tb_periode.periode_id=tb_transaksi.periode_id
              WHERE tb_transaksi.transaksi_id='".$kode."'") or die(mysqli_error($con));
    while($d=mysqli_fetch_array($sql)){
  $html .= '<table width="100%">
    <tr>
       <td width="25" align="justify"> <h3 > <img src="../_assets/_img/sdit_logo.png" width="70" height="70" style="float:left; margin:0 8px 4px 0;" > 
          </h3></td>
          <td width="100%" align="justify"><h3 style="float:left; margin:0 8px 4px 0;">
            Integrated Iskamic Elementary School <br>
            SDIT JUMAPOLO <br>
            Alamat : Jl.Raya Jumapolo-Karanganyar Km.01
         </h3></td>
         <td width="25" align="justify"><h3 align="right" style="float:right;">No.'.$d["no_bayar"].'<br>Kwitansi<br>Tanggal.'.$d["tgl_bayar"].'</h3>
        </td>
    </tr>
  </table> 
  <table width="100%" border="1">
      <tr>
        <td width="100px"  colspan="2" rowspan="3">
          <p><strong>Nama  :</strong>'.$d["nama_siswa"].'</p><br>
          <p><strong>Kelas :</strong>'.$d["nama_kelas"].'</p>
        </td>
        <td width="100px"><strong>Jenis Pembayaran</strong></td>
        <td width="100px"><strong>Jumlah</strong></td>

   
      <tr>
      <!--dihilangkan karena sudah digabung dengan baris atas-->

      <td width="100px" >a.SPP</td>
      <td width="100px">'; if ($d['tingkat'] == 1) {
                                echo rupiah($d['nom_tingkat1']);
                              } elseif ($d['tingkat'] == 2) {
                                echo rupiah($d['nom_tingkat2']);
                              } elseif ($d['tingkat'] == 3) {
                                echo rupiah($d['nom_tingkat3']);
                              } elseif ($d['tingkat'] == 4) {
                                echo rupiah($d['nom_tingkat4']);
                              } elseif ($d['tingkat'] == 5) {
                                echo rupiah($d['nom_tingkat5']);
                              } else {
                                echo rupiah($d['nom_tingkat6']);
                              } 
        $html .='</td>
      </tr>

      <tr>
      <!--dihilangkan karena sudah digabung dengan baris atas-->
      <td width="100px">b.</td>
      <td width="100px"></td>
      </tr>
      <tr>
      <!--dihilangkan karena sudah digabung dengan baris atas-->
      <td width="50%"  colspan="2" rowspan="4">
        <p width="25" height="100" style="float:left;" > Penyertor <br><br><br>(. . . . . . . .)</p>
        <p width="25" align="right" style="float:right;">Penerima<br><br><br>(. . . . . . . .) </p>
      </td>
      <td width="100px">c.</td>
      <td width="100px"></td>
      </tr>
      <tr>
      <!--dihilangkan karena sudah digabung dengan baris atas-->
      <td width="100px">d.</td>
      <td width="100px"></td>
      </tr>
      <tr>
      <!--dihilangkan karena sudah digabung dengan baris atas-->
      <td width="100px">e.</td>
      <td width="100px"></td>
      </tr>
       <tr>
      <!--dihilangkan karena sudah digabung dengan baris atas-->
      <td width="100px"><strong>Total</strong></td>
      <td width="100px"></td>
      </tr>
    </table>';
  }

$html .='
</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output('kwitansi.pdf', \Mpdf\Output\Destination::INLINE);
?>