<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function store(){
        return $this->belongsTo('App\Store');
    }

    protected $casts = [
        'images' => 'array',
    ];
}
