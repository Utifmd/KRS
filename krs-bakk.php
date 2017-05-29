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
                $kodekrs = $_POST['txt_kodekrs'];
                echo $kodekrs;
                /*include "koneksi.php";
                $kodekrs = $_POST['txt_kodekrs'];
                echo $kodekrs;
                $id = $_GET['id_mhs'];

                $kodekrs = $_POST['txt_kodekrs'];
                $no_bp = $id;
                $kodemk = $_POST['txt_kodemk'];
                $nidn = $_POST['txt_nidn'];
                $kodekampus = $_POST['txt_kodekampus'];
                $sem = $_POST['txt_sem'];
                $tahun_krs = $_POST['txt_tahun_krs'];
                $hari_krs = $_POST['txt_hari_krs'];
                $jam_mulai = $_POST['txt_jam_mulai'];
                $jam_selesai = $_POST['txt_jam_selesai'];
                $status = $_POST['txt_status'];
                
                mysql_query("INSERT INTO tb_krs VALUES('$kodekrs', '$no_bp', '$kodemk', '$nidn', '$kodekampus', '$sem','$tahun_krs', '$hari_krs', '$jam_mulai', '$jam_selesai', '$status')");
                echo "<meta http-equiv=refresh content=1;url=krs.php?id_mhs=$id>";*/
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
                <a href="krs.php?kodekrs=<?php echo $data['kodekrs']?>"><button>Pilih</button></a>
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
	
</center>
</body>
</html>