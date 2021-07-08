<?php 
include("../config/db.php");

class data_r{}
$dr = new data_r();

$username = $_POST['username'];
$password = $_POST['password'];

// cek apakah username sudah terdaftar 
$qLogin = $link -> query("SELECT id FROM tbl_user WHERE username='$username';");
$tUser = mysqli_num_rows($qLogin);
// 'nama_lengkap':nama_lengkap, 'nama_toko':nama_toko, 'alamat':alamat, 'hp':hp  
$namaLengkap = $_POST['nama_lengkap'];
$namaToko = $_POST['nama_toko'];
$alamat = $_POST['alamat'];
$hp = $_POST['hp'];

if($tUser < 1){
    // simpan username & password ke database
    $link -> query("INSERT INTO tbl_user(username, password, tipe, aktif) VALUES('$username', '$password', 'seller','y');");
    // simpan profile seller 
    $link -> query("INSERT INTO tbl_profil_seller(username, nama_lengkap, nama_toko, alamat, nomor_hp) VALUES('$username', '$namaLengkap', '$namaToko', '$alamat','$hp');");
    $dr -> status = 'sukses'; 
}else{
    $dr -> status = 'username_ada';
}

echo json_encode($dr);

?>