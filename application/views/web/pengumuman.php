<style>
	/* Add a card effect for articles */
	.card {
		background-color: white;
		padding: 20px;
		margin-top: 20px;
	}
</style>
<div class="panel panel-default">
	<div class="panel-body">
		<center>
		<h3><i class="fas fa-bullhorn"> PENGUMUMAN</i></h3>
		</center>
	</div>
</div>
</div>
<div class="row">
	<div class="col-md-8 column">
		<div class="col-md-45 column">
			<div class="card">
				<?php
				$i = 0;
				foreach ($pengumuman as $pengumuman) {
					$i++;
				?>
					<?php
					$id_pengumuman = $pengumuman->id_pengumuman;
					$tanggal = $pengumuman->tanggal;
					$waktu = $pengumuman->waktu;
					$tempat = $pengumuman->tempat;
					$acara = $pengumuman->acara;
					?>
					<div class="col-sm-12">
					<div class="media border p-3">
						<div class="col-md-4">
							<img src="<?php echo base_url(); ?>assetku/img/toa.png" alt="toa" class="mr-3 mt-3" style="width:150px;">
							</div>
							<h3>| <?php echo $acara ?> | </h3>
							<blockquote>
								<p>
									Tanggal : <?php echo date("d/M/Y",strtotime($tanggal)) ?> <br>
									Waktu   : <?php echo date("H:i",strtotime($waktu)) . ' WIB s/d Selesai ' ?><br>
									Tempat	: <?php echo $tempat ?><br><legend></legend>
								</p>
							</blockquote>
							
						</div>
					</div>
				<?php
				}
				?>
			</div>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="col-sm-15 column">
			<div class="card">
				<p>
					<center>
						<iframe src="https://jam.jadwalsholat.org/digitalclock/" frameborder="0" width="175" height="60"></iframe><br>
						<iframe src="https://www.jadwalsholat.org/adzan/ajax.row.php?id=265" frameborder="0" width="250" height="250"></iframe>
						<div class="panel panel-default">
							<div class="panel-body">
								<center>Sumber : <a href="https://www.jadwalsholat.org/" target="_blank">Jadwal Sholat</a></center>
							</div>
						</div>
					</center>
				</p>
			</div>
			<div class="card">
				<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7287443793789836" crossorigin="anonymous"></script>
				<!-- Pemasangan wifi IndiHome -->
				<ins class="adsbygoogle" style="display:inline-block;width:728px;height:90px" data-ad-client="ca-pub-7287443793789836" data-ad-slot="8094353144"></ins>
				<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
				</script>
			</div>
			<div class="card">
				<script type="text/javascript" src="https://widget.kominfo.go.id/gpr-widget-kominfo.min.js"></script>
				<center>
					<div id="gpr-kominfo-widget-container"></div>
				</center><br>
				<div class="panel panel-default">
					<div class="panel-body">
						<center>Update Hari ini : <?php echo date("d/M/Y"); ?><br>Sumber : <a href="https://www.kominfo.go.id/" target="_blank">KEMKOMINFO</a>
						</center>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" charset="utf-8">
	function nav_active() {
		var r = document.getElementById("nav-home");
		r.className = "";

		var d = document.getElementById("nav-pengumuman");
		d.className = d.className + "active";
	}
</script>