<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Cart;

class OrderController extends Controller
{
    public function index()
    {
        $contents = Cart::content();
        $total = Cart::total();
        return view('orders.index', compact('contents','total'));
    }
}
