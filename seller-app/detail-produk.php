<?php
session_start();
include("../config/db.php");

$idProduk = $_GET['idProduk'];
// query produk 
$qProduk = $link->query("SELECT * FROM tbl_produk WHERE kd='$idProduk' LIMIT 0,1;");
$fProduk = $qProduk->fetch_assoc();
$namaProduk = $fProduk['nama'];
$deks = $fProduk['deks'];
$penjual = $fProduk['username_penjual'];
$dilihat = $fProduk['dilihat'];
// cari data penjual 
$qPenjual = $link->query("SELECT * FROM tbl_profil_seller WHERE username='$penjual' LIMIT 0,1;");
$fPenjual = $qPenjual->fetch_assoc();
$namaToko = $fPenjual['nama_toko'];
$namaPenjual = $fPenjual['nama_lengkap'];
$hp = $fPenjual['nomor_hp'];
// update data dilihat 
$updateDilihat = $dilihat + 1;
$link->query("UPDATE tbl_produk SET dilihat='$updateDilihat' WHERE kd='$idProduk';");
?>

<!-- SLIDER SIMPLE -->
<div class="swiper-container slider-simple slider-simple slider-simple--vw-width mb-20 slider-init" data-paginationtype="bullets" data-spacebetweenitems="0" data-itemsperview="1">
    <div class="swiper-wrapper">
        <div class="swiper-slide slider-simple__slide" style="background-image:url(<?= $base_url; ?>api/file_upload/produk/<?= $fProduk['kd']; ?>.jpg);">
        </div>
    </div>
    <div class="swiper-pagination slider-simple__pagination"></div>

</div>

<div class="d-flex justify-space align-items-center mb-20">
    <h2 class="page__title mb-0"><?= $namaProduk; ?></h2> Rp. <?= number_format($fProduk['harga']); ?>
</div>

<div class="d-flex justify-space align-items-center mb-20">
    <h2 class="page__title mb-0">Dilihat</h2> <?= $dilihat; ?> kali
</div>

<p class="welcome">
    <?= $deks; ?>
</p>

<div class="page__title-bar">
    <div class="buttons buttons--centered mb-20">
        <a href="javascript:void(0)" class="button button--main" onclick="tampilFormEditProdukAtc()">Edit Produk</a>
    <br/>&nbsp;
        <a href="javascript:void(0)" class="button button--main" onclick="hapusProdukAtc()">Hapus Produk</a>
    </div>
</div>

</div>

<script>

    var rToHapus = server + "api/proses-hapus-produk.php";

    function tampilFormEditProdukAtc()
    {
        let idProduk = "<?=$idProduk; ?>";
        $("#divUtama").load('form-edit-produk.php?idProduk='+idProduk);
    }

    function hapusProdukAtc()
    {
        let idProduk = "<?=$idProduk; ?>";
        let konfirmasi = window.confirm("Yakin menghapus produk?");
        if(konfirmasi === true){
            let ds = {'idProduk':idProduk}
            $.post(rToHapus, ds, function(data){
                let obj = JSON.parse(data);
                ziTo('success', 'Sukses', 'Berhasil menghapus produk');
                $("#divUtama").load('produk-saya.php');
            });
        }else{

        }
    }

    function ziTo(tipe, judul, message) {
        if (tipe === "info") {

        } else if (tipe === "success") {
            iziToast.success({
                title: judul,
                message: message,
                position: "bottomCenter",
                timeout: 1000,
                pauseOnHover: false,
                onClosed: function() {},
            });
        } else if (tipe === "warning") {
            iziToast.error({
                title: judul,
                message: message,
                position: "bottomCenter",
                timeout: 1000,
                pauseOnHover: false,
                onClosed: function() {},
            });
        } else if (tipe === "error") {
            iziToast.error({
                title: judul,
                message: message,
                position: "bottomCenter",
                timeout: 1000,
                pauseOnHover: false,
                onClosed: function() {},
            });
        }
    }

</script>