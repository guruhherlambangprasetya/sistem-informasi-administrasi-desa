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

<?php echo form_open_multipart('admin/c_pkk/update_pkk'); ?>
	<legend></legend>
<legend></legend>
<input type="hidden" name="id_struktur" id="id_struktur" value="<?= $hasil->id_struktur?>" readonly = "readonly"/>
    <div class="form-group">
    	 <label  class="col-md-3 control-label" for="judul_struktur">Judul Struktur Kader Pkk </label>
        <div class="col-md-9">
         <span class="help-block">
         <input class="form-control input-md" type="text" name="judul_struktur" id="judul_sturktur" value="<?= $hasil->judul_struktur?>" /> 
		<?php echo form_error('judul_struktur', '<p class="field_error">','</p>')?>
		</span>
		</div>
	</div>
<div class="form-group"> 
	<label class="col-md-3 control-label" for="isi_sturktur">Isi Struktur Kader Pkk</label>
	 <div class="col-md-10">
	 
	 <textarea class="form-control input-md" id="xxx" name="isi_struktur" id="isi_struktur"> <?=$hasil->isi_struktur?></textarea>
	<span class="help-block"></span>
	</div>
</div>
<legend></legend>

	<div class="col-md-9">
<div class="form-group">
    <label class="col-md-0 control-label" for="simpan"></label>
    <div class="col-md-9">
    <button type="submit" class="btn btn-success" name="simpan" id="simpan">Simpan</button>
    <button type="button" class="btn btn-danger" name="batal" id="batal" onclick="location.href='<?= base_url() ?>admin/c_pkk'"/>Batal</button>
    </div>
</div>

<?php echo form_close(); ?>

<script>

function nav_active(){

	document.getElementById("a-data-kader").className = "collapsed active";
	
	var r = document.getElementById("data_kader");
	r.className = "collapsed";

	var d = document.getElementById("nav-pkk");
	d.className = d.className + "active";
	}
 
// very simple to use!
$(document).ready(function() {
  nav_active();
});
</script>