<?php
require('connection.php');
$id=$_GET['kode'];
$query=mysql_query("select * from order_barang where id='$id'");
$row=mysql_fetch_array($query);
?>
<h4><i class="fa fa-plus"></i> Edit Order Request</h4>
<br>
	<div class="row">
    <div class="col-md-5">
        <form class="form-horizontal" action="edit_order_request_save.php?id=<?php echo $row['id']; ?>" method="POST">
      <div id="barang_masuk">  
            <div class="form-group">
             	<label for="id_barang" class="col-sm-5 control-label">Id Barang</label>
            	<div class="col-sm-7">
    <?php
	if($level=='admin'){ 
	?> 
                <select class="form-control" name="id_barang">
                
                	<option value="<?php echo $row['id_barang']; ?>"><?php echo $row['id_barang']; ?></option>
                    
                </select>
     <?php 
	} else { 
			echo $row['id_barang'];
    }
	 ?>
            	</div>
            </div>
			<div class="form-group">
              <label for="jumlah_barang" class="col-sm-5 control-label">Nama Barang</label>
              <div class="col-sm-7">
      <input type="text" <?php if ($level=='pengadaan') { ?> readonly="true" <? } ?> name="nama_barang" id="nama_barang" placeholder="Nama Barang" value="<?php echo $row['nama_barang'];?>" />
              </div>
            </div>
            
      	    <div class="form-group">
              <label for="keterangan" class="col-sm-5 control-label">Keterangan</label>
              <div class="col-sm-7">
     <?php
	if($level=='admin'){ 
	?> 
                <select class="form-control" name="keterangan">
                	<option value="Kilo Liter">Kilo Liter</option>
                    <option value="Liter">Liter</option>
                    <option value="Ton">Ton</option>
                </select>
     <?php 
	} else { ?>
			<input type="text" readonly name="keterangan" class="form-control" value="<?php echo $row['keterangan']; ?>" id="status" placeholder="Keterangan"> 
	<? 
    }
	 ?>
              </div>
            </div>
            <div class="form-group">
              <label for="jumlah_barang" class="col-sm-5 control-label">Jumlah Barang</label>
              <div class="col-sm-7">
  
      <input type="text" <?php if ($level=='pengadaan') { ?> readonly <? } ?> name="jumlah_barang" class="form-control" id="jumlah_barang" placeholder="Jumlah Barang" value="<?php echo $row['jumlah_barang'];?>" />
              </div>
            </div>
           
   	<div class="form-group">
            <label for="tgl_pemesanan" class="col-sm-5 control-label">Tgl. Pemesanan</label>
            <div class="col-sm-7">
      <?php
	if($level=='admin'){ 
	?> 
              <input type="text" name="tgl_pemesanan" class="form-control" id="tgl_pemesanan" placeholder="Tgl Pemesanan" value="<?php echo $row['tanggal_pemesanan'];?>">
   <?php 
	} else { ?>
			<input type="text" readonly name="status" class="form-control" value="<?php echo $row['tanggal_pemesanan']; ?>" id="status" placeholder="status"> <? 
    }
	 ?>
            </div>
          </div>
          
            <div class="form-group">
            <label for="status" class="col-sm-5 control-label">Status</label>
            <div class="col-sm-7">
            <?php if ($level=='admin') {?>
              <input type="text" readonly name="status" class="form-control" value="<?php echo $row['status']; ?>" id="status" placeholder="status">
             <?php }
			 else {
			 ?>
             <select class="form-control" name="status">
                	<option value="belum diproses">Belum diproses</option>
                    <option value="sedang diproses">Sedang diproses</option>
                </select>
              <?php 
			 }
			  ?>
             
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-5 col-sm-7">
              <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
              <a href="main.php?p=orderrequest"><button type="button" class="btn btn-danger"><i class="fa fa-remove"></i> Batal</button></a>
            </div>
          </div>		  
          </div>
        </form>
    </div>
</div>
