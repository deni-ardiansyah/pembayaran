<!-- proses edit data -->
<?php
require_once "../_config/config.php";
if($_SERVER['REQUEST_METHOD']=='POST'){

  //variabel untuk menampung inputan dari form

    $kelas_id     = $_POST['kelas_id'];
    $nama_kelas   = $_POST['nama_kelas'];
    $tingkat      = $_POST['tingkat'];

  if($kelas_id=='' || $nama_kelas =='' ||$tingkat==''){
    echo "Form Belum lengkap....";
  }else{
    $update = mysqli_query($con, "UPDATE tb_kelas SET kelas_id='$kelas_id',
                                                 nama_kelas='$nama_kelas',
                                                 tingkat   ='$tingkat' 
                                              WHERE kelas_id='$kelas_id'") or die (mysqli_error($con));

    if(!$update){
      echo "Update data gagal...";

    }else{
     header('location:data_kelas.php');
    }
  }
}
?>
