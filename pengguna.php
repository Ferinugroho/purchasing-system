<?php
	require('connection.php');
    require('function.php');
?>
<h3><i class="fa fa-users"></i> PENGGUNA</h3>
<br>
<div class="row">
  <div class="col-xs-6 col-md-6">
    <a href="main.php?p=tambah-pengguna"><button type="button" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Pengguna</button></a>
  </div>
  <div class="col-xs-6 col-md-6">
    <form class="form-inline" method="get">
      <input type="hidden" name="p" value="<?php echo $_GET['p'];?>">
      <div class="form-group">
         <label for="keyword">Cari :</label>
        <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Ketikkan kata kunci disini. .">
      </div>
      <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
      <a href="main.php?p=pengguna"><button type="button" class="btn btn-warning"><i class="fa fa-refresh"></i> Tampilkan Semua</button></a>
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
          <th>Nama Lengkap</th>
          <th>Username</th>
          <th>Level</th>
        </tr>
      </thead>
      <tbody>
      <?php
        $keyword = $_GET['keyword'];
        $page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
        if ($page <= 0) $page = 1;
        $per_page = 5; // Set how many records do you want to display per page. 
        $startpoint = ($page * $per_page) - $per_page;
        $table = " FROM pengguna";
        $statement = " WHERE nama_pengguna LIKE '%$keyword%' OR username LIKE '%$keyword%' OR level LIKE '%$keyword%'";

        $sql = "SELECT id_pengguna, nama_pengguna,username,level $table";
        if(!empty($keyword)):
        $sql .= "".$statement."";
        endif;
        $sql .= " ORDER BY id_pengguna ASC";
        $sql .= " LIMIT $startpoint, $per_page";
        $query = mysql_query($sql);
        $i = 1;
        if(mysql_num_rows($query) > 0):
        while($rows = mysql_fetch_array($query)):
            ?>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $rows['nama_pengguna'];?></td>
          <td><?php echo $rows['username'];?></td>
          <td><?php echo $rows['level'];?></td>

        </tr>
         <?php
        $i++;
        endwhile;
        else:
          echo "<h4>Data pengguna tidak ada.</h4>";
        endif;
            ?>
      </tbody>
    </table>
  </div>
</div>
</form>