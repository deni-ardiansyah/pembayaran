<?php
require_once "../_config/config.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
    //variabel dari elemen form

    $user_id     = $_POST['user_id'];
    $username    = $_POST['username'];
    $password    = sha1 ($_POST ['password']);
    $nama        = $_POST['nama'];
    $level       = $_POST['level'];

    if($username==''|| $password==''|| $nama==''|| $level==''){
        echo "Form belum lengkap!!!";
    }else{
        //proses simpan data 
        $simpan = mysqli_query($con, "INSERT INTO tb_user (user_id, username, password, nama, level) VALUES ('$user_id', '$username','$password', '$nama','$level')");

        if(!$simpan){
            echo "Data Gagal Disimpan";
        }else{
            header('location:tambah.php');

        }
    }
}
?>
