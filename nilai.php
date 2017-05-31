<!DOCTYPE html>
<html>
<head>
	<title>Nilai Mahasiswa</title>
	<link rel="stylesheet" href="style/style.css">
</head>
<body>
<center>
<h2>Nilai Semua Mahasiswa</h2>
	<table class="table">
		<tr class="tr">
			<th class="th">No. Bp</th>
			<th class="th">Mahasiswa</th>
			<th class="th">Nilai Tugas</th>
			<th class="th">Nilai UTS</th>
			<th class="th">Nilai Semester</th>
			<th class="th">Nilai Akhir</th>
			<th class="th">Nilai Huruf</th>
			<th class="th">Mutu</th>
			<th class="th">Bobot</th>
		</tr>
		<?php
		include "koneksi.php"; 
		$query_nilai = mysql_query("SELECT * FROM view_nilai") or die(mysql_error());
		while($dt_nilai = mysql_fetch_array($query_nilai)){
		?>
		<tr class="tr">
			<td class="td"><?php echo $dt_nilai['nobp']; ?></td>
			<td class="td"><?php echo $dt_nilai['namamhs']; ?></td>
			<td class="td"><?php echo $dt_nilai['nt']; ?></td>
			<td class="td"><?php echo $dt_nilai['nmid']; ?></td>
			<td class="td"><?php echo $dt_nilai['sem']; ?></td>
			<td class="td"><?php echo $dt_nilai['nakhir']; ?></td>
			<td class="td"><?php echo $dt_nilai['nhuruf']; ?></td>
			<td class="td"><?php echo $dt_nilai['mutu']; ?></td>
			<td class="td"><?php echo $dt_nilai['bobot']; ?></td>
		</tr>
		<?php } ?>
	</table>
</center>
</body>
</html>