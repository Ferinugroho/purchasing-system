<?php
	include "check_session.php";
	require('connection.php');
	error_reporting('~E_NOTICE');
	$page = $_GET['p'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Stok Bahan Baku</title>
<link rel="stylesheet" href="css/bootstrap.css" />
<link rel="stylesheet" href="css/font-awesome.css" />
<link rel="stylesheet" href="css/zebra-bootstrap.css" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/jquery.autocomplete.css" />
<link rel="stylesheet" href="css/style2.css" />
<link rel="shortcut icon" href="login/images/logoptsb.png" />
<link rel="stylesheet" href="css/slide.css" />
<link rel="stylesheet" href="css/tombol_laporan.css" />

</head>

<body>


<div class="container-fluid">
    	<div class="row">
        	<div class="col-xs-6 col-md-12" id="header">
            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="http://semenbaturaja.co.id/">
                    <div class="row">
                      <div class="col-xs-6 col-md-12"><i class="fa fa-cube"></i> <span style="color:#FFFFFF;">PT SEMEN BATURAJA (PERSERO) Tbk</span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-6 col-md-12"><span style="font-size:12px;">Stok Bahan Baku</span></div>
                    </div>
                  </a>
                </div>

<div>
	
</div>


<!--------------- Nav Barnya ------------------>
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                 <?php
	include "connection.php";
	$cekuser=mysql_query("select id_pengguna, nama_pengguna from pengguna where id_pengguna='$no_id' or username='$sesi'");			 
	$baris=mysql_fetch_array($cekuser);
				 ?>
                  <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Halo, <i class="fa fa-user"></i>&nbsp;<?php 			      					echo $baris['nama_pengguna'];?>&nbsp;<span class="caret"></span></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="main.php?p=profil&id=<?php echo $baris['id_pengguna']; ?>"><i class="fa fa-user"></i> Profil</a></li>
                        <li><a href="main.php?p=gantipassword&id=<?php echo $baris['id_pengguna']; ?>"><i class="fa fa-lock"></i> Ganti Password</a></li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-power-off"></i> Sign Out</a></li>
                      </ul>
                    </li>
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav>
            </div>
        </div>

        <div class="row">
        	<div class="col-xs-6 col-md-2" id="sidebar">
            	<ul class="nav nav-pills nav-stacked">
                  <li role="presentation" <?php if($page == '') echo 'class="active"';?>><a href="main.php"><i class="fa fa-dashboard"></i> 
                  Dashboard</a></li>
	<?php
	if($level=='admin'){ 
	?> 
                  <li role="presentation" <?php if($page == 'stokbarang') echo 'class="active"';?>><a href="main.php?p=stokbarang">
                  <i class="fa fa-cubes"></i> Stok Barang</a></li>
                  <li role="presentation"  <?php if($page == 'barangmasuk') echo 'class="active"';?>><a href="main.php?p=barangmasuk">
                  <i class="fa fa-arrow-right"></i> Barang Masuk</a></li>                     
                  <li role="presentation"  <?php if($page == 'barangkeluar') echo 'class="active"';?>><a href="main.php?p=barangkeluar">
                  <i class="fa fa-arrow-left"></i> Barang Keluar</a></li>
                  <li role="presentation"  <?php if($page == 'pengguna') echo 'class="active"';?>><a href="main.php?p=pengguna">
                  <i class="fa fa-users"></i> Pengguna</a></li>
                  <li role="presentation"  <?php if($page == 'orderrequest') echo 'class="active"';?>><a href="main.php?p=orderrequest">
                  <i class="fa fa-paper-plane"></i> Order Request</a></li>
                  <li role="presentation"  <?php if($page == 'permintaan') echo 'class="active"';?>><a href="main.php?p=permintaan">
                  <i class="fa fa-list-alt"></i> Permintaan</a></li>
                  <li role="presentation"  <?php if($page == 'laporan') echo 'class="active"';?>><a href="main.php?p=laporan">
                  <i class="fa fa-clipboard"></i> Laporan</a></li>
	<?php
	}
    if($level=='pengadaan'){ 
    ?> 
                  <li role="presentation"  <?php if($page == 'orderrequest') echo 'class="active"';?>><a href="main.php?p=orderrequest">
                  <i class="fa fa-paper-plane"></i> Order Request</a></li>
     <?php } 
    if($level=='pabrik'){ 
    ?> 
     
                  <li role="presentation"  <?php if($page == 'permintaan') echo 'class="active"';?>><a href="main.php?p=permintaan">
                  <i class="fa fa-list-alt"></i> Permintaan</a></li>
	<?php }
    if($level=='kepala'){ 
    ?> 
                  <li role="presentation"  <?php if($page == 'laporan') echo 'class="active"';?>><a href="main.php?p=laporan">
                  <i class="fa fa-clipboard"></i> Laporan</a></li>
     <?php } ?>
                </ul>
            </div>

 <div class="col-xs-6 col-md-10" id="content">
            	<?php
				if($page == ''):
					include('dashboard.php');
				elseif($page == 'stokbarang'):
					include('stok_barang.php');
				elseif($page == 'barangmasuk'):
				  	include('barang_masuk.php');
				elseif($page == 'tambah-barangmasuk'):
				  include('tambah_barang_masuk.php');
				elseif($page == 'barangkeluar'):
				  include('barang_keluar.php');
				elseif($page == 'tambah-barangkeluar'):
				  include('tambah_barang_keluar.php');
				elseif($page == 'orderrequest'):
				  include('order_request.php'); 
				elseif($page == 'tambah-orderrequest'):
				  include('tambah_order_request.php');
				elseif($page == 'edit_order_request'):
				  include('edit_order_request.php');
				elseif($page == 'pengguna'):
				  include('pengguna.php');
				elseif($page == 'tambah-pengguna'):
				  include('tambah_pengguna.php');
				elseif($page == 'ubah-pengguna'):
				  include('ubah_pengguna.php');
				elseif($page == 'permintaan'):
				  include('permintaan_bahan_baku.php');
				elseif($page == 'tambah-permintaan'):
				  include('tambah_permintaan.php');
				elseif($page == 'edit_permintaan'):
				  include('edit_permintaan.php');
				elseif($page == 'laporan'):
				  include('laporan.php');
				elseif($page == 'laporanstokbarang'):
				  include('laporan_stok_barang.php');
				elseif($page == 'laporanbarangmasuk'):
				  include('laporan_barang_masuk.php');
				elseif($page == 'laporanbarangkeluar'):
				  include('laporan_barang_keluar.php');
				elseif($page == 'laporanorderrequest'):
				  include('laporan_order_request.php');
				elseif($page == 'laporanpermintaan'):
				  include('laporan_permintaan.php');
				elseif($page == 'profil'):
				  include('ubah_pengguna.php');
				elseif($page == 'gantipassword'):
				  include('ganti_password_pengguna.php');
				  else : include ('dashboard.php');
				endif;
                ?>
            </div>

<!--------------Footer ---------------------->
	<div class="row">
        	<div class="footer col-xs-6 col-md-12" id="footer">
            <div class="pull-left">DP & FN</div>
            <div class="pull-right">
                <img src="img/tuvnord1401.png" />
                <img src="img/tuvnord1801.png" />
                <img src="img/tuvnord9001.png" />
                <img src="img/smk3.png" />
                <img src="img/sni.png" />

            </div>
        </div>

 <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/zebra_datepicker.js"></script>
    <script src="js/highcharts.js" type="text/javascript"></script>
    <script src="js/jquery.highchartTable-min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/slide.js"></script>
</body>
</html>