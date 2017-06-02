<!DOCTYPE html>
<html>
<head>
	<title>Dosen</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
<center>
	<h2>Daftar dosen</h2>
	<a href="index.php"><button>Home</button></a>
	<br><br>
	<table class="table">
		<tr class="tr">
			<th class="th">No.</th>
			<th class="th">Nidn</th>
			<th class="th">Dosen</th>
			<th class="th">Aksi</th>
		</tr>
		<?php 
		include "koneksi.php"; $no = 0;
		$qry_dsn = mysql_query("SELECT * FROM tb_dsn") or die(mysql_error());
		while ($dt_dsn = mysql_fetch_array($qry_dsn)) {
			$no++;
		?>
		<tr class="tr">
			<td class="td"><?php echo $no; ?></td>
			<td class="td"><?php echo $dt_dsn['nidn']; ?></td>
			<td class="td"><?php echo $dt_dsn['namadosen']; ?></td>
			<td class="td"><a href="nilai.php?id_dsn=<?php echo $dt_dsn['nidn'] ?>"><button>Nilai Mhs</button></a></td>
		</tr>
		<?php  
		}
		?>
	</table>
</center>
</body>
</html>