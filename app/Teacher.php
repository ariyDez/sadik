<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
      'name', 'position', 'image'  
    ];
    
    public function garden()
    {
        return $this->belongsTo('App\Garden');
    }

    public function setGardenAttribute($garden)
    {
        $this->garden()->dissociate();
        if( !$garden) return;
        if( !$this->exists) $this->save();
        $this->garden()->associate($garden);
    }
}
