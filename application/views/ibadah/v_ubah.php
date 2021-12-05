<h2><?= $page_title ?></h2>

<?php $flashmessage = $this->session->flashdata('exist');
	echo ! empty($flashmessage) ? '<p class="message">' . $flashmessage . '</p>': ''; ?>

<?php echo form_open('admin/c_ibadah/updateibadah'); ?>


        <td> <input type="hidden" name="id_ibadah" id="id_ibadah" size="30" value="<?= $hasil->id_ibadah?>" readonly = "readonly"/> </td>

<legend></legend>
    <div class="form-group">
    	 <label  class="col-md-3 control-label" for="nama_ibadah">Nama Ibadah </label>
        <div class="col-md-9">         
         <input class="form-control input-md" type="text" name="nama_ibadah" id="nama_ibadah" size="30" value="<?= $hasil->nama_ibadah?>" placeholder="Nama Ibadah"/> 
		<span class="help-block"><?php echo form_error('nama_ibadah', '<p class="field_error">','</p>')?>
		</span>
		</div>
	</div>
	<div class="form-group">
    	 <label  class="col-md-3 control-label" for="id_rt">RT</label>
        <div class="col-md-9">         
         <input class="form-control input-md" type="text" name="id_rt" id="id_rt" size="30" value="<?= $hasil->id_rt?>" placeholder="RT"/> 
		<span class="help-block"><?php echo form_error('id_rt', '<p class="field_error">','</p>')?>
		</span>
		</div>
	</div>
	<div class="form-group">
    	 <label  class="col-md-3 control-label" for="alamat">Alamat Tempat Ibadah</label>
        <div class="col-md-9">         
         <input class="form-control input-md" type="text" name="alamat" id="alamat" size="30" value="<?= $hasil->alamat?>" placeholder="ALAMAT"/> 
		<span class="help-block"><?php echo form_error('alamat', '<p class="field_error">','</p>')?>
		</span>
		</div>
	</div>
<legend></legend>

<div class="form-group">
    <label class="col-md-0 control-label" for="simpan"></label>
    <div class="col-md-9">
    <button type="submit" class="btn btn-success" name="simpan" id="simpan"/>Simpan</button>
    <button type="button" class="btn btn-danger" name="batal" id="batal" onclick="location.href='<?= base_url() ?>admin/c_ibadah'"/>Batal</button>
    </div>
</div>
<?php echo form_close(); ?>

<script>    

 function nav_active(){

	document.getElementById("a-data-web").className = "collapsed active";
	
	var r = document.getElementById("pengelola_data_wilayah");
	r.className = "collapsed";

	var d = document.getElementById("nav-ibadah");
	d.className = d.className + "active";
	}
 
</script>