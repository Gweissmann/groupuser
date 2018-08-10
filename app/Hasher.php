<?php

namespace App;

use Hashids\Hashids;
use Illuminate\Database\Eloquent\Model;

class Hasher extends Model
{
    public static function encode(...$args)
    {
        return app(Hashids::class)->encode(...$args);
    }

    public static function decode($enc)
    {
        if (is_int($enc)) {
            return $enc;
        }

        return app(Hashids::class)->decode($enc)[0];
    }
}
