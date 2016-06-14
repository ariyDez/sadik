<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'deal'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function good()
    {
        return $this->belongsTo('App\Good');
    }
}
