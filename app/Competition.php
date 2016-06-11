<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    
    
    public function photoCompetitions()
    {
        return $this->hasMany('App\PhotoCompetition');
    }
}
