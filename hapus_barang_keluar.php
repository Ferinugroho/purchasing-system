<?php
$id=$_GET['id'];
require "connection.php";
$query=mysql_query("delete from barang_keluar where id = '$id'");
echo mysql_error();

if($query):
	echo "<script>alert('Data berhasil dihapus!'); location.href='main.php?p=barangkeluar';</script>";
else :
	echo "<script>alert('Data gagal dihapus!'); window.history.go(-1);</script>";
endif;
?>