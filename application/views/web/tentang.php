<legend></legend>
<div class="panel panel-default">
    <div class="panel-body"><center><h3>TENTANG PORTAL RW 017 & NOMOR PENTING/NOMOR DARURAT</h3></center></div>
	</div>
</div>	
<div class="jumbotron">
	<div class="row">
		<?php
			$i=0;
			foreach($tentang as $tentang)
			{
			$i++;
		?>	
		<?php 
			$id_tentang = $tentang->id_tentang;
			$isi_tentang = $tentang->isi_tentang;
		?>
			<div class="col-md-10" >
				<div class="tentang-content">
				<div class="col-lg-20 col-md-16 col-sm-15 col-xs-20">		
				<div class="ibadah-title">
  <blockquote><?php echo $isi_tentang ?></blockquote>
				</div>
			</div>
		</div>
			</div>
		<?php
			}
		?>
	</div>
	<script type="text/javascript" charset="utf-8">			
			 function nav_active(){
				var r = document.getElementById("nav-home");
				r.className = "";

				var d = document.getElementById("nav-ibadah");
				d.className = d.className + "active";
				}
	</script>