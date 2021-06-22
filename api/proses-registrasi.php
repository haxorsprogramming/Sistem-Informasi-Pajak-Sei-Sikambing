<?php
session_start();
header("Access-Control-Allow-Origin: *");
include('db.php');

class data{}
$dr = new data();
$waktu = date("Y-m-d H:i:s");
// {'nisn':nisn, 'password':password}
$nisn = $_POST['nisn'];
$password = $_POST['password'];
$pass_hash = password_hash($password , PASSWORD_BCRYPT);
// cek apakah nisn sudah terdaftar 
// $qCekNisn = $link -> query("SELECT id FROM users WHERE nisn='$nisn';");
// $tNisnUser = mysqli_num_rows($qCekNisn);

//cek apakah nisn ada di data dapodik 
$qCekNisn = $link -> query("SELECT id FROM dapodik_siswa WHERE nisn='$nisn';");
$tNisn = mysqli_num_rows($qCekNisn);
if($tNisn < 1){
    $dr -> status = 'no_nisn';
}else{
    $qCekNisn = $link -> query("SELECT id FROM users WHERE nisn='$nisn';");
    $tNisnUser = mysqli_num_rows($qCekNisn);
    if($tNisnUser < 1){
      $dr -> status = 'success';
      $link -> query("INSERT INTO users(role_id, status_id, nisn, password, created_at, updated_at) VALUES('1','1','$nisn','$pass_hash', '$waktu', '$waktu');");
    }else{
      $dr -> status = 'nisn_in_use';
    }
    
}



//cek apakah nisn ada di data dapodik 
// $qCekNisn = $link -> query("SELECT id FROM dapodik_siswa WHERE nisn='$nisn';");
// $tNisn = mysqli_num_rows($qCekNisn);

// if($tNisn < 1){
//   $dr -> status = 'no_user';
// }else{
//   $link -> query("INSERT INTO users(role_id, status_id, nisn, password, created_at, updated_at) VALUES('1','1','nisn','$pass_hash', '$waktu', '$waktu');");
//   $dr -> status = 'success';
// }

// if($tNik < 1){
//   // cek apakah nisn ada di data dapodik 
//   $qCekNisn = $link -> query("SELECT id FROM dapodik_siswa WHERE nisn='$username';");
//   $tNisn = mysqli_num_rows($qCekNisn);
//   if($tNisn < 1){
//     $dr -> status = 'invalid_user';
//   }else{
//     // cek apakah ada nisn di tabel users 
//     $qCekUserNisn = $link -> query("SELECT id FROM users WHERE nisn='$username';");
//     $tUserNisn = mysqli_num_rows($qCekUserNisn);
//     if($tUserNisn < 1){
//       $dr -> status = 'valid_id';
//       $link -> query("INSERT INTO users VALUES('','1','1',null,'$username',null,null,null,'$pass_hash',null,null,null,null,null,null,null,null);");
//     }else{
//       $dr -> status = 'user_id_usage';
//     }
//   }
// }else{
//   // cek apakah nik ada di tabel users 
//   $qCekUserNik = $link -> query("SELECT id FROM users WHERE nik='$username';");
//   $tUserNik = mysqli_num_rows($qCekUserNik);
//   if($tUserNik < 1){
//     $dr -> status = 'valid_id';
//      $link -> query("INSERT INTO users(role_id, status_id, nik, password, created_at, updated_at) VALUES('1','1','$username','$pass_hash', '$waktu', '$waktu');");
//   }else{
//     $dr -> status = 'user_id_usage';
//   }
// }

// $dr -> status = 'sukses';
// $dr -> t = $tNik;

echo json_encode($dr);

?>