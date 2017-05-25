function show(state)
{
	document.getElementById('window').style.display = state;			
	document.getElementById('wrap').style.display = state; 			
}

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
<!-- Îòçûâû ôóíêöèÿ!-->
function ViewShow()
{
	document.getElementById('View_parent').style.display='block';
	document.getElementById('View').style.display='block';
}
function ViewOpen(el)
{
	View=el.id;
	jQuery.ajax({
	url:"http://takecoffeetogo.esy.es/ViewZapros.php/?id="+View,
	type: "GET",

	success: function (data, textStatus, xhr)
	{

		$('#Over').html(data);
	},
	error: function (xhr, textStatus, errorThrown)
	{
		$('#Over').html('ERROR');
	}

	});
	setTimeout('ViewShow();', 200);

}
function ViewExit()
{
	document.getElementById('View_parent').style.display='none';
	document.getElementById('View').style.display='none';
}
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
function CenterKarta(el)
{
	Karta=el.id;
	jQuery.ajax({
	url:"http://takecoffeetogo.esy.es/kartafromdb.php/?id="+Karta,
	type: "GET",

	success: function (data, textStatus, xhr)
	{

		$('#map').html(data);
	},
	error: function (xhr, textStatus, errorThrown)
	{
		$('#map').html('ERROR');
	}

	});


}
