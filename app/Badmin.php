<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Badmin extends Model
{
    protected $appends = ['id'];
    //
    protected static function boot()
    {
        parent::boot();
    }
}
