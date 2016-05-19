<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\District;

class DistrictController extends Controller
{
    public function index()
    {
        $districts = District::all();
        return view('districts.index', compact('districts'));
    }

    public function show($id)
    {
        $district = District::findOrFail($id);
        return view('districts.show', compact('district'));
    }
}
