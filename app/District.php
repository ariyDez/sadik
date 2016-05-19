<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
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
