<!DOCTYPE html>
<html>
<head>
	<title>Nilai Mahasiswa</title>
	<link rel="stylesheet" href="style/style.css">
</head>
<body>
<center>
	<h2>Nilai Semua Mahasiswa</h2>
	<br>
	<a href="index.php"><button>Home</button></a>
	<br><br>
	<table class="table">
		<tr class="tr">
			<form method="post" action="">
			<th class="th" colspan="1">Cari</th>
			<td class="td" colspan="3">
				<select  class="text_field" name="txt_prodi" id="txt_prodi">
					<?php 
					include "koneksi.php";
					$qry_kampus = mysql_query("SELECT * FROM tb_kampus")or die(mysql_error());
					while ($dt_kampus = mysql_fetch_array($qry_kampus)) {
						echo "<option value=".$dt_kampus['prodi'].">".$dt_kampus['prodi']."</option>";
					}
					?>
				</select>
				<input type="submit" name="btn_cari_prodi">
			</td>
			<td class="td" colspan="6">
				<input class="text_field" type="text" name="txt_nama">
				<input type="submit" name="btn_cari_nama">
			</td>
			</form>
		</tr>
		<tr class="tr">
			<th class="th" rowspan="2">No. Bp</th>
			<th class="th" rowspan="2">Mahasiswa</th>
			<th class="th" colspan="5">Nilai</th>
			<th class="th" rowspan="2">Mutu</th>
			<th class="th" rowspan="2">Bobot</th>
			<th class="th" rowspan="2">Dosen</th>
		</tr>
		<tr class="tr">
			<th class="th">Tugas</th>
			<th class="th">UTS</th>
			<th class="th">Semester</th>
			<th class="th">Akhir</th>
			<th class="th">Huruf</th>
		</tr>
		<?php
		//next option load from server 
		include "koneksi.php";
		if (isset($_POST['btn_cari_nama'])) {
			$nm_mhs = $_POST['txt_nama'];
			$qry_mhs = mysql_query("SELECT * FROM view_nilai WHERE namamhs LIKE '%$nm_mhs%'") or die(mysql_error());

			$num_row = mysql_num_rows($qry_mhs);

			if (!$num_row == 0) {
				while ($dt_nilai = mysql_fetch_assoc($qry_mhs)) {

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
			<td class="td"><?php echo $dt_nilai['nidn']; ?></td>
		</tr>
		<?php 		
				}
			}else{
				echo "hasil tidak ditemukan untuk \"$nm_mhs\"</br>";
			}
		}elseif (isset($_POST['btn_cari_prodi'])) {
			$prodi_mhs = $_POST['txt_prodi'];
			$qry_prodi = mysql_query("SELECT * FROM view_nilai WHERE prodi LIKE '%$prodi_mhs%' ") or die(mysql_error());
			if(!mysql_num_rows($qry_prodi) == 0){
				while ( $dt_nilai = mysql_fetch_assoc($qry_prodi)) {
					echo "<tr class='tr'>
							<td class='td'>". $dt_nilai['nobp'] ."</td>
							<td class='td'>". $dt_nilai['namamhs'] ."</td>
							<td class='td'>". $dt_nilai['nt'] ."</td>
							<td class='td'>". $dt_nilai['nmid'] ."</td>
							<td class='td'>". $dt_nilai['sem'] ."</td>
							<td class='td'>". $dt_nilai['nakhir'] ."</td>
							<td class='td'>". $dt_nilai['nhuruf'] ."</td>
							<td class='td'>". $dt_nilai['mutu'] ."</td>
							<td class='td'>". $dt_nilai['bobot'] ."</td>
							<td class='td'>". $dt_nilai['nidn'] ."</td>
						</tr>";
				}
			}

		}else {
			//default load from server
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
			<td class="td"><?php echo $dt_nilai['nidn']; ?></td>
		<?php 
			} 
		} 
		?>
		</tr>
	</table>
</center>
</body>
</html>