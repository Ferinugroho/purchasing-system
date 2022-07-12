<?php
require('connection.php');
$id=$_GET['kode'];
$query=mysql_query("select * from permintaan where id='$id'");
$row=mysql_fetch_array($query);
?>

<h4><i class="fa fa-plus"></i> Edit Permintaan Bahan Baku</h4>
<br>
	<div class="row">
    <div class="col-md-5">
        <form class="form-horizontal" action="edit_permintaan_save.php?id=<?php echo $id ?>" method="POST">
      <div id="barang_masuk">  
            <div class="form-group">
             	<label for="id_barang" class="col-sm-5 control-label">Id Barang</label>
            	<div class="col-sm-7">
                      <input type="text" name="id_barang" class="form-control" readonly value="<?php echo $row['id_barang']; ?>">
            	</div>
            </div>

      	    <div class="form-group">
              <label for="keterangan" class="col-sm-5 control-label">Keterangan</label>
              <div class="col-sm-7">
                <select class="form-control" name="keterangan">
                	<option value="<?php echo $row['keterangan']; ?>"><?php echo $row['keterangan']; ?></option>
                	<option value="Kilo Liter">Kilo Liter</option>
                    <option value="Liter">Liter</option>
                    <option value="Ton">Ton</option>
                </select>
              </div>
            </div>
          </div>
            <div class="form-group">
              <label for="jumlah_barang" class="col-sm-5 control-label">Jumlah Barang</label>
              <div class="col-sm-7">
                <input type="text" name="jumlah_barang" class="form-control" id="jumlah_barang" value="<?php echo $row['jumlah_barang']; ?>">
              </div>
            </div>
           
   	<div class="form-group">
            <label for="tgl_permintaan" class="col-sm-5 control-label">Tgl. Permintaan</label>
            <div class="col-sm-7">
              <input type="text" name="tgl_permintaan" class="form-control" id="tgl_permintaan" value="<?php echo $row['tgl_permintaan']; ?>">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-5 col-sm-7">
              <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
              <a href="main.php?p=permintaan"><button type="button" class="btn btn-danger"><i class="fa fa-remove"></i> Batal</button></a>
            </div>
          </div>
        </form>
    </div>
</div>
