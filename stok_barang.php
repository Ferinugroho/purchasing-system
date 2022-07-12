<?php
	require('connection.php');
  require('function.php');
?>
<h3><i class="fa fa-cubes"></i> STOK BARANG</h3>
<br>
<div class="row">
  <div class="col-xs-6 col-md-12">
    <form class="form-inline" method="get">
      <input type="hidden" name="p" value="<?php echo $_GET['p'];?>">
      <div class="form-group">
         <label for="keyword">Cari :</label>
        <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Ketikkan kata kunci disini. .">
      </div>
      <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
      <a href="main.php?p=stokbarang"><button type="button" class="btn btn-warning"><i class="fa fa-refresh"></i> Tampilkan Semua</button></a>
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
            <th>Jumlah</th>
            <th>Ket.</th>
            <th>Tgl. Masuk</th>
            <th>Tgl. Keluar</th>
            <th>Stok Minimal</th>
            <th>Ket.</th>
        </tr>
      </thead>
      <tbody>
      <?php
        $keyword = $_GET['keyword'];
        $page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
        if ($page <= 0) $page = 1;
        $per_page = 5; // Set how many records do you want to display per page. 
        $startpoint = ($page * $per_page) - $per_page;
        $table = "FROM stok_barang";
        $statement = " WHERE nama_barang LIKE '%$keyword%' OR id_barang LIKE '%$keyword%' OR jumlah_barang LIKE '%$keyword%' OR tanggal_masuk LIKE '%$keyword%' OR tanggal_keluar LIKE '%$keyword%' OR stok_min LIKE '%$keyword'";
        $sql = "SELECT * $table";
        if(!empty($keyword)):
        $sql .= "".$statement."";
        endif;
        $sql .= " ORDER BY id_barang ASC";
        $sql .= " LIMIT $startpoint, $per_page";
        $query = mysql_query($sql);
        $i = 1;
        if(mysql_num_rows($query) > 0):
        while($rows = mysql_fetch_array($query)):
            ?>
            
        <tr>
          <td><?php echo $i ?></td>
            <td><?php echo $rows['id_barang'];?></td>
            <td><?php echo $rows['nama_barang'];?></td>
            <td><?php echo $rows['jumlah_barang'];?></td>
            <td><?php echo $rows['ket'];?></td>
            <td><?php echo $rows['tanggal_masuk'];?></td>
            <td><?php echo $rows['tanggal_keluar'];?></td>
            <td><?php echo $rows['stok_min'];?></td>
            <td><?php echo $rows['ket'];?></td>
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