<?php
namespace App\Repositories;
use App\Repositories\Interfaces\WebCommonRepositoryInterface;
use App\Models\CmsPage;
use App\Models\Testimonial;
use App\Models\Gallery;
use App\Models\Category;
use App\Models\Blog;
use App\Models\BlogLike;
use App\Models\BlogComment;
use App\Models\BlogView;
use App\Models\CustomerLead;

class WebCommonRepository implements WebCommonRepositoryInterface
{
    public function getHome(){
        return CmsPage::select('*')->where('title', 'Home')->first();
    }

    public function getAboutus(){
        return CmsPage::select('*')->where('title', 'About')->first();
    }

    public function getContactus(){
        return CmsPage::select('*')->where('title', 'Contact')->first();
    }

    public function storeContactEnquiry($data){
        return CustomerLead::create($data);
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

        $get_blogs_like = array();
        if(session('LoggedCustomer')){
            $get_blogs_like = BlogLike::select('blog_id', 'status')->where('user_id', session('LoggedCustomer')->user_id)->where('status', 1)->get();
        }

        foreach($blogs as $key => $list){
            $blogs[$key]->is_liked = 0;
            if($get_blogs_like != null){
                foreach($get_blogs_like as $like) {
                    if($like->blog_id == $list->id){
                        $blogs[$key]->is_liked = 1;
                    }
                }
            } 
        }
            
        return $blogs;
    }

    public function getBlogDetail($slug, $ip){

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
        $this->storeViewBlogUser($blog->id, $ip);

        return $data;
    }

    public function storeViewBlogUser($blog_id, $ip){
        $today = date('Y-m-d');
        $check_blog = BlogView::where('blog_id', $blog_id)->where('ip_address', $ip)->where('date', $today)->first();
        if(!$check_blog){
            $blog = new BlogView();
            $blog->ip_address = $ip;
            $blog->blog_id = $blog_id;
            $blog->date = $today;
            if($blog->save()){
                $update_blog = Blog::find($blog_id);
                $update_blog->total_view += 1;
                $update_blog->save();
            }
        }
    }

    public function applyBlogAction($data){
        $blog = BlogLike::where('blog_id', $data['blog_id'])->where('user_id', $data['user_id'])->first();
        if($blog){
            if($blog->status == 1){
                $blog->status = 0;
            }else{
                $blog->status = 1;
            }
        }else{
            $blog = new BlogLike();
            $blog->user_id = $data['user_id'];
            $blog->blog_id = $data['blog_id'];
            $blog->status = 1;
        }
        if($blog->save()){
            $update_blog = Blog::find($data['blog_id']);
            if($blog->status == 1){
                $update_blog->total_like += 1;
            }else{
                $update_blog->total_like -= 1;
            }
            $update_blog->save();
        }

        $get_blog = BlogLike::select('blog_likes.*', 'blogs.total_like', 'blogs.total_comment')
            ->leftJoin('blogs', 'blog_likes.blog_id', '=', 'blogs.id')
            ->where('blog_likes.blog_id', $data['blog_id'])
            ->where('blog_likes.user_id', $data['user_id'])
            ->first();

        return $get_blog;
    }

    public function storeBlogComment($data){
        $blog = new BlogComment();
        $blog->user_id = session('LoggedCustomer')->user_id;
        $blog->blog_id = $data['blog_id'];
        $blog->comment = $data['comment'];
        $blog->status = 0;
        $blog->save();
        
        return $blog;

    }

    public function getBlogComments($blog_id){
        $get_blog = BlogComment::select('blog_comments.*', 'users.first_name', 'users.last_name')
            ->leftJoin('users', 'users.id', '=', 'blog_comments.user_id')
            ->where('blog_comments.blog_id', $blog_id)
            ->where('blog_comments.status', 1)
            ->latest()
            ->get();
        return $get_blog;
    }

}