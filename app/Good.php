<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    protected $fillable = [
        'title',
        'cost',
        'description'
    ];

    public function category()
    {
        return $this->belongsTo('App\GoodCategory');
    }
}
