<?php 
include "koneksi.php";
$nidn = $_GET['id_dsn'];
$qry_dsn = mysql_query("SELECT * FROM view_nilai WHERE nidn='$nidn'") or die(mysql_error());
$dt_dsn = mysql_fetch_array($qry_dsn);
?>
<?php 
if (isset($_POST['btn_show'])) {
	echo "<style type='text/css'>
			#tr_hide, #btn_hide{
				display: true;
			}
			#btn_show{
				display:none;
			}
		</style>";
}else{
	echo "<style type='text/css'>
			#tr_hide, #btn_hide{
				display: none;
			}
		</style>";
}

if (isset($_POST['btn_spn'])) {
	include "koneksi.php";
	$v_sem = $_POST['txt_sem'];
	$v_ta = $_POST['txt_ta'];
	$v_prodi = $_POST['txt_prodi'];
	$v_nidn = $_POST['txt_nidn'];
	$v_mhs = $_POST['txt_mhs'];
	$v_mtk = $_POST['txt_mtk'];
	$v_nt = $_POST['txt_nt'];
	$v_nu = $_POST['txt_nu'];
	$v_ns = $_POST['txt_ns'];
	$v_na = $_POST['txt_na'];
	
	$qry_spn = mysql_query("INSERT INTO tb_nilai VALUES('0', '$v_sem', '$v_ta', '$v_nidn', '$v_prodi', '$v_mhs', '$v_mtk', '$v_nt', '$v_nu', '$v_ns', '$v_na', '-' , '0', '0' )") or die(mysql_error());
	echo "<meta http-equiv=refresh content=1;url=nilai.php?id_dsn=$nidn>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Nilai Mahasiswa</title>
	<link rel="stylesheet" href="style/style.css">
</head>
<body>
<center>
	<h2>Nilai Mahasiswa</h2>
	<form action="" method="post">
		<table>
			<tr>
				<th></th>
			</tr>
		</table>
	</form>
	<br>
	<a href="dosen.php"><button>Dosen</button></a>
	<br><br>
	<table class="table">
		<form method="post" action="">
		<tr class="tr">
			<th class="th" colspan="1">Dosen</th>
			<td class="td" colspan="8"><?php echo $dt_dsn['namadosen']; ?></td>
			<td class="td" colspan="1">
				<button name="btn_show" id="btn_show">Sunting nilai</button>
				<button name="btn_hide" id="btn_hide">Sunting nilai</button>
			</td>
		</tr>
		<tr id="tr_hide" class="tr">
			<th class="th" colspan="2"></th>
			<th class="th" colspan="2">Semester</th>
			<th class="th" colspan="3"><input type="text" name="txt_sem" class="text_field"></th>
			<th class="th" colspan="3"></th>
		</tr>
		<tr id="tr_hide" class="tr">
			<th class="th" colspan="2"></th>
			<th class="th" colspan="2">TA</th>
			<th class="th" colspan="3"><input type="text" name="txt_ta" class="text_field"></th>
			<th class="th" colspan="3"></th>
		</tr>
		<tr id="tr_hide" class="tr">
			<th class="th" colspan="2"></th>
			<th class="th" colspan="2">Prodi</th>
			<th class="th" colspan="3"><input type="text" name="txt_prodi" class="text_field"></th>
			<th class="th" colspan="3"></th>
		</tr>
		<tr id="tr_hide" class="tr">
			<th class="th" colspan="2"></th>
			<th class="th" colspan="2">Dosen</th>
			<th class="th" colspan="3"><input type="text" name="txt_nidn" class="text_field"></th>
			<th class="th" colspan="3"></th>
		</tr>
		<tr id="tr_hide" class="tr">
			<th class="th" colspan="2"></th>
			<th class="th" colspan="2">Mahasiswa</th>
			<th class="th" colspan="3"><input type="text" name="txt_mhs" class="text_field"></th>
			<th class="th" colspan="3"></th>
		</tr>
		<tr id="tr_hide" class="tr">
			<th class="th" colspan="2"></th>
			<th class="th" colspan="2">Matakuliah</th>
			<th class="th" colspan="3"><input type="text" name="txt_mtk" class="text_field"></th>
			<th class="th" colspan="3"></th>
		</tr>
		<tr id="tr_hide" class="tr">
			<th class="th" colspan="2"></th>
			<th class="th" colspan="2">Tugas</th>
			<th class="th" colspan="3"><input type="text" name="txt_nt" class="text_field"></th>
			<th class="th" colspan="3"></th>
		</tr>
		<tr id="tr_hide" class="tr">
			<th class="th" colspan="2"></th>
			<th class="th" colspan="2">UTS</th>
			<th class="th" colspan="3"><input type="text" name="txt_nu" class="text_field"></th>
			<th class="th" colspan="3"></th>
		</tr>
		<tr id="tr_hide" class="tr">
			<th class="th" colspan="2"></th>
			<th class="th" colspan="2">SEM</th>
			<th class="th" colspan="3"><input type="text" name="txt_ns" class="text_field"></th>
			<th class="th" colspan="3"></th>
		</tr>
		<tr id="tr_hide" class="tr">
			<th class="th" colspan="2"></th>
			<th class="th" colspan="2">Akhir</th>
			<th class="th" colspan="3"><input type="text" name="txt_na" class="text_field"></th>
			<th class="th" colspan="3"></th>
		</tr>
		<tr id="tr_hide" class="tr">
			<th class="th" colspan="10">
				<input type="submit" name="btn_spn" class="btn_spn" value="Simpan">
			</th>
		</tr>
		</form>
		<tr class="tr">
			<th class="th" rowspan="2">No. Bp</th>
			<th class="th" rowspan="2">Mahasiswa</th>
			<th class="th" colspan="5">Nilai</th>
			<th class="th" rowspan="2">Mutu</th>
			<th class="th" rowspan="2">Bobot</th>
			<th class="th" rowspan="2">Semester</th>
		</tr>
		<tr class="tr">
			<th class="th">Tugas</th>
			<th class="th">UTS</th>
			<th class="th">Semester</th>
			<th class="th">Akhir</th>
			<th class="th">Huruf</th>
		</tr>
		<?php
			//default load from server
			include "koneksi.php"; 
			$nidn = $_GET['id_dsn'];
			$query_nilai = mysql_query("SELECT * FROM view_nilai WHERE nidn='$nidn'") or die(mysql_error());
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
			<td class="td"><?php echo $dt_nilai['semester']; ?></td>
		<?php 
			} 
		?>
		</tr>
	</table>
</center>
</body>
</html>