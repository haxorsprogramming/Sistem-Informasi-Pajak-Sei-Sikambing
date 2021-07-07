<?php
session_start();
header("Access-Control-Allow-Origin: *");
include('../config/db.php');

if(isset($_SESSION['username_login'])){
    $username_login = $_SESSION['username_login'];
}else{
    die();
}

// query ambil data bahan 
$kategori = $_POST['kategori'];
$dbdata = array();
$qBahan = $link -> query("SELECT * FROM tbl_bahan WHERE kd_kategori='$kategori';");

while($fBahan = $qBahan -> fetch_assoc()){
    $arrTemp['id'] = $fBahan['id'];
    $arrTemp['kd_kategori'] = $fBahan['kd_kategori'];
    $arrTemp['nama'] = $fBahan['nama'];
    $dbdata[] = $arrTemp;
}

echo json_encode($dbdata);
?>