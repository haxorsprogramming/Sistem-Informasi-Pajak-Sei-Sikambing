<?php
session_start();
header("Access-Control-Allow-Origin: *");
include('db.php');

class data{}
$dr = new data();

$username = $_POST['username'];

$qData = $link -> query("SELECT id FROM users WHERE nisn='$username' LIMIT 0,1");
$fData = $qData -> fetch_assoc();
$id_user = $fData['id'];

$fReg = $link -> query("SELECT id FROM ppdb_registrasi WHERE user_id='$id_user';");
$jlhReg = mysqli_num_rows($fReg);

$dr -> status = $jlhReg;

echo json_encode($dr);

?>