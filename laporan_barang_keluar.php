<?php
	require('connection.php');
  require('function.php');
?>
<h3><i class="fa fa-file"></i> LAPORAN BARANG KELUAR</h3>
<br>
<div class="row">
  <div class="col-xs-6 col-md-12">
    <form class="form-inline" method="get">
      <input type="hidden" name="p" value="<?php echo $_GET['p'];?>">
      <div class="form-group">
          <label for="keyword">Saring :</label>
          <select class="form-control" name="tanggal" id="tanggal">
            <option value="">[Pilih Tanggal]</option>
            <?php
            $sql_tgl = "SELECT DISTINCT DAY(tanggal_keluar) AS tanggal FROM barang_keluar";
            $query_tgl = mysql_query($sql_tgl); 
            while($tgl = mysql_fetch_array($query_tgl)):?>
            <option value="<?php echo $tgl['tanggal']?>"><?php echo $tgl['tanggal']?></option>
            <?php endwhile;?>
          </select>
      </div>
      <div class="form-group">
          <select class="form-control" name="bulan" id="bulan">
            <option value="">[Pilih Bulan]</option>
             <?php
             $sql_bln = "SELECT DISTINCT MONTH(tanggal_keluar) AS bulan FROM barang_keluar";
             $query_bln = mysql_query($sql_bln); 
             while($bln = mysql_fetch_array($query_bln)):?>
            <option value="<?php echo $bln['bulan']?>"><?php echo $bln['bulan']?></option>
            <?php endwhile;?>
          </select>
      </div>
      <div class="form-group">
          <select class="form-control" name="tahun" id="tahun">
            <option value="">[Pilih Tahun]</option>
             <?php
             $sql_thn = "SELECT DISTINCT YEAR(tanggal_keluar) AS tahun FROM barang_keluar";
             $query_thn = mysql_query($sql_thn); 
             while($thn = mysql_fetch_array($query_thn)):?>
            <option value="<?php echo $thn['tahun']?>"><?php echo $thn['tahun']?></option>
            <?php endwhile;?>
          </select>
      </div>
      <button type="submit" class="btn btn-success"><i class="fa fa-filter"></i> Saring</button>
      <a href="main.php?p=laporan"><button type="button" class="btn btn-warning"><i class="fa fa-refresh"></i> Tampilkan Semua</button></a>
      <a href="laporan_cetak_barang_keluar.php?tanggal=<?php echo $_GET['tanggal'];?>&bulan=<?php echo $_GET['bulan'];?>&tahun=<?php echo $_GET['tahun'];?>" target="_blank"><button type="button" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</button></a>
    </form>
  </div>
</div>
<br>
<div class="row">
  <div class="col-xs-6 col-md-12">
    <table class="table table-bordered">
      <thead>
         <tr>
          <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Jumlah Barang</th>
            <th>Ket.</th>
            <th>Tgl. Keluar</th>
        </tr>
      </thead>
      <tbody>
      <?php
        $tanggal = $_GET['tanggal'];
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];
        $page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
        if ($page <= 0) $page = 1;
        $per_page = 5; // Set how many records do you want to display per page. 
        $startpoint = ($page * $per_page) - $per_page;
        $table = "FROM barang_keluar";
        if(!empty($tanggal) AND !empty($bulan) AND !empty($tahun)){
          $statement = " WHERE DAY(tanggal_keluar) = '$tanggal' AND MONTH(tanggal_keluar) = '$bulan' AND YEAR(tanggal_keluar) = '$tahun'";
        }elseif(empty($tanggal) AND !empty($bulan) AND !empty($tahun)){
          $statement = " WHERE MONTH(tanggal_keluar) = '$bulan' AND YEAR(tanggal_keluar) = '$tahun'";
        }elseif(empty($tanggal) AND empty($bulan) AND !empty($tahun)){
          $statement = " WHERE YEAR(tanggal_keluar) = '$tahun'";
        }
        $sql = "SELECT * $table";
        if(!empty($tanggal) OR !empty($bulan) OR !empty($tahun)):
        $sql .= "".$statement."";
        endif;
        $sql .= " ORDER BY id_barang ASC";
        $sql .= " LIMIT $startpoint, $per_page";
        $query = mysql_query($sql);
        if(empty($_GET['page']) OR $_GET['page'] == 1){
          $i = 1;
        }
        else{
          $prevPage = (int)$_GET['page']-1;
          $i = $prevPage*$per_page+1;
        }
        if(mysql_num_rows($query) > 0):
        while($rows = mysql_fetch_array($query)):
            ?>
         <tr>
          	<td><?php echo $i ?></td>
            <td><?php echo $rows['id_barang'];?></td>
            <td><?php echo $rows['nama_barang'];?></td>
            <td><?php echo $rows['jumlah_barang'];?></td>
            <td><?php echo $rows['keterangan'];?></td>
            <td><?php echo $rows['tanggal_keluar'];?></td>
        </tr>
         <?php
        $i++;
        endwhile;
        else:
          echo "<h4>Data stok barang tidak ada.</h4>";
        endif;
            ?>
      </tbody>
    </table>
    <?php
    echo pagination($table,$statement,$per_page,$page,$url='?p='.$_GET['p'].'&');
    ?>
  </div>
</div>