<style>
	body {
		font-family: Arial;
	}

	/* Style the tab */
	.tab {
		overflow: hidden;
		border: 1px solid #ccc;
		background-color: white;
	}

	/* Style the buttons inside the tab */
	.tab button {
		background-color: inherit;
		float: left;
		border: none;
		outline: none;
		cursor: pointer;
		padding: 14px 16px;
		transition: 0.3s;
		font-size: 17px;
	}

	/* Change background color of buttons on hover */
	.tab button:hover {
		background-color: #ddd;
	}

	/* Create an active/current tablink class */
	.tab button.active {
		background-color: #ccc;
	}

	/* Style the tab content */
	.tabcontent {
		display: none;
		padding: 6px 12px;
		border: 1px solid #ccc;
		border-top: none;
	}

	/* Style the close button */
	.topright {
		float: right;
		cursor: pointer;
		font-size: 28px;
	}

	.topright:hover {
		color: red;
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
<div class="row">
	<?php
	$idberita = $berita->id_berita;
	$judul = $berita->judul_berita;
	$gbr = $berita->gambar;
	$isi = $berita->isi_berita;
	$tempWaktu = date("d-m-Y G:i", strtotime($berita->waktu));
	$nama = $berita->nama_pengguna;

	?>

	<div class="col-sm-12">
		<div class="bg berita-detail">
			<div class="bg img-responsive berita-detail-img">
				<?php //echo $gbr;
				?>
				<img id="displayPhoto" src='<?php echo site_url($gbr); ?>'>
			</div>
			<div class="bg berita-detail-text">
				<h3><?php echo $judul; ?></h3>
				<li class="fa fa-pencil-square-o">
					Penulis:
					<?php echo $nama; ?>,
					<?php echo $tempWaktu; ?>
				</li>

				<p>
					<?php echo $isi; ?>
				</p>
				<hr>
				<div class="css-148bd57">
					<blockquote><i class="fa fa-share-square"> Bagikan ke :</i>
						<a href="https://www.facebook.com/sharer/sharer.php?t=Product%20Manager%20(Shop)%20%7C%20Tokopedia%20Careers&amp;u=https://www.tokopedia.com/careers/sales-operation-&amp;-product/a6148190729ce4" target="_blank" rel="noopener noreferrer"><img src="https://assets.tokopedia.net/assets-tokopedia-lite/v2/arael/kratos/a441f0c6.svg" alt="https://assets.tokopedia.net/assets-tokopedia-lite/v2/arael/kratos/a441f0c6.svg" class="css-11u4aza loaded" width="52" height="52"></a>
						<a href="https://twitter.com/intent/tweet?text=Product%20Manager%20(Shop)%20%7C%20Tokopedia%20Careers&amp;url=https://www.tokopedia.com/careers/sales-operation-&amp;-product/a6148190729ce4" target="_blank" rel="noopener noreferrer"><img src="https://assets.tokopedia.net/assets-tokopedia-lite/v2/arael/kratos/b5e21a41.svg" alt="https://assets.tokopedia.net/assets-tokopedia-lite/v2/arael/kratos/b5e21a41.svg" class="css-11u4aza loaded" width="52" height="52"></a>
						<a href="https://api.whatsapp.com/send?text=Product%20Manager%20(Shop)%20%7C%20Tokopedia%20Careers https://www.tokopedia.com/careers/sales-operation-&amp;-product/a6148190729ce4" target="_blank" rel="noopener noreferrer"><img src="https://assets.tokopedia.net/assets-tokopedia-lite/v2/arael/kratos/078d65e6.svg" alt="https://assets.tokopedia.net/assets-tokopedia-lite/v2/arael/kratos/078d65e6.svg" class="css-11u4aza loaded" width="52" height="52"></a>
					</blockquote>
				</div>
				<hr>
				<i class='far fa-comment' style='font-size:36px'> Comment </i>

				<div id="disqus_thread"></div>
				<script>
					/**
					 *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
					 *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
					/*
					var disqus_config = function () {
					this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
					this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
					};
					*/
					(function() { // DON'T EDIT BELOW THIS LINE
						var d = document,
							s = d.createElement('script');
						s.src = 'https://portalrw-com.disqus.com/embed.js';
						s.setAttribute('data-timestamp', +new Date());
						(d.head || d.body).appendChild(s);
					})();
				</script>
				<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>


				<script>
					function openCity(evt, cityName) {
						var i, tabcontent, tablinks;
						tabcontent = document.getElementsByClassName("tabcontent");
						for (i = 0; i < tabcontent.length; i++) {
							tabcontent[i].style.display = "none";
						}
						tablinks = document.getElementsByClassName("tablinks");
						for (i = 0; i < tablinks.length; i++) {
							tablinks[i].className = tablinks[i].className.replace(" active", "");
						}
						document.getElementById(cityName).style.display = "block";
						evt.currentTarget.className += " active";
					}

					// Get the element with id="defaultOpen" and click on it
					document.getElementById("defaultOpen").click();
				</script>

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