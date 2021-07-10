$(document).ready(function(){
    $('.divKategori').click(function(){
        let kdKategori = $(this).attr('id');
        $('#divKonten').load(server + 'data-produk-kategori.php?kd='+kdKategori);
    });
    $('.divProdukCap').click(function(){
        let idProduk = $(this).attr('id');
        $("#divKontenBody").load('detail-produk.php?id='+idProduk);
    });
});

function semuaProdukTerbaruAtc()
{
    $("#divKontenBody").load('semua-produk.php?kat=all');
}

function semuaProdukDiskonAtc()
{
    $("#divKontenBody").load('semua-produk.php?kat=diskon');
}