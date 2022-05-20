<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // user login method
    public function userLogin()
    {
        return view('frontend.user-login');
    }

    public function userLoginPost(Request $request)
    {
        if($this->attemptLogin($request)){

            return back()->with('success_message', 'Login successfully');
        }else{
            return back()->with('danger_message', 'Invalid login');
        }

    }

    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    protected function guard()
    {
        return Auth::guard();
    }
    public function username()
    {
        return 'email';
    }


    public function userRegister()
    {
        return view('frontend.user-register');
    }

    public function userRegisterStore(Request $request)
    {
        // validation

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->type = 'customer';
        $result = $user->save();


        if($result){
            return back()->with('success_message', 'User register successfully');
        }else{
            return back()->with('danger_message', 'Something went wrong');
        }

    }
}
