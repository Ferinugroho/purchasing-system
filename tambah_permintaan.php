<?php
require('connection.php');
?>
<h4><i class="fa fa-list-alt"></i> Tambah Permintaan</h4>
<br>
<div class="row">
    <div class="col-md-5">
        <form class="form-horizontal" action="permintaan_save.php" method="post">
      <div id="barang_masuk">  
            <div class="form-group">
             	<label for="id_barang" class="col-sm-5 control-label">Id Barang</label>
            	<div class="col-sm-7">
           		<select class="form-control" name="id">
                <?php
				include "connection.php";
				$sql = mysql_query("select id_barang, nama_barang from stok_barang"); 
				while(list($id, $nama)=mysql_fetch_array($sql)):
				?>
                	<option value="<?php echo $id ?>"><?php echo "$id ($nama)"; ?></option>
                    <?php
					endwhile;
					?>
                </select>
            	</div>
            </div>
            
     	    <div class="form-group">
              <label for="keterangan" class="col-sm-5 control-label">Keterangan</label>
              <div class="col-sm-7">
                <select class="form-control" name="keterangan">
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
                <input type="text" name="jumlah_barang" class="form-control" id="jumlah_barang" placeholder="Jumlah Barang">
              </div>
            </div>
          	<div class="form-group">
            <label for="tgl_permintaan" class="col-sm-5 control-label">Tgl. Permintaan</label>
            <div class="col-sm-7">
              <input type="text" name="tgl_permintaan" class="form-control" id="tgl_permintaan" placeholder="Tgl. Permintaan">
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
