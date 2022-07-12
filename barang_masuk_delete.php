<?php
	include "connection.php";
	mysql_query ("delete from barang_masuk where id_barang='$_GET[id]'");
	header ("location:barang_masuk.php");
?>