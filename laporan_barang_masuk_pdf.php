<page backtop="1,3mm" backbottom="1,3mm" backleft="1,3mm" backright="1,3mm"> 
        <page_header>  
        </page_header> 
        <style type="text/css">
			*{
				margin: 0 auto;
				padding: 0px;
			}
			#body{
				font-size: 12px;
				width: 29.7cm;
			}
			table{
				border-collapse: collapse;
		  		border-spacing: 0;
		  		margin: 0px;
		  		word-wrap:break-word;
		  		width: 100%;
			}
			table th,td{
				padding: 2px 5px 2px 5px;
			}
			table th{
				font-weight: bold;
			}
			h5{
				margin-bottom: 10px;
			}
		</style>
		<div id="body">
		<?php
		require('connection.php');
		$bln = $_GET['bulan'];
		if($bln == '1'):
			$m = "Januari";
		elseif($bln == '2'):
			$m = "Februari";
		elseif($bln == '3'):
			$m = "Maret";
		elseif($bln == '4'):
			$m = "April";
		elseif($bln == '5'):
			$m = "Mei";
		elseif($bln == '6'):
			$m = "Juni";
		elseif($bln == '7'):
			$m = "Juli";
		elseif($bln == '8'):
			$m = "Agustus";
		elseif($bln == '9'):
			$m = "September";
		elseif($bln == '10'):
			$m = "Oktober";
		elseif($bln == '11'):
			$m = "November";
		elseif($bln == '12'):
			$m = "Desember";
		endif;
		?>
		<div>
		<h2 style="text-align:center;">LAPORAN BARANG MASUK <br> Per <?php echo $_GET['tanggal'];?> <?php echo $m;?> <?php echo $_GET['tahun'];?></h2>
		<h4 style="text-align:center;">PT Semen Baturaja (Persero)</h4>
		<h5 style="text-align:center;">Jl. Abikusno Cokrosuyoso</h5>
		</div>
		<table border="1">
		<thead>
        <tr>
          <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Jumlah Barang</th>
            <th>Ket.</th>
            <th>Tgl. Masuk</th>
        </tr>
      </thead>
      <tbody>
      <?php
        $tanggal = $_GET['tanggal'];
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];
        $table = "FROM barang_masuk";
        if(!empty($tanggal) AND !empty($bulan) AND !empty($tahun)){
          $statement = " WHERE DAY(tanggal_masuk) = '$tanggal' AND MONTH(tanggal_masuk) = '$bulan' AND YEAR(tanggal_masuk) = '$tahun'";
        }elseif(empty($tanggal) AND !empty($bulan) AND !empty($tahun)){
          $statement = " WHERE MONTH(tanggal_masuk) = '$bulan' AND YEAR(tanggal_masuk) = '$tahun'";
        }elseif(empty($tanggal) AND empty($bulan) AND !empty($tahun)){
          $statement = " WHERE YEAR(tanggal_masuk) = '$tahun'";
        }
        $sql = "SELECT * $table";
        if(!empty($tanggal) OR !empty($bulan) OR !empty($tahun)):
        $sql .= "".$statement."";
        endif;
        $sql .= " ORDER BY id_barang ASC";
        $query = mysql_query($sql);
        $i=1;
        if(mysql_num_rows($query) > 0):
        while($rows = mysql_fetch_array($query)):
            ?>
         <tr>
 	        <td><?php echo $i ?></td>
            <td><?php echo $rows['id_barang'];?></td>
            <td><?php echo $rows['nama_barang'];?></td>
            <td><?php echo $rows['jumlah_barang'];?></td>
            <td><?php echo $rows['keterangan'];?></td>
            <td><?php echo $rows['tanggal_masuk'];?></td>
        </tr>
         <?php
        $i++;
        endwhile;
        endif;
            ?>
      </tbody>
	</table>
	<br>
	<br>
	<table border="0">
		<?php
		$month = date('m');
		if($month == '01'):
			$bulan = "Januari";
		elseif($month == '02'):
			$bulan = "Februari";
		elseif($month == '03'):
			$bulan = "Maret";
		elseif($month == '04'):
			$bulan = "April";
		elseif($month == '05'):
			$bulan = "Mei";
		elseif($month == '06'):
			$bulan = "Juni";
		elseif($month == '07'):
			$bulan = "Juli";
		elseif($month == '08'):
			$bulan = "Agustus";
		elseif($month == '09'):
			$bulan = "September";
		elseif($month == '10'):
			$bulan = "Oktober";
		elseif($month == '11'):
			$bulan = "November";
		elseif($month == '12'):
			$bulan = "Desember";
		endif;
		?>
		<tr>
			<td style="width:420px;"></td>
			<td style="width:380px;"></td>
			<td>Palembang, <?php echo date('d')?> <?php echo $bulan?> <?php echo date('Y')?></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>Mengetahui,</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><strong>Pimpinan Kepala Gudang PTSB <br> Palembang</strong></td>
		</tr>
		<tr>
			<td><div style="width:100px;height:100px;"></div></td>
			<td><div style="width:100px;height:100px;"></div></td>
			<td><div style="width:100px;height:100px;"></div></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><strong>Feri Nugroho</strong></td>
		</tr>
	</table>
		</div>
        <page_footer> 
        </page_footer> 
 </page>