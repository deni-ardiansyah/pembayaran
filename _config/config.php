<?php

session_start();

$con = mysqli_connect('localhost','root','','db_sdit_spp');
if(mysqli_connect_error()){
    echo mysqli_connect_error(); 
}
function base_url($url = null){
    $base_url = "http://localhost/sdit";
    if($url != null){
        return $base_url."/".$url;
    }else {
        return $base_url;
    }
    
}
?>