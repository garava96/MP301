<html>
<head>
</head>
<body>
<?php
include 'connection.php'; 
		$mysqli = new mysqli($host, $user, $password, $database);
		session_start();
		$_SESSION['idview']=$_GET['id'];
		$idview=$_GET['id'];
		$sql= "SELECT `c_review`,`date_review` FROM `Reviews` WHERE `id_cafe`='".$idview."' ORDER BY  `Reviews`.`date_review` DESC"; 
		$sql2="SELECT `Name` FROM `Coffee` WHERE `id`='".$idview."'";
		$res=mysqli_query($mysqli, $sql);
		$res2=mysqli_query($mysqli, $sql2);
		mysqli_query($mysqli, "SET NAMES utf8");
		$i=1;
		while ($row = mysqli_fetch_row($res))
		{
			printf("<p><b>%s)</b>%s</p><p style=\"float: right;\"><i>%s</i></p><br>",$i,$row[0],$row[1]);
			$i=$i+1;
		}
		mysqli_close($mysqli);
?>
</body>
</head>