<?php
session_start();
header("Access-Control-Allow-Origin: *");
include('db.php');

class data{}
$dr = new data();

$qSesiPpdb = $link -> query("SELECT * FROM sesi_pendaftaran WHERE status='on' LIMIT 0,1;");
$fSesiPpdb = $qSesiPpdb -> fetch_assoc();

// $dr -> status = 'tes';
echo json_encode($fSesiPpdb);

?>