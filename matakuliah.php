<?php
//generate kdmk
include "koneksi.php";
$query_gen = mysql_query("SELECT kodemk FROM tb_mtk ORDER BY kodemk DESC") or die(mysql_error());
$dt_gen = mysql_fetch_array($query_gen);
if (mysql_num_rows($query_gen)==0) {
	$kd_mtk = "KK01";
}else{
	$kd_mtk = $dt_gen['kodemk'];
	$gen_kd = explode('KK', $kd_mtk);
	$kd_mtk = "KK".sprintf("%02s", $gen_kd[1]+1);
}

if (isset($_POST['btn_simpan'])) {

	$nm_mtk = $_POST['txt_mtk'];
	$sks_mtk = $_POST['txt_sks'];

	$query_simpan = mysql_query("INSERT INTO tb_mtk VALUES('$kd_mtk', '$nm_mtk', '$sks_mtk')");
}
error_reporting(0);
include "koneksi.php";
$id = $_GET['kodemk'];
$query = mysql_query("SELECT *FROM tb_mtk WHERE kodemk='$id'") or die(mysql_error());
$data_mtk = mysql_fetch_array($query);

if(!$id){
	echo "<style type='text/css'>
	#btn_edit, #btn_reset, #btn_hapus{
		display:none;
	}
	</style>";
}else{
	echo "<style type='text/css'>
	#btn_simpan,  #lb_id, #input_id{
		display:none;
	}
	</style>";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Matakuliah</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
<center>
<h2>Daftar Semua Matakuliah</h2>
<!-- <br><a href="index.php"><button>Home</button></a><br><br> -->
	<form action="" method="post">
		<table>
			<tr >
				<th >Kode</th>
				<td >
					<input id="input_id"	class="text_field" disabled="true" type="text" name="txt_kode" value="<?php echo $kd_mtk;?>">
					<label><?php echo $data_mtk['kodemk']; ?></label>
				</td>
			</tr>
			<tr >
				<th >Matakuliah</th>
				<td ><input class="text_field" type="text" name="txt_mtk" value="<?php echo $data_mtk['namamk']; ?>"></td>
			</tr>
			<tr >
				<th >SKS</th>
				<td><input class="text_field" type="number" name="txt_sks" value="<?php echo $data_mtk['sks']; ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="btn_simpan" id="btn_simpan" value="Tambah">
					<input type="submit" name="btn_edit" id="btn_edit" value="Perbarui">
					<input type="submit" name="btn_hapus" id="btn_hapus" value="Hapus">
				</td>
			</tr>
		</table>
	</form><br>
	<a href="index.php"><button>Home</button></a>
	<a id="btn_reset" href="matakuliah.php"><button>Form simpan</button></a>
	<br><br>
	<table class="table">
		<tr class="tr">
			<th class="th">No</th>
			<th class="th">Kode Matakuliah</th>
			<th class="th">Matakuliah</th>
			<th class="th">Sks</th>
			<th class="th">Aksi</th>
		</tr>
		<?php $no=0; 
		include "koneksi.php";
		$query_mtk = mysql_query("SELECT *FROM tb_mtk") or die(mysql_error());
		while ($dt_mtk = mysql_fetch_array($query_mtk)) {
			$no++;
		?>
		<tr class="tr">
			<td class="td"><?php echo $no; ?></td>
			<td class="td"><?php echo $dt_mtk['kodemk'] ?></td>
			<td class="td"><?php echo $dt_mtk['namamk'] ?></td>
			<td class="td"><?php echo $dt_mtk['sks'] ?></td>
			<td class="td"><a href="matakuliah.php?kodemk=<?php echo $dt_mtk['kodemk']; ?>"><button name="btn_pilih">Pilih</button></a></td>
		</tr>
		<?php } ?>
	</table>
</center>
</body>
</html>