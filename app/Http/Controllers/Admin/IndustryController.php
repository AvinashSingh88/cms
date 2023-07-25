<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\IndustryRepositoryInterface;

class IndustryController extends Controller
{
    private $IndustryRepository;
    public function __construct(IndustryRepositoryInterface $IndustryRepository){
        $this->IndustryRepository = $IndustryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $pages =  $this->IndustryRepository->allIndustryPages();
        return view('admin.industry.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $categories =  $this->IndustryRepository->getIndustryMenu();
        return view('admin.industry.page.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $data = $request->validate([
            'parent_id' => 'required',
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image1' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'image2' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'image3' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'status' => 'required',
            'meta_title' => 'nullable',
            'meta_tag' => 'nullable',
            'meta_description' => 'nullable',
        ]);

        if($request->has('image1')){
            $data['image1'] = upload_asset($request->image1, "industry");
        }else{
            $data['image1'] = NULL;
        }

        if($request->has('image2')){
            $data['image2'] = upload_asset($request->image2, "industry");
        }else{
            $data['image2'] = NULL;
        }

        if($request->has('image3')){
            $data['image3'] = upload_asset($request->image3, "industry");
        }else{
            $data['image3'] = NULL;
        }
        
        $data['created_by'] = session('LoggedUser')->id;
        $this->IndustryRepository->storeIndustryPage($request, $data);

        return redirect()->route('admin.industry.index')->with(session()->flash('alert-success', 'Industry Created Successfully'));
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
        $page = $this->IndustryRepository->findIndustryPage($id);
        if($page){
            $menus =  $this->IndustryRepository->getIndustryMenu();
            return view('admin.industry.page.update', compact('page', 'menus'));
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
            'parent_id' => 'required',
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image1' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'image2' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'image3' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'status' => 'required',
            'meta_title' => 'nullable',
            'meta_tag' => 'nullable',
            'meta_description' => 'nullable',
        ]);

        if($request->has('image1')){
            $data['image1'] = upload_asset($request->image1, "industry");
        }else{
            $data['image1'] = NULL;
        }

        if($request->has('image2')){
            $data['image2'] = upload_asset($request->image2, "industry");
        }else{
            $data['image2'] = NULL;
        }

        if($request->has('image3')){
            $data['image3'] = upload_asset($request->image3, "industry");
        }else{
            $data['image3'] = NULL;
        }
        
        $data['updated_by'] = session('LoggedUser')->id;
        $this->IndustryRepository->updateIndustryPage($data, $id);
        return redirect()->route('admin.industry.index')->with(session()->flash('alert-success', 'Industry Updated Successfully'));
    }

}