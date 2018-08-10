<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    public function station() {
        return $this->hasMany('App\Models\Station');
    }
}
