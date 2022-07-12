<?php

error_reporting('~E_NOTICE');
//koneksi
require('connection.php');
//identifikasi variabel

$kode_barang = $_POST['id'];
$nama_barang = $_POST['nama_barang'];
$jumlah_barang =$_POST['jumlah_barang'];
$keterangan = $_POST['keterangan'];
$tanggal_pesan = $_POST['tgl_pemesanan'];
$status = $_POST['status'];

$stok = mysql_query("select id_barang, nama_barang, jumlah_barang from stok_barang where id_barang='$kode_barang'"); 
list($id_stok, $nama_stok, $jumlah_stok) = mysql_fetch_array($stok);

if(mysql_num_rows($stok)< 1) :
	echo "<script>alert('Data Barang Dengan ID $kode_barang Tidak Ada!'); window.history.go(-1);</script>";
	exit();
endif;

$sql1=mysql_query("insert into order_barang set id_barang='$kode_barang', nama_barang='$nama_stok', jumlah_barang='$jumlah_barang',keterangan='$keterangan', tanggal_pemesanan='$tanggal_pesan', status='$status'");


if($sql1):
	echo "<script>alert('Order Request Barang Disimpan'); location.href='main.php?p=orderrequest'</script>";
	else :
	echo "<script>alert('Order Request Barang Gagal Disimpan'); window.history.go(-1); </script>";
endif;


?>