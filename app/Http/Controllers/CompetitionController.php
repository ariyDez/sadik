<?php

namespace App\Http\Controllers;

use App\Competition;
use App\PhotoCompetition;
use App\Voice;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class CompetitionController extends Controller
{
    
    public function index()
    {
        $competitions = Competition::all();
        return view('competitions.index', compact('competitions'));
    }
    
    public function show($id)
    {
        $competition = Competition::find($id);
        $participiants = $competition->photoCompetitions;
        return view('competitions.show', compact('competition', 'participiants'));
    }
    
    public function joinShow($id)
    {
        $competition = Competition::find($id);
        return view('competitions.join', compact('competition'));
    }
    
    public function joinProcess(Request $request, $id)
    {
//        $this->validate($request, [
//           ''
//        ]);
        $competition = PhotoCompetition::where('user_id', Sentinel::getUser()->id)->where('competition_id', $id)->get();
        if(count($competition) > 0)
            return Redirect::back()
                    ->withErrors('Вы уже отправили заявку');
        $image = $request->file('image');
        $filename  = md5(time() . $image->getClientOriginalName()). '.' . $image->getClientOriginalExtension();
        $path = "images/uploads/" . $filename;
        $fullpath = public_path('images/uploads');
        $photoCompetition = new PhotoCompetition();
        $photoCompetition->image = $path;
        $photoCompetition->user_id = Sentinel::getUser()->id;
        $photoCompetition->competition_id = $id;
        $photoCompetition->title = "bla-bla";
        $photoCompetition->desc = "sdfsdfsd";
        $photoCompetition->save();
        $image->move($fullpath, $filename);
    }

    public function addLike($id)
    {
        $participiant = PhotoCompetition::find($id);

        $voice = Voice::where('user_id', Sentinel::getUser()->id)->where('photo_competition_id', $participiant->id)->get();
        if(count($voice) == 0)
        {
            $voice = new Voice();
            $voice->user_id = Sentinel::getUser()->id;
            $voice->photo_competition_id = $participiant->id;
            $voice->save();
            $participiant->likes = $participiant->likes+1;
            $participiant->save();
        }
        else
            return Redirect::back()
                ->withErrors("Вы уже голосовали за этого участника");
    }
}
