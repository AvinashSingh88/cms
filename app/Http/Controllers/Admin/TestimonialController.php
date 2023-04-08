<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\TestimonialRepositoryInterface;
use JD\Cloudder\Facades\Cloudder;

class TestimonialController extends Controller
{

    private $testimonialRepository;

    public function __construct(TestimonialRepositoryInterface $testimonialRepository)
    {
        $this->testimonialRepository = $testimonialRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials =  $this->testimonialRepository->allTestimonials();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'message' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
        ]);
        
        if($request->has('img')){
            $data['img'] = upload_asset($request->img);
        }else{
            $data['img'] = NULL;
        }

        $data['created_by'] = session('LoggedUser')->id;
        $this->testimonialRepository->storeTestimonial($request, $data);

        return redirect()->route('admin.testimonials.index')->with(session()->flash('alert-success', 'Testimonial Created Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonial = $this->testimonialRepository->findTestimonial($id);
        if($testimonial){
            return view('admin.testimonials.update', compact('testimonial'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'message' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
        ]);
        
        if($request->has('img')){
            $data['img'] = upload_asset($request->img);
        }else{
            $data['img'] = NULL;
        }
        $data['updated_by'] = session('LoggedUser')->id;

        $this->testimonialRepository->updateTestimonial($data, $id);
        return redirect()->route('admin.testimonials.index')->with(session()->flash('alert-success', 'Testimonial Updated Successfully'));
    }

   

}