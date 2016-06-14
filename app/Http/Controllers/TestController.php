<?php

namespace App\Http\Controllers;

use App\Competition;
use Illuminate\Http\Request;
use App\Http\Requests;
use Intervention\Image\ImageManagerStatic as Image;
use Cart;
class TestController extends Controller
{
    public function test()
    {
        //Cart::add(455, 'Sample Item', 100, 3, array());
        $competitions = Competition::where('started_at','<=', date('Y-m-d'))->where('status', '<=', 5)->get();
        foreach($competitions as $competition)
        {
            if($competition->status == 0)
            {
                //dd($competition);
                $participiants = $competition->photoCompetitions;
                $participiants = array_sort($participiants, function($value){
                    return $value['likes'];
                });
                $max = last($participiants);
                // dd($max);
                $winners = array_where($participiants, function($key, $value)use($max){
                    return $value['likes'] >= $max['likes'];
                });
                //dd($winners);
                if(count($winners) > 1)
                {
                    $winners = array_sort($winners, function($value){
                        return $value['created_at'];
                    });
                }
                $winner = head($winners);
                $competition->user_id = $winner['user_id'];
                $competition->status = 1;
                $competition->save();
                dd($winner);
            }
            else
            {
                $competition->status = $competition->status+1;
                $competition->save();
            }



        }
        dd($competitions);
        dd(date('Y-m-d H:i:s'));
        //dd($date);
        dd(date('Y-m-d') == $date[0]);
        dd(Cart::total());
    }

    public function image()
    {
        $img = Image::make('images/foo/5.jpg')->greyscale();
        $img->save('images/foo/new.jpg');
    }
}
