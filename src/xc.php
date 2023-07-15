<?php
function user(){
$users = tampil_users();
$asu = '';
foreach($users as $user){
$asu .= "/id ".$user['id']." Voucher = ".$user['username']." - ".tampil_group_by($user['username'])."\n";
}
return $asu."Buat Voucher /buat spasi jenis Voucher contoh /buat Unlimited /buat 3Mbps";
}

function login(){
$users = tampil_login_log();
$asu = '';
foreach($users as $user){
$asu .= $user['username']." ".$user['reply'].
" ".$user['authdate']."\n";
}
return $asu;
}

function buat($grup){
$error = null;
  $username = acak(6);
  $password = "543912";
  $groupname = $grup;
  $run = tambah_user($username,$password,$groupname);
  if($run){
    $error = "Success buat kode voucher ".$username;
  }else{
    $error = "Tidak dapat menambahkan user";
  }
return $error;
}
?>