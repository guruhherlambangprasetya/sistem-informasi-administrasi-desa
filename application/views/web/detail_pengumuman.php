<center><h1>PENGUMUMAN</h1></center>
<legend></legend>
			<div class="row">			
		<?php 	
					$ipengumuman = $pengumuman->id_pengumuman;
					$judul = $pengumuman->judul_pengumuman;
					$gbr = $pengumuman->gambar;
					$isi = $pengumuman->isi_pengumuman; 
					$tempWaktu = date("d-m-Y G:i", strtotime($pengumuman->waktu));	
					$nama = $pengumuman->nama_pengguna;
					
			?>

			<div class="col-sm-12" >
			<div class="bg pengumuman-detail">
				<div class="bg img-responsive pengumuman-detail-img">
					<?php //echo $gbr;?>
					<img id="displayPhoto" src='<?php echo site_url($gbr);?>'> 
				</div>	
				<div class="bg pengumuman-detail-text">
					<h3><?php echo $judul;?></h3>
					 <li class="fa fa-pencil-square-o">  
						Penulis:
						<?php echo $nama;?>,
						<?php echo $tempWaktu ;?>
					 </li>
					<p>
					<?php echo $isi;?>
					</p>
				</div>		
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
			document.getElementById("displayPhoto").src = <?php echo site_url($berita);?>;
			});
	</script>