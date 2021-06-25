<?php 
include("../config/db.php");
class data_r{}
$dr = new data_r();

$username = $_POST['username'];

$dr -> status = $username;

echo json_encode($dr);

?>