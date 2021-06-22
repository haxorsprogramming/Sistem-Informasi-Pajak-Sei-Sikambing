<?php
session_start();
header("Access-Control-Allow-Origin: *");
include('db.php');

class data{}
$dr = new data();

$id_sekolah = $_POST['id_sekolah'];

$qSekolah = $link -> query("SELECT * FROM ppdb_sekolah WHERE id='$id_sekolah' LIMIT 0,1;");

$fSekolah = $qSekolah -> fetch_assoc();

echo json_encode($fSekolah);

?>