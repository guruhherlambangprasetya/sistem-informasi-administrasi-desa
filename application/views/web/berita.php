<legend></legend>
<div class="panel panel-default">
    <div class="panel-body"><center><h3>PENGUMUMAN</h3></center></div>
	</div>
</div>	
<div class="col-md-8">

<legend></legend>
	<div class="container">
<div class="row">	
		<?php
			$i=0;
			foreach($berita as $berita)
			{
			$i++;
		?>
			<?php 	
			$idberita = $berita->id_berita;
			$judul = $berita->judul_berita;
			$gbr = $berita->gambar;
			$isi = $berita->isi_berita;
			$tempWaktu = date("d-m-Y G:i", strtotime($berita->waktu));	
			$nama = $berita->nama_pengguna;
			?>

		
		<a href="<?php echo site_url('web/c_berita/get_detail_berita/'.$idberita);?>" class="link-berita">
		<div class="col-sm-7" >
			<div class="bg berita-content">
				<div class="bg img-responsive berita-content-img">
					<?php //echo $gbr;?>
					<img id="displayPhoto" src='<?php echo site_url($gbr);?>'> 
				</div>	
				<div class="bg berita-content-text">
					<h3>
						<?php echo $judul;?>
					</h3>
					 <li class="fa fa-pencil-square-o">  
						Penulis:
						<?php echo $nama;?>,
						<?php echo $tempWaktu ;?>
					 </li>
					<div class="text-berita">
					<blockquote><p><?php echo $isi;?></p>				
				</blockquote>
					</div>&nbsp;<br>
					( Klik <b>Gambar/Tulisan</b> untuk melanjutkan)
				</div>
			</div>
		</div>
		
	</a>
	
		<?php
	}
	?>
	
			<div class="col-sm-25">
			<!-- <button type="button" class="btn btn-primary btn-lg">MEMUAT BERITA SELANJUTNYA</button> -->
			<?php echo $this->pagination->create_links(); ?>
			</div>
	</div>
</div>
</div>
<style>
* {
  box-sizing: border-box;
}

/* Header/Blog Title */
.header {
  padding: 30px;
  font-size: 40px;
  text-align: center;
  background: white;
}

/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {   
  float: left;
  width: 75%;
}

/* Right column */
.rightcolumn {
  float: left;
  width: 30%;
  padding-left: 20px;
}

/* Fake image */
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}

/* Add a card effect for articles */
.card {
   background-color: white;
   padding: 20px;
   margin-top: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Footer */
.footer {
  padding: 20px;
  text-align: center;
  background: #ddd;
  margin-top: 20px;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
  .leftcolumn, .rightcolumn {   
    width: 100%;
    padding: 0;
  }
}
</style>
<div class="col-md-2">
	<div class="container">
		<div class="row clearfix">
			<div class="col-md-4 column">
			<div class="card">
      <h3>Pasang Iklan anda dengan cara klik tombol WhatsApp</h3><legend></legend>
	  <button style='font-size:24px'><i class='fab fa-whatsapp'></i> <a href="https://wa.me/6289667134072" target="_blank">WhatsApp Admin</a></button>
	  <legend></legend>
      <div class="fakeimg">Image</div><br>
      <div class="fakeimg">Image</div><br>
      <div class="fakeimg">Image</div>
    </div>
	<div class="card">
	<h3>Nomor Penting</h3>
	<legend></legend>
		<dl class="dl-horizontal">
     <dt>DAMKAR Kota Bekasi.</dt>
	 <dd>(021) 889 578 05</dd>
	 <dt>PMI cabang Kota Bekasi</dt>
	 <dd>(021) 889 602 47</dd>
	 <dt>Ambulans RSUD Kota Bekasi</dt>
	 <dd>(021) 884 100 5</dd>
	 <dt>Pelayanan Jaringan PLN</dt>
	 <dd>(021) 881 222 2</dd>
	  </dl>
    </div>
			</div>
		</div>
	</div>
</div>
	<script type="text/javascript" charset="utf-8">			
			 function nav_active(){
				var r = document.getElementById("nav-home");
				r.className = "";
				
				var d = document.getElementById("nav-berita");
				d.className = d.className + "active";
				}
		$(document).ready(function(){  
			document.getElementById("displayPhoto").src = <?php echo site_url($berita);?>;
			});
	</script>