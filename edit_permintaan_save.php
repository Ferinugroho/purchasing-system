<?php

error_reporting('~E_NOTICE');
//koneksi
require('connection.php');
//identifikasi variabel
$id = $_GET['id'];
$kode_barang = $_POST['id_barang'];
$nama_barang = $_POST['nama_barang'];
$jumlah_barang =$_POST['jumlah_barang'];
$keterangan = $_POST['keterangan'];
$tgl_permintaan = $_POST['tgl_permintaan'];

$stok = mysql_query("select id_barang, nama_barang, jumlah_barang from permintaan where id_barang='$kode_barang'"); 
list($id_stok, $nama_stok, $jumlah_stok) = mysql_fetch_array($stok);

if(mysql_num_rows($stok)< 1) :
	echo "<script>alert('Data Barang Dengan ID $kode_barang Tidak Ada!'); window.history.go(-1);</script>";
	exit();
endif;

$sql1=mysql_query("update permintaan set nama_barang='$nama_stok', jumlah_barang='$jumlah_barang', keterangan='$keterangan', tgl_permintaan='$tgl_permintaan' where id_barang='$kode_barang' and id='$id'");
echo mysql_error();

if($sql1):
	echo "<script>alert('Request Permintaan Barang Disimpan'); location.href='main.php?p=permintaan'</script>";
	else :
	echo "<script>alert('Request Permintaan Barang Gagal Disimpan'); window.history.go(-1); </script>";
endif;


?>