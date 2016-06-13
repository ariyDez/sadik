<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Garden;

class GardenController extends AbstractController
{

    public function index()
    {
        $gardens = Garden::all();
        return view('gardens.index', compact('gardens'));
    }

    public function show($id)
    {
        $garden = Garden::find($id);
        $teachers = $garden->teachers;
        $sections = $garden->sections;
        return view('gardens.show', compact('garden', 'teachers', 'sections'));
    }
}
