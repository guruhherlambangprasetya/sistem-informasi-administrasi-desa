<legend></legend>
	<div class="row">
		<?php
			$i=0;
			foreach($alurlayanan as $alurlayanan)
			{
			$i++;
		?>	
		<?php 	
			$id_alur = $alurlayanan->id_alur;
			$judul_alur = $alurlayanan->judul_alur;
			$isi_alur = $alurlayanan->isi_alur;
		?>
			<div class="col-lg-12 col-md-10" >
				<div class="alurlayanan-content">
				<div class="col-lg-12 col-md-5 col-xs-5">	
				<div class="alurlayanan-title">
				<div class="panel panel-info">
    <div class="panel-heading"><center><h3><?php echo $judul_alur;?></h3></center></div>
				<div class="alurlayanan-content-text">
				<div class="panel-body">
				<?php echo $isi_alur;?>
				</div>
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
				
				var d = document.getElementById("nav-alur");
				d.className = d.className + "active";
				}
	</script>