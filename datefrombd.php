<html>
<head>
</head>
<body>
<?php
include 'connection.php'; 
		$mysqli = new mysqli($host, $user, $password, $database);
		$sql= "Select * from 'Information'"; 
		$res=mysqli_query($mysqli, $sql);
		
		mysqli_query($mysqli, "SET NAMES utf8");
	
		$query = mysqli_query($mysqli,"SELECT * FROM `Information`, `Coffee` WHERE `Information`.`ID` = `Coffee`.`ID` ORDER BY (`Information`.`X_coordinates` - 55.178007) * (`Information`.`X_coordinates` - 55.178007) + (`Information`.`Y_coordinates` - 61.319421) * (`Information`.`Y_coordinates` - 61.319421) LIMIT 10");
		if ($result = $query) 
		{ 
			while ($row = mysqli_fetch_row($result))
			{
				printf ("
							<div class=\"List\" onclick=\"CenterKarta(this)\" id=\"%s\">
							    ",$row[0]);
								printf ("<p class=\"name\"><b>%s</b>", $row[8]);
								$query1 = mysqli_query($mysqli,"SELECT * FROM `Information`, `Coffee`, `Reviews` WHERE `Information`.`ID` = `Coffee`.`ID` and `Coffee`.`ID` = `Reviews`.`id_review` ORDER BY (`Information`.`X_coordinates` - 55.178007) * (`Information`.`X_coordinates` - 55.178007) + (`Information`.`Y_coordinates` - 61.319421) * (`Information`.`Y_coordinates` - 61.319421) LIMIT 10");
								if ($result1 = $query1) 
								{ 
									$sum = 0;
									$col = 0;
									while ($row1 = mysqli_fetch_row($result1))
									{
										if ($row1[0] == $row[0])
										{
											$sum = $sum + $row1[13];
											$col = $col + 1;
										}
									}
									if ($col > 0)
									{
										$sr = $sum / $col;
									}
									else
									{
										$sr = 0;
									}
									printf ("</p>
									<p  class=\"reting\">");
									for ($d = 1; $d <= $sr; $d++)
									{
										printf ("<i class=\"glyphicon glyphicon-star\" aria-hidden=\"true\"></i>");
									}
									for ($d = $sr + 1; $d <= 5; $d++)
									{
										printf ("<i class=\"glyphicon glyphicon-star-empty\" aria-hidden=\"true\"></i>");
									}
									printf ("</p>
									");
								}
								
								printf("
								<p  class=\"information\"><br>%s <br><i>Время работы:</i> %s <br><i>Номер телефона:</i> %s <br><i>Форма расчёта:</i> %s ",$row[1], $row[2], $row[3], $row[4]); 
				printf("<script>a=%s</script>",$row[0],"</p>");
				printf("<br><center><p  id=\"%s\" style=\"cursor: pointer; color:red\" onclick=\"ViewOpen(this)\">",$row[0]);
				$query2 = mysqli_query($mysqli,"SELECT count(*) FROM `Reviews` WHERE `id_cafe` = '".$row[0]."'  ");
				$result2 = $query2;
				$row2 = mysqli_fetch_row($result2);
				printf("<b>Отзывы( %s )</b></p></center>",$row2[0]);				
				printf("</div>");
			}
		mysqli_free_result($result);
		}
		mysqli_close($mysqli);
?> 
</body>
</head>