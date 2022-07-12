<?php
error_reporting('~E_NOTICE');
//koneksi
require('connection.php');
//identifikasi variabel

$kode_barang = $_POST['id'];
$jumlah_barang =$_POST['jumlah_barang'];
$keterangan =$_POST['keterangan'];
$tanggal_keluar = $_POST['tgl_keluar'];

$stok = mysql_query("select stok_min, id_barang, nama_barang, jumlah_barang from stok_barang where id_barang='$kode_barang'"); 
list($stok_min, $id_stok, $nama_stok, $jumlah_stok) = mysql_fetch_array($stok);

if(mysql_num_rows($stok)< 1) :
	echo "<script>alert('Data Barang Dengan ID $kode_barang Tidak Ada!'); window.history.go(-1);</script>";
	exit();
endif;

$total=($jumlah_stok-$jumlah_barang);
if ($total < $stok_min):
echo "<script>alert('Data Stok Tidak Cukup!'); window.history.go(-1);</script>";
exit();
endif;

$sql1=mysql_query("update stok_barang set jumlah_barang='$total', tanggal_keluar='$tanggal_keluar' where id_barang='$kode_barang'");
echo mysql_error();
$sql2=mysql_query("insert into barang_keluar set id_barang='$kode_barang', nama_barang='$nama_stok', jumlah_barang='$jumlah_barang', 	      	 keterangan='$keterangan', tanggal_keluar='$tanggal_keluar'");
echo mysql_error();

if($sql1):
	if($sql2):
	echo "<script>alert('Data Berhasil Disimpan!'); location.href='main.php?p=barangkeluar'</script>";
	else :
	echo "<script>alert('Data Gagal Disimpan!'); window.history.go(-1); </script>";
	endif;
else :
	echo "<script>alert('Gagal Disimpan!'); window.history.go(-1); </script>";
endif;


?>