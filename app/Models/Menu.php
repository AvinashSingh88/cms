<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'menu_name',
        'parent_id',
        'status',
        'created_by'
    ];

    protected static function boot()
    {
        parent::boot();
        Paginator::useBootstrap(); //Used for pagination
    }
}
