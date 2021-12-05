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
<legend></legend>
<?php echo form_open('admin/c_tentang/simpantentang'); ?>
	<div class="form-group">
    	<label class="col-md-3 control-label" for="isi_tentang"> Isi Tentang Portal RW 017 </label>
		<div class="col-md-10">
	 
	 <textarea class="form-control input-md" id="xxx" name="isi_tentang" placeholder="Describe yourself here..." ></textarea>
	<span class="help-block"></span>
	</div>
	<legend></legend>

<div class="form-group">
    <label class="col-md-0 control-label" for="simpan"></label>
    <div class="col-md-9">
    <button type="submit" class="btn btn-success" name="simpan" id="simpan"/>Simpan</button>
    <button type="button" class="btn btn-danger" name="batal" id="batal" onclick="location.href='<?= base_url() ?>admin/c_tentang'"/>Batal</button>
    </div>
</div>
<?php echo form_close(); ?>


<script>    
  
  function nav_active(){

	document.getElementById("a-data-web").className = "collapsed active";
	
	var r = document.getElementById("pengelola_data_wilayah");
	r.className = "collapsed";

	var d = document.getElementById("nav-tentang");
	d.className = d.className + "active";
	}
 
// very simple to use!
$(document).ready(function() {
  nav_active();
});

</script>