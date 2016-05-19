<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title',
        'href'
    ];
    
    public function category()
    {
        return $this->belongsTo('App\MovieCategory');
    }
}
