<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'title',
        'info'
    ];
    
    public function gardens()
    {
        return $this->hasMany('App\Garden');
    }
}
