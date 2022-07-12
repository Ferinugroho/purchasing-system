<?php

error_reporting('~E_NOTICE');
//koneksi
require('connection.php');
//identifikasi variabel

$kodeid = $_GET['id'];
$kode_barang = $_POST['id_barang'];
$nama_barang = $_POST['nama_barang'];
$jumlah_barang =$_POST['jumlah_barang'];
$keterangan = $_POST['keterangan'];
$tanggal_pemesanan = $_POST['tgl_pemesanan'];
$status = $_POST['status'];

$stok = mysql_query("select id_barang, nama_barang, jumlah_barang from order_barang where id_barang='$kode_barang'"); 
list($id_stok, $nama_stok, $jumlah_stok) = mysql_fetch_array($stok);

$sql1=mysql_query("update order_barang set nama_barang='$nama_barang', jumlah_barang='$jumlah_barang',keterangan='$keterangan', tanggal_pemesanan='$tanggal_pemesanan', status='$status' where id='$kodeid'");
echo mysql_error();

if($sql1):
	echo "<script>alert('Order Request Barang Disimpan'); location.href='main.php?p=orderrequest'</script>";
	else :
	echo "<script>alert('Order Request Barang Gagal Disimpan'); window.history.go(-1); </script>";
endif;


?>