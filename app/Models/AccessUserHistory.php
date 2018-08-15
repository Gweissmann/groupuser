<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessUserHistory extends Model
{
    public function access_user() {
        return $this->belongsTo('App\Models\AccessUser');
    }

    public function station() {
        return $this->belongsTo('App\Models\Station');
    }
}
