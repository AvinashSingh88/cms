<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\CareerRepositoryInterface;

class CareerController extends Controller
{
    private $CareerRepository;
    public function __construct(CareerRepositoryInterface $CareerRepository){
        $this->CareerRepository = $CareerRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $careers =  $this->CareerRepository->allCareerPages();
        return view('admin.careers.index', compact('careers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.careers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'status' => 'required',
        ]);

        $data['created_by'] = session('LoggedUser')->id;
        $this->CareerRepository->storeCareerPage($request, $data);

        return redirect()->route('admin.careers.index')->with(session()->flash('alert-success', 'Career Created Successfully'));
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
        $career = $this->CareerRepository->findCareerPage($id);
        if($career){
            return view('admin.careers.update', compact('career'));
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
            'title' => 'required|string|max:255',
            'description' => 'required',
            'status' => 'required',
        ]);
        
        $data['updated_by'] = session('LoggedUser')->id;
        $this->CareerRepository->updateCareerPage($data, $id);
        return redirect()->route('admin.careers.index')->with(session()->flash('alert-success', 'Career Updated Successfully'));
    }

}