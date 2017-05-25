<!DOCTYPE html>
<html>
  <head>
    <title>TakeCoffeeToGo</title>
    <!-- Bootstrap -->
	<meta charset="utf-8"> 
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/scrollup.css" rel="stylesheet"> 
	<link href="css/button_open.css" rel="stylesheet"> 
	<link href="css/windowreg.css" rel="stylesheet"> 
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="js/scrollup.js"></script>
	<script src="http://api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU" type="text/javascript"></script>
	<!--Не могу убрать отсюда в css файл, потому что он при вынесении в файл css не форматирует кнопку, хз почему((-->
	<style type="text/css">
		button.param_but{
		padding-left: 20px;
		padding-right: 20px;
		padding-buttom: 30px;
		background: #562813;
		color: #ffffff;
		vertical-align: middle;
		text-align: center;
		width: 100px;
		height: 50px;
		font: 16pt Arial, Helvetica, sans-serif;
		z-index:110;
		position: absolute;
		top: 50px;
		left: 50px;
		box-shadow: 5px 5px 3px rgba(0,0,0,0.5);
		padding: 0px;
	}
	
			button.param_but1{
		padding-left: 20px;
		padding-right: 20px;
		padding-buttom: 30px;
		background: #562813;
		color: #ffffff;
		vertical-align: middle;
		text-align: center;
		width: 50px;
		height: 25px;
		font: 8pt Arial, Helvetica, sans-serif;
		z-index:110;
		position: absolute; 
		top: 50px;
		right: 50px;
		box-shadow: 5px 5px 3px rgba(0,0,0,0.5);
		padding: 0px;
	}
	</style>
  </head> 
  <body style="height: 100%">
  <?php include 'exit.php'?>
  <!--окно входа и или регистрации-->
    <script type="text/javascript">

			function show(state){

					document.getElementById('window').style.display = state;			
					document.getElementById('wrap').style.display = state; 			
			}
			
		</script>
					<!-- Задний прозрачный фон-->
		<div onclick="show('none')" id="wrap"></div>
					<!-- Само окно-->
			<div id="window"  style="background-color: #f5deb3;">
						 <!-- Картинка крестика-->
				<img class="close" onclick="show('none')" src="http://sergey-oganesyan.ru/wp-content/uploads/2014/01/close.png">
				<br>
				<center><h1 style="color: #562813">Вход</h1></center>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<h3 style="color: #562813">Логин<input type="textbox"></input>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<h3 style="color: #562813">Пароль<input type="textbox"> </input></h3>
				</div>
				</div>
				<script src="//ulogin.ru/js/ulogin.js"></script>
				<div id="uLogin" data-ulogin="display=panel;theme=classic;fields=first_name,last_name;providers=vkontakte,odnoklassniki,mailru,facebook;hidden=twitter,google,yandex;redirect_uri=http://takecoffeetogo.esy.es;mobilebuttons=0;"></div>
				<?php include 'opening.php' ?>
			</div>
	<div class="container-fluid" style="padding-right: 0; ">
		<!-- 
		<div class="row">
			<div  class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<p id="InfoProfile">информация</p>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-4 col-xs-12">
				<p><button style="position: relative; left: -100px;" id="ButLog" class="btn btn-small btn-primary" type="button">Войти с помощью GooGle</button></p>
			</div>
			<p style="display:inline;"><button style="position: relative; bottom: -100px; " id="ButLog" class="btn btn-small btn-primary" type="button">Войти с помощью GooGle</button></p>
		</div> -->
		<div class="row OtsTopVnutri Listt" >
		<a style="margin-right: 12%;"><?php if ($user['identity']) printf ("Вы вошли как: %s %s", $user['first_name'], $user['last_name']);?></a>
					<a href="#"><button class="param_but" onclick="show('block')"<?php if ($user['identity']) echo "";?>>Войти</button></a>
					<a href="#"><button class="param_but1" onclick="doExit()" style="display:none;">Выйти</button></a> 
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
						    <script>Search
								 function Search()
								 {
									 d=document.getElementById("search").value;
									 jQuery.ajax({
										url:"http://takecoffeetogo.esy.es/datefrombdsearch.php/?search="+d,
										type: "GET",

										success: function (data, textStatus, xhr)
											{
												
												$('#datefrombd').html(data);
											},
										error: function (xhr, textStatus, errorThrown)
											{
												$('#datefrombd').html('ERROR');
											}
											
									});
								 }
								 
							</script>
							
				</center>
				<div class="Over" id="datefrombd">
				<script>
									  jQuery.ajax({
										url:"http://takecoffeetogo.esy.es/datefrombd.php",
										type: "GET",

										success: function (data, textStatus, xhr)
											{
												
												$('#datefrombd').html(data);
											},
										error: function (xhr, textStatus, errorThrown)
											{
												$('#datefrombd').html('ERROR');
											}
											
									});
				</script>
				</div>
			</div> 
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9" style="padding-right: 0; padding-left: 0;">

					<div id="map"><?php include 'kartafromdb.php'?></div> 
			</div>
			<div id="scrollup"><img alt="Прокрутить вверх" src="/img/up.png" height = "30" width = "30"></div>
		</div>
		</div>
	</div>
	<div >
		
		
	</div>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>