<?php

namespace App\Http\Controllers;

use App\Competition;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Garden;
use App\Movie;
use App\Article;
use App\Good;
use App\GoodCategory;

class IndexController extends Controller
{
    public function index()
    {
        $title = 'Главная';
        $gardens = Garden::all();
        $clothes = GoodCategory::where('slug', 'clothes')->first();
        $toy     = GoodCategory::where('slug', 'toys')->first();
        $goods = (count($clothes)) > 0 ? $clothes->goods: [];
        $toys  = (count($toy) > 0) ? $toy->goods : [];
        $movies  = Movie::all();
        $articles = Article::all();
        $competitions = Competition::all();
        //$errors  = 'wtf';
        return view('index', compact('gardens', 'movies', 'articles', 'goods','toys', 'competitions','errors', 'title'));
    }
}
