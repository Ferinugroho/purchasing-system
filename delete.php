<?php
include "connection.php";
$sql = "DELETE FROM barang_masuk WHERE id_barang = '".$_GET['id']."'";
$hapus = mysql_query($sql);
if ($sql){
echo "<script>alert('Data Berhasil di Hapus'); window.location = 'index.php';</script>";
} else {
echo "<script>alert('Gagal di Hapus'); window.location = 'index.php';</script>";
}
?>
