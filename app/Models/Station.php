<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    public function station_accessuser() {
        return $this->hasMany('App\Models\StationAccessUser', 'station_id', 'id');
    }

    public function line() {
        return $this->belongsTo('App\Models\Line', 'line_id', 'id');
    }
}
