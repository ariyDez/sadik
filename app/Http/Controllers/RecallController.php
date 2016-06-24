<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Recall;

class RecallController extends Controller
{
    public function add(Request $request)
    {
        $recall = Recall::where('user_id', $request->user)->where('garden_id', $request->garden)->get();
        if(count($recall) > 0)
            return response()->json('Вы уже оставили отзыв');
        else
        {
            $recall = new Recall;
            $recall->user_id = $request->user;
            $recall->garden_id = $request->garden;
            $recall->text = $request->text;
            $recall->save();
            $recall->user = \App\User::find($recall->user_id);
            return response()->json($recall);
        }

    }
}
