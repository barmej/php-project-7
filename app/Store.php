<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    //
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function product(){
        return $this->hasMany('App\Product');
    }

    public function orders(){
        return $this->hasMany('App\Order');
    }
}
