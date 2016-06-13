@extends('layouts.master')

@section('body')
    <script>
        ymaps.ready(init);

        function init() {
            var myMap = new ymaps.Map("map", {
                center: [42.8739, 74.6171],
                zoom: 12
            }, {
                searchControlProvider: 'yandex#search'
            }), objectManager = new ymaps.ObjectManager({
                // Чтобы метки начали кластеризоваться, выставляем опцию.
                clusterize: true,
                geoObjectOpenBalloonOnClick: false,
                clusterOpenBalloonOnClick: false
            });
            myMap.geoObjects.add(objectManager);

            // Создадим объекты на основе JSON-описания геометрий.
            {{--var objects = ymaps.geoQuery([--}}
                    {{--@foreach($gardens as $garden)--}}
                    {{--{--}}
                        {{--type: 'Point',--}}
                        {{--coordinates: [{{$garden->latitude}}, {{$garden->longitude}}]--}}
                    {{--},--}}
                    {{--@endforeach--}}
            {{--]);--}}
            var object = {
                type: "FeatureCollection",
                features: [
                        @foreach($gardens as $garden)
                            {
                                type: 'Feature',
                                id: '{{$garden->id}}',
                                geometry: {
                                    type: 'Point',
                                    coordinates: [{{$garden->latitude}}, {{$garden->longitude}}]
                                }

                            },
                    @endforeach
                ]
            };
            objectManager.add(object);
            var objects = new ymaps.geoQuery(object);
            // Найдем объекты, попадающие в видимую область карты.
//            objects.searchInside(myMap)
//
//                    // И затем добавим найденные объекты на карту.
//                    .addToMap(myMap);


            myMap.events.add('boundschange', function () {
                // После каждого сдвига карты будем смотреть, какие объекты попадают в видимую область.
                //var visibleObjects = objects.searchInside(myMap).addToMap(myMap);
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
                console.log(data);
                $map_panel = $('.map-panel');
                $.ajax({
                    method: 'POST',
                    url: '/gardens/api/get',
                    data: data,
                    success: function(response){
                        $map_panel.empty();
                        for(i=0; i<response.length; i++)
                        {
                            //alert(response[i]);
                            garden = response[i][0];
                            console.log(response[i][0]);
                            elem  = "<div class='media'>";
                            elem += "<div class='media-left media-top'>";
                            elem += "<a href='/gardens/"+garden.id+"'>";
                            elem += "<img class='media-object' src='/"+garden.image+"' width='100' height='80'>";
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

                // Оставшиеся объекты будем удалять с карты.
                //objects.remove(visibleObjects).removeFromMap(myMap);
            });
        }
    </script>
    <div class="container">
        <div class="row map-container">
            <h1 class="line red">Садики</h1>
            <div id="map"></div>
            <div class="map-panel"></div>
        </div>
    </div>
@stop