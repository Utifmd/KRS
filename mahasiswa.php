<?php
include "koneksi.php";
if (isset($_POST['btn_simpan'])) {
	$no_bp = $_POST['txt_id_mhs'];
	$nm_mhs = $_POST['txt_mhs'];
	$gender = $_POST['txt_gender'];
	$tmp_lahir = $_POST['txt_tpt_lahir'];
	$tgl_lahir = $_POST['txt_tgl_lahir'];

	$query = mysql_query("insert into tb_mhs VALUES('$no_bp', '$nm_mhs', '$gender', '$tmp_lahir', '$tgl_lahir')");
	echo "<meta http-equiv=refresh content=1;url=mahasiswa.php>";
}
?>

<?php
if (isset($_POST['btn_edit'])){
    include "koneksi.php";
	
	$no_bp = $_POST['txt_id_mhs'];
	$nm_mhs = $_POST['txt_mhs'];
	$gender = $_POST['txt_gender'];
	$tmp_lahir = $_POST['txt_tpt_lahir'];
	$tgl_lahir = $_POST['txt_tgl_lahir'];

    mysql_query("UPDATE tb_mhs SET namamhs='$nm_mhs',jeniskel='$gender',tmplahir='$tmp_lahir', tgllahir='$tgl_lahir' WHERE nobp='$no_bp' ") or die (mysql_error());
}
?>

<?php
error_reporting(0);
include "koneksi.php";
$id = $_GET['id_mhs'];
$query = mysql_query("SELECT * FROM tb_mhs WHERE nobp='$id' ") or die(mysql_error());
$data_mhs = mysql_fetch_array($query);

$vno_bp = $data_mhs['nobp'];
$vnm_mhs = $data_mhs['namamhs'];
$vgender = $data_mhs['jeniskel'];
$vtmp_lahir = $data_mhs['tmplahir'];
$vtgl_lahir = $data_mhs['tgllahir'];

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

<?php

if(isset($_POST['btn_hapus'])){
	include "koneksi.php";
	$id = $_GET['id_mhs'];
	$delete=mysql_query("DELETE FROM tb_mhs WHERE nobp='$id'") or die (mysql_error());
	echo "<meta http-equiv=refresh content=1;url=mahasiswa.php>";
}

/*echo ($_GET['id_mhs']=='L' ? 'checked' : '');
$id = $_GET['id_mhs'];*/
//error_reporting(0);
//$id = ($_GET['id_mhs']==1 ? '' : '13100031');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="style/style.css" />
</head>
<body>
<center>
	<br />
	<h2>Daftar Mahasiswa</h2>	
	<br />
	<table>
		<form method="post">	 
			<tr>
				<th>No. Bp</th>
				<td><input class="text_field" id="input_id" type="text" name="txt_id_mhs" value="<?php echo $vno_bp;?>"><?php echo $vno_bp;?></td>
			</tr>
			<tr>
				<th>Nama Mahasiswa</th>
				<td><input class="text_field" type="text" name="txt_mhs" value="<?php echo $vnm_mhs;?>"></td>
			</tr>
			<tr>
				<th>Gender</th>
				<td>
					<input class="text_field" type="radio" checked name="txt_gender" value="L" <?php echo ($data_mhs['jeniskel']=='L' ? 'checked' : '');?>><label>Laki-laki</label>
					<input class="text_field" type="radio" name="txt_gender" value="P" <?php echo ($data_mhs['jeniskel']=='P' ? 'checked' : '');?>><label>Perempuan</label>
				</td>
			</tr>
			<tr>
				<th>Tempat Lahir</th>
				<td>
				<input class="text_field" type="text" name="txt_tpt_lahir" value="<?php echo $vtmp_lahir;?>">
				</td>
			</tr>
			<tr>
				<th>Tanggal Lahir</th>
				<td><input class="text_field" type="date" name="txt_tgl_lahir" value="<?php echo $vtgl_lahir;?>"></td>
			</tr>
			<tr>
					<th></th>
				<td>
					<input type="submit" value="Simpan" name="btn_simpan" id="btn_simpan">
					<input type="submit" value="Perbarui" name="btn_edit" id="btn_edit">
					<input type="submit" value="Hapus" id="btn_hapus" name="btn_hapus">
				</td>
			</tr>
		</form>
	</table>
	<br />
	<a href="index.php"><button>Home</button></a>
	<a id="btn_reset" href="mahasiswa.php"><button>Form simpan</button></a>
	<br />
	<br />
	<table class="table">
		<!--<tr class="tr">
			<th colspan="7" class="th" >Nama Mahasiswa : 
				<form method="post">
					<input class="text_field" name="txt_mhs" type="text" />
					<input class="text_field" name="btn_cari" type="submit" value="cari"/>
				</form>
			</th>
		</tr>-->
		<tr class="tr">
			<th class="th">No.</th>
			<th class="th">No. Bp</th>
			<th class="th">Mahasiswa</th>
			<th class="th">Gender</th>
			<th class="th">Tempat Lahir</th>
			<th class="th">Tanggal Lahir</th>
			<th class="th">Aksi</th>
		</tr>
		<?php
            include "koneksi.php";
			if(isset($_POST['btn_cari'])){
				$id = $_POST['txt_mhs'];
				$query_mhs = mysql_query("SELECT * FROM tb_mhs WHERE namamhs LIKE '%$id%' ");
			}
			$query_mhs = mysql_query("SELECT * FROM tb_mhs");
			$sql_mhs = $query_mhs or die(mysql_error()); $no=0;
			if (!$data = mysql_fetch_array($sql_mhs)){
				echo "Mahasiswa tersebut belum menyusun KRS";
			}
			while ($data = mysql_fetch_array($sql_mhs)) {
				$no++;
				$no_bp = $data['nobp'];
				$nm_mhs = $data['namamhs'];
				if ($data['jeniskel']=='L'){
					$gender = 'Laki-laki';
				}else{
					$gender = 'Perempuan';
				}
				$tem_lhr = $data['tmplahir'];
				$tgl_lhr = $data['tgllahir'];
		?>
		<tr class="tr">
			<td class="td"><?php echo $no;?></td>
			<td class="td"><?php echo $no_bp;?></td>
			<td class="td"><?php echo $nm_mhs;?></td>
			<td class="td"><?php echo $gender;?></td>
			<td class="td"><?php echo $tem_lhr;?></td>
			<td class="td"><?php echo $tgl_lhr;?></td>
			<td class="td">
				<a href="mahasiswa.php?id_mhs=<?php echo $no_bp ?>"><button>Pilih</button></a>
				<a href="krs.php?id_mhs=<?php echo $no_bp ?>"><button>Susun krs</button></a>
			</td>
		</tr>
		<?php
			}
		?>
	</table><br />
</center>
</body>
</html>