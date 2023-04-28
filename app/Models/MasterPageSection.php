<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class MasterPageSection extends Model
{
    protected $fillable = [
        'master_page_id',
        'cms_page_id',
        'order_level',
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
