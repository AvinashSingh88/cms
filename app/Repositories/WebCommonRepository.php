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
        return Blog::select('*')->where('status', 1)->get();
    }

    public function getBlogDetail($id){
        return Blog::select('*')->where('status', 1)->where('id', $id)->first();
    }

}