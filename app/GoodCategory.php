<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoodCategory extends Model
{
    protected $fillable = [
        'title',
        'slug'
    ];
    
    public function goods()
    {
        return $this->hasMany('App\Good');
    }
}
