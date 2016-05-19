<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovieCategory extends Model
{
    protected $fillable = [
        'title', 
        'slug'
    ];
    
    public function movies()
    {
        return $this->hasMany('App\Movie');
    }
}
