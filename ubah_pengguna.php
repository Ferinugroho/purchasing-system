<?php
require('connection.php');
//$sql_call = "SELECT * FROM pengguna WHERE id_pengguna = '".$_SESSION['id_user']."'";
$sql_call = "SELECT * FROM pengguna WHERE id_pengguna = '".$_SESSION['id_user']."'";
$query_call = mysql_query($sql_call);
$row = mysql_fetch_array($query_call);
?>
<h4><i class="fa fa-edit"></i> Profil Saya</h4>
<br>
<div class="row">
    <div class="col-md-5">
        <form class="form-horizontal" action="ubah_pengguna_save.php" method="post">
          <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']?>">
          <div class="form-group">
            <label for="nama" class="col-sm-5 control-label">Nama Lengkap</label>
            <div class="col-sm-7">
              <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $row['nama_pengguna'];?>" placeholder="Nama Lengkap">
            </div>
          </div>
          <div class="form-group">
            <label for="username" class="col-sm-5 control-label">Username</label>
            <div class="col-sm-7">
              <input type="text" name="username" class="form-control" id="username" value="<?php echo $row['username'];?>" placeholder="Username">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-5 col-sm-7">
              <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Ubah</button>
              <a href="main.php?p=pengguna"><button type="button" class="btn btn-danger"><i class="fa fa-remove"></i> Batal</button></a>
            </div>
          </div>
        </form>
    </div>
</div>
