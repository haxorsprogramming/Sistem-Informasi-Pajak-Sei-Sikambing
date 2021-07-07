<?php
session_start();
include('../config/db.php');

if(isset($_SESSION['username_login'])){
    $username_login = $_SESSION['username_login'];
}else{
    die();
}
?>
<div class="page__content page__content" style="margin-top:30px;">
    <div class="buttons buttons--centered mb-20">
        <a href="javascript:void(0)" class="button button--main" onclick="tampilFormTambahProdukAtc()">Tambah Produk</a>
    </div>
    <h2 class="page__title">Produk Saya</h2>

    <div class="cards cards--11">
        <div class="card card--style-inline card--style-inline-bg card--style-round-corners">
            <div class="card__icon"><img src="<?= $base_url; ?>ladun/assets/images/icons/gradient-orange/checked.svg" alt="" title=""></div>
            <div class="card__details">
                <h4 class="card__title">12.03.20 <span>($50)</span></h4>
                <p class="card__text">Beef Burger, Pizza Margerita, Mixed Salad</p>
            </div>
            <div class="card__more"><a href="#"><img src="<?= $base_url; ?>ladun/assets/images/icons/black/more.svg" alt="" title=""></a></div>
        </div>

    </div>

</div>

<script>
    function tampilFormTambahProdukAtc()
    {
        $("#divUtama").load('form-tambah-produk.php');
    }
</script>