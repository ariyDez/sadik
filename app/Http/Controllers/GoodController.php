<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Good;

class GoodController extends Controller
{


    public function show($id)
    {
        $good = Good::find($id);
        return view('goods.show', compact('good'));
    }
}
