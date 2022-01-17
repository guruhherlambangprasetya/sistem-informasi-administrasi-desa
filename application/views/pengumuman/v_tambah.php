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

<?php echo form_open_multipart('admin/c_pengumuman/simpanpengumuman'); ?>
<legend></legend>
    <div class="form-group">
    	 <label  class="col-sm-4 control-label" for="tanggal">Tanggal</label>
        <div class="col-sm-5">
         <span class="help-block">
         <input class="form-control input-md" type="date" name="tanggal" id="tanggal" /> 
		<?php echo form_error('tanggal', '<p class="field_error">','</p>')?>
		</span>
		</div>
	</div>
	<legend></legend>
    <div class="form-group">
    	 <label  class="col-sm-4 control-label" for="waktu">Waktu</label>
        <div class="col-sm-5">
         <span class="help-block">
		 <div class="input-group date">
                  <div class="input-group-addon">
         <i class="fa fa-clock-o"></i></div><input class="form-control input-md" type="time" name="waktu" id="waktu" size="5" /> 
		<?php echo form_error('waktu', '<p class="field_error">','</p>')?>
	</span>
		</div>
		</div>
	<legend></legend>
    <div class="form-group">
    	 <label  class="col-sm-4 control-label" for="tempat">Tempat</label>
        <div class="col-sm-5">
         <span class="help-block">
		 <div class="input-group date">
                  <div class="input-group-addon">
         <i class="fa fa-location-arrow"></i></div>
         <input class="form-control input-md" type="tempat" name="tempat" id="tempat" size="5" /> 
		<?php echo form_error('tempat', '<p class="field_error">','</p>')?>
		</span>
		</div>
	</div>
	<legend></legend>	
<div class="form-group"> 
	<label class="col-sm-4 control-label" for="acara">Isi Acara</label>
	 <div class="col-sm-5">
	 
	 <textarea class="form-control input-md" id="xxx" name="acara" placeholder="Describe yourself here..." ></textarea>
	<span class="help-block"></span>
	</div>
</div>
<legend></legend>

 <div class="col-md-9">
<span class="help-block">
<input type="submit" class="btn btn-success" value="Simpan" id="simpan"/>
<input type="button" class="btn btn-danger" value="Batal" id="batal" onclick="location.href='<?= base_url() ?>admin/c_pengumuman'"/>
</span>	
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