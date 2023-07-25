<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class SectionData extends Model
{
    protected $table = 'section_datas';

    protected $fillable = [
        'section_id',
        'title',
        'section_desc',
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
