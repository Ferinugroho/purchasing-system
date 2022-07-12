<?php
//koneksi
require('connection.php');
//identifikasi variabel
$nama = $_POST['nama'];
$username = $_POST['username'];
$pass = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$level = $_POST['level'];
//validasi cek data kosong atau tidak
if(empty($nama) or empty($username) or empty($pass) or empty($confirm_password) or empty($level)):
	echo "<script>alert('Harap isi semua data.');location.href='main.php?p=tambah-pengguna';</script>";
	exit();
endif;
if($confirm_password != $pass):
	echo "<script>alert('Konfirmasi password anda tidak sama.');location.href='main.php?p=tambah-pengguna';</script>";
	exit();
endif;
$password = md5($pass);
//cek apakah stok barang sudah pernah ada
$sql_save = "INSERT INTO pengguna SET nama_pengguna='$nama',username='$username',password='$password',level='$level'";
$query_save = mysql_query($sql_save);
if($query_save){
	echo "<script>alert('Data pengguna berhasil disimpan.');location.href='main.php?p=pengguna';</script>";
		exit();
}else{
	echo "<script>alert('Data pengguna gagal disimpan.');location.href='main.php?p=tambah-pengguna';</script>";
	mysql_error();
	exit();
}
?>