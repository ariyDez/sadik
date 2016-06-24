<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recall extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function garden()
    {
        return $this->belongsTo('App\Garden');
    }
}
