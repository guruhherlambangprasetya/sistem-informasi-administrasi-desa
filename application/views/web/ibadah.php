<legend></legend>
<div class="panel panel-default">
    <div class="panel-body"><center><h3>TEMPAT IBADAH</h3></center></div>
	</div>
</div>	
<div class="container">
	<div class="row">
		<?php
			$i=0;
			foreach($tbl_ibadah as $tbl_ibadah)
			{
			$i++;
		?>	
		<?php 
			$id_ibadah = $tbl_ibadah->id_ibadah;
			$nama_ibadah = $tbl_ibadah->nama_ibadah;
			$id_rt = $tbl_ibadah->id_rt;
			$alamat = $tbl_ibadah->alamat;
		?>
			<div class="col-md-5" >
				<div class="ibadah-content">
				<div class="col-lg-20 col-md-16 col-sm-15 col-xs-20">		
				<div class="ibadah-title">
				<div class="panel panel-primary">
   					 <div class="panel-heading"><center><h3><?php echo $nama_ibadah;?></h3></center></div>
				<div class="ibadah-content-text">
				<div class="panel-body">
				<center><h3><p> RT : <?php echo $id_rt;?> | <?php echo $alamat;?></h3></p></center>
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

				var d = document.getElementById("nav-ibadah");
				d.className = d.className + "active";
				}
	</script>