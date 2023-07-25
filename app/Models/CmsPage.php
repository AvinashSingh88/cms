<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;

class CmsPage extends Model
{
    use HasFactory;
    protected $fillable = [
        'parent_id',
        'title',
        'page_url',
        'status',
        'created_by',
    ];

     /**
     * Boot the model.
     */
    protected static function boot(){
        parent::boot();
        Paginator::useBootstrap();
    }

    public function categories(){
        return $this->hasMany(CmsPage::class, 'parent_id');
    }

    public function childrenCategories(){
        return $this->hasMany(CmsPage::class, 'parent_id')->with('categories');
    }

    public function parentCategory(){
        return $this->belongsTo(CmsPage::class, 'parent_id');
    }

}
