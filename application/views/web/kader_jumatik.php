<legend></legend>
<div class="panel panel-primary">
    <div class="panel-body">
<center><h3><b>STRUKTUR KADER JUMATIK <br>
    RUKUN WARGA 017 <br>
    KELURAHAN AREN JAYA, KECAMATAN BEKASI TIMUR <br>
    </b>
  </h3></center></div>
	</div>
</div>
	<div class="row">
		<?php
			$i=0;
			foreach($jumatik as $jumatik)
			{
			$i++;
		?>	
		<?php 	
			$id_struktur = $jumatik->id_struktur;
			$judul_struktur = $jumatik->judul_struktur;
			$isi_struktur = $jumatik->isi_struktur;
		?>
		<div class="col-md-4" >
  				<div class="jumatik-content">
          <div class="col-lg-20 col-md-13 col-sm-14 col-xs-14">	
				<div class="jumatik-title">
				<div class="panel panel-info">
    <div class="panel-heading"><center><h3><?php echo $judul_struktur;?></h3></center></div>
				<div class="jumatik-content-text">
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
				
				var d = document.getElementById("nav-jumatik");
				d.className = d.className + "active";
				}
	</script>