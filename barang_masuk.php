<?php
	require('connection.php');
  require('function.php');
?>
<h3><i class="fa fa-arrow-right"></i> BARANG MASUK</h3>
<br>
<div class="row">
  <div class="col-xs-6 col-md-6">
    <a href="main.php?p=tambah-barangmasuk"><button type="button" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Barang Masuk</button></a>
  </div>
  <div class="col-xs-6 col-md-6">
    <form class="form-inline" method="get">
      <input type="hidden" name="p" value="<?php echo $_GET['p'];?>">
      <div class="form-group">
         <label for="keyword">Cari :</label>
        <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Ketikkan kata kunci disini. .">
      </div>
      <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
      <a href="main.php?p=barangmasuk"><button type="button" class="btn btn-warning"><i class="fa fa-refresh"></i> Tampilkan Semua</button></a>
    </form>
  </div>
</div>
<br>
<form action="barang_masuk_delete.php" method="post" id="form-delete">
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
            <th>Tgl. Masuk</th>
            <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
      <?php
        $keyword = $_GET['keyword'];
        $page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
        if ($page <= 0) $page = 1;
        $per_page = 5; // Set how many records do you want to display per page. 
        $startpoint = ($page * $per_page) - $per_page;
        $table = " FROM barang_masuk";
        $statement = " WHERE nama_barang LIKE '%$keyword%' OR id_barang LIKE '%$keyword%' OR jumlah_barang LIKE '%$keyword%' OR keterangan LIKE '%$keyword'                       OR tanggal_masuk LIKE '%$keyword%'";

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
            <td><?php echo $rows['keterangan'];?></td>
            <td><?php echo $rows['tanggal_masuk'];?></td>
            <td><center><a href="hapus_barang_masuk.php?id=<?php echo $rows['id'] ?>"><button type="button" class="btn btn-danger"><i class="fa                fa-trash"></i> Delete</button></a>
            	</center></td>
        </tr>
         <?php
        $i++;
        endwhile;
        else:
          echo "<h4>Data barang masuk tidak ada.</h4>";
        endif;
            ?>
      </tbody>
    </table>
    <?php
    echo pagination($table,$statement,$per_page,$page,$url='?p='.$_GET['p'].'&');
    ?>
  </div>
</div>
</form>