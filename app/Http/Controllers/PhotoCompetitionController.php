<?php

namespace App\Http\Controllers;

use App\Competition;
use App\PhotoCompetition;
use Illuminate\Http\Request;

use App\Http\Requests;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\User;

class PhotoCompetitionController extends Controller
{

    public function __construct()
    {
        $this->middleware('mine');
    }

    public function showJoin()
    {
        return view('competitions.join');
    }

    public function joinProcess(Request $request)
    {
        $image = $request->file('image');
        $filename  = md5(time() . $image->getClientOriginalName()). '.' . $image->getClientOriginalExtension();
        $path = "images/uploads/" . $filename;
        $fullpath = public_path('images/uploads');
        //$image->move($fullpath, $filename);
        //Image::make($image->getRealPath())->resize(200, 200)->save($path);
        $photoCompetition = new PhotoCompetition();
        $photoCompetition->image = $path;
        //dd(User::find(Sentinel::getUser()->id));
        $photoCompetition->user_id = Sentinel::getUser()->id;
        $photoCompetition->competition_id = 1;
        $photoCompetition->title = "bla-bla";
        $photoCompetition->desc = "sdfsdfsd";
        $photoCompetition->save();
        $image->move($fullpath, $filename);
    }
}
