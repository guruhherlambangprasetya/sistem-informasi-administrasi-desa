<legend></legend>
<center>
	<h2>KONTAK KAMI </h2>
</center>
<div class="col-lg-4 col-md-10 col-12">
	<div class="single-widget widget-contact">
		<div class="footer-content">
			<center>
				<h2>JAM KERJA</h2>
			</center>
			<table class="table table-hover">
				<tr>
					<td>Senin - Jum'at
					<td>:</td>
					<td> 09.00 - 16.00 WIB</td>
				</tr>
				<tr>
					<td>Sabtu
					<td>:</td>
					<td> 09-00 - 14.00 WIB</td>
				</tr>
				<tr>
					<td>Ahad
					<td>:</td>
					<td> Libur</td>
				</tr>
			</table>
		</div>
	</div>
	<legend></legend>
	<center>
		<h3>PETA LOKASI</h3>
	</center>
	<legend></legend>

	<?php echo $peta; ?>
</div>
</div>
<style>
	iframe {
		width: 209%;
		height: 300px;
	}
</style>
<div class="col-lg-4 col-md-10 col-12">
	<div class="single-widget widget-contact">
		<div class="footer-content">
			<center>
				<h2>LOKASI KANTOR</h2>
			</center>
			<table class="table table-hover">
				<tr>
					<td>
						<center><i class='fas fa-map-marker-alt' style='font-size:24px'></i></center>
					</td>
					<td>:</td>
					<td> JL. Pulau. Buton 11 No: 178, RT: 003 RW: 017, Kelurahan: Aren Jaya, <br>Kecamatan: Bekasi Timur, Jawa Barat, Indonesia, 17111</td>
				</tr>
				<tr>
					<td>
						<center><i class='fas fa-envelope' style='font-size:24px'></i></center>
					</td>
					<td>:</td>
					<td> portalrw017@gmail.com</td>
				</tr>
				<tr>
					<td>
						<center><i class='fas fa-phone' style='font-size:24px'></i></center>
					</td>
					<td>:</td>
					<td><a href="whatsapp://send?text=The text to share!" data-action="share/whatsapp/share">
							Pengelola RW 017</a></td>
				</tr>
			</table>
			<legend></legend>
		</div>
	</div>

</div>
<div class="col-sm-4">
	<div class="single-widget widget-quick-links">
		<h3>KONTAK / SARAN / KELUHAN</h3>
		<legend></legend>
		<?php
		$attributes = array('id' => 'formKontak');
		echo form_open('c_kontak/simpan_kontak/', $attributes); ?>
		<div class="form-group has-feedback">
			<label class="sr-only" for="nama">Nama</label>
			<input type="text" class="form-control input-md" placeholder="Nama Lengkap dengan benar" id="nama_komentar" name="nama_komentar" required>
		</div>
		<div class="form-group has-feedback">
			<label class="sr-only" for="email">Alamat Email</label>
			<input type="email" class="form-control input-md" placeholder="Alamat Email dengan benar" id="email_komentar" name="email_komentar" required>
		</div>
		<div class="form-group has-feedback">
			<label class="sr-only" for="pesan">Komentar Anda</label>
			<textarea class="form-control input-md" rows="2" placeholder="Isi Komentar anda dengan sopan" id="isi_komentar" name="isi_komentar" required></textarea>
		</div>

		<div class="form-group has-feedback">
			<input class="form-control input-md" type="text" id="aunt" name="aunt" placeholder="Masukan Kode Captcha Diatas" required>
		</div>
		<div class="form-group has-feedback">
			<button id="kirim" name="kirim" class="btn btn-default">Kirim</button>
		</div>
		<?php echo form_close(); ?>
	</div>
	<legend></legend>
	<div class="col-sm-8">
		<div class="single-widget widget-quick-links">

		</div>
		<script type="text/javascript" charset="utf-8">
			function nav_active() {
				var r = document.getElementById("nav-home");
				r.className = "";

				var d = document.getElementById("nav-peta");
				d.className = "active";
			}

			$(document).ready(function() {
				//doIframe();
			});
		</script>