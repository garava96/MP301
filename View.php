		<style>
		#View_parent{
			opacity: 0.8;
			display: none;
			position: fixed;
			left: 0;
			right: 0;
			top: 0;
			bottom: 0;
			padding: 16px;
			background-color: rgba(1, 1, 1, 0.725);
			z-index: 100;
			overflow: auto;
		}
		#View{
			width: 580px;
			height: 800px;
			margin: 50px auto;
			display: none;
			background-color: #562813;
			z-index: 200;
			position: fixed;
			left: 0;
			right: 0;
			top: 0;
			bottom: 0;
			padding: 16px;
			border-radius: 10px;
		}
		.View{
			height: 490px;
			overflow-y: scroll;
			padding-right: 20px;
		}
		.View::-webkit-scrollbar {
			width: 12px;
		}
		 
		.View::-webkit-scrollbar-track {
			-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
			border-radius: 10px;
		}
		 
		.View::-webkit-scrollbar-thumb {
			border-radius: 10px;
			-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5);  
			  background-color: gray;

		}
		</style>
		<script>
				function update()
				{
					document.location.href = "http://takecoffeetogo.esy.es";
				}
				 function ViewExit()
				 {
					 document.getElementById('View_parent').style.display='none';
					 document.getElementById('View').style.display='none';
				 }				
				function NewView()
				 {
					 var newview=document.getElementById('newview').value;
					 var reit=$('input[name=optionsRadios]:checked').val();
					 alert("Спасибо за отзыв!");
					 jQuery.ajax({
						url:"http://takecoffeetogo.esy.es/NewView.php/?newview="+newview+"&reit="+reit,
						type: "GET",

						success: function (data, textStatus, xhr)
							{
								
								$('#View').html(data);
							},
						error: function (xhr, textStatus, errorThrown)
							{
								$('#View').html('ERROR');
							}
							 
					});
					setTimeout('ViewExit();', 100);
					setTimeout('update();', 500);
				} 
		</script>
		<div  onclick="ViewExit()" id="View_parent" ></div>
		<div onclick="ViewShow()"  id="View" style="background-color: #f5deb3;">
			<center><h1>Отзывы</h1></center>
			<div class="View"  id="Over">
			</div>
			<form action="" method="post">
			<textarea id="newview" name="View" style="height: 100px;resize: none; padding: 0; margin-top: 10px; margin-bottom: 10px" class="form-control" placeholder="Напишите отзыв"></textarea>
			<p>Поставте свою оценку</p>
			<div class="radio-inline">
				<label>
					<input type="radio" name="optionsRadios" id="optionsRadios1" value="1" checked>
					1
				</label>
			</div>
			<div class="radio-inline">
				<label>
					<input type="radio" name="optionsRadios" id="optionsRadios2" value="2">
					2
				</label>
			</div>
			<div class="radio-inline">
				<label>
					<input type="radio" name="optionsRadios" id="optionsRadios2" value="3">
					3
				</label>
			</div>
			<div class="radio-inline">
				<label>
					<input type="radio" name="optionsRadios" id="optionsRadios2" value="4">
					4
				</label>
			</div>
			<div class="radio-inline">
				<label>
					<input type="radio" name="optionsRadios" id="optionsRadios2" value="5">
					5
				</label>
			</div>
			<center><button  onclick="NewView()" type="button" class="btn btn-success">Отправить</button></center>
			</form>
		</div>

     

		