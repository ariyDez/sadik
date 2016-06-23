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
    
    public function setUserAttribute($user)
    {
        $this->user()->dissociate();
        if(!$user) return;
        if(!$this->exists) $this->save();
        $this->user()->associate($user);
    }

    public function good()
    {
        return $this->belongsTo('App\Good');
    }

    public function setGoodAttribute($good)
    {
        $this->good()->dissociate();
        if(!$good) return;
        if(!$this->exists) $this->save();
        $this->good()->associate($good);
    }
}
