 
function init() {
  
    var myMap = new ymaps.Map('map', {
            center: [55.734046, 37.588628],
            zoom: 9, 
            controls: ['zoomControl', 'typeSelector',  'fullscreenControl']
        });


    var objects = ymaps.geoQuery()

    .add(ymaps.geocode('Москва, ул. Стромышнка, 6', {results:1}))
    .add(ymaps.geocode('Москва, ул. Остоженка, 24', {results:1}))
    .add(ymaps.geocode('Москва, ул. Малая Красносельская, 1с4', {results:1}))
	var collection = new ymaps.GeoObjectCollection();
	$.get('/ajax/points.json', function (data) {  
	for(var i = 0, len = data.length; i < len; i++) {   
	collection.add(new ymaps.Placemark([data[i].lattitude, data[i].longitude], {    
	balloonContent : data[i].description,            hintContent : data[i].name    
    }));    });});
     map.geoObjects.add(collection);
    // вместо ^ этих строк используется следующее выражение на php (берет адреса из MySQL):
    // <?php  
    //     while (($result = mysql_fetch_array($address))) 
    //        { 
    //          print_r (".add(ymaps.geocode('$result[0]',{results:1}))\n"); 
    //        }       
    // ?>
        .addToMap(myMap); 

    var balloons = ['Описание'], i = 0; // Описание также берет скрипт php из массива MySQL
    var balloonsfooter = ['Подвал'], i = 0; // Подвал также берет скрипт php из массива MySQL
    function showBallon() {
        this._balloon.open();
    }
    objects.then(function () {
        for(var i = 0, len = objects.getLength(); i < len; i++) {
             objects.get(i).properties.set('iconContent', i + 1, 'results', '1');
             objects.get(i).properties.set('balloonContentBody', balloons[i]);
             objects.get(i).properties.set('balloonContentFooter', balloonsfooter[i]);
             
            var div = document.createElement("div");
            div.innerHTML = "open ballon " + (i+1);
            div._balloon = objects.get(i).balloon;
            div.onclick = showBallon;
            document.body.appendChild(div);
        }
    });
}

ymaps.ready(init);

