<h3><?= $page_title ?></h3>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<button type="button" class="btn btn-danger" aria-label="Left Align" onclick="location.href='<?= base_url() ?>c_aduan'">
					<span class="fa fa-arrow-circle-left"> Kembali</span>
				</button>
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="table-responsive">
					<div class="col-lg-12 col-md-12">
						<table class='table table-striped'>
							<thead>
								<tr>
									<th>Tanggal Aduan</th>
									<th>Email Aduan</th>
									<th>Nama Aduan</th>
									<th>Judul Kejadian</th>
									<th>Dan Lainnya</th>
									<th>Ciri-Ciri</th>
									<th>Isi Kejadian</th>
									<th>Alamat Kejadian</th>
								</tr>
							</thead>

							<tbody>
								<?php
								$i = 0;
								foreach ($aduan as $rows) {
									$i++;
								?>
									<tr>
										<td><?php echo $rows->tgl_kejadian; ?></td>
										<td><?php echo $rows->email_aduan; ?></td>
										<td><?php echo $rows->nama_aduan; ?></td>
										<td><?php echo $rows->judul_kejadian; ?></td>
										<td><?php echo $rows->dan_lainnya; ?></td>
										<td><?php echo $rows->ciri_ciri; ?></td>
										<td><?php echo $rows->isi_kejadian; ?></td>
										<td><?php echo $rows->alamat_kejadian; ?></td>
									</tr>

								<?php
								}
								?>
							</tbody>

						</table>
					</div>
				</div>
			</div>
			<!-- /.panel-body -->
		</div>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<script>
	function nav_active() {
		document.getElementById("a-aduan").className = "collapsed active";
	}

	// very simple to use!
	$(document).ready(function() {
		nav_active();
	});
</script>