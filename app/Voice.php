<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voice extends Model
{
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function photoCompetition()
    {
        return $this->belongsTo('App\PhotoCompetition');
    }
}
