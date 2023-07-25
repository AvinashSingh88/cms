<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\ServiceRepositoryInterface;

class ServiceController extends Controller
{
    private $serviceRepository;
    public function __construct(ServiceRepositoryInterface $serviceRepository){
        $this->serviceRepository = $serviceRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $pages =  $this->serviceRepository->allServicesPages();
        return view('admin.services.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $categories =  $this->serviceRepository->getServiceMenu();
        return view('admin.services.page.create', compact('categories'));
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
            $data['image1'] = upload_asset($request->image1, "services");
        }else{
            $data['image1'] = NULL;
        }

        if($request->has('image2')){
            $data['image2'] = upload_asset($request->image2, "services");
        }else{
            $data['image2'] = NULL;
        }

        if($request->has('image3')){
            $data['image3'] = upload_asset($request->image3, "services");
        }else{
            $data['image3'] = NULL;
        }
        
        $data['created_by'] = session('LoggedUser')->id;
        $this->serviceRepository->storeServicesPage($request, $data);

        return redirect()->route('admin.services.index')->with(session()->flash('alert-success', 'ServicesPage Created Successfully'));
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
        $page = $this->serviceRepository->findServicesPage($id);
        if($page){
            $menus =  $this->serviceRepository->getServiceMenu();
            return view('admin.services.page.update', compact('page', 'menus'));
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
            $data['image1'] = upload_asset($request->image1, "services");
        }else{
            $data['image1'] = NULL;
        }

        if($request->has('image2')){
            $data['image2'] = upload_asset($request->image2, "services");
        }else{
            $data['image2'] = NULL;
        }

        if($request->has('image1')){
            $data['image3'] = upload_asset($request->image3, "services");
        }else{
            $data['image3'] = NULL;
        }
        
        $data['updated_by'] = session('LoggedUser')->id;
        $this->serviceRepository->updateServicesPage($data, $id);
        return redirect()->route('admin.services.index')->with(session()->flash('alert-success', 'ServicesPage Updated Successfully'));
    }

}