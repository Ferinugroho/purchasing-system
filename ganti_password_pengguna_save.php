<?php
//koneksi
require('connection.php');
//identifikasi variabel
$id_user = $_POST['id_user'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$new_password = $_POST['new_password'];
//validasi cek data kosong atau tidak
if(empty($id_user) or empty($password) or empty($confirm_password) or empty($new_password)):
	echo "<script>alert('Harap isi semua data.');location.href='main.php?p=gantipassword';</script>";
	exit();
endif;
$password = md5($password);
$confirm_password = md5($confirm_password);
$new_password = md5($new_password);
$sqlCek = "SELECT password FROM pengguna WHERE id = '$id_user'";
$queryCek = mysql_query($sqlCek);
list($old_password) = mysql_fetch_row($queryCek);
if($password != $confirm_password OR $confirm_password != $old_password OR $password != $old_password){
	echo "<script>alert('Password tidak valid.');location.href='main.php?p=gantipassword';</script>";
	exit();
}else{
	$sql_update = "UPDATE pengguna SET password='$new_password' WHERE id = '$id_user'";
	$query_update = mysql_query($sql_update);
	if($query_update){
		echo "<script>alert('Password telah diubah.');location.href='main.php?p=pengguna';</script>";
		exit();
	}else{
		echo "<script>alert('Password gagal diubah.');location.href='main.php?p=gantipassword';</script>";
		exit();
	}
}
?>