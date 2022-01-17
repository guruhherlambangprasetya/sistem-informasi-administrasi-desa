<style>
	/* Add a card effect for articles */
	.card {
		background-color: white;
		padding: 20px;
		margin-top: 20px;
	}
</style>


<div class="col-sm-6">
	<div class="container">
		<div class="row">
			<div class="col-md-9 column">
				<div class="col-md-8 column">
					<div class="card">
						<center>
							<h3> Berita Terkini </h3>
						</center>
						<legend></legend>
						<?php
						$i = 0;
						foreach ($berita as $b) {
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
							$namabulan = array(
								"", "Januari", "Februari", "Maret", "April", "Mei", "Juni",
								"Juli", "Agustus", "September", "Oktober", "November", "Desember"
							);
						?>


							<div class="image-box">

								<div class="image-box-img">

									<div class="overlay-container img-responsive">
										<?php //echo $gbr;
										?>
										<img id="displayPhoto" src='<?php echo site_url($gbr); ?>'>
									</div>
								</div>


								<div class="image-box-body">
									<span class="fa fa-calendar"></span>
									<?php echo $tanggal; ?> - <?php echo $bulan; ?> - <?php echo $tahun; ?>,
									<span class="fa fa-clock-o"></span> <?php echo $jam; ?>
									<h4 class="title">
										<a href="<?php echo site_url('web/c_home/get_detail_berita/' . $idberita); ?>" class="link-berita">
											<?php echo $judul; ?>
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
	</div>
</div>

<div class="col-sm-6">
	<div class="col-md-15 column">
		<div class="card">
			<center>
				<h3>Update Data Covid-19 bulan ini</h3>
			</center>
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
			<center>
				<h3>Nomor Penting</h3>
			</center>
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
	$(document).ready(function() {
		document.getElementById("displayPhoto").src = <?php echo site_url($berita); ?>;
	});
</script>