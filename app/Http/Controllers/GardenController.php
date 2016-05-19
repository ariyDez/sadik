<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Garden;

class GardenController extends Controller
{
    public function index()
    {
        $gardens = Garden::all();
        return view('gardens.index', compact('gardens'));
    }
}
