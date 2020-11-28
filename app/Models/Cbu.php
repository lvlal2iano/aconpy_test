<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cbu extends Model
{
    public function comercio(){
        return $this->belongsTo('App\Models\Comercio', 'comercio_id');
    }
}
