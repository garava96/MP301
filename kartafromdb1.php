<html>
<head>
</head>
<body>
<?php
include 'connection.php'; 
		$search=$_GET['search'];
		
		$mysqli = new mysqli($host, $user, $password, $database);
		$sql= "Select * from 'Information'"; 
		$res=mysqli_query($mysqli, $sql);
		
		mysqli_query($mysqli, "SET NAMES utf8");
		
		$query = mysqli_query($mysqli,"SELECT count(*) FROM `Coffee` WHERE `Name`='".$search."'");
		$row = mysqli_fetch_row($query);
		if ($row[0]==0)
		{
			
			$query = mysqli_query($mysqli,"SELECT * FROM `Information`, `Coffee` WHERE `Information`.`ID` = `Coffee`.`ID` ORDER BY (`Information`.`X_coordinates` - 55.178007) * (`Information`.`X_coordinates` - 55.178007) + (`Information`.`Y_coordinates` - 61.319421) * (`Information`.`Y_coordinates` - 61.319421) LIMIT 10");
			if ($result = $query) 
			{ 

				while ($row = mysqli_fetch_row($result))
				{
					printf ("
								<div class=\"List\">
									");
									printf ("<p class=\"name\"><b>%s</b>", $row[8]);
									printf ("</p>
									<p class=\"reting\">
									<i class=\"glyphicon glyphicon-star\" aria-hidden=\"true\"></i>
									<i class=\"glyphicon glyphicon-star\" aria-hidden=\"true\"></i>
									<i class=\"glyphicon glyphicon-star\" aria-hidden=\"true\"></i>
									<i class=\"glyphicon glyphicon-star-empty\" aria-hidden=\"true\"></i>
									<i class=\"glyphicon glyphicon-star-empty\" aria-hidden=\"true\"></i>  
									</p>
									");
									printf("
									<p  class=\"information\"><br>%s <br><i>Время работы:</i> %s <br><i>Номер телефона:</i> %s <br><i>Форма расчёта:</i> %s ",$row[1], $row[2], $row[3], $row[4]); 
					printf("</p>		
								</div> ");
				}
			mysqli_free_result($result);
			}
			printf ("<script>alert('Таких названий нет')</script>");
		}
		else
		{
			$query = mysqli_query($mysqli,"SELECT  * FROM `Information`,`Coffee` WHERE `Coffee`.`Name`='".$search."' AND `Information`.`ID`=`Coffee`.`ID`");
			if ($result = $query) 
			{ 

				while ($row = mysqli_fetch_row($result))
				{
					printf ("
								<div class=\"List\">
									");
									printf ("<p class=\"name\"><b>%s</b>", $row[8]);
									printf ("</p>
									<p class=\"reting\">
									<i class=\"glyphicon glyphicon-star\" aria-hidden=\"true\"></i>
									<i class=\"glyphicon glyphicon-star\" aria-hidden=\"true\"></i>
									<i class=\"glyphicon glyphicon-star\" aria-hidden=\"true\"></i>
									<i class=\"glyphicon glyphicon-star-empty\" aria-hidden=\"true\"></i>
									<i class=\"glyphicon glyphicon-star-empty\" aria-hidden=\"true\"></i>  
									</p>
									");
									printf("
									<p  class=\"information\"><br>%s <br><i>Время работы:</i> %s <br><i>Номер телефона:</i> %s <br><i>Форма расчёта:</i> %s ",$row[1], $row[2], $row[3], $row[4]); 
					printf("</p>		
								</div> ");
				}
			mysqli_free_result($result);
			}
		}
		mysqli_close($mysqli);
?> 
</body>
</head>