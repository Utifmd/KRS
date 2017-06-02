<?php
include "koneksi.php";
error_reporting(0);
$id = $_GET['id_mhs'];
$query_krs = mysql_query("SELECT *FROM view_krs WHERE nobp='$id'") or die(mysql_error());
$data_krs = mysql_fetch_array($query_krs);

//hapus method
$id_krs = $_GET['id_krs'];
if($id_krs){
	$delete = mysql_query("DELETE FROM tb_krs WHERE idkrs='$id_krs'") or die (mysql_error());
	echo "<meta http-equiv=refresh content=1;url=mahasiswa.php>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tugas Program</title>
	<link rel="stylesheet" type="text/css" href="style/style.css" />
</head>
<body>
<center>
	<h2>KRS yang tersedia</h2>
	<br /><a href="index.php"><button>Home</button></a><br /><br />
	<table class="table">
		<tr class="tr">
			<th class="th">No.</th>
			<th class="th">Kode KRS</th>
			<th class="th">Kode Matakuliah</th>
			<th class="th">Matakuliah</th>
			<th class="th">Sks</th>
			<th class="th">Semester</th>
			<th class="th">Hari</th>
			<th class="th">Mulai</th>
			<th class="th">Selesai</th>
			<th class="th">Lokal</th>
			<th class="th">Aksi</th>
		</tr>
		<?php 
			include "koneksi.php";
			if(isset($_POST['btn_tambah'])){
				include "koneksi.php";
			
				$no_bp = $_GET['id_mhs'];
				$kodekrs = $_POST['txt_kodekrs'];
				$kodemk = $_POST['txt_kodemk'];
				$nidn = $_POST['txt_nidn'];
				$kodekampus = $_POST['txt_kodekampus'];
				$sem = $_POST['txt_sem'];
				$tahun_krs = $_POST['txt_tahun_krs'];
				$hari_krs = $_POST['txt_hari_krs'];
				$jam_mulai = $_POST['txt_jam_mulai'];
				$jam_selesai = $_POST['txt_jam_selesai'];
				$status = $_POST['txt_status'];
				
				mysql_query("INSERT INTO tb_krs VALUES(null, '$kodekrs', '$no_bp', '$kodemk', '$nidn', '$kodekampus', '$sem','$tahun_krs', '$hari_krs', '$jam_mulai', '$jam_selesai', '$status')");
				echo "<meta http-equiv=refresh content=1;url=krs.php?id_mhs=$id>";
			}

			$no=0;
			$query_krs_able = mysql_query("SELECT * FROM view_krs_able") or die(mysql_error());
			while ($data = mysql_fetch_array($query_krs_able)) {
				$no++;
				if($data['sem']=='GE'){
					$sem = "GENAP";
				}else{
					$sem = "GANJIL";
				};
				
				if($data['hari_krs']=='SEN'){
					$hari = "SENEN";
				}elseif($data['hari_krs']=='SEL'){
					$hari = "SELASA";
				}elseif($data['hari_krs']=='RAB'){
					$hari = "RABU";
				}elseif($data['hari_krs']=='KAM'){
					$hari = "KAMIS";
				}elseif($data['hari_krs']=='JUM'){
					$hari = "JUMAT";
				}elseif($data['hari_krs']=='SAB'){
					$hari = "SABTU";
				}else{
					$hari = "MINGGU";
				};
		?>
		<tr class="tr">
			<td class="td"><?php echo $no;?>.</td>
			<td class="td"><?php echo $data['kodekrs'];?></td>
			<td class="td"><?php echo $data['kodemk'];?></td>
			<td class="td"><?php echo $data['namamk'];?></td>
			<td class="td"><?php echo $data['sks'];?></td>
			<td class="td"><?php echo $sem;?></td>
			<td class="td"><?php echo $hari;?></td>
			<td class="td"><?php echo $data['jam_mulai'];?></td>
			<td class="td"><?php echo $data['jam_selesai'];?></td>
			<td class="td"><?php echo $data['lokal'];?></td>
			<td class="td">
                <form method="post">
                    <input name="txt_kodekrs" id="txt_kodekrs" type="hidden" value="<?php echo $data['kodekrs'];?>" />
                    <input name="txt_nobp" id="txt_nobp" type="hidden" value="<?php echo $data['nobp'];?>" />
                    <input name="txt_kodemk" id="txt_kodemk" type="hidden" value="<?php echo $data['kodemk'];?>" />
                    <input name="txt_nidn" id="txt_nidn" type="hidden" value="<?php echo $data['nidn'];?>" />
                    <input name="txt_kodekampus" id="txt_kodekampus" type="hidden" value="<?php echo $data['kodekampus'];?>" />
                    <input name="txt_sem" id="txt_sem" type="hidden" value="<?php echo $data['sem'];?>" />
                    <input name="txt_tahun_krs" id="txt_tahun_krs" type="hidden" value="<?php echo $data['tahun_krs'];?>" />
                    <input name="txt_hari_krs" id="txt_hari_krs" type="hidden" value="<?php echo $data['hari_krs'];?>" />
                    <input name="txt_jam_mulai" id="txt_jam_mulai" type="hidden" value="<?php echo $data['jam_mulai'];?>" />
                    <input name="txt_jam_selesai" id="txt_jam_selesai" type="hidden" value="<?php echo $data['jam_selesai'];?>" />
                    <input name="txt_status" id="txt_status" type="hidden" value="PEN" />
                    <input name="btn_tambah" id="btn_tambah" type="submit" value="Tambah" />
                </form>
			</td>
		</tr>
		<?php } ?>
	</table>	
	<br /><br />
	<h2>KRS yang diambil</h2>
	<a href="mahasiswa.php"><button>Daftar mahasiswa</button></a><br/><br />
	<div id="content_show">
		<table class="table">
				<tr class="tr">
					<td></td>
					<th class="th">Bp / Nama Mahasiswa : </th>
					<td class="td" colspan="9"><?php echo $data_krs['nobp']?> / <?php echo $data_krs['namamhs']?></td>
				</tr>
				<tr class="tr">
					<td></td>
					<th class="th">Semester. TA : </th>
					<td class="td" colspan="9"><?php echo $data_krs['sem'];?> <?php echo $data_krs['tahun_krs'];?></td>
				</tr>
				<tr class="tr">
					<th class="th">No.</th>
					<th class="th">Kode Matakuliah</th>
					<th class="th">Matakuliah</th>
					<th class="th">Sks</th>
					<th class="th">Semester</th>
					<th class="th">Hari</th>
					<th class="th">Mulai</th>
					<th class="th">Selesai</th>
					<th class="th">Lokal</th>
					<th class="th">Status</th>
					<th class="th">Aksi</th>
				</tr>
				<?php 
				$no=0;
				include "koneksi.php";
				$id = $_GET['id_mhs'];
				$query_krs = mysql_query("SELECT *FROM view_krs WHERE nobp='$id'") or die(mysql_error());
				while($data_krs = mysql_fetch_array($query_krs)){
					$no++;
					if($data_krs['sem']=='GE'){
						$sem = "GENAP";
					}else{
						$sem = "GANJIL";
					};
					if($data_krs['status']=='PEN'){
						$status = "PENDING";
					}else{
						$status = "SELESAI";
					};
					if($data_krs['hari_krs']=='SEN'){
						$hari = "SENEN";
					}elseif($data_krs['hari_krs']=='SEL'){
						$hari = "SELASA";
					}elseif($data_krs['hari_krs']=='RAB'){
						$hari = "RABU";
					}elseif($data_krs['hari_krs']=='KAM'){
						$hari = "KAMIS";
					}elseif($data_krs['hari_krs']=='JUM'){
						$hari = "JUMAT";
					}elseif($data_krs['hari_krs']=='SAB'){
						$hari = "SABTU";
					}else{
						$hari = "MINGGU";
					};
					$tahun_krs = $data_krs['tahun_krs'];
				?>
				<tr class="tr">
					<td class="td"><?php echo $no;?></td>
					<td class="td"><?php echo $data_krs['kodemk']?></td>
					<td class="td"><?php echo $data_krs['namamk']?></td>
					<td class="td"><?php echo $data_krs['sks']?></td>
					<td class="td"><?php echo $sem?></td>
					<td class="td"><?php echo $hari?></td>
					<td class="td"><?php echo $data_krs['jam_mulai']?></td>
					<td class="td"><?php echo $data_krs['jam_selesai']?></td>
					<td class="td"><?php echo $data_krs['lokal']?></td>
					<td class="td"><?php echo $status?></td>
					<td class="td">
					<a href="krs.php?id_krs=<?php echo $data_krs['idkrs']; ?>"><button>Hapus</button>
					</a>
					</td>
				</tr>
				<?php } ?>
			</table>		
	</div>
	<br /><br />
</center>
</body>
</html>