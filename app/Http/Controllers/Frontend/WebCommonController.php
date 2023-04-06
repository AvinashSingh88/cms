<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use App\Repositories\Interfaces\WebCommonRepositoryInterface;

class WebCommonController extends Controller
{
    private $webRepository;

    public function __construct(WebCommonRepositoryInterface $webRepository)
    {
        $this->webRepository = $webRepository;
    }

    public function index(){
        $data = $this->webRepository->getHome();
        return view('frontend.index', compact('data'));
    }

    public function about_us(){
        $data = $this->webRepository->getAboutus();
        return view('frontend.index', compact('data'));
    }

    public function contact_us(){
        $data = $this->webRepository->getContactus();
        return view('frontend.contact_us', compact('data'));
    }

    public function postContactEnquiry(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $this->webRepository->storeContactEnquiry($data);
        
        return redirect("contact")->withSuccess('Thankyou contacting with us. Our Team will help you soon...');
    }

    public function testimonial(){
        $testimonials = $this->webRepository->getTestimonial();
        return view('frontend.testimonial', compact('testimonials'));
    }

    public function gallery(){
        $galleries = $this->webRepository->getGallery();
        return view('frontend.gallery', compact('galleries'));
    }

    public function blogListing(){
        $blogs = $this->webRepository->getBlogs();
        return view('frontend.blogs', compact('blogs'));
    }

    public function blogSlugListing($cat_slug){
        $blogs = $this->webRepository->getBlogs($cat_slug);
        return view('frontend.blogs', compact('blogs'));
    }

    public function blogDetail($slug){
        $data = $this->webRepository->getBlogDetail($slug);
        return view('frontend.blog_detail', compact('data'));
    }

    public function blogAction(Request $request){
        $data = $request->validate([
            'blog_id' => 'required',
            'user_id' => 'required',
        ]);

        $response = $this->webRepository->applyBlogAction($data);
        return response($response);
    }

    public function storeBlogComment(Request $request){
        $data = $request->validate([
            'blog_id' => 'required',
            'comment' => 'required',
        ]);

        $response = $this->webRepository->storeBlogComment($data);
        return response($response);
    }

    public function showBlogComments(Request $request){
        $data = $request->validate([
            'blog_id' => 'required',
        ]);

        $response = $this->webRepository->getBlogComments($request->blog_id);
        $output = '';

        if($response != null){
            foreach($response as $res){
                $output .= '<h5 class="text-success">'.$res->first_name. ' ' .$res->first_name.'</h5>';
                $output .= '<p>'.$res->comment.'</p>';
            }
        }
        return Response::json([
            'status' => true,
            'data' => $output,
        ], 200);
    }


}
