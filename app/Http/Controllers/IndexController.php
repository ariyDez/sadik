<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Garden;
use App\Movie;
use App\Blog;

class IndexController extends Controller
{
    public function index()
    {
        $gardens = Garden::all();
        $movies  = Movie::all();
        $blogs   = Blog::all();
        //$errors  = 'wtf';
        return view('index', compact('gardens', 'movies', 'blogs', 'errors'));
    }
}
