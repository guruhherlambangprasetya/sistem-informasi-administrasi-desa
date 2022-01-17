<!DOCTYPE html>

<html lang="en">

<head>
	<link href='http://fonts.googleapis.com/css?family=Over+the+Rainbow|Open+Sans:300,400,400italic,600,700|Arimo|Oswald|Lato|Ubuntu' rel='stylesheet' type='text/css'>
	<!-- Csrf Token -->
	<meta name="csrf-token" content="<?= $_SESSION['csrf_token'] ?>">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assetku/img/bekasi.ico" type="image/x-icon" />
	<title>Sistem Informasi Desa dan Kawasan <?= $konten_logo->nama_desa ?></title>
	<?php
	$path_css = $konten_logo->path_css;
	?>
	<meta name="description" content="Portal Rukun Warga 017">
	<meta name="author" content="Admin Rukun Warga 017">
	<link rel="shortcut" href="images/favicon.ico" />
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


	<link rel="stylesheet" href="<?php echo base_url(); ?>assetku/css/old/style.css" media="screen" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css" media="screen" />

	<link rel="stylesheet" href="<?php echo base_url(); ?>assetku/fancybox/jquery.fancybox.css" media="screen" />
	<link rel="stylesheet" href="<?php echo base_url() . 'theme/css/flickity.css' ?>">

	<!-- Magnific Popup CSS untuk galery -->
	<link rel="stylesheet" href="<?php echo base_url() . 'theme/css/magnific-popup.css' ?>">
	<!-- Image Hover CSS untuk galery-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'theme/css/normalize.css' ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'theme/css/set2.css' ?>" />

	<!-- Masonry Gallery untuk galeri -->
	<link href="<?php echo base_url() . 'theme/css/animated-masonry-gallery.css' ?>" rel="stylesheet" type="text/css" />
	<!-- REVOLUTION BANNER CSS SETTINGS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assetku/rs-plugin/css/settings.css" media="screen" />
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Lora:400,700" rel="stylesheet">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url() . 'theme/css/font-awesome.min.css' ?>">
	<!-- Simple Line Font -->
	<link rel="stylesheet" href="<?php echo base_url() . 'theme/css/simple-line-icons.css' ?>">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assetku/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo site_url($path_css); ?>">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assetku/css/flexslider.css" type="text/css" media="screen">



	<link href="<?php echo base_url(); ?>assetku/font/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assetku/css/animate.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assetku/css/lightbox.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assetku/css/lightbox.css" rel="stylesheet">

	<link href="<?php echo base_url(); ?>assetku/plugin/bxslider/jquery.bxslider.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assetku/plugin/owl-carousel/owl.carousel.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>

<body>

	<!-- - - - - - - - - - - - - Navigation - - - - - - - - - - - - - - -->
	<nav class="navbar">
		<?php if (isset($menu)) {
			echo $menu;
		} else {
			echo "Content belum diset";
		} ?>
	</nav>
	<!--/ #navigation-->
	<!-- - - - - - - - - - - - end Navigation - - - - - - - - - - - - - -->

	<!-- - - - - - - - - - - - - Logo - - - - - - - - - - - - - - -->
	<div class="container">
		<?php if (isset($logo)) {
			echo $logo;
		} else {
			echo "Content belum diset";
		} ?>
	</div>
	<!--/ #logo-->
	<!-- - - - - - - - - - - - end Logo - - - - - - - - - - - - - -->


	<!-- - - - - - - - - - - - - Slider - - - - - - - - - - - - - - - -->
	<div class="wrapper container">
		<?php if (isset($slider)) {
			echo $slider;
		} else {
			echo "";
		} ?>
	</div>
	<!-- - - - - - - - - - - - - end Slider - - - - - - - - - - - - - - -->


	<!-- - - - - - - - - - - - - - Main - - - - - - - - - - - - - - - - -->
	<div class="wrapper container">
		<div class="">
			<?php if (isset($content)) {
				echo $content;
			} else {
				echo "";
			} ?>
		</div>
	</div>
	</div>
	<!-- - - - - - - - - - - - - - - Footer - - - - - - - - - - - - - - - - -->

	<footer>
		<?php if (isset($footer)) {
			echo $footer;
		} else {
			echo "footer belum diset";
		} ?>

	</footer>

	<!-- - - - - - - - - - - - - end Bottom Footer - - - - - - - - - - - - - -->

	<!-- REVOLUTION BANNER CSS SETTINGS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assetku/rs-plugin/css/settings.css" media="screen" />

	<!-- HTML5 SHIV + DETECT TOUCH EVENTS -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assetku/js/modernizr.custom.js"></script>

	<!-- GET JQUERY FROM THE GOOGLE APIS -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script> -->
	<!--[if lt IE 9]>
		<script src="<?php echo base_url(); ?>js/selectivizr-and-extra-selectors.min.js"></script>
	<![endif]-->
	<script src="<?php echo base_url(); ?>assetku/js/respond.min.js"></script>

	<!-- JQUERY KENBURN SLIDER  -->
	<script src="<?php echo base_url(); ?>assetku/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
	<script src="<?php echo base_url(); ?>assetku/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="<?php echo base_url(); ?>assetku/js/jquery.easing.1.3.js"></script>
	<script src="<?php echo base_url(); ?>assetku/js/jquery.cycle.all.min.js"></script>
	<script src="<?php echo base_url(); ?>assetku/js/respond.min.js"></script>

	<!-- JS -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assetku/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assetku/js/bootstrap-hover-dropdown.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assetku/js/jquery.flexslider.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>assetku/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assetku/js/scrolltopcontrol.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assetku/js/lightbox-2.6.min.js"></script>

	<script src="<?php echo base_url(); ?>assetku/plugin/bxslider/jquery.bxslider.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assetku/plugin/owl-carousel/owl.carousel.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assetku/js/modernizr.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assetku/js/jquery.appear.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assetku/js/datepicker.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

	<script>
		// very simple to use!
		$(document).ready(function() {
			$('.dropdownhover').dropdownHover().dropdown();
			nav_active();
			$('.footer-content').css('display', 'none');
			$('.footer-content').fadeIn(1500);
		});
	</script>

	<script>
		//JS for owl-carousel
		if ($('.owl-carousel').length > 0) {
			$(".owl-carousel.carousel").owlCarousel({
				items: 3,
				autoPlay: 5000,
				interval: 5000,
				pagination: false,
				navigation: true,
				navigationText: false
			});
			$(".owl-carousel.carousel-autoplay").owlCarousel({
				items: 3,
				autoPlay: 5000,
				pagination: false,
				navigation: true,
				navigationText: false
			});
			$(".owl-carousel.clients").owlCarousel({
				items: 3,
				autoPlay: true,
				pagination: false,
				itemsDesktopSmall: [992, 5],
				itemsTablet: [768, 4],
				itemsMobile: [479, 3]
			});
			$(".owl-carousel.content-slider").owlCarousel({
				singleItem: true,
				autoPlay: 5000,
				navigation: false,
				navigationText: false,
				pagination: false
			});
			$(".owl-carousel.content-slider-with-controls").owlCarousel({
				singleItem: true,
				autoPlay: false,
				navigation: true,
				navigationText: false,
				pagination: true
			});
			$(".owl-carousel.content-slider-with-controls-autoplay").owlCarousel({
				singleItem: true,
				autoPlay: 5000,
				navigation: true,
				navigationText: false,
				pagination: true
			});
			$(".owl-carousel.content-slider-with-controls-bottom").owlCarousel({
				singleItem: true,
				autoPlay: false,
				navigation: true,
				navigationText: false,
				pagination: true
			});
		};
	</script>
	<script type="text/javascript">
		$(function() {
			SyntaxHighlighter.all();
		});
		$(window).load(function() {
			$('.flexslider').flexslider({
				animation: "slide",
				keyboard: "true",
				start: function(slider) {
					$('body').removeClass('loading');
				}
			});
		});
	</script>

	<script type="text/javascript">
		$('#navbar-search > a').on('click', function() {
			$('#navbar-search > a > i').toggleClass('fa-search fa-times');
			$("#navbar-search-box").toggleClass('show hidden animated fadeInUp');
			return false;
		});
	</script>

	<script>
		function previewImageUpdate() {
      document.getElementById("image-preview-update").style.display = "block";
      var oFReader = new FileReader();
      oFReader.readAsDataURL(document.getElementById("gambar").files[0]);
  
      oFReader.onload = function(oFREvent) {
        document.getElementById("image-preview-update").src = oFREvent.target.result;
      };
    };
	</script>
</body>

</html>