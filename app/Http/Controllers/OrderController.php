<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Cart;
use Sentinel;
class OrderController extends Controller
{
    public function index()
    {
        $contents = Cart::content();
        $total = Cart::total();
        return view('orders.index', compact('contents','total'));
    }

    public function setOrder(Request $request)
    {
        $user = Sentinel::getUser();
        $goods = Cart::content();
        //dd($goods);
        foreach($goods as $good)
        {
            $order = new \App\Order();
            $order->good_id = $good->options['id'];
            $order->deal = $good->qty;
            $order->user_id = $user->id;
            $order->save();
        }
       Cart::destroy();
    }
}
