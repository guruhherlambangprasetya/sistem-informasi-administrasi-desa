<center><h1>PENGUMUMAN</h1></center>
<legend></legend>
	<div class="jumbotron">

<div class="row">	
		<?php
			$i=0;
			foreach($pengumuman as $pengumuman)
			{
			$i++;
		?>
			<?php 	
			$idpengumuman = $pengumuman->id_pengumuman;
			$judul = $pengumuman->judul_pengumuman;
			$gbr = $pengumuman->gambar;
			$isi = $pengumuman->isi_pengumuman;
			$tempWaktu = date("d-m-Y G:i", strtotime($pengumuman->waktu));	
			$nama = $pengumuman->nama_pengguna;
			?>

		
		<a href="<?php echo site_url('web/c_pengumuman/get_detail_pengumuman/'.$idpengumuman);?>" class="link-pengumuman">
		<div class="col-sm-6" >
			<div class="bg pengumuman-content">
				<div class="bg img-responsive pengumuman-content-img">
					<?php //echo $gbr;?>
					<img id="displayPhoto" src='<?php echo site_url($gbr);?>'> 
				</div>	
				<div class="bg pengumuman-content-text">
					<h3>
						<?php echo $judul;?>
					</h3>
					 <li class="fa fa-pencil-square-o">  
						Penulis:
						<?php echo $nama;?>,
						<?php echo $tempWaktu ;?>
					 </li>
					<div class="text-pengumuman">
					<?php echo $isi;?>
					</div><br>			
					<button type="button" class="btn btn-primary btn-sm">Klik tombol ini untuk melanjutkan >>></button>
				</div>
			</div>
		</div>
		
	</a>
	
		<?php
	}
	?>
	
			<div class="col-sm-12">
			<!-- <button type="button" class="btn btn-primary btn-lg">MEMUAT PENGUMUMAN SELANJUTNYA</button> -->
			<?php echo $this->pagination->create_links(); ?>
			</div>
	</div>
</div>
	<script type="text/javascript" charset="utf-8">			
			 function nav_active(){
				var r = document.getElementById("nav-home");
				r.className = "";
				
				var d = document.getElementById("nav-pengumuman");
				d.className = d.className + "active";
				}
		$(document).ready(function(){  
			document.getElementById("displayPhoto").src = <?php echo site_url($pengumuman);?>;
			});
	</script>