<legend></legend>
<div class="panel panel-primary">
    <div class="panel-body">
<center><h3><b>STRUKTUR ORGANISASI <br>
    PENGURUS RUKUN WARGA 017 <br>
    KELURAHAN AREN JAYA, KECAMATAN BEKASI TIMUR <br>
    PERIODER : 2019 - 2022</b>
  </h3></center></div>
	</div>
</div>
	<div class="row">
		<?php
			$i=0;
			foreach($struktur as $struktur)
			{
			$i++;
		?>	
		<?php 	
			$id_struktur = $struktur->id_struktur;
			$judul_struktur = $struktur->judul_struktur;
			$isi_struktur = $struktur->isi_struktur;
		?>
		<div class="col-md-4" >
  				<div class="struktur_organisasi-content">
          <div class="col-lg-20 col-md-13 col-sm-14 col-xs-14">	
				<div class="struktur_organisasi-title">
				<div class="panel panel-info">
    <div class="panel-heading"><center><h3><?php echo $judul_struktur;?></h3></center></div>
				<div class="struktur_organisasi-content-text">
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
				
				var d = document.getElementById("nav-struktur");
				d.className = d.className + "active";
				}
	</script>