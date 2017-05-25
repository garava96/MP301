<!DOCTYPE html>
<html>
  <head>
    <title>TakeCoffeeToGo</title>
    <!-- Bootstrap -->
	<meta charset="utf-8"> 
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/scrollup.css" rel="stylesheet"> 
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="js/scrollup.js"></script>
	<script src="http://api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU" type="text/javascript"></script>
	
	<style>
	</style>
  </head> 
  <body>
	<div class="container-fluid" style="padding-right: 0;">
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
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding: 0px;">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="padding-bottom: 0px;" >
				<center>
					<form id="Search" class="form-search" style="padding-top: 15px;"  method="get">
					  <input type="text" class="search" placeholder="Поиск" name="search">
						<button type="button" class="btn btn-default btn-xs" onClick="Search()"><span class="glyphicon glyphicon-search"></span></button>
					</form>
						    <script>
								document.getElementById("Search").onsubmit=
								 function() { 
								  sendMes();
								  return false;
								  
								  
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

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>	