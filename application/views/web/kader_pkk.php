<legend></legend>
<div class="panel panel-primary">
    <div class="panel-body">
<center><h3><b>STRUKTUR KADER PKK RT & RW <br>
    RUKUN WARGA 017 <br>
    KELURAHAN AREN JAYA, KECAMATAN BEKASI TIMUR <br></b>
  </h3></center></div>
	</div>
</div>
	<div class="row">
		<?php
			$i=0;
			foreach($pkk as $pkk)
			{
			$i++;
		?>	
		<?php 	
			$id_struktur = $pkk->id_struktur;
			$judul_struktur = $pkk->judul_struktur;
			$isi_struktur = $pkk->isi_struktur;
		?>
		<div class="col-lg-4" >
  				<div class="kader_pkk-content">
          <div class="col-lg-20 col-md-15 col-sm-16 col-xs-15">	
				<div class="kader_pkk-title">
				<div class="panel panel-info">
    <div class="panel-heading"><center><h3><?php echo $judul_struktur;?></h3></center></div>
				<div class="kader_pkk-content-text">
				<div class="panel-body">
				<?php echo $isi_struktur;?>
				</div>
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
		</div>
		
	<script type="text/javascript" charset="utf-8">			
			 function nav_active(){
				var r = document.getElementById("nav-home");
				r.className = "";
				
				var d = document.getElementById("nav-pkk");
				d.className = d.className + "active";
				}
	</script>