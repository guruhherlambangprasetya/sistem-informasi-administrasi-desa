<style>
#mySidenav a {
  position: fixed;
  left: -80px;
  transition: 0.3s;
  padding: 15px;
  width: 100px;
  text-decoration: none;
  font-size: 20px;
  color: white;
  border-radius: 0 5px 5px 0;
  -webkit-transform: translateY(60%);
  -ms-transform: translateY(60%);
  transform: translateY(260%);
}

#mySidenav a:hover {
  left: 0;
}

#whatsapp {
  top: 20px;
  background-color: #04AA6D;
}

#facebook {
  top: 80px;
  background-color: #D2691E;
}

#instagram {
  top: 140px;
  background-color: #FF1493;
}

#youtube {
  top: 200px;
  background-color: #FF0000;
}
</style>

<div class="footer-atas">
	<div class="container">
		<div class="row">
		<div class="col-lg-30 col-md-20 col-17">
            <div class="single-widget widget-contact">
				<div class="footer-content">
				<hr>
				<center><h3>TERIMA KASIH</h3>					
					<legend></legend>
					<p><h4>ATAS KUNJUNGAN ANDA DI <b>PORTAL KELURAHAN AREN JAYA</b>, KAMI AKAN TERUS UPDATE SEPUTAR INFORMASI..<br><br>
					<strong>SEMANGAT SEHAT DAN JAGA PROTOKOL KESEHATAN</strong>
				</h4></p></center>
				<br>
				<legend></legend>
				</div>
					</div>
						</div>
					</div>
				</div>
				&nbsp;
			</div>
			
				<div id="mySidenav" class="sidenav">
  <a href="https://wa.me/6289667134072" id="whatsapp"><i class="fa fa-whatsapp"></i></a>
  <a href="https://facebook.com/" id="facebook"><i class="fa fa-facebook"></i></a>
  <a href="https://instagram.com/" id="instagram"><i class="fa fa-instagram"></i></a>
  <a href="https://youtube.com/" id="youtube"><i class="fa fa-youtube"></i></a>
					</div>
					<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5949e97be9c6d324a47367fe/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
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
</body>
</html>
<!-- Alertify CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assetku/alertify/themes/alertify.core.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assetku/alertify/themes/alertify.default.css" id="toggleCSS" />	 

<!-- Alertify JavaScript -->
<script src="<?php echo base_url(); ?>assetku/alertify/lib/alertify.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assetku/js/jquery-1.11.0.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>assetku/realperson/jquery.realperson.css" media="screen" />
<script type="text/javascript" src="<?php echo base_url(); ?>assetku/realperson/jquery.plugin.js"></script>	
<script type="text/javascript" src="<?php echo base_url(); ?>assetku/realperson/jquery.realperson.js"></script>	



<script>

$(function() {
	
	$('#aunt').realperson({chars: $.realperson.alphanumeric,regenerate: '',length: 5});
	
	$('.realperson-challenge').click(function() { 
		window.location.reload(1);
	});
	
	$('#formKontak').submit(function(event) { 
	
	$.ajax({
		type: "POST",
		url: "<?=site_url("c_kontak/simpan_kontak/");?>",
		data: $('form').serialize(),
		success: function(data){
			if(data){
				alertify.success("Terima Kasih atas saran/keluhan anda ke kami & pesan anda telah terkirim ke sistem kami!");
				$('#kirim').prop('disabled', true);
					setTimeout(function(){
				   window.location.reload(1);
				}, 1000);
			}
			
			else {
				alertify.error("Kode tidak cocok !");
				$('#kirim').prop('disabled', true);
				setTimeout(function(){
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