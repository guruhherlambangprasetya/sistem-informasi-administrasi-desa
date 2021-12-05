<legend></legend>
	<div class="row">
		<?php
			$i=0;
			foreach($sambutan as $sambutan)
			{
			$i++;
		?>	
		<?php 	
			$id_sambutan = $sambutan->id_sambutan;
			$nama_sambutan = $sambutan->nama_sambutan;
			$isi_sambutan = $sambutan->isi_sambutan;
		?>
		<div class="col-md-20" >
  				<div class="posyandu-content">
          <div class="col-lg-20 col-md-13 col-sm-14 col-xs-14">	
				<div class="posyandu-title">
				<div class="panel panel-info">
    <div class="panel-heading"><center><h3>SAMBUTAN PENGURUS KETUA RUKUN WARGA 017<br>&nbsp;<?php echo $nama_sambutan;?></h3></center></div>
				<div class="posyandu-content-text">
				<div class="panel-body">
				<?php echo $isi_sambutan;?>
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
				
				var d = document.getElementById("nav-sambutan");
				d.className = d.className + "active";
				}
	</script>