<h4><i class="fa fa-lock"></i> Ganti Password</h4>
<br>
<div class="row">
    <div class="col-md-5">
        <form class="form-horizontal" action="ganti_password_pengguna_save.php" method="post">
          <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user'];?>">
          <div class="form-group">
            <label for="password" class="col-sm-5 control-label">Password</label>
            <div class="col-sm-7">
              <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
          </div>
          <div class="form-group">
            <label for="confirm_password" class="col-sm-5 control-label">Konfirmasi Password</label>
            <div class="col-sm-7">
              <input type="password" class="form-control" name="confirm_password" id="confirm_password" value="" placeholder="Konfirmasi Password">
            </div>
          </div>
          <div class="form-group">
            <label for="new_password" class="col-sm-5 control-label">Password Baru</label>
            <div class="col-sm-7">
              <input type="password" class="form-control" name="new_password" id="new_password" value="" placeholder="Password Baru">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-5 col-sm-7">
              <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
              <a href="main.php?p=pengguna"><button type="button" class="btn btn-danger"><i class="fa fa-remove"></i> Batal</button></a>
            </div>
          </div>
        </form>
    </div>
</div>
