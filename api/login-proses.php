<?php 
session_start();
include("../config/db.php");

class data_r{}
$dr = new data_r();

$username = $_POST['username'];
$password = $_POST['password'];

// cek apakah username & pasword ada 
$qLogin = $link -> query("SELECT id FROM tbl_user WHERE username='$username' AND password='$password';");
$tUser = mysqli_num_rows($qLogin);

if($tUser < 1){
    $dr -> status = 'gagal';
}else{
    $_SESSION["username_login"] = $username;
    $dr -> status = 'sukses';
}

echo json_encode($dr);

?>