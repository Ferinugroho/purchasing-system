<?php
//koneksi : mysql_connect('server','username','password')
//username dan password phpmyadmin atau mysql
mysql_connect('localhost','root','') or die('Tidak terkoneksi ke server.');
//pilih database : mysql_select_db('nama_database')
mysql_select_db('semen') or die('Database tidak ditemukan.');
?>