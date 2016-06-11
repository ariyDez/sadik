<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoCompetition extends Model
{
    
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function competition()
    {
        return $this->belongsTo('App\Competition');
    }
}
