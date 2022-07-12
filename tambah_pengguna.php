<h4><i class="fa fa-plus"></i> Tambah Pengguna</h4>
<br>
<div class="row">
    <div class="col-md-5">
        <form class="form-horizontal" action="tambah_pengguna_save.php" method="POST">
          <div class="form-group">
            <label for="nama" class="col-sm-5 control-label">Nama Lengkap</label>
            <div class="col-sm-7">
              <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap">
            </div>
          </div>
          <div class="form-group">
            <label for="username" class="col-sm-5 control-label">Username</label>
            <div class="col-sm-7">
              <input type="text" name="username" class="form-control" id="username" placeholder="Username">
            </div>
          </div>
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
            <label for="level" class="col-sm-5 control-label">Level</label>
            <div class="col-sm-7">
              <select name="level" id="level" class="form-control">
                <option value="">[Pilih Level]</option>
                <option value="admin">Adm Gudang</option>
                <option value="kepala">Kepala Gudang</option>
                <option value="pengadaan">Pengadaan</option>
                <option value="pabrik">Pabrik</option>
              </select>
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
