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

<?php echo form_open_multipart('admin/c_sambutan/update_sambutan'); ?>
	<legend></legend>
<legend></legend>
<input type="hidden" name="id_sambutan" id="id_sambutan" value="<?= $hasil->id_sambutan?>" readonly = "readonly"/>
    <div class="form-group">
    	 <label  class="col-md-3 control-label" for="nama_sambutan">Nama Sambutan Rukun Warga 017</label>
        <div class="col-md-9">
         <span class="help-block">
         <input class="form-control input-md" type="text" name="nama_sambutan" id="nama_sambutan" value="<?= $hasil->nama_sambutan?>" /> 
		<?php echo form_error('nama_sambutan', '<p class="field_error">','</p>')?>
		</span>
		</div>
	</div>
<div class="form-group"> 
	<label class="col-md-3 control-label" for="isi_sambutan">Isi Sambutan Rukun Warga 017</label>
	 <div class="col-md-10">
	 
	 <textarea class="form-control input-md" id="xxx" name="isi_sambutan" id="isi_sambutan"> <?=$hasil->isi_sambutan?></textarea>
	<span class="help-block"></span>
	</div>
</div>
<legend></legend>

	<div class="col-md-9">
<div class="form-group">
    <label class="col-md-0 control-label" for="simpan"></label>
    <div class="col-md-9">
    <button type="submit" class="btn btn-success" name="simpan" id="simpan">Simpan</button>
    <button type="button" class="btn btn-danger" name="batal" id="batal" onclick="location.href='<?= base_url() ?>admin/c_sambutan'"/>Batal</button>
    </div>
</div>


<?php echo form_close(); ?>

<script>
function nav_active(){

	var d = document.getElementById("nav-sambutan");
	d.className = d.className + "active";
	}
 
// very simple to use!
$(document).ready(function() {
  nav_active();
});

</script>

<script>
function nav_active(){
	document.getElementById("a-sambutan").className = "collapsed active";
	}
 
// very simple to use!
$(document).ready(function() {
  nav_active();
});
</script>