<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 25%;
  padding: 0 10px;
}

/* Remove extra left and right margins, due to padding */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #f1f1f1;
}
</style>
<legend></legend>
<div class="panel panel-default">
    <div class="panel-body"><center><h3>GALLERY</h3></center></div>
	</div>
</div>		
<legend></legend>
<div class="row">
  <div class="column">
    <div class="card">
		<?php
			$i=0;
			foreach($album as $album)
			{
			$i++;
		?>	
		<?php 	
			$id_gambar = $album->id_gambar;
			$gambar = $album->gambar;
			$keterangan = $album->keterangan;
		?>
		  <div class="col-md-17">
			<div class="album-content">
				<div class="album-content-img">	
				<div class="panel panel-success">
    <div class="panel-heading">
				<img src='<?php echo site_url($gambar);?>' class='img-thumbnail'>	</div>
				
				<div class="panel-body">
					<?php echo $keterangan ?></div>
				</div>
			</div>
		</div>
			</div>
	</div>
  </div>
		<?php
			}
		?>
		</div>
</div>
</div>
	<script type="text/javascript" charset="utf-8">			
			 function nav_active(){
				var r = document.getElementById("nav-home");
				r.className = "";
				
				var d = document.getElementById("nav-album");
				d.className = d.className + "active";
				}
	</script>