<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\BlogRepositoryInterface;
use JD\Cloudder\Facades\Cloudder;

class BlogController extends Controller
{

    private $blogRepository;

    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $blogs =  $this->blogRepository->allBlogs();
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $countries =  $this->blogRepository->getCountryList();
        $categories =  $this->blogRepository->getCategoryList();
        return view('admin.blogs.create', compact('countries', 'categories'));
    }

    public function generateSlug(){
        $this->slug = SlugService::createSlug(Blog::class, 'slug', $this->title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $data = $request->validate([
            'category_id' => 'required',
            'sub_category_id' => 'nullable',
            'country' => 'nullable',
            'title' => 'required|string|max:255',
            'description' => 'required',
            // 'blog_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
            'meta_title' => 'nullable',
            'meta_tag' => 'nullable',
            'meta_description' => 'nullable',
        ]);

        if($request->has('blog_image')){
            $data['blog_image'] = upload_asset($request->blog_image);
        }else{
            $data['blog_image'] = NULL;
        }

        $data['created_by'] = session('LoggedUser')->id;
        $this->blogRepository->storeBlog($request, $data);

        return redirect()->route('admin.blogs.index')->with(session()->flash('alert-success', 'Blog Created Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $blog = $this->blogRepository->findBlog($id);
        if($blog){
            $countries =  $this->blogRepository->getCountryList();
            $subcategories =  $this->blogRepository->getSubCategoryList($blog->category_id);
            $categories =  $this->blogRepository->getCategoryList();
            return view('admin.blogs.update', compact('blog', 'categories', 'subcategories', 'countries'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $data = $request->validate([
            'category_id' => 'required|not_in:0',
            'sub_category_id' => 'nullable',
            'country' => 'required|not_in:0',
            'title' => 'required|string|max:255',
            'description' => 'required',
            // 'blog_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
            'meta_title' => 'nullable',
            'meta_tag' => 'nullable',
            'meta_description' => 'nullable',
        ]);

        if($request->has('blog_image')){
            $data['blog_image'] = upload_asset($request->blog_image);
        }else{
            $data['blog_image'] = NULL;
        }
        
        $data['updated_by'] = session('LoggedUser')->id;

        $this->blogRepository->updateBlog($data, $id);

        return redirect()->route('admin.blogs.index')->with(session()->flash('alert-success', 'Blog Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $this->blogRepository->destroyBlog($id);
        return redirect()->route('admin.blogs.index')->with(session()->flash('alert-success', 'Blog Delete Successfully'));
    }

    public function fetchSubCategory(Request $request){
        $data['sub_categories'] = $this->blogRepository->getSubCategoryList($request->category_id);
        return response()->json($data);
    }

    public function showComments($id){
        $blogs = $this->blogRepository->getAllComment($id);
        return view('admin.blogs.comment', compact('blogs'));
    }

    public function showLikes($id){
        $blogs = $this->blogRepository->getAllLike($id);
        return view('admin.blogs.like', compact('blogs'));
    }

    public function changeCommentStatus(Request $request){
        $comment = $this->blogRepository->setCommentStatus($request);
        return response()->json($comment);
    }

}