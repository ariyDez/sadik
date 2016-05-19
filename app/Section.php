<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'title',
        'info'
    ];
    
    public function garden()
    {
        return $this->belongsTo('App\Garden');
    }
}
