<script src="<?php echo base_url();?>nic/nicEdit.js"  type="text/javascript"></script>
<script type="text/javascript">
	var _base_url = '<?= base_url() ?>';
	bkLib.onDomLoaded(function() {
		new nicEditor({iconsPath : _base_url + 'nic/nicEditorIcons.gif'}).panelInstance('xxx');
		new nicEditor({maxHeight : 400}).panelInstance('xxx');
		new nicEditor(
		{
			buttonList:['upload']
		}).panelInstance('xx1');
	});
</script>
<h3><?= $page_title ?></h3>

<?php $flashmessage = $this->session->flashdata('exist');
	echo ! empty($flashmessage) ? '<p class="message">' . $flashmessage . '</p>': ''; ?>

<?php echo form_open_multipart('admin/c_pengumuman/updatepengumuman'); ?>
<legend></legend>
<input type="hidden" name="id_pengumuman" id="id_pengumuman" value="<?= $hasil->id_pengumuman?>" readonly = "readonly"/>
    <div class="form-group">
    	 <label  class="col-md-4 control-label" for="tanggal">Tanggal </label>
        <div class="col-md-5">
         <span class="help-block">
         <input class="form-control input-md" type="date" name="tanggal" id="tanggal" value="<?= $hasil->tanggal?>" /> 
		<?php echo form_error('tanggal', '<p class="field_error">','</p>')?>
		</span>
		</div>
	</div>
	<div class="form-group">
    	 <label  class="col-md-4 control-label" for="waktu">Tanggal </label>
        <div class="col-md-5">
         <span class="help-block">
         <input class="form-control input-md" type="time" name="waktu" id="waktu" value="<?= $hasil->waktu?>" /> 
		<?php echo form_error('tanggal', '<p class="field_error">','</p>')?>
		</span>
		</div>
	</div>
	<div class="form-group">
    	 <label  class="col-md-4 control-label" for="tempat">Tempat </label>
        <div class="col-md-5">
         <span class="help-block">
         <input class="form-control input-md" type="tempat" name="tempat" id="tempat" value="<?= $hasil->tempat?>" /> 
		<?php echo form_error('tanggal', '<p class="field_error">','</p>')?>
		</span>
		</div>
	</div>
<div class="form-group"> 
	<label class="col-md-4 control-label" for="acara">Isi Tempat</label>
	 <div class="col-md-5">
	 
	 <textarea class="form-control input-md" id="xxx" name="acara" id="acara"> <?=$hasil->acara?></textarea>
	<span class="help-block"></span>
	</div>
</div>
<legend></legend>

	<div class="col-md-9">
<div class="form-group">
    <label class="col-md-0 control-label" for="simpan"></label>
    <div class="col-md-9">
    <button type="submit" class="btn btn-success" name="simpan" id="simpan">Simpan</button>
    <button type="button" class="btn btn-danger" name="batal" id="batal" onclick="location.href='<?= base_url() ?>admin/c_pengumuman'"/>Batal</button>
    </div>
</div>

<?php echo form_close(); ?>

<script>

function nav_active(){

	document.getElementById("a-data-web").className = "collapsed active";
	
	var r = document.getElementById("pengumuman");
	r.className = "collapsed";

	var d = document.getElementById("nav-pengumuman");
	d.className = d.className + "active";
	}
 
// very simple to use!
$(document).ready(function() {
  nav_active();
});
</script>