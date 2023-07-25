<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class ServiceSectionData extends Model
{
    protected $table = 'service_section_datas';

    protected $fillable = [
        'section_id',
        'title',
        'section_desc',
        'image',
        'icon',
        'page_url',
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
