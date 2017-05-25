		<?php
			$View=$_GET['newview'];
			$reit=$_GET['reit'];
			if(empty($View))
			{
				
			}
			else
			{
			session_start();
			$idview=$_SESSION['idview'];
			include 'connection.php'; 
			$mysqli = new mysqli($host, $user, $password, $database);
			$date = date('Y-m-d');
			$query=("INSERT INTO `Reviews`(`c_review`, `date_review`, `id_cafe`, `stars_review`)  VALUES ('".$View."', '".$date."', '".$idview."', '".$reit."')");
			mysqli_query($mysqli, $query);
			mysqli_query($mysqli, "SET NAMES utf8");
			}
			mysqli_close($mysqli);
		?>