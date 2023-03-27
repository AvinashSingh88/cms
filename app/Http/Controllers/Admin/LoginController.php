<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\UserLogin;
use App\Repositories\Interfaces\LoginRepositoryInterface;

class LoginController extends Controller
{

    private $loginRepository;

    public function __construct(LoginRepositoryInterface $loginRepository)
    {
        $this->loginRepository = $loginRepository;
    }
    public function login()
    {
        return view('admin.auth.login');
    }
    public function adminAuthLogin(Request $request)
    {
      $data = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // dd($request->all());
        // die;
        // $adminInfo = UserLogin::join('users', 'users.id', '=', 'user_logins.user_id')
        //             ->join('user_types', 'user_types.id', '=', 'users.user_type_id')
        //             ->where('user_logins.username', $request->username)
        //             ->where('user_logins.password', $request->password)
        //             ->select(['users.*', 'user_types.name as userType', 'user_logins.*'])
        //             ->first();

        $adminInfo =  $this->loginRepository->adminAuthLogin($data);

        if (!$adminInfo) {
            return redirect()->route('admin.auth.login')->with(session()->flash('alert-warning', 'Failed! We do not recognize your username.'));
        } else  {
            $request->session()->put('LoggedUser', $adminInfo);
            return redirect('admin/dashboard');
        }
    }



}
