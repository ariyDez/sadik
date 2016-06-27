<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Garden;

class GardenController extends AbstractController
{

    public function index()
    {
        $title = 'Садики';
        $gardens = Garden::all();
        return view('gardens.index', compact('gardens','title'));
    }

    public function show($id)
    {
        $garden = Garden::find($id);
        $teachers = $garden->teachers;
        $sections = $garden->sections;
        return view('gardens.show', compact('garden', 'teachers', 'sections'));
    }

    public function getFilteredList(Request $request)
    {
        $latitudes = $request->input('latitude');
        $longitudes = $request->input('longitude');
        $ids = $request->input('id');
        $gardens = [];
        for($i=0; $i<count($ids); $i++)
        {
//            $garden = Garden::where('latitude', $latitudes[$i])->where('longitude', $longitudes[$i])->get();
            $garden = Garden::find($ids[$i]);
            $gardens[$i] = $garden;
        }
//        $gardens = array_sort($gardens, function($garden){
//            return $garden->rating;
//        });
        return response()->json($gardens);
    }
    
    public function getList(Request $request)
    {
        $gardens = Garden::all();
        $maps = [];
        foreach ($gardens as $garden)
        {
            $balloonContent = "<a href='/gardens/{$garden->id}' class='map_balloon'><h2>{$garden->title}</h2></a>";
            $balloonContent .= "<div class='productRate'><div style='width: ".$garden->rating * 30 . "px'></div></div>";
            $balloonContent .= $garden->info;
            $point = [
                'type' => 'Feature',
                'id'   => $garden->id,
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [$garden->latitude, $garden->longitude]
                ],
                'options' => [
                    'preset' => 'islands#dotIcon'
                ],
                'properties' => [
                    'hintContent' => $garden->title,
                    'balloonContent' => $balloonContent,
                    'id' => $garden->id
                ]
            ];
            $maps[] = $point;
        }
        return response()->json($maps);
    }
}
