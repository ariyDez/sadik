<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public function goods()
    {
        return $this->belongsToMany('App\Good');
    }
}
