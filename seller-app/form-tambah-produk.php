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
                            <option value="none">-- Pilih Kategori --</option>
                            <?php
                            while ($fKategori = $qKategori->fetch_assoc()) { ?>
                                <option value="<?= $fKategori['kd']; ?>"><?= $fKategori['nama']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form__row">
                    <div class="form__select">
                        <label>Jenis Produk</label>
                        <select name="selectoptions" class="required" id="txtBahan">
                            <option value="none">-- Pilih Bahan --</option>
                            <option v-for="bahan in dataBahan" v-bind:value="bahan.id">{{ bahan.nama }}</option>
                        </select>
                    </div>
                </div>
                <div class="form__row">
                    <label>Nama Produk</label>
                    <input type="text" id="txtNamaProduk" class="form__input required" placeholder="Nama produk">
                </div>
                <div class="form__row">
                    <label>Deksripsi Produk</label>
                    <textarea id="txtDeksripsiProduk" class="form__textarea required" placeholder="Deksripsi"></textarea>
                </div>
                <div class="form__row">
                    <label>Harga</label>
                    <input type="number" id="txtHarga" class="form__input required" placeholder="Harga">
                </div>
                <div class="form__row">
                    <label>Stok</label>
                    <input type="number" id="txtStok" class="form__input required" placeholder="Stok">
                </div>
                <div class="form__row">
                    <label>Diskon (%) </label><br />
                    <small style="font-size: 13px;">Isi '0' apabila tidak ada diskon</small>
                    <input type="number" id="txtDiskon" value="0" class="form__input required" placeholder="Diskon" maxlength="3">
                </div>
                <div class="form__row">
                    <label>Foto Produk</label><br />
                    <img src="<?= $base_url; ?>ladun/img/default.jpg" style="width: 200px;border-radius: 12px;" id="previewKk"><br />
                    <small style="font-size:13px;">Pilih gambar</small>
                    <input type="file" id="inputFotoKk" onchange="getImg()" class="custom-file-input">
                </div>
                <div class="buttons buttons--centered mb-20" style="margin-top:20px">
                    <a href="javascript:void(0)" class="button button--main" onclick="prosesTambahProduk()">Tambah Produk</a>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    var rToGetBahan = server + "api/get-data-bahan.php";
    var rToProsesTambahProduk = server + "api/proses-tambah-produk.php";

    var appProduk = new Vue({
        el: '#divFormTambahProduk',
        data: {
            dataBahan: []
        },
        methods: {

        }
    });

    async function prosesTambahProduk() {
        let nama = document.querySelector("#txtNamaProduk").value;
        let bahan = document.querySelector("#txtBahan").value;
        let deks = document.querySelector("#txtDeksripsiProduk").value;
        let harga = document.querySelector("#txtHarga").value;
        let stok = document.querySelector("#txtStok").value;
        let diskon = document.querySelector("#txtDiskon").value;
        let pic = document.querySelector("#previewKk").getAttribute("src");
        let pic_default = server + "ladun/img/default.jpg";
        let ds = { 'nama': nama, 'bahan': bahan, 'deks': deks, 'stok': stok, 'harga' : harga, 'diskon': diskon, 'pic': pic }
        if(nama === '' || bahan === '' || deks === '' || harga === '' || stok === '' || pic === pic_default){
            ziTo('warning', 'Isi field!!!', 'Harap isi seluruh field !!..');
        }else{
            let konfirmasi = window.confirm("Konfirmasi tambahkan produk ..?");
            if(konfirmasi === true){
                $.post(rToProsesTambahProduk, ds, function(data){
                    let obj = JSON.parse(data);
                    console.log(obj);
                    ziTo('success', 'Sukses', 'Berhasil menambahkan produk ..?');
                });
            }else{

            }
        }
        
    }

    function getDataBahanAtc() {
        let pjgArray = appProduk.dataBahan.length;
        var i;
        let kategori = document.querySelector('#txtKategori').value;
        let ds = {
            'kategori': kategori
        }
        for (i = 0; i < pjgArray; i++) {
            appProduk.dataBahan.splice(0, 1);
        }
        $.post(rToGetBahan, ds, function(data) {
            let obj = JSON.parse(data);
            obj.forEach(renderBahan);

            function renderBahan(item, index) {
                appProduk.dataBahan.push({
                    nama: obj[index].nama,
                    id: obj[index].id
                });
            }
        });
    }

    function getImg() {
        var sampul = document.querySelector('#inputFotoKk');
        var imgPrev = document.querySelector('#previewKk');
        var fileGambar = new FileReader();
        fileGambar.readAsDataURL(sampul.files[0]);

        fileGambar.onload = function(e) {
            let hasil = e.target.result;
            imgPrev.src = hasil;
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

    function sleep(ms) {
        return new Promise(resolve => {
            setTimeout(resolve, ms)
        });
    }
</script>