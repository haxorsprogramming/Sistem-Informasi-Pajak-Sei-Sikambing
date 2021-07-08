<?php
session_start();
include("config/db.php");

$idProduk = $_GET['id'];
// query produk 
$qProduk = $link->query("SELECT * FROM tbl_produk WHERE kd='$idProduk' LIMIT 0,1;");
$fProduk = $qProduk->fetch_assoc();
$namaProduk = $fProduk['nama'];
$deks = $fProduk['deks'];
$penjual = $fProduk['username_penjual'];
$dilihat = $fProduk['dilihat'];
// cari data penjual 
$qPenjual = $link -> query("SELECT * FROM tbl_profil_seller WHERE username='$penjual' LIMIT 0,1;");
$fPenjual = $qPenjual -> fetch_assoc();
$namaToko = $fPenjual['nama_toko'];
$namaPenjual = $fPenjual['nama_lengkap'];
$hp = $fPenjual['nomor_hp'];
// update data dilihat 
$updateDilihat = $dilihat + 1;
$link -> query("UPDATE tbl_produk SET dilihat='$updateDilihat' WHERE kd='$idProduk';");
?>

<!-- SLIDER SIMPLE -->
<div class="swiper-container slider-simple slider-simple slider-simple--vw-width mb-20 slider-init" data-paginationtype="bullets" data-spacebetweenitems="0" data-itemsperview="1">
    <div class="swiper-wrapper">
        <div class="swiper-slide slider-simple__slide" style="background-image:url(<?= $base_url; ?>api/file_upload/produk/<?=$fProduk['kd']; ?>.jpg);">
        </div>
    </div>
    <div class="swiper-pagination slider-simple__pagination"></div>
    
</div>

<div class="d-flex justify-space align-items-center mb-20">
    <h2 class="page__title mb-0"><?= $namaProduk; ?></h2>  Rp. <?= number_format($fProduk['harga']); ?>
</div>

<div class="d-flex justify-space align-items-center mb-20">
    <h2 class="page__title mb-0">Dilihat</h2>  <?=$dilihat; ?> kali
</div>

<p class="welcome">
    <?= $deks; ?>
</p>

<div class="page__title-bar">
    <h3>Profil toko penjual</h3>
</div>
<div class="fieldset">
    <ul class="custom-listing">
        <li><span>Nama toko : </span> <?=$namaToko; ?> </li>
        <li><span>Penjual : </span> <?=$namaPenjual; ?> </li>
        <li><span>Nomor Handphone : </span> <?=$hp; ?></li>
    </ul>
</div>
</div>