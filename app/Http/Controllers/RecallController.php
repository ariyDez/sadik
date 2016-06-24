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
        if($request->rating == 0)
            return response()->json('Вы не поставили оценку');
        if(count($recall) > 0)
            return response()->json('Вы уже оставили отзыв');
        else
        {
            $recall = new Recall;
            $recall->user_id = $request->user;
            $recall->garden_id = $request->garden;
            $recall->text = $request->text;
            $recall->rating = $request->rating;
            $recall->save();
            $garden = \App\Garden::find($request->garden);
            $garden->rating = $this->countGardenRating($garden->recalls);
            $garden->save();
            $recall->user = \App\User::find($recall->user_id);
            return response()->json($recall);
        }
    }

    private function countGardenRating($recalls)
    {
        $deal = 0;
        foreach($recalls as $recall)
            $deal += $recall->rating;
        return $deal/count($recalls);
    }
}
