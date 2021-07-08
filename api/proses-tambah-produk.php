<?php
session_start();
header("Access-Control-Allow-Origin: *");
include('../config/db.php');

if(isset($_SESSION['username_login'])){
    $username_login = $_SESSION['username_login'];
}else{
    die();
}

class dataRespon{}
$dr = new dataRespon();

// { 'nama': nama, 'bahan': bahan, 'deks': deks, 'stok': stok, 'harga' : harga, 'diskon': diskon, 'pic': pic }
$bahanKode = "1234567890qwertyuioplkjhgfdsazxcvbnm";
$kdProduk = substr(str_shuffle($bahanKode), 0, 10);

$nama = $_POST['nama'];
$kdBahan = $_POST['bahan'];
$deks = $_POST['deks'];
$stok = $_POST['stok'];
$harga = $_POST['harga'];
$diskon = $_POST['diskon'];
$pic = $_POST['pic'];

// status diskon 
if($diskon == '0'){
    $statusDiskon = "n";
}else{
    $statusDiskon = "y";
}

// simpan ke database 
$link -> query("INSERT INTO tbl_produk VALUES(null, '$kdProduk', '$kdBahan', '$nama', '$deks', '$harga', '$stok', '$username_login', '$statusDiskon', '$diskon', 0, 'y');");

// ubah base 64 ke gambar 
$imgData = explode(";", $pic);
$imgData = explode(",", $imgData[1]);
$imgData = base64_decode($imgData[1]);
$namaPic = "file_upload/produk/".$kdProduk.".jpg";
file_put_contents($namaPic, $imgData);

$dr -> status = $kdProduk;

echo json_encode($dr);
