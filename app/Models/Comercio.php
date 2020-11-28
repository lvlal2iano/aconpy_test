<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comercio extends Model
{
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function CBUs(){
        return $this->hasMany('App\Models\Cbu', 'comercio_id');
    }
}
