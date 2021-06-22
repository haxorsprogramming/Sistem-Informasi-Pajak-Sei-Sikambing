<?php
session_start();
header("Access-Control-Allow-Origin: *");
include('db.php');

class data{}
$dr = new data();

$data = array();

$qJurusan = $link -> query("SELECT * FROM smk_serumpun_keahlian;");
// $fJurusan = $qJurusan -> fetch_assoc();

while($fJur = $qJurusan -> fetch_assoc()){
  $arrTemp['kopetensi_keahlian'] = $fJur['kopetensi_keahlian'];
  $data[] = $arrTemp;
}


$dr -> data = $data;

echo json_encode($dr);

?>