<?php
namespace App\Repositories;
use App\Repositories\Interfaces\WebCommonRepositoryInterface;
use App\Models\CmsPage;
use App\Models\Testimonial;
use App\Models\Gallery;
use App\Models\Category;
use App\Models\Blog;

class WebCommonRepository implements WebCommonRepositoryInterface
{
    public function getHome()
    {
        return CmsPage::select('*')->where('title', 'Home')->first();
    }

    public function getAboutus(){
        return CmsPage::select('*')->where('title', 'About')->first();
    }

    public function getContactus(){
        return CmsPage::select('*')->where('title', 'Contact')->first();
    }

    public function getTestimonial(){
        return Testimonial::select('*')->where('status', 1)->get();
    }

    public function getGallery(){
        return Gallery::select('*')->where('status', 1)->get();
    }

    public function getBlogs(){
        $blogs = Blog::select('blogs.*', 'cat.title as parent_name', 'sub_cat.title as sub_category_name', 'user.first_name')
            ->leftJoin('categories as cat', 'cat.id', '=', 'blogs.category_id')
            ->leftJoin('categories as sub_cat', 'sub_cat.id', '=', 'blogs.sub_category_id')
            ->leftJoin('users as user', 'user.id', '=', 'blogs.created_by')
            ->latest()->paginate(15);
        return $blogs;
    }

    public function getBlogDetail($slug){
        return Blog::select('*')->where('status', 1)->where('slug', $slug)->first();
    }

}