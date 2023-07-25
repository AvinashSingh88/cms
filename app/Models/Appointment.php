<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class Appointment extends Model
{
     /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();
        Paginator::useBootstrap();

    }


}
