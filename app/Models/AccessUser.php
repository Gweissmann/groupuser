<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessUser extends Model
{
    public function station_accessuser() {
        return $this->hasMany('App\Models\StationAccessUser', 'access_user_id', 'id');
    }

}
