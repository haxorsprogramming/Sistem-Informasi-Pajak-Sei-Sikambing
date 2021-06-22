<?php
session_start();
header("Access-Control-Allow-Origin: *");
include('db.php');

class data{}
$dr = new data();

$username = $_POST['username'];

$qDapodik = $link -> query("SELECT * FROM dapodik_siswa WHERE nisn='$username' LIMIT 0,1;");
$fDapodik = $qDapodik -> fetch_assoc();

$dr -> username = $username;

echo json_encode($fDapodik);

?>