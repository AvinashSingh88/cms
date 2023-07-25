<?php
namespace App\Repositories;
use App\Repositories\Interfaces\StaffRepositoryInterface;
use App\Models\Staff;
use App\Models\User;
use App\Models\UserLogin;
use App\Models\Appointment;

class StaffRepository implements StaffRepositoryInterface
{
    public function allStaffs(){
        $staffs = Staff::select('staffs.id', 'users.first_name', 'users.email', 'users.mobile', 'users.profile_pic', 'staffs.status', 'staffs.created_at')
            ->leftJoin('users', 'staffs.user_id', '=', 'users.id')
            ->latest()
            ->paginate(10);
        return $staffs;
    }

    public function storeStaff($data){
        $user = new User();
        $user->user_type_id = 4;
        $user->user_designation_id = 2;
        $user->first_name = $data['name'];
        $user->email = $data['email'];
        $user->mobile = $data['mobile'];
        if($data['profile_pic']){
            $user->profile_pic = $data['profile_pic'];
        }
        $user->status = $data['status'];
        if($user->save()){
            $User_login = new UserLogin();
            $User_login->user_id = $user->id;
            $User_login->user_type_id = 4;
            $User_login->username = $data['email'];
            $User_login->password = "123456";
            $User_login->status = $data['status'];
            $User_login->save();

            $staff = new Staff();
            $staff->user_id = $user->id;;
            $staff->degree = $data['degree'];
            $staff->speciality = $data['speciality'];
            $staff->university = $data['university'];
            $staff->expertise = $data['expertise'];
            $staff->description = $data['description'];
            $staff->time_schedule = $data['time_schedule'];
            $staff->office = $data['office'];
            $staff->status = $data['status'];
            $staff->created_by = $data['created_by'];
            $staff->save();
        }  
    }

    public function findStaff($id){
        return Staff::select('staffs.*', 'users.first_name', 'users.email', 'users.mobile', 'users.profile_pic', 'staffs.status', 'staffs.created_at')
        ->leftJoin('users', 'staffs.user_id', '=', 'users.id')
        ->where('staffs.id', $id)->first();
    }

    public function updateStaff($data, $id){
        $staff = Staff::where('id', $id)->first();
        $staff->degree = $data['degree'];
        $staff->speciality = $data['speciality'];
        $staff->university = $data['university'];
        $staff->expertise = $data['expertise'];
        $staff->description = $data['description'];
        $staff->time_schedule = $data['time_schedule'];
        $staff->office = $data['office'];
        $staff->status = $data['status'];
        if($staff->save()){
            $user = User::where('id', $staff->user_id)->first();
            $user->first_name = $data['name'];
            $user->email = $data['email'];
            $user->mobile = $data['mobile'];
            if($data['profile_pic']){
                $user->profile_pic = $data['profile_pic'];
            }
            $user->status = $data['status'];
            $user->save();

            $User_login = UserLogin::where('user_id', $staff->user_id)->first();
            $User_login->username = $data['email'];
            $User_login->status = $data['status'];
            $User_login->save();
        }
        

    }
    
    public function getStaffAppointment($id){
        return Appointment::select('appointments.*', 'users.first_name')
        ->leftJoin('users', 'appointments.doctor_id', '=', 'users.id')
        ->where('appointments.doctor_id', $id)
        ->latest()->paginate(10);
    }
}