<legend></legend>
<div class="panel panel-danger">
    <div class="panel-body"><center><h3>DOWNLOAD FILE SURAT PENTING KHUSUS RT</h3></center></div>
	</div>
</div>	
<legend></legend>
		<div class="row">
		<?php
			$i=0;
			foreach($regulasi as $r)
			{
			$i++;
		?>
			<?php 	
			$id_regulasi = $r->id_regulasi;
			$judul_regulasi = $r->judul_regulasi;
			$isi_regulasi = $r->isi_regulasi;
			$file_regulasi = $r->file_regulasi;
			?>
			<div class="col-sm-5" >
				<div class="regulasi-content">
				<div class="regulasi-content-text">
				<table class="table table-bordered">
				<tr>
					<th><center>No</center></th>
					<th><center><?php echo $judul_regulasi;?></center></th>
					<th><center>Lihat & Download</center></th>
				</tr>
				<?php
				$no = 1;
				?>
				<tr>
					<td><center><?php echo $no++; ?></center></td>
					<td><center><?php echo $isi_regulasi;?></center></td>
					<td><center><button id="simpan" name="simpan" class="btn btn-warning" onclick="location.href='<?php echo site_url($file_regulasi);?>'" ><i class="fa fa-download"> | Download File</i></button></center></td>
				</tr>
				<tr style = "background-color :black">
					<td colspan="3"><h4>Catatan : &nbsp; <br>Setelah klik tombol <b>Download File</b><br>Silahkan klik bergambar ( <i class="fa fa-print"></li> ) lalu <b>Cetak</b> </h4></td>
				</tr>
				</table>
				</div>
				</div>
			
    			</div>
				
		<?php
			}
			?>
	</div>
			
	<script type="text/javascript" charset="utf-8">			
			 function nav_active(){
				var r = document.getElementById("nav-home");
				r.className = "";
				
				var d = document.getElementById("nav-regulasi");
				d.className = d.className + "active";
				}
	</script>