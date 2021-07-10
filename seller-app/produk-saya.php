<?php
session_start();
include('../config/db.php');

if(isset($_SESSION['username_login'])){
    $username_login = $_SESSION['username_login'];
}else{
    die();
}
// query ambil data produk 
$qProduk = $link -> query("SELECT * FROM tbl_produk WHERE username_penjual='$username_login';");
?>
<div class="page__content page__content" style="margin-top:30px;">
    <div class="buttons buttons--centered mb-20">
        <a href="javascript:void(0)" class="button button--main" onclick="tampilFormTambahProdukAtc()">Tambah Produk</a>
    </div>
    <h2 class="page__title">Produk Saya</h2>
    <?php while($fProduk = $qProduk -> fetch_assoc()){ ?>
    <?php
    $kdProduk = $fProduk['kd'];
    $idBahan = $fProduk['kd_bahan'];
    // cari data bahan 
    $qBahan = $link -> query("SELECT * FROM tbl_bahan WHERE id='$idBahan' LIMIT 0,1;");
    $fBahan = $qBahan -> fetch_assoc();
    $satuan = $fBahan['satuan'];
    ?> 
    <div class="cards cards--11 divProduk"  id="<?=$kdProduk; ?>">
        <div class="card card--style-inline card--style-inline-bg card--style-round-corners">
            <div class="card__icon"><img src="<?= $base_url; ?>api/file_upload/produk/<?=$fProduk['kd'];?>.jpg" alt="" title=""></div>
            <div class="card__details">
                <h4 class="card__title"><?=$fProduk['nama']; ?><br/><span>(Rp. <?=number_format($fProduk['harga']); ?>) / <?=$satuan; ?></span></h4>
                <p class="card__text"><?=$fProduk['deks']; ?></p>
            </div>
            <div class="card__more"><a href="#!"><img src="<?= $base_url; ?>ladun/assets/images/icons/black/more.svg" alt="" title=""></a></div>
        </div>

    </div>
    <?php } ?>
</div>

<script>

    $(".divProduk").click(function(){
        let idProduk = $(this).attr("id");
        $("#divUtama").load('detail-produk.php?idProduk='+idProduk);
    });

    function tampilFormTambahProdukAtc()
    {
        $("#divUtama").load('form-tambah-produk.php');
    }
</script>