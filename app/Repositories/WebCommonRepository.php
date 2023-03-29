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

    public function getBlogs($cat_slug=null){
        $blogs = Blog::select('blogs.*', 'cat.title as parent_name', 'sub_cat.title as sub_category_name', 'sub_cat.slug as cat_slug', 'user.first_name')
            ->leftJoin('categories as cat', 'cat.id', '=', 'blogs.category_id')
            ->leftJoin('categories as sub_cat', 'sub_cat.id', '=', 'blogs.sub_category_id')
            ->leftJoin('users as user', 'user.id', '=', 'blogs.created_by')
            ->where('blogs.status', 1);
            if($cat_slug != null){
                $blogs = $blogs->where('sub_cat.slug', $cat_slug);
            }
            $blogs= $blogs->latest()->paginate(15);
        return $blogs;
    }

    public function getBlogDetail($slug){

        $blog = Blog::select('*')->where('slug', $slug)->where('status', 1)->first();        

        $sub_category_list = Category::select('id', 'title', 'slug');
        if($blog->sub_category_id){
            $sub_category_list->where('parent_id', $blog->category_id);
        }else{
            $sub_category_list->where('parent_id', 0);
        }
        $sub_category_list = $sub_category_list->where('status', 1)->get();
        $data = [
            'blog' => $blog,
            'sub_category_list' => $sub_category_list,
        ];
        return $data;
    }

}