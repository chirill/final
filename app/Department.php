<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //

    public function locations(){
        return $this->belongsToMany('App\Location');
    }
}
