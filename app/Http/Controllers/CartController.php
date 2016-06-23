<?php

namespace App\Http\Controllers;

use App\Good;
use Cart;
use Illuminate\Http\Request;

use App\Http\Requests;

class CartController extends Controller
{

    public function content()
    {
        $contents = Cart::content();
        return view('carts.content', compact('contents'));
    }
    
    public function add(Request $request)
    {
        $good = Good::find($request->id);
        Cart::add(time().$good->id, $good->title, $request->qty, $good->price, array('id' => $good->id));
        $data['cart'] = Cart::content();
        $data['deal'] = count($data['cart']);
        //Cart::destroy();
        return response()->json($data);
    }

}
