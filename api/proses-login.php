<?php
session_start();
header("Access-Control-Allow-Origin: *");
include('db.php');

class data{}
$dr = new data();

$nisn = $_POST['nisn'];
$password = $_POST['password'];
// $password_hash = password_hash($password, PASSWORD_BCRYPT);

$qUser = $link -> query("SELECT * FROM users WHERE nisn='$nisn';");
$jlhUser = mysqli_num_rows($qUser);

if($jlhUser < 1){
  $dr -> status_login = 'no_user';
}else{
  $fUser = $qUser -> fetch_assoc();
  $pass_hash_db = $fUser['password'];
  $status_login = password_verify($password, $pass_hash_db);
  if($status_login == true){
    $dr -> status_login = 'success';
  }else{
    $dr -> status_login = 'wrong_password';
  }
}
// $status_login = false;
// $pass_hash_db = $fUser['password'];


// $status_login = password_verify($password, $pass_hash_db);

// $dr -> jlh_user = $jlhUser;
// $dr -> status_login = $status_login;

$dr -> nisn = $jlhUser;

echo json_encode($dr);

?>