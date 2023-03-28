<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'message',
        'img',
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
