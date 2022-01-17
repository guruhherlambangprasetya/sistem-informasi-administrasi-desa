
<?php 	
	$isi = $demografi->isi_demografi; 	
	$banner = $demografi->foto_banner; 
	$tempWaktu = $demografi->waktu;
	$tanggal = date("d", strtotime($tempWaktu));
	$bulan = date("n", strtotime($tempWaktu));
	$tahun = date("Y", strtotime($tempWaktu));
	$nama = $demografi->id_pengguna;
	$jam = date("G:i:s", strtotime($tempWaktu));
	$namabulan = array("","Januari","Februari","Maret","April","Mei","Juni",
	"Juli","Agustus","September","Oktober","November","Desember");
?>
<legend></legend>
	<div class="panel panel-primary">
    <div class="panel-body"><center><h3>DEMOGRAFI</h3></center></div>
	</div>
</div>	
	<img id="displayPhoto" src='<?php echo site_url($banner);?>' style="width:100%; margin-bottom: 10px"> 
	
	<div class="body-content">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="uppercase" style="color:#3C3C3C">1. Keadaan Umum Wilayah RW : 017</h4>
		</div>
			<div class="panel-body">
				<div class="box">
					<div class="box-header">        

					</div>
					<div class="box-content">
						<div class="col-md-12">
							<?php echo $isi;?>		
						</div>						
					</div>
				</div>
			</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="uppercase" style="color:#3C3C3C">2. Sarana & Prasarana di lingkungan <b>Rukun Warga 017</b></h4>
		</div>
			<div class="panel-body">
				<div class="box">
					<div class="box-header">        

					</div>
					<div class="box-content">
						<div class="col-md-12">
					
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Lapangan')" id="defaultOpen">Lapangan Serbaguna Khusus di lingkungan RW 017</button>
  <button class="tablinks" onclick="openCity(event, 'Posyandu')">Posyandu</button>
  <button class="tablinks" onclick="openCity(event, 'Posbindu')">Posbindu</button>
  <button class="tablinks" onclick="openCity(event, 'SD')">SD</button>
  <button class="tablinks" onclick="openCity(event, 'SMP')">SMP</button>
</div>

<div id="Lapangan" class="tabcontent">
<center>  <h3><b>Lapangan Serbaguna khusus di lingkungan RW 017</b></h3></center> 
  <legend></legend>
  <blockquote>
    <p>Segera dibangun lapangan serbaguna beralamat : Jl. P.Selayar, RW.017, Aren Jaya, Kec. Bekasi Tim., Kota Bks, Jawa Barat 17111</p>
    <footer>Lapangan Serbaguna Rukun Warga 017<cite title="Lapangan Serbaguna Rukun Warga 017"></cite></footer>
  </blockquote>
</div>

<div id="Posyandu" class="tabcontent">
 <center><h3><b>POSYANDU</b></h3></center> 
  <legend></legend>
  <blockquote><p><b>Posyandu</b> merupakan kegiatan swadaya dari masyarakat di bidang kesehatan dengan penanggung jawab kepala desa. A.A. Gde Muninjaya (2002:169) mengatakan: ”Pelayanan kesehatan terpadu (yandu) adalah suatu bentuk keterpaduan pelayanan kesehatan yang dilaksanakan di suatu wilayah kerja Puskesmas. 
    &nbsp;<br>Tempat pelaksanaan pelayanan program terpadu di balai dusun, balai kelurahan, RW, dan sebagainya disebut dengan Pos pelayanan terpadu (Posyandu)”. 
    <br>Konsep Posyandu berkaitan erat dengan keterpaduan. Keterpaduan yang dimaksud meliputi keterpaduan dalam aspek sasaran, aspek lokasi kegiatan, aspek petugas penyelenggara, aspek dana dan lain sebagainya.</br></p> 
  <footer>Posyandu Rukun Warga 017<cite title="Posyandu Rukun Warga 017"></cite></footer>
  </blockquote> 
</div>

<div id="Posbindu" class="tabcontent">
<center> <h3><b>POSBINDU</b></h3></center> 
  <legend></legend>
  <blockquote><p><b>Pos Binaan Terpadu (POSBINDU)</b> adalah kegiatan monitoring dan deteksi dini faktor resiko penyakit tidak menular terintegrasi serta gangguan akibat kecelakaan dan tindakan kekerasan dalam rumah tangga yang dikelola oleh masyarakat melalui pembinaan terpadu.
</p>
<footer>Posbindu Rukun Warga 017<cite title="Posbindu Rukun Warga 017"></cite></footer>
</blockquote>
</div>

<div id="SD" class="tabcontent">
<center>  <h3><b>SEKOLAH DASAR</b></h3></center> 
  <legend></legend>
  <blockquote><p><b>Sekolah dasar (disingkat SD)</b> adalah jenjang paling dasar pada pendidikan formal di Indonesia. Sekolah dasar ditempuh dalam waktu 6 tahun, mulai dari kelas 1 sampai kelas 6. Saat ini murid kelas 6 diwajibkan mengikuti Ujian Nasional (EBTANAS) yang mempengaruhi kelulusan siswa. Lulusan sekolah dasar dapat melanjutkan pendidikan ke tingkat SMP/SLTP.
</p>
<footer>Sekolah Dasar Aren Jaya<cite title="Sekolah Dasar Aren Jaya"></cite></footer>
</blockquote>
</div>

<div id="SMP" class="tabcontent">
<center>  <h3><b>SEKOLAH MENENGAH PERTAMA</b></h3></center> 
  <legend></legend>
  <blockquote><p><b>Sekolah Menengah Pertama (disingkat SMP)</b> adalah jenjang pendidikan dasar pada pendidikan formal di Indonesia yang ditempuh setelah lulus sekolah dasar (atau sederajat). Sekolah menengah pertama ditempuh dalam waktu 3 tahun, mulai dari kelas 7 sampai kelas 9. Pada tahun ajaran 1994/1995 hingga 2003/2004, sekolah ini pernah disebut sekolah lanjutan tingkat pertama (SLTP).
</p>
<footer>SMP Al-Hidayah<cite title="SMP Al-Hidayah"></cite></footer>
</blockquote>
</div>

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
</script><legend></legend>&nbsp;		
						</div>						
					</div>
				</div>
			</div>
	</div>
	
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="uppercase" style="color:#3C3C3C">3. Jumlah Kepala Keluarga & Luas wilayah RT Di wilayah lingkungan <b>RW</b> : 017</h4>
		</div>
			<div class="panel-body">
				<div class="box">
					<div class="box-header">        

					</div>
					<div class="box-content">
							
						<div class="col-md-12">
							<table class="table table-condensed" style="width:100%">
							<td colspan="5" style="text-align:left;"><b>A. Kepala Keluarga</b></td>
								<tr style = "background-color : #F6F2FC">
									<th width="2%" align="center">No</th>
									<th width="10%" style="text-align:center;">Wilayah RT</th>		
									<th width="10%" style="text-align:center;">Laki-Laki</th>		
									<th width="10%" style="text-align:center;">Perempuan</th>
								</tr>
								
								<?php
									$rows = $keluarga;
									$count = 0;
									$totalLaki = 0;
									$totalPerempuan = 0;
									$total = 0;
									$warna = '';
									foreach($rows as $row)
									{
										$count++;
										if($count%2==0){$warna='#FDFBFF';}
										else{$warna='#FBF9FF';}
										echo'
										<tr style = "background-color : '.$warna.'">	
											<td>'.$count.'</td>
											<td style="text-align:center;">'.$row->rt.'</td>				
											<td style="text-align:center;">'.$row->laki.'</td>
											<td style="text-align:center;">'.$row->perempuan.'</td>
										<tr>
										';	
										$totalLaki = $totalLaki + $row->laki;		
										$totalPerempuan = $totalPerempuan + $row->perempuan;		
									}
								?>
								<tr style = "background-color : yellow">
								  <td colspan="2" style="text-align:center;">Total Kepala Keluarga RT  </td>
								  <td style="text-align:center;"><?php echo $totalLaki;	?></td>
								  <td style="text-align:center;"><?php echo $totalPerempuan;?></td>
								</tr>
							</table>
						</div>

						<div class="col-md-12">
							<table class="table table-condensed" style="width:100%">
							<td colspan="5" style="text-align:left;"><b>B. Luas Wilayah RT</b></td>
								<tr style = "background-color : #F6F2FC">
									<th width="2%" align="center">No</th>
									<th width="10%" style="text-align:center;">Wilayah RT</th>		
									<th width="10%" style="text-align:center;">Luas wilayah</th>		
								</tr>
								
								<?php
									$rows = $keluarga;
									$count = 0;
									$totalLaki = 0;
									$totalPerempuan = 0;
									$total = 0;
									$warna = '';
									foreach($rows as $row)
									{
										$count++;
										if($count%2==0){$warna='#FDFBFF';}
										else{$warna='#FBF9FF';}
										echo'
										<tr style = "background-color : '.$warna.'">	
											<td>'.$count.'</td>
											<td style="text-align:center;">'.$row->rt.'</td>				
											<td style="text-align:center;">'.$row->laki.'</td>
										<tr>
										';	
										$totalLaki = $totalLaki + $row->laki;		
										$totalPerempuan = $totalPerempuan + $row->perempuan;		
										$luas_wilayah = $luas_wilayah + $row->jumlah;			
									}
								?>
								<tr style = "background-color : yellow">
								  <td colspan="2" style="text-align:center;">Total Luas Wilayah RT  </td>
								  <td style="text-align:center;"><?php echo $totalLaki;	?></td>
								</tr>
							</table>
						</div>
						</div>
					</div>
				</div>
			</div>
			<p>
<!--
								<br>
								<b>Ditulis Oleh </b>: 
								<?php echo $nama; ?>, 
								<?php echo $tanggal." ".$namabulan[$bulan]." ".$tahun;?>
								<?php echo $jam?> WIB			
-->
							</p>
	</div>
	

<script type="text/javascript" charset="utf-8">			
			 function nav_active(){
				var r = document.getElementById("nav-home");
				r.className = "";
				
				var d = document.getElementById("nav-profil");
				d.className = d.className + "active";
				}

			$(document).ready(function(){  
			document.getElementById("displayPhoto").src = <?php echo site_url($demografi);?>;
			});
</script>	
 