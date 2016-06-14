<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoCompetition extends Model
{
    
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function setUserAttribute($user)
    {
        $this->user()->dissociate();
        if( !$user) return;
        if( !$this->exists) $this->save();
        $this->user()->associate($user);
    }
    
    public function competition()
    {
        return $this->belongsTo('App\Competition');
    }

    public function setCompetitionAttribute($competition)
    {
        $this->competition()->dissociate();
        if( !$competition) return;
        if( !$this->exists) $this->save();
        $this->competition()->associate($competition);
    }
    
    public function voices()
    {
        return $this->hasMany('App\Voice');
    }
}
