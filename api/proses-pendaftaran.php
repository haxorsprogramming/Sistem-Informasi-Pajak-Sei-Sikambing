<?php
session_start();
header("Access-Control-Allow-Origin: *");
include('db.php');

class data{}
$dr = new data();
$waktu = date("Y-m-d H:i:s");
// {'username':username, 'sekolah_id':sekolah_id, 'jalur_pendaftaran':jalur_pendaftaran, 'akreditas_sekolah_asal':akreditas_sekolah_asal}

$username = $_POST['username'];
$sekolah_id = $_POST['sekolah_id'];
$jalur_pendaftaran = $_POST['jalur_pendaftaran'];
$akreditas_sekolah_asal = $_POST['akreditas_sekolah_asal'];
$tanda_tangan = $_POST['tanda_tangan'];
$hp = $_POST['hp'];
// // // 'lat':lat,
// //             'long':long,
// //             'alamat':alamat,
$lat = $_POST['lat'];
$long = $_POST['long'];
$alamat = $_POST['alamat'];
//cari id berdasarkan nisn 
$qUser = $link -> query("SELECT id FROM users WHERE nisn='$username' LIMIT 0,1");
$fUser = $qUser -> fetch_assoc();
$user_id = $fUser['id'];
$link -> query("DELETE FROM ppdb_registrasi_step4 WHERE user_id='$user_id';");
$link -> query("INSERT INTO ppdb_registrasi_step4(user_id, lat, lng, alamat) VALUES('$user_id', '$lat','$long','$alamat');");
// //cari data tanggal lahir siswa 
$qDapodikSiswa = $link -> query("SELECT * FROM dapodik_siswa WHERE nisn='$username' LIMIT 0,1;");
$fDapodikSiswa = $qDapodikSiswa -> fetch_assoc();
$tanggal_lahir = $fDapodikSiswa['tanggal_lahir'];
// // 'data_kk' : data_kk,
// // //             'A_1' : A_1,
// // //             'A_2' : A_2
// // // $link -> query("INSERT INTO ppdb_registrasi(user_id, jalur_pendaftaran_id, bentuk_pendidikan_id, akreditasi_sekolah_sebelumnya) VALUES('$user_id', '$jalur_pendaftaran', '13','$akreditas_sekolah_asal')");
// // tanggal lahir kurang
if($sekolah_id == '' || $sekolah_id == null){
  
}else{
  $link -> query("DELETE FROM ppdb_registrasi WHERE user_id='$user_id';");
  $link -> query("INSERT INTO ppdb_registrasi(user_id, jalur_pendaftaran_id, bentuk_pendidikan_id, no_telp,tanggal_lahir, akreditasi_sekolah_sebelumnya, created_at) VALUES('$user_id', '$jalur_pendaftaran','3','$hp', '$tanggal_lahir','$akreditas_sekolah_asal', '$waktu');");
}

$link -> query("DELETE FROM ppdb_registrasi_step3 WHERE user_id='$user_id';");
$link -> query("INSERT INTO ppdb_registrasi_step3(user_id, asal_sekolah_id, tujuan_sekolah_id) VALUES('$user_id', '','$sekolah_id')");
// // insert data kk
$imgKk = $_POST['data_kk'];
$image_array_1 = explode(";", $imgKk);
$image_array_2 = explode(",", $image_array_1[1]);
$namaPic = "FOTO_KK_".$user_id.".jpg";
$data = base64_decode($image_array_2[1]);
file_put_contents('file_upload/kk/'.$namaPic, $data);
$link -> query("DELETE FROM ppdb_registrasi_step1 WHERE user_id='$user_id';");
$link -> query("INSERT INTO ppdb_registrasi_step1(user_id, kartu_keluarga) VALUES('$user_id', '$namaPic');");
// // die();
if($jalur_pendaftaran == '1'){
//     // upload afirmasi 
    $imgAf1 = $_POST['A_1'];
    $img_array_af1 = explode(";", $imgAf1);
    $img_array_af1 = explode(",", $img_array_af1[1]);
    $nama_pic_lamp = "DOC_A1_".$user_id.".jpg";
    $data_a1 = base64_decode($img_array_af1[1]);
    file_put_contents('file_upload/afirmasi/'.$nama_pic_lamp, $data_a1);
    $imgAf2 = $_POST['A_2'];
    $img_array_af2 = explode(";", $imgAf2);
    $img_array_af2 = explode(",", $img_array_af2[1]);
    $nama_pic_surat = "DOC_A2_".$user_id.".jpg";
    $data_a2 = base64_decode($img_array_af2[1]);
    file_put_contents('file_upload/afirmasi/'.$nama_pic_surat , $data_a2);
    $link -> query("DELETE FROM ppdb_registrasi_step2_affirmasi WHERE registrasi_step2_id='$user_id';");
    $link -> query("INSERT INTO ppdb_registrasi_step2_affirmasi(registrasi_step2_id, lampiran, surat_pernyataan) VALUES('$user_id','$nama_pic_lamp','$nama_pic_surat')");
}elseif($jalur_pendaftaran == '2'){
  // upload mutasi
    $imgAb1 = $_POST['B_1'];
    $img_array_ab1 = explode(";", $imgAb1);
    $img_array_ab1 = explode(",", $img_array_ab1[1]);
    $doc_b1 = "DOC_B1_".$user_id.".jpg";
    $data_a1 = base64_decode($img_array_ab1[1]);
    file_put_contents('file_upload/mutasi/'.$doc_b1, $data_a1);
    $imgAb2 = $_POST['B_2'];
    $img_array_ab2 = explode(";", $imgAb2);
    $img_array_ab2 = explode(",", $img_array_ab2[1]);
    $doc_b2 = "DOC_B2_".$user_id.".jpg";
    $data_a2 = base64_decode($img_array_ab2[1]);
    file_put_contents('file_upload/mutasi/'.$doc_b2, $data_a2);
    $link -> query("DELETE FROM ppdb_registrasi_step2_mutasi WHERE registrasi_step2_id='$user_id';");
    $link -> query("INSERT INTO ppdb_registrasi_step2_mutasi(registrasi_step2_id, surat_penugasan, surat_keterangan) VALUES('$user_id','$doc_b1','$doc_b2')");
}elseif($jalur_pendaftaran == '3'){
//   'st_1_1' : st_1_1, 'st_1_2' : st_1_2, 'st_1_3' : st_1_3, 'st_1_4' : st_1_4, 'st_1_5' : st_1_5, 'st_1_6' : st_1_6, 'st_1_7' : st_1_7, 'C_1' : C_1,
  $st_1_1 = $_POST['st_1_1'];
  $st_1_2 = $_POST['st_1_2'];
  $st_1_3 = $_POST['st_1_3'];
  $st_1_4 = $_POST['st_1_4'];
  $st_1_5 = $_POST['st_1_5'];
  $st_1_6 = $_POST['st_1_6'];
  $st_1_7 = $_POST['st_1_7'];
  $c_1 = $_POST['C_1'];

  $link -> query("INSERT INTO ppdb_registrasi_step2_prestasi(registrasi_step2_id, semester, mata_pelajaran, nilai) VALUES('$user_id', '1','Pendidikan Agama','$st_1_1');");
  $link -> query("INSERT INTO ppdb_registrasi_step2_prestasi(registrasi_step2_id, semester, mata_pelajaran, nilai) VALUES('$user_id', '1','PPKN','$st_1_2');");
  $link -> query("INSERT INTO ppdb_registrasi_step2_prestasi(registrasi_step2_id, semester, mata_pelajaran, nilai) VALUES('$user_id', '1','Bahasa Indonesia','$st_1_3');");
  $link -> query("INSERT INTO ppdb_registrasi_step2_prestasi(registrasi_step2_id, semester, mata_pelajaran, nilai) VALUES('$user_id', '1','Matematika','$st_1_4');");
  $link -> query("INSERT INTO ppdb_registrasi_step2_prestasi(registrasi_step2_id, semester, mata_pelajaran, nilai) VALUES('$user_id', '1','IPA','$st_1_5');");
  $link -> query("INSERT INTO ppdb_registrasi_step2_prestasi(registrasi_step2_id, semester, mata_pelajaran, nilai) VALUES('$user_id', '1','IPS','$st_1_6');");
  $link -> query("INSERT INTO ppdb_registrasi_step2_prestasi(registrasi_step2_id, semester, mata_pelajaran, nilai) VALUES('$user_id', '1','Bahasa Inggris','$st_1_7');");
  $data_rapor_c1 = $_POST['C_1'];
  $img_ar_r_c1 = explode(";", $data_rapor_c1);
  $img_ar2_r_c1 = explode(",", $img_ar_r_c1 [1]);
  $namaPic = "RAPOR_S_1_".$user_id.".jpg";
  $data = base64_decode($img_ar2_r_c1[1]);
  file_put_contents('file_upload/rapor/'.$namaPic, $data);
  
  $st_2_1 = $_POST['st_2_1'];
  $st_2_2 = $_POST['st_2_2'];
  $st_2_3 = $_POST['st_2_3'];
  $st_2_4 = $_POST['st_2_4'];
  $st_2_5 = $_POST['st_2_5'];
  $st_2_6 = $_POST['st_2_6'];
  $st_2_7 = $_POST['st_2_7'];
  $c_2 = $_POST['C_2'];
  
  $link -> query("INSERT INTO ppdb_registrasi_step2_prestasi(registrasi_step2_id, semester, mata_pelajaran, nilai) VALUES('$user_id', '2','Pendidikan Agama','$st_2_1');");
  $link -> query("INSERT INTO ppdb_registrasi_step2_prestasi(registrasi_step2_id, semester, mata_pelajaran, nilai) VALUES('$user_id', '2','PPKN','$st_2_2');");
  $link -> query("INSERT INTO ppdb_registrasi_step2_prestasi(registrasi_step2_id, semester, mata_pelajaran, nilai) VALUES('$user_id', '2','Bahasa Indonesia','$st_2_3');");
  $link -> query("INSERT INTO ppdb_registrasi_step2_prestasi(registrasi_step2_id, semester, mata_pelajaran, nilai) VALUES('$user_id', '2','Matematika','$st_2_4');");
  $link -> query("INSERT INTO ppdb_registrasi_step2_prestasi(registrasi_step2_id, semester, mata_pelajaran, nilai) VALUES('$user_id', '2','IPA','$st_2_5');");
  $link -> query("INSERT INTO ppdb_registrasi_step2_prestasi(registrasi_step2_id, semester, mata_pelajaran, nilai) VALUES('$user_id', '2','IPS','$st_2_6');");
  $link -> query("INSERT INTO ppdb_registrasi_step2_prestasi(registrasi_step2_id, semester, mata_pelajaran, nilai) VALUES('$user_id', '2','Bahasa Inggris','$st_2_7');");
  $data_rapor_c2 = $_POST['C_2'];
  $img_ar_r_c2 = explode(";", $data_rapor_c2);
  $img_ar2_r_c2 = explode(",", $img_ar_r_c2 [1]);
  $namaPic = "RAPOR_S_2_".$user_id.".jpg";
  $data = base64_decode($img_ar2_r_c2[1]);
  file_put_contents('file_upload/rapor/'.$namaPic, $data);
  
  $st_3_1 = $_POST['st_3_1'];
  $st_3_2 = $_POST['st_3_2'];
  $st_3_3 = $_POST['st_3_3'];
  $st_3_4 = $_POST['st_3_4'];
  $st_3_5 = $_POST['st_3_5'];
  $st_3_6 = $_POST['st_3_6'];
  $st_3_7 = $_POST['st_3_7'];
  $c_3 = $_POST['C_3'];
  
   
  $link -> query("INSERT INTO ppdb_registrasi_step2_prestasi(registrasi_step2_id, semester, mata_pelajaran, nilai) VALUES('$user_id', '3','Pendidikan Agama','$st_3_1');");
  $link -> query("INSERT INTO ppdb_registrasi_step2_prestasi(registrasi_step2_id, semester, mata_pelajaran, nilai) VALUES('$user_id', '3','PPKN','$st_3_2');");
  $link -> query("INSERT INTO ppdb_registrasi_step2_prestasi(registrasi_step2_id, semester, mata_pelajaran, nilai) VALUES('$user_id', '3','Bahasa Indonesia','$st_3_3');");
  $link -> query("INSERT INTO ppdb_registrasi_step2_prestasi(registrasi_step2_id, semester, mata_pelajaran, nilai) VALUES('$user_id', '3','Matematika','$st_3_4');");
  $link -> query("INSERT INTO ppdb_registrasi_step2_prestasi(registrasi_step2_id, semester, mata_pelajaran, nilai) VALUES('$user_id', '3','IPA','$st_3_5');");
  $link -> query("INSERT INTO ppdb_registrasi_step2_prestasi(registrasi_step2_id, semester, mata_pelajaran, nilai) VALUES('$user_id', '3','IPS','$st_3_6');");
  $link -> query("INSERT INTO ppdb_registrasi_step2_prestasi(registrasi_step2_id, semester, mata_pelajaran, nilai) VALUES('$user_id', '3','Bahasa Inggris','$st_3_7');");
  $data_rapor_c3 = $_POST['C_3'];
  $img_ar_r_c3 = explode(";", $data_rapor_c3);
  $img_ar2_r_c3 = explode(",", $img_ar_r_c3 [1]);
  $namaPic = "RAPOR_S_3_".$user_id.".jpg";
  $data = base64_decode($img_ar2_r_c3[1]);
  file_put_contents('file_upload/rapor/'.$namaPic, $data);
  
  
  $st_4_1 = $_POST['st_4_1'];
  $st_4_2 = $_POST['st_4_2'];
  $st_4_3 = $_POST['st_4_3'];
  $st_4_4 = $_POST['st_4_4'];
  $st_4_5 = $_POST['st_4_5'];
  $st_4_6 = $_POST['st_4_6'];
  $st_4_7 = $_POST['st_4_7'];
  $c_4 = $_POST['C_4'];
  
  $link -> query("INSERT INTO ppdb_registrasi_step2_prestasi(registrasi_step2_id, semester, mata_pelajaran, nilai) VALUES('$user_id', '4','Pendidikan Agama','$st_4_1');");
  $link -> query("INSERT INTO ppdb_registrasi_step2_prestasi(registrasi_step2_id, semester, mata_pelajaran, nilai) VALUES('$user_id', '4','PPKN','$st_4_2');");
  $link -> query("INSERT INTO ppdb_registrasi_step2_prestasi(registrasi_step2_id, semester, mata_pelajaran, nilai) VALUES('$user_id', '4','Bahasa Indonesia','$st_4_3');");
  $link -> query("INSERT INTO ppdb_registrasi_step2_prestasi(registrasi_step2_id, semester, mata_pelajaran, nilai) VALUES('$user_id', '4','Matematika','$st_4_4');");
  $link -> query("INSERT INTO ppdb_registrasi_step2_prestasi(registrasi_step2_id, semester, mata_pelajaran, nilai) VALUES('$user_id', '4','IPA','$st_4_5');");
  $link -> query("INSERT INTO ppdb_registrasi_step2_prestasi(registrasi_step2_id, semester, mata_pelajaran, nilai) VALUES('$user_id', '4','IPS','$st_4_6');");
  $link -> query("INSERT INTO ppdb_registrasi_step2_prestasi(registrasi_step2_id, semester, mata_pelajaran, nilai) VALUES('$user_id', '4','Bahasa Inggris','$st_4_7');");
  $data_rapor_c4 = $_POST['C_4'];
  $img_ar_r_c4 = explode(";", $data_rapor_c4);
  $img_ar2_r_c4 = explode(",", $img_ar_r_c4 [1]);
  $namaPic = "RAPOR_S_4_".$user_id.".jpg";
  $data = base64_decode($img_ar2_r_c4[1]);
  file_put_contents('file_upload/rapor/'.$namaPic, $data);
  
  $st_5_1 = $_POST['st_5_1'];
  $st_5_2 = $_POST['st_5_2'];
  $st_5_3 = $_POST['st_5_3'];
  $st_5_4 = $_POST['st_5_4'];
  $st_5_5 = $_POST['st_5_5'];
  $st_5_6 = $_POST['st_5_6'];
  $st_5_7 = $_POST['st_5_7'];
  $c_5 = $_POST['C_5'];
  
  $link -> query("INSERT INTO ppdb_registrasi_step2_prestasi(registrasi_step2_id, semester, mata_pelajaran, nilai) VALUES('$user_id', '5','Pendidikan Agama','$st_5_1');");
  $link -> query("INSERT INTO ppdb_registrasi_step2_prestasi(registrasi_step2_id, semester, mata_pelajaran, nilai) VALUES('$user_id', '5','PPKN','$st_5_2');");
  $link -> query("INSERT INTO ppdb_registrasi_step2_prestasi(registrasi_step2_id, semester, mata_pelajaran, nilai) VALUES('$user_id', '5','Bahasa Indonesia','$st_5_3');");
  $link -> query("INSERT INTO ppdb_registrasi_step2_prestasi(registrasi_step2_id, semester, mata_pelajaran, nilai) VALUES('$user_id', '5','Matematika','$st_5_4');");
  $link -> query("INSERT INTO ppdb_registrasi_step2_prestasi(registrasi_step2_id, semester, mata_pelajaran, nilai) VALUES('$user_id', '5','IPA','$st_5_5');");
  $link -> query("INSERT INTO ppdb_registrasi_step2_prestasi(registrasi_step2_id, semester, mata_pelajaran, nilai) VALUES('$user_id', '5','IPS','$st_5_6');");
  $link -> query("INSERT INTO ppdb_registrasi_step2_prestasi(registrasi_step2_id, semester, mata_pelajaran, nilai) VALUES('$user_id', '5','Bahasa Inggris','$st_5_7');");
  $data_rapor_c5 = $_POST['C_5'];
  $img_ar_r_c5 = explode(";", $data_rapor_c5);
  $img_ar2_r_c5= explode(",", $img_ar_r_c5 [1]);
  $namaPic = "RAPOR_S_5_".$user_id.".jpg";
  $data = base64_decode($img_ar2_r_c5[1]);
  file_put_contents('file_upload/rapor/'.$namaPic, $data);
  
}elseif($jalur_pendaftaran == '4'){

  $d1 = $_POST['D_1'];
  $image_array_1 = explode(";", $d1);
  $image_array_2 = explode(",", $image_array_1[1]);
  $namaPicD1 = "D_1_".$user_id.".jpg";
  $data = base64_decode($image_array_2[1]);
  file_put_contents('file_upload/sertifikat/'.$namaPicD1, $data);
  
  $d2 = $_POST['D_2'];
  $image_array_1 = explode(";", $d2);
  $image_array_2 = explode(",", $image_array_1[1]);
   $namaPicD2 = "D_2_".$user_id.".jpg";
  $data = base64_decode($image_array_2[1]);
  file_put_contents('file_upload/sertifikat/'.$namaPicD2, $data);
  $link -> query("DELETE FROM ppdb_registrasi_step2_prestasi_non_akademik WHERE registrasi_step2_id='$user_id';");
  $link -> query("INSERT INTO ppdb_registrasi_step2_prestasi_non_akademik(registrasi_step2_id, sertifikat, surat_keterangan) VALUES('$user_id','$namaPicD1','$namaPicD2');");
  
}elseif($jalur_pendaftaran == '5'){
  $E_1 = $_POST['E_1'];
  $image_array_1 = explode(";", $E_1);
  $image_array_2 = explode(",", $image_array_1[1]);
  $namaPicD1 = "E_1_".$user_id.".jpg";
  $data = base64_decode($image_array_2[1]);
  file_put_contents('file_upload/zonasi/'.$namaPicD1, $data);
  $namaPic = "FOTO_KK_".$user_id.".jpg";
  $link -> query("DELETE FROM ppdb_registrasi_step2_zonasi WHERE registrasi_step2_id='$user_id';");
  $link -> query("INSERT INTO ppdb_registrasi_step2_zonasi(registrasi_step2_id, kk_lama, surat_keterangan) VALUES('$user_id', '$namaPic','$namaPicD1');");
}


// // // ppdb_registrasi_step_3
// 
// // // ppdb registrasi step 4

// // // ppdb registrasi step 5 
// $nama_ttd = "TTD_".$user_id.".jpg";
$link -> query("DELETE FROM ppdb_registrasi_step5 WHERE user_id='$user_id';");
$link -> query("INSERT INTO ppdb_registrasi_step5(user_id, tanda_tangan, tos) VALUES('$user_id','$nama_ttd','yes');");
$dr -> status = 'sukses';
echo json_encode($dr);
?>