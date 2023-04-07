<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use App\Models\UserLogin;
use Hash;
use Validator;

class AuthController extends Controller
{

    /** Customer Login page start */
    public function login(){
        return view('frontend.auth.login');
    } 

    public function postLogin(Request $request){
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $is_loggedin = UserLogin::where([
            'username' => $request->username,
            'password' => $request->password,
            'user_type_id' => 3,
            'status' => 1, 
        ])->first();

        if (!$is_loggedin) {
            return redirect()->back()->with(session()->flash('alert-danger', 'Failed! We do not recognize your username or password.'));
        } else  {
            $request->session()->put('LoggedCustomer', $is_loggedin);
            return redirect()->route('index')->with(session()->flash('alert-success', 'Successfully Loggedin.'));
        }
    }
    /** Customer Login page start */


    /** Customer Registration page start */
    public function registration(){
        return view('frontend.auth.register');
    }

    public function postRegistration(Request $request){  
        // dd("I am here");
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'nullable',
            'email' => 'required|email|unique:users',
            'mobile' => 'required|unique:users|min:10|max:13',
            'password' => 'required|confirmed|min:6'
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
        if($check){
            $user_login = UserLogin::create([
                'username' => $data['email'],
                'password' => $data['password'],
                'user_id' => $check->id,
                'status' => 1,
            ]);
        }
         
        return redirect("login")->with(session()->flash('alert-success', 'Successfully Registered.'));;
    }

    public function create(array $data){
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'mobile' => $data['mobile'],
            'email' => $data['email'],
            'status' => 1,
            'user_type_id' => 3,
            'user_designation_id' => 2,
        ]);
    }
    /** Customer Registration page End */

    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
