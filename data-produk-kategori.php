<?php
session_start();
include("config/db.php");

$kdKategori = $_GET['kd'];

// cari bahan data 
$qBahan = $link->query("SELECT * FROM tbl_bahan WHERE kd_kategori='$kdKategori';");

?>

<div class="page__content page__content">

    <div class="page__title-bar">
        <h3>Kategori <?= $kdKategori; ?></h3>
    </div>
    <div class="cards cards--12" id="loadlist-shop">
        <?php
        while ($fBahan = $qBahan->fetch_assoc()) {
            $idBahan = $fBahan['id'];
            // cari query produk 
            
            $qProduk = $link->query("SELECT * FROM tbl_produk WHERE kd_bahan='$idBahan';");
            while ($fProduk = $qProduk->fetch_assoc()) { ?>
            <?php 
            $kdProduk = $fProduk['kd'];
            ?>

                <div class="card card--style-thumb divProdukCap" id="<?=$kdProduk; ?>">
                    <div class="card__thumb card__thumb--round-corners">
                        <a href="javascript:void(0)"><img src="<?= $base_url; ?>api/file_upload/produk/<?=$kdProduk; ?>.jpg" alt="" title="" /></a>
                        <div class="card__top-right-info">
                            <div class="card__price">Rp. <?=number_format($fProduk['harga']); ?></div>
                        </div>
                        <div class="card__bottom-right-info">
                            <div class="card__addtocart addtocart"><a href="#!"><img src="<?= $base_url; ?>ladun/assets/images/icons/black/cart.svg" alt="" title="" /></a></div>
                        </div>
                    </div>
                    <h4 class="card__title"><?=$fProduk['nama']; ?></h4>


                </div>
            <?php } ?>
        <?php } ?>

    </div>
</div>

<script>
    $('.divProdukCap').click(function(){
        let idProduk = $(this).attr('id');
        $("#divKontenBody").load('detail-produk.php?id='+idProduk);
    });
</script>