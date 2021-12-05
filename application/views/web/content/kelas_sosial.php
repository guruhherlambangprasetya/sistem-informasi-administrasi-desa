<div id="container" style="min-width: 400px; height: 550px; margin: 0 auto;">
</div>


<p></p><hr/>    
<h2><span>Statistik</span> dalam Tabel</h2>
<table class="table table-bordered" style="width:100%">
    <tr style = "background-color : #F6F2FC">
        <th width="20" align="center">No</th>
        <th width="50%" style="text-align:center;">Statistik</th>
        <th width="50%" style="text-align:center;">Jumlah Keluarga</th>
    </tr>
	<tr style = "background-color : green">	
		<td>4</td>
		<td style="text-align:center;">Kaya</td>
		<td style="text-align:center;"><?php echo $jumlah_kaya  ;?></td>
	<tr>
	<tr style = "background-color : blue">	
		<td>3</td>
		<td style="text-align:center;">Sangat Mampu</td>
		<td style="text-align:center;"><?php echo $jumlah_sedang  ;?></td>
	<tr>
	<tr style = "background-color : cyan">	
		<td>2</td>
		<td style="text-align:center;">Mampu</td>
		<td style="text-align:center;"><?php echo $jumlah_miskin  ;?></td>
	<tr>
    <tr style = "background-color : red">	
		<td>1</td>
		<td style="text-align:center;">Tidak Mampu</td>
		<td style="text-align:center;"><?php echo $jumlah_sangat_miskin  ;?></td>
	<tr>             
	<tr style = "background-color : Yellow">
	  <td colspan="2" style="text-align:right;">Total Keluarga</td>
	  <td style="text-align:center;"><?php echo $total_kelas_sosial;	?></td>
	</tr>
</table>
