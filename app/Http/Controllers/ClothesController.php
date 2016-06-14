<?php

namespace App\Http\Controllers;

use App\Good;
use App\GoodCategory;
use Illuminate\Http\Request;

use App\Http\Requests;

class ClothesController extends AbstractController
{
    public function index()
    {
        $clothes = GoodCategory::where('slug', 'clothes')->firstOrFail();
        $moduleName = 'Одежда';
        $color = 'yellow';
        $controller = 'Clothes';
        $items = $clothes->goods;

        return view('goods.index', compact('items', 'moduleName', 'color', 'controller'));
    }

    public function show($id)
    {
        $item = Good::find($id);
        $color = 'yellow';
        return view('goods.show', compact('item', 'color'));
    }
}
