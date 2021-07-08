$(document).ready(function(){
    $('.divKategori').click(function(){
        let kdKategori = $(this).attr('id');
        $('#divKonten').load(server + 'data-produk-kategori.php?kd='+kdKategori);
    });
});