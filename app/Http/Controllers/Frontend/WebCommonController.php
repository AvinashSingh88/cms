<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        return view('frontend.index', compact('data'));
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

    public function blogDetail($id){
        $blog = $this->webRepository->getBlogDetail($id);
        return view('frontend.blog_detail', compact('blog'));
    }


}