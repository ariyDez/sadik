<?php

namespace App\Http\Controllers;

use App\Good;
use App\GoodCategory;
use Illuminate\Http\Request;

use App\Http\Requests;

class ToyController extends AbstractController
{
    public function index()
    {
        $toy = GoodCategory::where('slug', 'toys')->firstOrFail();
        $moduleName = 'Игрушки';
        $color = 'orange';
        $controller = 'Toy';
        $items = $toy->goods;

        return view('goods.index', compact('items', 'moduleName', 'color', 'controller'));
    }

    public function show($id)
    {
        $item = Good::find($id);
        $color = 'orange';
        return view('goods.show', compact('item', 'color'));
        
    }
}
