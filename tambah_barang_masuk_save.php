<?php

//error_reporting('~E_NOTICE');
//koneksi
require('connection.php');
//identifikasi variabel

$kode_barang = $_POST['id'];
$jumlah_barang =$_POST['jumlah_barang'];
$keterangan 	=$_POST['keterangan'];
$tgl_masuk = $_POST['tgl_masuk'];

$stok = mysql_query("SELECT id_barang, nama_barang, tanggal_masuk, tanggal_keluar,ket,stok_awal,stok_masuk,stok_keluar,stok_akhir,stok_min FROM stok_barang WHERE id_barang = '$kode_barang'"); 
list($id_stok, $nama_stok, $jumlah_stok, $ket, $tanggal) = mysql_fetch_array($stok);

if(mysql_num_rows($stok)< 1) :
	echo "<script>alert('Data Barang Dengan ID $kode_barang Tidak Ada!'); window.history.go(-1);</script>";
	exit();
endif;

$total=$jumlah_stok+$jumlah_barang;

$sql1=mysql_query("update stok_barang set jumlah_barang='$total', tanggal_masuk='$tgl_masuk' where id_barang='$kode_barang'");
echo mysql_error();
$sql2=mysql_query("insert into barang_masuk set id_barang='$kode_barang', nama_barang='$nama_stok', jumlah_barang='$jumlah_barang', keterangan='$keterangan', tanggal_masuk='$tgl_masuk'");
echo mysql_error();
if($sql1):
	if($sql2):
	echo "<script>alert('Data Berhasil Disimpan'); location.href='main.php?p=barangmasuk'</script>";
	else :
	echo "<script>alert('Data Gagal Disimpan'); window.history.go(-1); </script>";
	endif;
else :
	echo "<script>alert('Data Gagal Disimpan'); window.history.go(-1); </script>";
endif;


?>