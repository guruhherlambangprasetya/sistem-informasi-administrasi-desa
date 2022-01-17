<div class="footer-atas">
	<div class="container">
		<div class="row">
			<div class="col-sm-7">
				<div class="footer-content">
					<center>
						<h2>PORTAL RUKUN WARGA 017</h2>
					</center>
					<legend></legend>
					<p>
					<h4>Sistem Informasi Desa dan Kawasan RUKUN WARGA 017</h4>
					</p>
					<hr>
					<div class="row">
						<div class="col-md-13 col-sm-12 col-xs-12">
							<p>
							<h4>TERIMA KASIH ATAS KUNJUNGAN ANDA DI <b>PORTAL KELURAHAN AREN JAYA</b>, KAMI AKAN TERUS UPDATE SEPUTAR INFORMASI..<br><br>
								<strong>SEMANGAT SEHAT DAN JAGA PROTOKOL KESEHATAN</strong>
							</h4>
							</p>
							<hr>
						</div>
						<div class="col-md-5 col-sm-12 col-xs-12">

						</div>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="logo-footer img-responsive">
								<footer class="footer" data-vmid="footer_1957005226">
									<p class="footer__slogan">
									<h3>Unduh Sekarang</h3>
									</p>
									<a href="https://itunes.apple.com/" target="_blank"><img style="width: 180px;" src="https://deo.shopeemobile.com/shopee/shopee-appdlpage-live-id/static/img/appleStore.0ca159be.png" alt="apple store"></a>
									<a href="https://play.google.com/" target="_blank"><img style="width: 180px;" src="https://deo.shopeemobile.com/shopee/shopee-appdlpage-live-id/static/img/googlePlay.df026781.png" alt="google play"></a>
								</footer>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-5">
				<div class="footer-content">
					<center>
						<h3>Ikuti Sosial Media Kami</h3>
						<hr>
						<ul class="social-links circle">
							<li class="link"><a target="_blank" href="https://blogbugabagi.blogspot.com" title="Website" rel="noopener noreferrer"><i class="fa fa-link"></i></a></li>
							<li class="facebook"><a target="_blank" href="https://facebook.com/bugabagiblog" title="Facebook"><i class="fa fa-facebook"></i></a></li>
							<li class="twitter"><a target="_blank" href="https://twitter.com" title="Twitter"><i class="fa fa-twitter"></i></a></li>
							<li class="googleplus"><a target="_blank" href="http://plus.google.com/" title="Google+"><i class="fa fa-google-plus"></i></a></li>
						</ul>
						<hr>
					</center>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="footer-bawah">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div style="float:left">Copyright &copy; <?php echo date("Y"); ?> Sistem informasi administrasi desa</div>
				<div style="float:right">Made with by blogbugabagi | Distributed by Guruh Herlambang Prasetya</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
</body>

</html>
<!-- Alertify CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assetku/alertify/themes/alertify.core.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assetku/alertify/themes/alertify.default.css" id="toggleCSS" />

<!-- Alertify JavaScript -->
<script src="<?php echo base_url(); ?>assetku/alertify/lib/alertify.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assetku/js/jquery-1.11.0.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assetku/realperson/jquery.realperson.css" media="screen" />
<script type="text/javascript" src="<?php echo base_url(); ?>assetku/realperson/jquery.plugin.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assetku/realperson/jquery.realperson.js"></script>

<style>
	label {
		display: none;
		width: 20%;
	}

	.realperson-challenge {
		display: inline-block;
		padding: 2px;
		padding-top: 5px;
		margin-bottom: 13px;
		background-color: #fff;
		background-image: none;
		border: 1px solid #ccc;
		border-radius: 4px;
		-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
		box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
		-webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
		transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
	}
</style>

<script>
	$(function() {
		$('#aunt').realperson({
			chars: $.realperson.alphanumeric,
			regenerate: '',
			length: 5
		});

		$('.realperson-challenge').click(function() {
			window.location.reload(1);
		});

		$('#formKontak').submit(function(event) {

			$.ajax({
				type: "POST",
				url: "<?= site_url("c_kontak/simpan_kontak/"); ?>",
				data: $('form').serialize(),
				success: function(data) {
					if (data) {
						alertify.success("Terima Kasih, pesan telah terkirim !");
						$('#kirim').prop('disabled', true);
						setTimeout(function() {
							window.location.reload(1);
						}, 1000);
					} else {
						alertify.error("Kode tidak cocok !");
						$('#kirim').prop('disabled', true);
						setTimeout(function() {
							window.location.reload(1);
						}, 1000);
					}
				}
			});
			//return true;
			event.preventDefault();
		});
	});
</script>
<script>
	$(function() {
		$('#aunt').realperson({
			chars: $.realperson.alphanumeric,
			regenerate: '',
			length: 5
		});

		$('.realperson-challenge').click(function() {
			window.location.reload(1);
		});

		$('#formAduan').submit(function(event) {

			$.ajax({
				type: "POST",
				url: "<?= site_url("c_aduan/simpan_aduan/"); ?>",
				data: $('form').serialize(),
				success: function(data) {
					if (data) {
						alertify.success("Terima Kasih atas aduan anda, Kami akan memproses aduan anda !");
						$('#kirim').prop('disabled', true);
						setTimeout(function() {
							window.location.reload(1);
						}, 1000);
					} else {
						alertify.error("Kode tidak cocok !");
						$('#kirim').prop('disabled', true);
						setTimeout(function() {
							window.location.reload(1);
						}, 1000);
					}
				}
			});
			//return true;
			event.preventDefault();
		});
	});
</script>