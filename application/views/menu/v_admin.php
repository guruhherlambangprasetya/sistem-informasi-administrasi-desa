<br>
<br>
<br>
<br>
<div class="navbar bg-warning sidebar" role="navigation">
	<div class="sidebar-nav navbar-collapse">
		<ul class="nav" id="side-menu">

			<li>
				<a class="" href="<?php echo site_url('admin/c_admin/'); ?>" id="a-admin" class=""><i class="fa fa-home fa-fw"></i> Beranda</a>
			</li>
			<li>
				<a class="" href="<?php echo site_url('admin/c_user/'); ?>" id="a-user" class=""><i class="fa fa-user fa-fw"></i> Pengguna</a>
			</li>

			<!---------------------DROPDOWN 1--------------------------------------------------------------->
			<li class="dropdownmenu">
				<a id="a-data-web" class="collapsed" data-toggle="collapse" href="#pengelola_data_web">
					<i class="fa fa-globe fa-fw"></i> Pengelolaan Data Web <span class="fa arrow"></span></a>
				<div id="pengelola_data_web" class="collapse">
					<ul id="" class="nav nav-pills nav-stacked nav-second-level ">
						<li id="nav-berita" class="">
							<a href="<?php echo site_url('admin/c_berita/'); ?>">Berita</a>
						</li>
						<li id="nav-agenda" class="">
							<a href="<?php echo site_url('admin/c_agenda/'); ?>">Agenda</a>
						</li>
						<li id="nav-pengumuman" class="">
							<a href="<?php echo site_url('admin/c_pengumuman/'); ?>">Pengumuman</a>
						</li>
						<li id="nav-berita" class="">
							<a href="<?php echo site_url('admin/c_sambutan/'); ?>">Sambutan Pengurus RW 017</a>
						</li>
						<li id="nav-sejarah" class="">
							<a href="<?php echo site_url('admin/c_sejarah/'); ?>">Sejarah Desa</a>
						</li>
						<li id="nav-demografi" class="">
							<a href="<?php echo site_url('admin/c_demografi/'); ?>">Demografi Desa</a>
						</li>
						<li id="nav-visimisi" class="">
							<a href="<?php echo site_url('admin/c_visimisi/'); ?>">Visi Dan Misi Desa</a>
						</li>

						<li id="nav-logo" class="">
							<a href="<?php echo site_url('admin/c_logo/'); ?>">Logo</a>
						</li>
						<li id="nav-slider" class="">
							<a href="<?php echo site_url('admin/c_slider_beranda/'); ?>">Slider Beranda</a>
						</li>
						<li id="nav-album" class="">
							<a href="<?php echo site_url('admin/c_album/'); ?>">Gallery Album</a>
						</li>
						<li id="nav-tentang" class="">
							<a href="<?php echo site_url('admin/c_tentang/'); ?>">Tentang RW 017</a>
						</li>
						<!--
								<li id="nav-lembaga" class="">
									<a href="<? //php echo site_url('admin/c_lembaga_desa/');
												?>">Lembaga Desa</a>
								</li>-->
						<li id="nav-peta" class="">
							<a href="<?php echo site_url('admin/c_peta/'); ?>">Peta Desa</a>
						</li>
						<li id="nav-regulasi" class="">
							<a href="<?php echo site_url('admin/c_regulasi/'); ?>">Regulasi</a>
						</li>
					</ul>
				</div>
			</li>
			<!------------------------------------------------------------------------------------>

			<!---------------------DROPDOWN 2--------------------------------------------------------------->

			<li class="dropdownmenu">
				<a id="a-layanan" class="collapsed" data-toggle="collapse" href="#layanan">
					<i class="fa fa-server fa-fw"></i> Pelayanan <span class="fa arrow"></span></a>
				<div id="layanan" class="collapse">
					<ul id="" class="nav nav-pills nav-stacked nav-second-level ">
						<li id="nav-layanan" class="">
							<a href="<?php echo site_url('admin/c_layanan/'); ?>"><i class="fa fa-tasks"> Jenis Layanan</a></i>
						</li>
						<li id="nav-alur" class="">
							<a href="<?php echo site_url('admin/c_alur/'); ?>"><i class="fa fa-hand-o-right">Alur Kegiatan Layanan</a></i>
						</li>
					</ul>
				</div>
			</li>
			<!---------------------------------------------------------------------------------------------->
			<!---------------------DROPDOWN 4--------------------------------------------------------------->

			<li class="dropdownmenu">
				<a id="a-data-kader" class="collapsed" data-toggle="collapse" href="#data_kader">
					<i class="fa fa-server fa-fw"></i> Kader <span class="fa arrow"></span></a>
				<div id="data_kader" class="collapse">
					<ul id="" class="nav nav-pills nav-stacked nav-second-level ">
						<li id="nav-pkk" class="">
							<a href="<?php echo site_url('admin/c_pkk/'); ?>">Kader PKK</a>
						</li>
						<li id="nav-jumatik" class="">
							<a href="<?php echo site_url('admin/c_jumatik/'); ?>">Kader Jumatik</a>
						</li>
						<li id="nav-posyandu" class="">
							<a href="<?php echo site_url('admin/c_posyandu/'); ?>">Kader posyandu</a>
						</li>
						<li id="nav-posyandu2" class="">
							<a href="<?php echo site_url('admin/c_posyandu2/'); ?>">Kader Posyandu aster 2</a>
						</li>
						<li id="nav-posbindu" class="">
							<a href="<?php echo site_url('admin/c_posbindu/'); ?>">Kader posbindu</a>
						</li>
						<li id="nav-gsi" class="">
							<a href="<?php echo site_url('admin/c_gsi/'); ?>">Kader GSI</a>
						</li>
						<li id="nav-kwt" class="">
							<a href="<?php echo site_url('admin/c_kwt/'); ?>">Kader KWT</a>
						</li>
					</ul>
				</div>
			</li>
			<!---------------------DROPDOWN 5--------------------------------------------------------------->
			<li class="dropdownmenu">
				<a id="a-data-wilayah" class="collapsed" data-toggle="collapse" href="#pengelola_data_wilayah">
					<i class="fa fa-compass fa-fw"></i> Pengelolaan Data Wilayah <span class="fa arrow"></span></a>
				<div id="pengelola_data_wilayah" class="collapse">
					<ul id="" class="nav nav-pills nav-stacked nav-second-level">
						<li id="nav-provinsi" class="">
							<a href="<?php echo site_url('admin/c_provinsi/'); ?>">Pengelolaan Provinsi</a>
						</li>
						<li id="nav-kabkot" class="">
							<a href="<?php echo site_url('admin/c_kabkota/'); ?>">Pengelolaan Kabupaten Kota</a>
						</li>
						<li id="nav-kecamatan" class="">
							<a href="<?php echo site_url('admin/c_kec/'); ?>">Pengelolaan Kecamatan</a>
						</li>
						<li id="nav-desa" class="">
							<a href="<?php echo site_url('admin/c_desa/'); ?>">Pengelolaan Desa</a>
						</li>
						<li id="nav-dusun" class="">
							<a href="<?php echo site_url('admin/c_dusun/'); ?>">Pengelolaan Dusun</a>
						</li>
						<li id="nav-rw" class="">
							<a href="<?php echo site_url('admin/c_rw/'); ?>">Pengelolaan RW</a>
						</li>
						<li id="nav-rt" class="">
							<a href="<?php echo site_url('admin/c_rt/'); ?>">Pengelolaan RT</a>
						</li>
					</ul>
				</div>
			</li>
			<!------------------------------------------------------------------------------------>

			<!---------------------DROPDOWN 6--------------------------------------------------------------->
			<li class="dropdownmenu">
				<a class="collapsed" data-toggle="collapse" href="#pengelola_ekonomi_desa">
					<i class="fa fa-list fa-fw"></i> Potensi Ekonomi Desa <span class="fa arrow"></span></a>
				<div id="pengelola_ekonomi_desa" class="collapse">
					<ul id="" class="nav nav-pills nav-stacked nav-second-level">
						<li id="nav-pertanian" class="">
							<a href="<?php echo site_url('admin/c_ped_pertanian/'); ?>">Pertanian</a>
						</li>
						<li id="nav-perkebunan" class="">
							<a href="<?php echo site_url('admin/c_ped_perkebunan/'); ?>">Perkebunan</a>
						</li>
						<li id="nav-pertambakan" class="">
							<a href="<?php echo site_url('admin/c_ped_pertambakan/'); ?>">Pertambakan</a>
						</li>
						<li id="nav-sumber_air" class="">
							<a href="<?php echo site_url('admin/c_ped_sumber_air/'); ?>">Sumber Air</a>
						</li>
						<li id="nav-sumber_energi" class="">
							<a href="<?php echo site_url('admin/c_ped_sumber_energi/'); ?>">Sumber Energi</a>
						</li>
						<li id="nav-potensi_wisata" class="">
							<a href="<?php echo site_url('admin/c_ped_potensi_wisata/'); ?>">Potensi Wisata</a>
						</li>
					</ul>
				</div>
			</li>
			<!------------------------------------------------------------------------------------>

			<li>
				<a href="<?php echo site_url('pustaka/c_perangkat/'); ?>" id="a-perangkat" class=""><i class="fa fa-star fa-fw"></i> Perangkat Desa</a>
			</li>
			<li>
				<a href="<?php echo site_url('c_kontak/'); ?>" id="a-kontak" class=""><i class="fa fa-envelope fa-fw"></i> <span class="badge badge-light">Pesan</span> </a>
			</li>
			<li>
				<a class="" href="<?php echo site_url('c_aduan/'); ?>" id="a-aduan" class=""><i class="fa fa-user-secret fa-fw"></i><span class="badge badge-light"> Aduan Warga </span></a>
			</li>
		</ul>
	</div>
	<!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
