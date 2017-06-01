<?php 
if (isset($_POST['btn_yes'])) {
	include "koneksi.php";
	$pilih = $_POST['txt_pilih'];
	$sql1= mysql_query("SELECT * FROM tb_dsn WHERE nidn='$pilih'");
	$sql2= mysql_query("SELECT * FROM tb_dsn");
	if ($pilih=='DN01') {
		while ($data = mysql_fetch_array($sql1)) {
			echo $data['namadosen'];
			echo "<br/>";
		}
	}else{
		while ($data = mysql_fetch_array($sql2)) {
			echo $data['namadosen'];
			echo "<br/>";
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Multiple try</title>
</head>
<body>
<form action="" method="post">
	<select name="txt_pilih" id="txt_pilih">
		<option value="DN01">dn01</option>
		<option value="DN02">dn02</option>
	</select>
	<input type="submit" name="btn_yes">
</form>
</body>
</html>


<?php
/*$mysqli = new mysqli("localhost", "root", "", "dbtdbs");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}*/

/*if (!$mysqli->query("DROP TABLE IF EXISTS test") || !$mysqli->query("CREATE TABLE test(id INT)")) {
    echo "Table creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
}*/

//$sql = "SELECT * FROM tb_dsn;";
/*$sql= "SELECT * FROM tb_dsn WHERE nidn='DN01'; ";
$sql.= "SELECT * FROM tb_dsn WHERE nidn='DN0'; ";*/
//$sql.= "SELECT COUNT(*) AS _num FROM test; ";
//$sql.= "INSERT INTO test(id) VALUES (1); ";
/*
if (!$mysqli->multi_query($sql)) {
    echo "Multi query failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

do {
    if ($res = $mysqli->store_result()) {
        
        var_dump($res->fetch_all(MYSQLI_ASSOC));
        $res->free();
    }
} while ($mysqli->more_results() && $mysqli->next_result());*/
  // Convert Array to JSON String
	  /*$someJSON = json_encode($mysqli);
	  echo $someJSON;*/
?>