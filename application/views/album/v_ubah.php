<h3><?= $page_title ?></h3>

<?php $flashmessage = $this->session->flashdata('exist');
	echo ! empty($flashmessage) ? '<p class="message">' . $flashmessage . '</p>': ''; ?>

<?php
$attributes = array('name' => 'myform');
echo form_open_multipart('admin/c_album/update_album', $attributes); 
?>
<fieldset>
<legend></legend>

		 <div class="col-md-12">
			<input type="hidden"  id="id_gambar" name="id_gambar" value="<?= $hasil->id_gambar?>"/>
		</div>
		
		<div class="form-group"> 	
    	 <label class="col-md-3 control-label" for="keterangan">Keterangan</label>
        <div class="col-md-9">
         <span class="help-block">
			<input class="form-control input-md"  type="text" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?= $hasil->keterangan?>"/>
		</span>
		</div>
	</div>	
	<legend></legend>
	<div class="form-group"> 	
    	 <label class="col-md-3 control-label" for="gambar">Gambar</label>
        <div class="col-md-9">
         <span class="help-block">
			<input class="form-control input-md"  type="file" name="gambar" id="imgInp" value="<?=$hasil->gambar ?>" multiple>
			<div align="right">Gambar harus bertipe .jpg atau .jpeg</div>
		</span>
		</div>
		<label class="col-md-3 control-label"></label>
		 <div class="col-md-9">
			<img id="blah" src='<?php echo site_url($hasil->gambar);?>' alt="your image"  class='img-responsive img-thumbnail' width="640px"/><br><br>
		</div>
	</div>	

	<legend></legend>
<p>
<input type="submit" class="btn btn-success" value="Simpan" id="simpan"/>
<input type="button" class="btn btn-danger" value="Batal" id="batal" onclick="location.href='<?= base_url() ?>admin/c_album'"/>
</p>
<br>
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
   {document.getElementById("blah").style.display = 'show';}
});

function nav_active(){

	document.getElementById("a-data-web").className = "collapsed active";
	
	var r = document.getElementById("pengelola_data_web");
	r.className = "collapsed";

	var d = document.getElementById("nav-album");
	d.className = d.className + "active";
	}
 
// very simple to use!
$(document).ready(function() {
  nav_active();
  $(".cropit-image-preview").reload();
});
</script>