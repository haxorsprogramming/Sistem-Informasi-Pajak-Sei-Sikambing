<?php
session_start();
header("Access-Control-Allow-Origin: *");
include('../config/db.php');
class dataRespon{}
$dr = new dataRespon();
// {'idProduk':idProduk, 'nama':namaProduk, 'deks':deksProduk, 'harga':harga, 'stok':stok, 'diskon':diskon, 'statusGantiFoto':statusGantiFoto, 'foto':srcImg }
$idProduk = $_POST['idProduk'];
$namaProduk = $_POST['nama'];
$deks = $_POST['deks'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$diskon = $_POST['diskon'];
$statusGantiFoto = $_POST['statusGantiFoto'];
$foto = $_POST['foto'];

if($diskon == 0){
    $link -> query("UPDATE tbl_produk SET nama='$namaProduk', deks='$deks', harga='$harga', stok='$stok', status_diskon='n', total_diskon='0' WHERE kd='$idProduk';");
}else{
    $link -> query("UPDATE tbl_produk SET nama='$namaProduk', deks='$deks', harga='$harga', stok='$stok', status_diskon='y', total_diskon='$diskon' WHERE kd='$idProduk';");
}

if($statusGantiFoto == 'n'){
    
}else{
    $pathFile = "file_upload/produk/".$idProduk.".jpg";
    unlink($pathFile);
    $imgData = explode(";", $foto);
    $imgData = explode(",", $imgData[1]);
    $imgData = base64_decode($imgData[1]);
    $namaPic = "file_upload/produk/".$idProduk.".jpg";
    file_put_contents($namaPic, $imgData);
}

$dr -> idProduk = $namaProduk;

echo json_encode($dr);
?>