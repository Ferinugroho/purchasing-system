<?php
error_reporting('~E_NOTICE');
//koneksi
require('connection.php');
require ('check_session.php');
//identifikasi variabel
$id_user = $_POST['id_user'];
$nama = $_POST['nama'];
$username = $_POST['username'];

//validasi cek data kosong atau tidak
if(empty($nama) or empty($username)):
	echo "<script>alert('Harap isi semua data.');location.href='main.php?p=profil';</script>";
	exit();
endif;
//cek apakah stok barang sudah pernah ada
$sql_save = "UPDATE pengguna SET nama_pengguna='$nama',username='$username' WHERE id_pengguna='$id_user'";
$query_save = mysql_query($sql_save);
if($query_save){
	echo "<script>alert('Data pengguna berhasil diubah.');location.href='main.php?p=dashboard';</script>";
		exit();
}else{
	echo "<script>alert('Data pengguna gagal diubah.');location.href='main.php?p=profil';</script>";
	exit();
}
?>