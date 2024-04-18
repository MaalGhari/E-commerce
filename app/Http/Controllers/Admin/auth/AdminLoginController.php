<?php

namespace App\Http\Controllers\Admin\auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{

    protected $redirectTo = RouteServiceProvider::AdminHome;


    /**
     * Where to redirect admin after login
     * 
     * @var string
     */


    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    } 


    public function login()
    {
        return view('admin.auth.login');
    }

    public function checkLogin(Request $request)
    {
       $request->validate([
        "email" => ["required", "email"],
        "password" => ["required", "string"]
       ]);

       if(Auth::guard('admin')->attempt($request->only('email', 'password'), $request->get('remember'))) {
        
            return redirect()->intended($this->redirectTo);
       } else {

            return redirect()->back()
                ->withInput(['email' => $request->email])
                ->withErrors(['errorResponse' => 'These credentials do not match our records']);
       }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        // return redirect()->route('user.profile');
        return redirect()->route('admin.dashboard.login');
    }
}
