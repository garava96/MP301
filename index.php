<!DOCTYPE html>
<html>
	<head>
		<title>TakeCoffeeToGo</title>
		<link rel="shortcut icon" href="img/ico.png" type="image/x-icon">
		<!-- Bootstrap -->
		<meta charset="utf-8"> 
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link href="css/scrollup.css" rel="stylesheet"> 
		<link href="css/windowreg.css" rel="stylesheet"> 
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script type="text/javascript" src="js/scrollup.js"></script>
		<script type="text/javascript" src="js/exit.js"></script>
		<script type="text/javascript" src="js/main.js"></script>
		<script src="http://api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU" type="text/javascript"></script>
		<!--Не могу убрать отсюда в css файл, потому что он при вынесении в файл css не форматирует кнопку, хз почему((-->
		<style type="text/css">
		</style>
	</head> 
	<body style="height: 100%">

		<!--окно входа и или регистрации-->
		<?php include 'openwindow.php'?>
		<?php include 'View.php'?>
		<div class="container-fluid" style="padding-right: 0; ">
			<!--<script type="text/javascript">
			function doExit1()
			{
			</script>-->
			<?php
			function doExit1($user)
			{
				$user['identity'] = "";
				$user['first_name'] = "";
				$user['last_name'] = "";
				$user['network'] = "";
				echo "111";
				//header("Location: http://takecoffeetogo.esy.es/index.php");
			}
			?>
			<!--<script type="text/javascript">
			document.location.reload();
			}
			</script>-->
			<?php include 'opening.php'?>
			<div class="row OtsTopVnutri Listt" >
				<p style="margin-right: 12%; color: #562813; font: 16pt sans-serif; z-index: 100;"><?php if ($identity) printf ("Вы вошли как: %s %s", $f_name, $l_name);?></a>
				<a href="#"><button class="param_but" onclick="show('block')"<?php if ($identity) {echo "style=\"display:none;\"";} else {echo "style=\"display:block;\"";}?>>Войти</button></a>
				<a href="#"><button class="param_but1" onclick="<?php doExit1($user)?>" <?php if (!$identity) {echo "style=\"display:none;\"";} else {echo "style=\"display:block;\"";}?>>Выйти</button></a> 
				<div id="logo" style="padding-bottom: 0.5em; padding-top: 0.5em">
					<center>
						<img  src="http://takecoffeetogo.esy.es/img/Logo.png" alt="takecoffeetogo.esy.es" />
					</center>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding: 0px;">
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="padding-bottom: 0px;" >
						<center>
							<input id="search" type="text" class="search" placeholder="Поиск" name="search">
							<button type="button" class="btn btn-default btn-xs" onClick="Search()"><span class="glyphicon glyphicon-search"></span></button>
						</center>
						<div class="Over" id="datefrombd"></div>
					</div> 
					<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9" style="padding-right: 0; padding-left: 0;">
						<div id="map"><?php include 'kartafromdb.php'?></div> 
					</div>
					<div id="scrollup"><img alt="Прокрутить вверх" src="/img/up.png" height = "30" width = "30"></div>
				</div>
			</div>
		</div>
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>	