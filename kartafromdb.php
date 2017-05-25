<?php
	include 'connection.php'; 
	$id=$_GET['id'];
	$mysqli = new mysqli($host, $user, $password, $database);
	$sql= "Select * from 'Information'";  
	$res=mysqli_query($mysqli, $sql);
	mysqli_query($mysqli, "SET NAMES utf8");
	if(empty($id))
	{
		printf ("<script type=\"text/javascript\"> 
				ymaps.ready(init);
				function init () {
				var myMap = new ymaps.Map(\"map\", {
				center: [55.182135, 61.304813], // Челябинск  
				zoom: 13
				},{balloonMaxWidth: 600}); 
				");
		$query = mysqli_query($mysqli,"SELECT * FROM `Information`, `Coffee` WHERE `Information`.`ID` = `Coffee`.`ID`");
		if ($result = $query) 
		{
			while ($row = mysqli_fetch_row($result))
			{
				printf ("myMap.geoObjects.add(myPlacemark);
				var myPlacemark = new ymaps.Placemark([");
				printf ("%s,%s ", $row[5], $row[6]); 
				$info="<a  href=\"http://takecoffeetogo.esy.es/Test.php\"></a>";
				printf ("],{balloonContentHeader: \"",$info);
				printf("%s", $row[8]);
				printf("\",
				balloonContentBody: \"\",
				balloonContentFooter: \"\",
				hintContent: \"");
				printf("%s", $row[1]);
				printf("\"	}, {
				iconImageHref: 'img/cup.png', // картинка иконки
				iconImageSize: [40, 40], // размер иконки
				iconImageOffset: [0, 0] // позиция иконки
				}); myMap.geoObjects.add(myPlacemark);");
			}
			mysqli_free_result($result); 
		}
		printf ("myMap.behaviors.enable('scrollZoom');}  
		</script>");
	}
	else
	{
		$query = mysqli_query($mysqli,"SELECT `X_coordinates`,`Y_coordinates` FROM `Information` WHERE `ID` = '".$id."'");
		$row = mysqli_fetch_row($query);
		printf ("<script type=\"text/javascript\"> 
				ymaps.ready(init);
				function init () {
				var myMap = new ymaps.Map(\"map\", {
				center: [%s, %s], // Челябинск  
				zoom: 16
				},{balloonMaxWidth: 600}); 
				",$row[0],$row[1]);
		$query = mysqli_query($mysqli,"SELECT * FROM `Information`, `Coffee` WHERE `Information`.`ID` = `Coffee`.`ID`");
		if ($result = $query) 
		{
			while ($row = mysqli_fetch_row($result))
			{
				printf ("myMap.geoObjects.add(myPlacemark);
				var myPlacemark = new ymaps.Placemark([");
				printf ("%s,%s ", $row[5], $row[6]); 
				$info="<a  href=\"http://takecoffeetogo.esy.es/Test.php\"></a>";
				printf ("],{balloonContentHeader: \"",$info);
				printf("%s", $row[8]);
				printf("\",
				balloonContentBody: \"\",
				balloonContentFooter: \"\",
				hintContent: \"");
				printf("%s", $row[1]);
				printf("\"	}, {
				iconImageHref: 'img/cup.png', // картинка иконки
				iconImageSize: [40, 40], // размер иконки
				iconImageOffset: [0, 0] // позиция иконки
				}); myMap.geoObjects.add(myPlacemark);");
			}
			mysqli_free_result($result); 
		}
		printf ("myMap.behaviors.enable('scrollZoom');}  
		</script>");
	}
	mysqli_close($mysqli);
?> 

