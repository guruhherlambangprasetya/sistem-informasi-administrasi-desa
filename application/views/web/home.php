<style>
* {box-sizing: border-box}
body {font-family: "Lato", sans-serif;}

/* Style the tab */
.tab {
  float: left;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  width: 15%;
  height: 250px;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 30px 20px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 20px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 20px;
  border: 1px solid #ccc;
  width: 85%;
  border-left: none;
  height: 450px;
}
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


<div class="col-sm-6">
<div class="container">
		<div class="row clearfix">
			<div class="col-md-8 column">
<div class="col-md-8 column">
      <div class="card">
        <center>  <h3> Pengumuman </h3> </center>
        <legend></legend>
		<?php
			$i=0;
			foreach($berita as $b)
			{
			$i++;
			
			$idberita = $b->id_berita;
			$judul = $b->judul_berita;
			$gbr = $b->gambar;
			$tempWaktu = $b->waktu;
			$tanggal = date("d", strtotime($tempWaktu));
			$bulan = date("n", strtotime($tempWaktu));
			$tahun = date("Y", strtotime($tempWaktu));
			$nama = $b->id_pengguna;
			$jam = date("G:i:s", strtotime($tempWaktu));
			$namabulan = array("","Januari","Februari","Maret","April","Mei","Juni",
			"Juli","Agustus","September","Oktober","November","Desember");
			?>
			
			
				<div class="image-box">
				
				<div class="image-box-img">
					
						<div class="overlay-container img-responsive">
							<?php //echo $gbr;?>
							<img id="displayPhoto" src='<?php echo site_url($gbr);?>'> 
						</div>
						</div>
			
				
					<div class="image-box-body">
						<span class="fa fa-calendar"></span>  
						<?php echo $tanggal;?> - <?php echo $bulan;?> - <?php echo $tahun;?>,
						<span class="fa fa-clock-o"></span>  <?php echo $jam;?>
						<h4 class="title">
						<a href="<?php echo site_url('web/c_home/get_detail_berita/'.$idberita);?>" class="link-berita">
						<?php echo $judul;?>
						</a>
						</h4>
					</div>
					</div>	
				
				<?php
	}
	?>		
	
		</div>
 <div class="card">
 <script type="text/javascript" src="https://widget.kominfo.go.id/gpr-widget-kominfo.min.js"></script>
<center>
<div id="gpr-kominfo-widget-container"></div></center><br>
<div class="panel panel-default">
    <div class="panel-body"><center>Update Hari ini : <?php echo date("d/M/Y"); ?><br>Sumber : <a href="https://www.kominfo.go.id/" target="_blank">KEMKOMINFO</a>
  </center></div>
	</div>
 </div>
  </div></div></div></div></div>

<div class="col-sm-4">
<div class="container">
		<div class="row clearfix">
			<div class="col-md-6 column">
           <div class="card">
<center><h3>Update Data Covid-19 bulan ini</h3></center>
<legend></legend>	
<div id="kopi-covid"></div>
<script>
  var f = document.createElement("iframe")
  f.src = "https://kopi.dev/widget-covid-19/"
  f.width = "100%"
  f.height = 380
  f.scrolling = "no"
  f.frameBorder = 0
  var rootEl = document.getElementById("kopi-covid")
  console.log(rootEl)
  rootEl.appendChild(f)
</script>
</div>
      <div class="card">
<p><center>
	<iframe src="https://jam.jadwalsholat.org/digitalclock/" frameborder="0" width="175" height="60"></iframe><br>
	<iframe src="https://www.jadwalsholat.org/adzan/ajax.row.php?id=265" frameborder="0" width="250" height="250"></iframe>
    <div class="panel panel-default">
    <div class="panel-body"><center>Sumber : <a href="https://www.jadwalsholat.org/" target="_blank">Jadwal Sholat</a></center></div>
	</div>
		</center>
	</p>
</div>
			<div class="card">
      <div class="fakeimg">Image</div><br>
      <div class="fakeimg">Image</div><br>
      <div class="fakeimg">Image</div>
      <legend></legend>
      <h3>Pasang Iklan anda dengan cara klik tombol WhatsApp</h3><legend></legend>
	  <button style='font-size:24px'><i class='fab fa-whatsapp'></i> <a href="https://wa.me/6289667134072" target="_blank">WhatsApp Admin</a></button>
    </div>
	<div class="card">
	<center>  <h3>Nomor Penting</h3> </center>
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
    <div class="card">
    <footer class="footer" data-vmid="footer_1957005226">
	<p class="footer__slogan"><center><h3>Portal Rukun Warga 017<br>Dapatkan Aplikasi <b>Portal Rukun Warga 017 hanya di <b>AppStore & Playstore</b></b><br><blockquote><h3>Unduh Sekarang! <br>( Sesuai dengan handphone anda pakai saat ini )</h3></blockquote></h3></center></p>
	<center><a href="https://itunes.apple.com/" target="_blank"><img style="width: 180px;" src="https://deo.shopeemobile.com/shopee/shopee-appdlpage-live-id/static/img/appleStore.0ca159be.png" alt="apple store"></a>
	<a href="https://play.google.com/" target="_blank"><img style="width: 180px;" src="https://deo.shopeemobile.com/shopee/shopee-appdlpage-live-id/static/img/googlePlay.df026781.png" alt="google play"></a></center>
</footer>
    </div>
			</div>
		</div>
	</div>
</div>
		<script type="text/javascript" charset="utf-8">			
			
				$(document).ready(function(){  
			document.getElementById("displayPhoto").src = <?php echo site_url($berita);?>;
			});
	</script>		
	