<div class="container">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>
	<div class="navbar-collapse collapse">
		<ul class="nav navbar-nav">
			<li id="nav-home" class=""><a href="<?php echo site_url('web/c_home/'); ?>">Beranda</a></li>
			<li id="nav-profil" class="dropdown">
				<a class="dropdown-toggle dropdownhover" data-toggle="dropdown" href="#">
					Profil RW 017 <span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					<li><a href="<?php echo site_url('web/c_sejarah/'); ?>">Sejarah RW 017</a></li>
					<li><a href="<?php echo site_url('web/c_visimisi/'); ?>">Visi dan Misi</a></li>
					<li><a href="<?php echo site_url('web/c_sambutan/'); ?>">Sambutan Pengurus Ketua RW 017</a></li>
					<li><a href="<?php echo site_url('web/c_struktur/'); ?>">Pengurus Ketua RT & RW</a></li>
					<li><a href="<?php echo site_url('web/c_demografi/'); ?>">Demografi</a></li>
					<li><a href="<?php echo site_url('web/c_ibadah/'); ?>">Tempat Ibadah</a></li>
				</ul>
			</li>
			<li id="nav-kader" class="dropdown">
				<a class="dropdown-toggle dropdownhover" data-toggle="dropdown" href="#">
					Kader RW 017<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					<li><a href="<?php echo site_url('web/c_pkk/'); ?>">Kader PKK RT & RW </a></li>
					<li><a href="<?php echo site_url('web/c_jumatik/'); ?>">Kader Jumatik </a></li>
					<li><a href="<?php echo site_url('web/c_posyandu/'); ?>">Kader Posyandu </a></li>
					<li><a href="<?php echo site_url('web/c_posyandu2/'); ?>">Kader posyandu aster 2 </a></li>
					<li><a href="<?php echo site_url('web/c_posbindu/'); ?>">Kader Posbindu </a></li>
					<li><a href="<?php echo site_url('web/c_gsi/'); ?>">Kader GSI </a></li>
					<li><a href="<?php echo site_url('web/c_kwt/'); ?>">Kader KWT </a></li>
				</ul>
			</li>
			<li id="nav-statistik" class="dropdown">
				<a class="dropdown-toggle dropdownhover" data-toggle="dropdown" href="#">
					Statistik Status <span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					<li><a href="<?php echo site_url('web/c_statistik_pekerjaan'); ?>">Pekerjaan</a></li>

					<li><a href="<?php echo site_url('web/c_statistik_pendidikan'); ?>">Pendidikan</a></li>
					<li><a href="<?php echo site_url('web/c_statistik_status_kawin'); ?>">Status Kawin</a></li>

					<li><a href="<?php echo site_url('web/c_statistik_goldar'); ?>">Golongan Darah</a></li>
					<li><a href="<?php echo site_url('web/c_statistik_agama'); ?>">Agama</a></li>


					<li><a href="<?php echo site_url('web/c_statistik_kelas_sosial'); ?>">Kelas Sosial</a></li>
					<li><a href="<?php echo site_url('web/c_statistik_raskin'); ?>">Raskin</a></li>
					<li><a href="<?php echo site_url('web/c_statistik_jamkesmas'); ?>">Jamkesmas</a></li>
					<li><a href="<?php echo site_url('web/c_statistik_pkh'); ?>">Program Keluarga Harapan</a></li>
					<li><a href="<?php echo site_url('web/c_statistik_kk'); ?>">Kepala Keluarga</a></li>
					<li><a href="<?php echo site_url('web/c_statistik_gizi_buruk'); ?>">Gizi Buruk</a></li>
					<li><a href="<?php echo site_url('web/c_statistik_kehamilan'); ?>">Kehamilan</a></li>
					<li><a href="<?php echo site_url('web/c_statistik_buruh_migran'); ?>">Buruh Migran</a></li>
					<li><a href="<?php echo site_url('web/c_statistik_bsm'); ?>">Bantuan Siswa Miskin</a></li>
					<li><a href="<?php echo site_url('web/c_statistik_piramida'); ?>">Piramida Penduduk</a></li>
				</ul>
			</li>
			<li id="nav-statistik" class="dropdown">
				<a class="dropdown-toggle dropdownhover" data-toggle="dropdown" href="#">
					Pelayanan<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					<li><a href="<?php echo site_url('web/c_alur/'); ?>">Alur Kegiatan Pelayanan </a></li>
					<li><a href="<?php echo site_url('web/c_layanan/'); ?>">Jenis Pelayanan </a></li>
				</ul>
			</li>
			<li id="nav-statistik" class="dropdown">
				<a class="dropdown-toggle dropdownhover" data-toggle="dropdown" href="#">
					Media<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					<li><a href="<?php echo site_url('web/c_berita/'); ?>">Pengumuman</a></li>
					<li><a href="<?php echo site_url('web/c_album/'); ?>">Foto Kegiatan</a></li>
					<li><a href="<?php echo site_url('web/c_regulasi/'); ?>">Agenda Khusus Ketua RT & RW </a></li>
				</ul>
			</li>

			<li id="nav-statistik" class="dropdown">
				<a class="dropdown-toggle dropdownhover" data-toggle="dropdown" href="#">
					Kontak Kami <span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					<li><a href="<?php echo site_url('web/c_peta/'); ?>">Lokasi Aren Jaya</a></li>
					<li class="divider"></li>
					<li><a href="<?php echo site_url('web/c_tentang/'); ?>">Tentang portal rw 017 & No.Darurat</a></li>
				</ul>
			</li>
		</ul>

		<ul class="nav navbar-nav navbar-right">
			<li class="navbar-right" id="navbar-search">
				<a>
					<i class="fa fa-search"></i>
				</a>
				<div class="hidden" id="navbar-search-box">

					<?php $this->load->helper(array('form', 'search')); ?>
					<?php echo form_open('web/c_pages/search/'); ?>
					<?php echo validation_errors(); ?>
					<fieldset>
						<div class="input-group">
							<input type="text" class="form-control" name="keyword" id="keyword" autofocus placeholder="Masukkan Kata Kunci">
							<span class="input-group-btn">
								<button class="btn btn-default" value="Submit" name="submit" type="submit">Cari</button>
							</span>
						</div>
					</fieldset>
					<?php echo form_close(); ?>
				</div>

			</li> &nbsp;

		</ul>



	</div>

</div>
</div>
</div>