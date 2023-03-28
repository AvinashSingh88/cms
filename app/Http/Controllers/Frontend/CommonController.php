<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CmsPage;

class CommonController extends Controller
{
    
    public function index()
    {
        $data = CmsPage::select('*')->where('title', 'Home')->first();
        return view('frontend.index', compact('data'));
    }

    public function about_us()
    {
        $data = CmsPage::select('*')->where('title', 'About')->first();
        return view('frontend.about', compact('data'));
    }

    public function contact_us()
    {
        $data = CmsPage::select('*')->where('title', 'Contact')->first();
        return view('frontend.contact', compact('data'));
    }

   
}
