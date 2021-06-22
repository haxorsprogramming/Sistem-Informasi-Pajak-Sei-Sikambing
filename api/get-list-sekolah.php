<?php
session_start();
header("Access-Control-Allow-Origin: *");
include('db.php');

class data{}
$dr = new data();

$slug = strtoupper($_POST['searchTerm']);

$qSekolah = $link -> query("SELECT * FROM ppdb_sekolah WHERE nama LIKE '%$slug%' AND bentuk_pendidikan_id='13';");

$data = array();

while($fSekolah = $qSekolah -> fetch_assoc()){
  $output = $fSekolah['nama'];
//   $kecamatanData = KecamatanMdl::where('id_kec', $kelurahan -> id_kec) -> first();
  $data[] = array("id" => $fSekolah['id'], "text" => $output);
}


echo json_encode($data);

?>