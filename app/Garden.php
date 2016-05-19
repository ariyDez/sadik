<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Garden extends Model
{
    protected $fillable = [
        'title', 'image'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function district()
    {
        return $this->belongsTo('App\District');
    }

    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    public function teachers()
    {
        return $this->hasMany('App\Teacher');
    }
    
    public function setDistrictAttribute($district)
    {
        $this->district()->dissociate();
        if( !$district) return;
        if( !$this->exists) $this->save();
        $this->district()->associate($district);
    }
    
    public function setTypeAttribute($type)
    {
        $this->type()->dissociate();
        if( !$type) return;
        if( !$this->exists) $this->save();
        $this->type()->associate($type);
    }
    
    public function sections()
    {
        return $this->hasMany('App\Section');
    }
}
