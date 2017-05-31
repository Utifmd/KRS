<?php 
include "koneksi.php";

//hapus command
if(isset($_POST['btn_hapus'])){
	//include "koneksi.php";
	$id = $_GET['kodekrs'];
	$delete = mysql_query("DELETE FROM tb_krs_able WHERE kodekrs='$id'") or die (mysql_error());
	$delete = mysql_query("DELETE FROM tb_krs WHERE kodekrs='$id'") or die (mysql_error());
	echo "<meta http-equiv=refresh content=1;url=krs_able.php>";
}


if(isset($_POST['btn_spn'])) {
	//generate kode krs
	include "koneksi.php";
	$query_gen = mysql_query("SELECT kodekrs FROM tb_krs_able ORDER BY kodekrs DESC") or die(mysql_error());
	$dt_gen = mysql_fetch_array($query_gen);
	if (mysql_num_rows($query_gen)==0) {
		$kd_krs = "KRS01";
	}else{
		$kd_krs = $dt_gen['kodekrs'];
		$gen_kd = explode('KRS', $kd_krs);
		$kd_krs = "KRS".sprintf("%02s", $gen_kd[1]+1);
	}

	include "koneksi.php";
	$kd_mtk = $_POST['txt_mtk'];
	$kd_kps = $_POST['txt_kps'];
	$nidn = $_POST['txt_nidn'];
	$sem = $_POST['txt_sem'];
	$ta = $_POST['txt_tahun'];
	$hari = $_POST['txt_hari'];
	$jm_mul = $_POST['txt_jam_mulai'];
	$jm_sel = $_POST['txt_jam_selesai'];
	
	$spn = mysql_query("INSERT INTO tb_krs_able VALUES('$kd_krs', '$kd_mtk', '$kd_kps', '$nidn', '$sem', '$ta', '$hari', '$jm_mul', '$jm_sel')");
	echo "<meta http-equiv=refresh content=1;url=krs_able.php>";
}

//generate kode krs
include "koneksi.php";
$query_gen = mysql_query("SELECT kodekrs FROM tb_krs_able ORDER BY kodekrs DESC") or die(mysql_error());
$dt_gen = mysql_fetch_array($query_gen);
if (mysql_num_rows($query_gen)==0) {
	$kd_krs = "KRS01";
}else{
	$kd_krs = $dt_gen['kodekrs'];
	$gen_kd = explode('KRS', $kd_krs);
	$kd_krs = "KRS".sprintf("%02s", $gen_kd[1]+1);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Available of KRS</title>
	<link rel="stylesheet" href="style/style.css">
</head>
<body>
<center>
	<h2>Daftar KRS yang tersedia</h2>
	<br><br>
		<table>
			<form method="post">
			<tr>
				<th>KRS</th>
				<td>
					<label name="txt_kdkrs" id="txt_kdkrs"><?php echo $kd_krs; ?></label>
				</td>
			</tr>
			<tr>
				<th>Matakuliah</th>
				<td>
					<select class="text_field" name="txt_mtk" id="txt_mtk">
						<?php 
						include "koneksi.php";
						$query_mtk = mysql_query("SELECT *FROM tb_mtk") or die(mysql_error());
						while ($dt_mtk = mysql_fetch_array($query_mtk)) {
							echo "<option value=".$dt_mtk['kodemk'].">".$dt_mtk['namamk']."</option>";
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<th>Kampus</th>
				<td>
					<select class="text_field" name="txt_kps" id="txt_kps">
						<?php 
						include "koneksi.php";
						$query_kps = mysql_query("SELECT *FROM tb_kampus") or die(mysql_error());
						while ($dt_kps = mysql_fetch_array($query_kps)) {
							echo "<option value=".$dt_kps['kodekampus'].">".$dt_kps['kampus']."</option>";
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<th>Nidn</th>
				<td>
					<select class="text_field" name="txt_nidn" id="txt_nidn">
						<?php 
						include "koneksi.php";
						$query_dsn = mysql_query("SELECT *FROM tb_dsn") or die(mysql_error());
						while ($dt_dsn = mysql_fetch_array($query_dsn)) {
							echo "<option value=".$dt_dsn['nidn'].">".$dt_dsn['namadosen']."</option>";
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<th>Semester</th>
				<td>
					<select name="txt_sem" id="txt_sem" class="text_field">
						<option value="GA">Ganjil</option>
						<option value="GE">Genap</option>
					</select> 
				</td>
			</tr>
			<tr>
				<th>TA</th>
				<td><input type="text" name="txt_tahun" class="text_field" value="<?php echo date("Y/Y"); ?>"></td>
			</tr>
			<tr>
				<th>Hari</th>
				<td>
					<select name="txt_hari" id="txt_hari" class="text_field">
						<option value="SEN">Senin</option>
						<option value="SEL">Selasa</option>
						<option value="RAB">Rabu</option>
						<option value="KAM">Kamis</option>
						<option value="JUM">Jum'at</option>
						<option value="SAB">Sabtu</option>
						<option value="MIN">Minggu</option>
					</select>
				</td>
			</tr>
			<tr>
				<th>Jam mulai</th>
				<td>
					<input class="text_field" value="<?php echo date("h:i"); ?>" type="text" name="txt_jam_mulai"> 
				</td>
			</tr>
			<tr>
				<th>Jam selesai</th>
				<td>
					<input class="text_field" value="<?php echo date("h:i"); ?>" type="text" name="txt_jam_selesai">
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="btn_spn" id="btn_spn" value="Simpan">
					<input type="submit" name="btn_hapus" id="btn_hapus" value="Hapus">
				</td>
			</tr>
			</form>
		</table>
	<br><br>
	<a href="index.php"><button>Home</button></a>
	<br><br>
	<table class="table">
		<tr class="tr">
			<th class="th" rowspan="2">No</th>
			<th class="th" rowspan="2">Matakuliah</th>
			<th class="th" colspan="3">KODE</th>
			<th class="th" rowspan="2">Nidn</th>
			<th class="th" rowspan="2">Semester</th>
			<th class="th" rowspan="2">TA</th>
			<th class="th" rowspan="2">Hari</th>
			<th class="th" rowspan="2">Jam mulai</th>
			<th class="th" rowspan="2">Jam selesi</th>
			<th class="th" rowspan="2">Aksi</th>
		</tr>
		<tr class="tr">
			<th class="th">KRS</th>
			<th class="th">Matakuliah</th>
			<th class="th">Kampus</th>
		</tr>
		<?php 
		include "koneksi.php"; $no=0;
		$query_krs_able = mysql_query("SELECT * FROM view_krs_able") or die(mysql_error());
		while ($dt_krs_able = mysql_fetch_array($query_krs_able)) {
			$no++;
			if($dt_krs_able['sem']=='GE'){
					$sem = "GENAP";
				}else{
					$sem = "GANJIL";
				};
				
				if($dt_krs_able['hari_krs']=='SEN'){
					$hari = "SENEN";
				}elseif($dt_krs_able['hari_krs']=='SEL'){
					$hari = "SELASA";
				}elseif($dt_krs_able['hari_krs']=='RAB'){
					$hari = "RABU";
				}elseif($dt_krs_able['hari_krs']=='KAM'){
					$hari = "KAMIS";
				}elseif($dt_krs_able['hari_krs']=='JUM'){
					$hari = "JUMAT";
				}elseif($dt_krs_able['hari_krs']=='SAB'){
					$hari = "SABTU";
				}else{
					$hari = "MINGGU";
				};
		?>
		<tr>
			<td class="td"><?php echo $no; ?>.</td>
			<td class="td"><?php echo $dt_krs_able['namamk']; ?></td>
			<td class="td"><?php echo $dt_krs_able['kodekrs']; ?></td>
			<td class="td"><?php echo $dt_krs_able['kodemk']; ?></td>
			<td class="td"><?php echo $dt_krs_able['kodekampus']; ?></td>
			<td class="td"><?php echo $dt_krs_able['nidn']; ?></td>
			<td class="td"><?php echo $sem; ?></td>
			<td class="td"><?php echo $dt_krs_able['tahun_krs']; ?></td>
			<td class="td"><?php echo $hari; ?></td>
			<td class="td"><?php echo $dt_krs_able['jam_mulai']; ?></td>
			<td class="td"><?php echo $dt_krs_able['jam_selesai']; ?></td>
			<td class="td"><a href="krs_able.php?kodekrs=<?php echo $dt_krs_able['kodekrs']; ?>"><button>Pilih</button></a></td>
		</tr>
		<?php } ?>
	</table>
</center>
<br><br><br><br>
</body>
</html>