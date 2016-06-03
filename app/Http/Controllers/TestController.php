<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Cart;
class TestController extends Controller
{
    public function test()
    {
        Cart::add(455, 'Sample Item', 100, 3, array());
        dd(Cart::total());
    }
}
