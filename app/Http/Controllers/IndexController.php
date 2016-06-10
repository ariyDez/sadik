<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Garden;
use App\Movie;
use App\Blog;
use App\Good;
use App\GoodCategory;

class IndexController extends Controller
{
    public function index()
    {
        $gardens = Garden::all();
        $clothes = GoodCategory::where('slug', 'clothes')->firstOrFail();
        $toy     = GoodCategory::where('slug', 'toys')->firstOrFail(); 
        //dd($goodCategory);
        $goods = $clothes->goods;
        $toys  = $toy->goods;
        //$goods   = Good::();
        $movies  = Movie::all();
        $blogs   = Blog::all();
        //$errors  = 'wtf';
        return view('index', compact('gardens', 'movies', 'blogs', 'goods','toys', 'errors'));
    }
}
