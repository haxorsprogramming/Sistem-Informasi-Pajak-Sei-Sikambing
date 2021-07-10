<?php
session_start();
include("config/db.php");

// query list toko 
$qToko = $link -> query("SELECT * FROM tbl_profil_seller ORDER BY id DESC;");

?>
<div class="page__content page__content">

    <div class="page__title-bar">
        <h3>Daftar toko yang berjualan</h3>
    </div>

    <div class="cards cards--11">
        <?php while($fToko = $qToko -> fetch_assoc()){ ?>
        <?php 
            $usernamePenjual = $fToko['username'];
            // cari total produk 
            $qTotalProduk = $link -> query("SELECT id, dilihat FROM tbl_produk WHERE username_penjual='$usernamePenjual';");
            $tProduk = mysqli_num_rows($qTotalProduk);
            // cari produk dilihat 
            $produkDilihat = 0;
            while($fTProduk = $qTotalProduk -> fetch_assoc()){
                $dilihat = $fTProduk['dilihat'];
                $produkDilihat = $produkDilihat + $dilihat;
            }
        ?>
        <div class="card card--style-inline card--style-inline-bg card--style-round-corners divToko" id="<?=$usernamePenjual; ?>">
            <div class="card__icon"><img src="<?=$base_url; ?>ladun/assets/images/icons/gradient-orange/blocks.svg" alt="" title="" /></div>
            <div class="card__details">
                <h4 class="card__title"><?=$fToko['nama_toko']; ?> <br/><span>(<?=$fToko['nama_lengkap']; ?>)</span></h4>
                <p class="card__text"><?=$tProduk; ?> Total Produk<br/><?=$produkDilihat; ?> Produk dilihat</p>
            </div>
            <div class="card__more"><a href="#"><img src="<?=$base_url; ?>ladun/assets/images/icons/black/more.svg" alt="" title="" /></a></div>
        </div>
        <?php } ?>
    </div>

</div>

<script>
    $(".divToko").click(function(){
        let username = $(this).attr("id");
        $("#divKontenBody").load('produk-toko.php?username='+username);
    });
</script>