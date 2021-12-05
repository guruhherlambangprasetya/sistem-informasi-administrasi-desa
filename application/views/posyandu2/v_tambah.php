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

<?php echo form_open_multipart('admin/c_posyandu2/simpan_posyandu2'); ?>
	<legend></legend>
<legend></legend>
    <div class="form-group">
    	 <label  class="col-md-3 control-label" for="judul_struktur">Judul Struktur Kader Posyandu Aster 2</label>
        <div class="col-md-9">
         <span class="help-block">
         <input class="form-control input-md" type="text" name="judul_struktur" id="judul_struktur" size="30" /> 
		<?php echo form_error('judul_struktur', '<p class="field_error">','</p>')?>
		</span>
		</div>
	</div>
	<legend></legend>	
<div class="form-group"> 
	<label class="col-md-3 control-label" for="isi_struktur">Isi Struktur Kader Posyandu Aster 2 </label>
	 <div class="col-md-10">
	 
	 <textarea class="form-control input-md" id="xxx" name="isi_struktur" placeholder="Describe yourself here..." ></textarea>
	<span class="help-block"></span>
	</div>
</div>
<legend></legend>

 <div class="col-md-9">
<span class="help-block">
<input type="submit" class="btn btn-success" value="Simpan" id="simpan"/>
<input type="button" class="btn btn-danger" value="Batal" id="batal" onclick="location.href='<?= base_url() ?>admin/c_posyandu2'"/>
</span>	
</div>

<?php echo form_close(); ?>


<script>
function readURL_gambar(input) {

if (input.files && input.files[0]) {
	var reader = new FileReader();

	reader.onload = function (e) {
		$('#blah').attr('src', e.target.result);
	}
	
	reader.readAsDataURL(input.files[0]);
}
}

$("#imgInp").change(function(){
readURL_gambar(this);
{document.getElementById("blah").style.display = 'block';}
});

$( document ).ready(function() {
{document.getElementById("blah").style.display = 'none';}
});

function nav_active(){

	document.getElementById("a-data-kader").className = "collapsed active";
	
	var r = document.getElementById("data_kader");
	r.className = "collapsed";

	var d = document.getElementById("nav-posyandu2");
	d.className = d.className + "active";
	}
 
// very simple to use!
$(document).ready(function() {
  nav_active();
});
</script>