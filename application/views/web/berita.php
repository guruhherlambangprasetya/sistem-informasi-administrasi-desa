<style>
	/* Add a card effect for articles */
	.card {
		background-color: white;
		padding: 20px;
		margin-top: 20px;
	}
</style>
<legend></legend>
<div class="panel panel-default">
	<div class="panel-body">
		<center>
			<h3>BERITA</h3>
		</center>
	</div>
</div>
</div>
<div class="col-md-4">
	<div class="container">
		<div class="row">
			<div class="col-md-8 column">
				<div class="col-md-17 column">
					<div class="card">
						<?php
						$i = 0;
						foreach ($berita as $berita) {
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


							<a href="<?php echo site_url('web/c_berita/get_detail_berita/' . $idberita); ?>" class="link-berita">
								<div class="col-sm-10">
									<div class="bg berita-content">
										<div class="bg img-responsive berita-content-img">
											<?php //echo $gbr;
											?>
											<img id="displayPhoto" src='<?php echo site_url($gbr); ?>'>
										</div>
										<div class="bg berita-content-text">
											<h3>
												<?php echo $judul; ?>
											</h3>
											<li class="fa fa-pencil-square-o">
												Penulis:
												<?php echo $nama; ?>,
												<?php echo $tempWaktu; ?>
											</li>
											<div class="text-berita">
												<blockquote>
													<p><?php echo $isi; ?></p>
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

						<div class="col-sm-15">
							<!-- <button type="button" class="btn btn-primary btn-lg">MEMUAT BERITA SELANJUTNYA</button> -->
							<?php echo $this->pagination->create_links(); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="col-sm-12 column">
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
	<script type="text/javascript" charset="utf-8">
		function nav_active() {
			var r = document.getElementById("nav-home");
			r.className = "";

			var d = document.getElementById("nav-berita");
			d.className = d.className + "active";
		}
		$(document).ready(function() {
			document.getElementById("displayPhoto").src = <?php echo site_url($berita); ?>;
		});
	</script>