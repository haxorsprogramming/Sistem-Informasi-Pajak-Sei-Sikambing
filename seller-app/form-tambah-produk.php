<?php
session_start();
include('../config/db.php');

if (isset($_SESSION['username_login'])) {
    $username_login = $_SESSION['username_login'];
} else {
    die();
}

// query tampil kategori 
$qKategori = $link->query("SELECT * FROM tbl_kategori;");

?>
<div class="page__content page__content" style="margin-top:30px;" id="divFormTambahProduk">
    <p class="welcome">
    <h2>Tambah produk baru</h2>
    Tambahkan produk anda yang akan ditampilkan di halaman aplikasi.
    </p>
    <div class="fieldset">
        <div class="form">
            <form id="Form" method="post" action="#!">
                <div class="form__row">
                    <div class="form__select">
                        <label>Kategori produk</label>
                        <select name="selectoptions" class="required" id="txtKategori" onchange="getDataBahanAtc()">
                            <option value="none">-- Pilih kategori --</option>
                            <?php
                            while($fKategori = $qKategori -> fetch_assoc()){ ?>
                            <option value="<?=$fKategori['kd']; ?>"><?=$fKategori['nama']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>

    var appProduk = new Vue({
        el : '#divFormTambahProduk',
        data : {
            
        }
    });

    function getDataBahanAtc()
    {
        let kategori = document.querySelector('#txtKategori').value;
        console.log(kategori);
    }
</script>