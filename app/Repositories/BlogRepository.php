<?php
namespace App\Repositories;
use App\Repositories\Interfaces\BlogRepositoryInterface;
use App\Models\Blog;
use App\Models\BlogLike;
use App\Models\BlogView;
use App\Models\BlogComment;
use App\Models\Category;
use App\Models\Country;
// use Illuminate\Http\Request;

class BlogRepository implements BlogRepositoryInterface
{
    public function allBlogs(){
        $blogs = Blog::select('blogs.*', 'cat.title as parent_name', 'sub_cat.title as sub_category_name')
            ->leftJoin('categories as cat', 'cat.id', '=', 'blogs.category_id')
            ->leftJoin('categories as sub_cat', 'sub_cat.id', '=', 'blogs.sub_category_id')
            ->latest()->paginate(10);
        return $blogs;
    }

    public function getCategoryList(){
        return Category::select('id', 'title')->where('parent_id', '0')->where('status', 1)->get();
    }

    public function getCountryList(){
        return Country::select('id', 'country_name')->get();
    }

    public function getSubCategoryList($category_id){
        return Category::select('id', 'title')->where('parent_id', $category_id)->where('status', 1)->get();
    }

    public function storeBlog($request, $data){
        $blog = new Blog();
        $blog->category_id = $data['category_id'];
        $blog->sub_category_id = $data['sub_category_id'];
        $blog->country = $data['country'];
        $blog->title = $data['title'];
        $blog->description = $data['description'];

        if($data['blog_image']){
            $blog->blog_image = $data['blog_image'];
        }else{
            $blog->blog_image = NULL;
        }

        $blog->status = $data['status'];
        $blog->meta_title = $data['meta_title'];
        $blog->meta_tag = $data['meta_tag'];
        $blog->meta_description = $data['meta_description'];
        $blog->created_by = $data['created_by'];
        $blog->save();
    }

    public function findBlog($id){
        return Blog::find($id);
    }

    public function updateBlog($data, $id){
        $blog = Blog::where('id', $id)->first();
        $blog->category_id = $data['category_id'];
        $blog->sub_category_id = $data['sub_category_id'];
        $blog->country = $data['country'];
        $blog->title = $data['title'];
        $blog->description = $data['description'];
        if($data['blog_image']){
            $blog->blog_image = $data['blog_image'];
        }
        $blog->status = $data['status'];
        $blog->meta_title = $data['meta_title'];
        $blog->meta_tag = $data['meta_tag'];
        $blog->meta_description = $data['meta_description'];
        $blog->updated_by = $data['updated_by'];
        $blog->save();
    }
    
    public function getAllViews($blog_id){
        return BlogView::select('*')
        ->where('blog_id', $blog_id)
        ->orderBy('id', 'DESC')
        ->paginate(10);
    }

    public function getAllLike($blog_id){
        return BlogLike::select('blog_likes.*', 'users.first_name', 'users.last_name')
        ->leftJoin('users', 'users.id', '=', 'blog_likes.user_id')
        ->where('blog_likes.blog_id', $blog_id)
        ->latest()
        ->paginate(10);
    }

    public function getAllComment($blog_id){
        return BlogComment::select('blog_comments.*', 'users.first_name', 'users.last_name')
        ->leftJoin('users', 'users.id', '=', 'blog_comments.user_id')
        ->where('blog_comments.blog_id', $blog_id)
        ->latest()->paginate(10);
    }

    public function setCommentStatus($comment_data){
        $comment = BlogComment::find($comment_data->id);
        $comment->status = $comment_data->status;
        if($comment->save()){
            $update_blog = Blog::find($comment->blog_id);
            if($comment->status == 1){
                $update_blog->total_comment += 1;
            }else{
                $update_blog->total_comment -= 1;
            }
            $update_blog->save();
        }

    }

}