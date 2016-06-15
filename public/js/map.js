ymaps.ready(init);

function showVisibleObjects(myMap, objects)
{
    var visibleObjects = objects.searchInside(myMap);
    latitudes = [];
    longitudes = [];
    for(point in visibleObjects._objects)
    {
        latitude = objects._objects[point].geometry._coordinates[0];
        longitude = objects._objects[point].geometry._coordinates[1];

        latitudes.push(latitude);
        longitudes.push(longitude);
    }
    var data = $.param({latitude: latitudes, longitude: longitudes});
    $.ajax({
        method: 'POST',
        url: '/gardens/api/get',
        data: data,
        success: function(response){
            $map_panel.empty();
            $map_panel.append("<h1 class='line red'>Садики</h1>");
            for(i=0; i<response.length; i++)
            {
                garden = response[i][0];
                elem  = "<div class='media'>";
                elem += "<div class='media-left media-top'>";
                elem += "<a href='/gardens/"+garden.id+"'>";
                elem += "<img class='media-object' src='/"+garden.image+"' width='130' height='130'>";
                elem += "</a>";
                elem += "</div>";
                elem += "<div class='media-body'>";
                elem += "<h4 class='media-heading'>"+garden.title+"</h4>";
                elem += "</div>";
                elem += "</div>";
                $map_panel.append(elem);
            }
        }
    });
}

function init() {
    $map_panel = $('.map-panel');
    $map_panel.css('height', window.innerHeight - 110);
    $('#map').css('height', window.innerHeight);
    var myMap = new ymaps.Map("map", {
        center: [42.8739, 74.6171],
        zoom: 12,
        controls: ['default']
    }, {
        searchControlProvider: 'yandex#search'
    });
    //отключаем масштабирование колесиком
    myMap.behaviors.disable('scrollZoom');
    objectManager = new ymaps.ObjectManager({
        // Чтобы метки начали кластеризоваться, выставляем опцию.
        clusterize: true,
        geoObjectOpenBalloonOnClick: true,
        clusterOpenBalloonOnClick: true
    });


    myMap.geoObjects.add(objectManager);

    // Создадим объекты на основе JSON-описания геометрий.

    var gardens;
    var promise = $.ajax({
        method: "POST",
        url: "/gardens/api/all"
    });

    promise.then(function(response){
        console.log(response);
        var object = {
            type: "FeatureCollection",
            features: response
        };

        objectManager.add(object);
        var objects = new ymaps.geoQuery(object);
        showVisibleObjects(myMap, objects);

        myMap.events.add('boundschange', function () {
            showVisibleObjects(myMap, objects);
        });
    });
}