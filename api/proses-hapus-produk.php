<?php
session_start();
header("Access-Control-Allow-Origin: *");
include('../config/db.php');

$idProduk = $_POST['idProduk'];

class dataRespon{}
$dr = new dataRespon();

$link -> query("DELETE FROM tbl_produk WHERE kd='$idProduk';");

$dr -> idProduk = $idProduk;

echo json_encode($dr);

?>