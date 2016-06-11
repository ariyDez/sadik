<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Intervention\Image\ImageManagerStatic as Image;
use Cart;
class TestController extends Controller
{
    public function test()
    {
        Cart::add(455, 'Sample Item', 100, 3, array());
        dd(Cart::total());
    }

    public function image()
    {
        $img = Image::make('images/foo/5.jpg')->greyscale();
        $img->save('images/foo/new.jpg');
    }
}
