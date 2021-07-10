<?php
session_start();
include('../config/db.php');
$idProduk = $_GET['idProduk'];
// query detail produk 
$qProduk = $link->query("SELECT * FROM tbl_produk where kd='$idProduk' LIMIT 0,1;");
$fProduk = $qProduk->fetch_assoc();
$idBahan = $fProduk['kd_bahan'];
// query bahan 
$qBahan = $link -> query("SELECT * FROM tbl_bahan WHERE id='$idBahan' LIMIT 0,1;");
$fBahan = $qBahan -> fetch_assoc();
$namaBahan = $fBahan['nama'];
$kdKategori = $fBahan['kd_kategori'];
// query kategori 
$qKategori = $link -> query("SELECT * FROM tbl_kategori WHERE kd='$kdKategori' LIMIT 0,1;");
$fKategori = $qKategori -> fetch_assoc();
$namaKategori = $fKategori['nama'];
?>
<div class="page__content page__content" style="margin-top:30px;" id="divFormEditProduk">
    <p class="welcome">
    <h2>Edit Produk</h2>
    </p>
    <img src="<?= $base_url; ?>api/file_upload/produk/<?= $idProduk; ?>.jpg" style="width: 250px;" id="previewKk">
    <input type="file" accept="image/*" onchange="getImg()" id="inputFotoKk" ><br /><small>Ganti foto produk</small>
    <hr />
    <div class="form__row">
        <label>Nama Produk</label>
        <input type="text" id="txtNamaProduk" class="form__input required" value="<?= $fProduk['nama']; ?>" placeholder="Nama produk">
    </div>
    <div class="form__row">
        <label>Kategori : <b><?=$namaKategori; ?></b></label><br/>
        <label>Jenis Bahan : <b><?=$namaBahan; ?></b></label>
    </div>
    <div class="form__row" style="margin-top:20px;">
        <label>Deksripsi Produk</label>
        <textarea id="txtDeksripsiProduk" class="form__textarea required" placeholder="Deksripsi"><?= $fProduk['deks']; ?></textarea>
    </div>
    <div class="form__row">
        <label>Harga</label>
        <input type="number" id="txtHarga" class="form__input required" placeholder="Harga" value="<?= $fProduk['harga']; ?>">
    </div>
    <div class="form__row">
        <label>Stok</label>
        <input type="number" id="txtStok" class="form__input required" placeholder="Stok" value="<?= $fProduk['stok']; ?>">
    </div>
    <div class="form__row">
        <label>Diskon (%) </label><br />
        <small style="font-size: 13px;">Isi '0' apabila tidak ada diskon</small>
        <input type="number" id="txtDiskon" class="form__input required" placeholder="Diskon" maxlength="3" value="<?=$fProduk['total_diskon']; ?>">
    </div>
    <div class="buttons buttons--centered mb-20" style="margin-top:20px">
        <a href="javascript:void(0)" class="button button--main" onclick="prosesTambahProduk()">Simpan</a>
    </div>
</div>

<script>

    var rToProsesUpdate = server + "api/proses-update-produk.php";
    
    function prosesTambahProduk()
    {
        let idProduk = "<?= $idProduk; ?>";
        let pathDefault = "<?=$base_url; ?>api/file_upload/produk/<?= $idProduk; ?>.jpg";
        let srcImg = document.querySelector("#previewKk").getAttribute("src");
        var statusGantiFoto = "n";
        let namaProduk = document.querySelector("#txtNamaProduk").value;
        let deksProduk = document.querySelector("#txtDeksripsiProduk").value;
        let harga = document.querySelector("#txtHarga").value;
        let stok = document.querySelector("#txtStok").value;
        let diskon =  document.querySelector("#txtDiskon").value;

        if(pathDefault === srcImg){
            statusGantiFoto = 'n';
        }else{
            statusGantiFoto = 'y';
        }

        // console.log(diskon);

        if(namaProduk === '' || deksProduk === '' || harga === '' || stok === '' || diskon === ''){
            ziTo('warning', 'Isi field!!!', 'Harap lengkapi field!!!');
        }else{
            let ds = {'idProduk':idProduk, 'nama':namaProduk, 'deks':deksProduk, 'harga':harga, 'stok':stok, 'diskon':diskon, 'statusGantiFoto':statusGantiFoto, 'foto':srcImg }
            $.post(rToProsesUpdate, ds, function(data){
                let obj = JSON.parse(data);
                console.log(obj);
                ziTo('success', 'Sukses', 'Berhasil update produk');
                $("#divUtama").load('produk-saya.php');
            });
        }
        
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
</script>