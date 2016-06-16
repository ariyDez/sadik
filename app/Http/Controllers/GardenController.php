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
        $gardens = [];
        for($i=0; $i<count($latitudes); $i++)
        {
            $garden = Garden::where('latitude', $latitudes[$i])->where('longitude', $longitudes[$i])->get();
            $gardens[$i] = $garden;
        }
        return response()->json($gardens);
    }
    
    public function getList(Request $request)
    {
        $gardens = Garden::all();
        $maps = [];
        foreach ($gardens as $garden)
        {
            $balloonContent = "<a href='/gardens/{$garden->id}' class='map_balloon'><h2>{$garden->title}</h2></a>";
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
                    'balloonContent' => $balloonContent
                ]
            ];
            $maps[] = $point;
        }
        return response()->json($maps);
    }
}
