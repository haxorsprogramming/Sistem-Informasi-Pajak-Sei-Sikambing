<?php
session_start();
include('../config/db.php');

if (isset($_SESSION['username_login'])) {
    $username_login = $_SESSION['username_login'];
}
// data seller 
$qPenjual = $link -> query("SELECT * FROM tbl_profil_seller WHERE username='$username_login' LIMIT 0,1;");
$fSeller = $qPenjual -> fetch_assoc();
$nama_toko = $fSeller['nama_toko'];
// cari total produk 
$qProduk = $link -> query("SELECT id FROM tbl_produk WHERE username_penjual='$username_login';");
$tProduk = mysqli_num_rows($qProduk);
// cari total dilihat 
$qDilihat = $link -> query("SELECT dilihat FROM tbl_produk WHERE username_penjual='$username_login';");
$produkDilihat = 0;
while($fd = $qDilihat -> fetch_assoc()){
    $dilihat = $fd['dilihat'];
    $produkDilihat = $produkDilihat + $dilihat;
}
?>
<div class="user-profile mb-20">
    <div class="user-profile__thumb"><img src="<?= $base_url; ?>ladun/assets/images/photos/image-18.jpg" alt="" title="" /></div>
    <div class="user-profile__name"><?=$nama_toko; ?><br />(<?= $username_login; ?>)</div>
    <!-- <div class="buttons buttons--centered mb-20">
        <a href="javascript:void(0)" class="button button--main">Edit Profil</a>
    </div> -->
    <div class="buttons buttons--centered">
        <div class="info-box"><span>Total Produk</span> <?=$tProduk; ?></div>
        <div class="info-box"><span>Total Produk dilihat</span> <?=$produkDilihat; ?></div>
    </div>
</div>