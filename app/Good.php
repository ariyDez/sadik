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

    public function goodCategory()
    {
        return $this->belongsTo('App\GoodCategory');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function setCategoryAttribute($category)
    {
        $this->category()->dissociate();
        if( !$category) return;
        if( !$this->exists) $this->save();
        $this->category()->associate($category);
    }
    
    public function colors()
    {
        return $this->belongsToMany('App\Color');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
