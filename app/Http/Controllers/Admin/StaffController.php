<?php

namespace App\Http\Controllers\Admin;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\StaffRepositoryInterface;

class StaffController extends Controller
{

    private $staffRepository;

    public function __construct(StaffRepositoryInterface $staffRepository)
    {
        $this->staffRepository = $staffRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $staffs =  $this->staffRepository->allStaffs();
        return view('admin.staffs.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.staffs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'degree' => 'required',
            'speciality' => 'required',
            'university' => 'required',
            'expertise' => 'required',
            'description' => 'required',
            'time_schedule' => 'required',
            'office' => 'required',
            'profile_pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
        ]);

        if($request->has('profile_pic')){
            $data['profile_pic'] = upload_asset($request->profile_pic, 'staff');
        }else{
            $data['profile_pic'] = NULL;
        }

        $data['created_by'] = session('LoggedUser')->id;
        $this->staffRepository->storeStaff($data);

        return redirect()->route('admin.staffs.index')->with(session()->flash('alert-success', 'Staff Created Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $appointments = $this->staffRepository->getStaffAppointment($id);
        return view('admin.staffs.view_appointment', compact('appointments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $staff = $this->staffRepository->findStaff($id);
        return view('admin.staffs.update', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'degree' => 'required',
            'speciality' => 'required',
            'university' => 'required',
            'expertise' => 'required',
            'description' => 'required',
            'time_schedule' => 'required',
            'office' => 'required',
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
        ]);

        if($request->has('profile_pic')){
            $data['profile_pic'] = upload_asset($request->profile_pic, 'staff');
        }else{
            $data['profile_pic'] = NULL;
        }
        
        $this->staffRepository->updateStaff($data, $id);

        return redirect()->route('admin.staffs.index')->with(session()->flash('alert-success', 'Staff Updated Successfully'));
    }


}