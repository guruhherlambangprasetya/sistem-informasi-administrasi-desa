<legend></legend>
<div class="panel panel-default">
    <div class="panel-body"><center><h3>JENIS PELAYANAN</h3></center></div>
	</div>
</div>	
	<div class="row">
		<?php
			$i=0;
			foreach($jenislayanan as $jenislayanan)
			{
			$i++;
		?>	
		<?php 
			$id_layanan = $jenislayanan->id_layanan;
			$judul_layanan = $jenislayanan->judul_layanan;
			$isi_layanan = $jenislayanan->isi_layanan;
		?>
			<div class="col-lg-4 col-md-10" >
				<div class="jenislayanan-content">
				<div class="col-lg-12 col-md-6 col-xs-6">	
				<div class="jenislayanan-title">
				<div class="panel panel-primary">
   					 <div class="panel-heading"><center><?php echo $judul_layanan;?></center></div>
				<div class="jenislayanan-content-text">
				<div class="panel-body">
				<?php echo $isi_layanan;?>
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
	<script type="text/javascript" charset="utf-8">			
			 function nav_active(){
				var r = document.getElementById("nav-home");
				r.className = "";

				var d = document.getElementById("nav-layanan");
				d.className = d.className + "active";
				}
	</script>