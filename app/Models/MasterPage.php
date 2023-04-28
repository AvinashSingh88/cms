<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class MasterPage extends Model
{
    protected $fillable = [
        'title',
        'status',
        'created_by',
    ];

     /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();
        Paginator::useBootstrap();
    }

}
