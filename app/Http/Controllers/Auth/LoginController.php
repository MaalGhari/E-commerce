<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
        if(Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();

            $request->session()->invalidate();
    
            $request->session()->regenerateToken();
    
            if ($response = $this->loggedOut($request)) {
                return $response;
            }
    
            return $request->wantsJson()
                ? new JsonResponse([], 204)
                : redirect()->route('admin.dashboard.login');
        } else {
            $this->guard()->logout();

            $request->session()->invalidate();
    
            $request->session()->regenerateToken();
    
            if ($response = $this->loggedOut($request)) {
                return $response;
            }
    
            return $request->wantsJson()
                ? new JsonResponse([], 204)
                : redirect()->route('login');
        }
    }

    public function username()
    {
        $value = request()->input('userLogin');
        
        if(filter_var($value, FILTER_VALIDATE_EMAIL)) {
            request()->merge(['email' => $value]);

            return 'email';
        } elseif(preg_match("/^([a-zA-Z]{2,}\s[a-zA-Z]{1,}'?-?[a-zA-Z]{2,}\s?([a-zA-Z]{1,})?)/", $value)) {
            request()->merge(['name' => $value]);

            return'name';
        } elseif(preg_match("#(\+212|0)([ \-_/]*)(\d[ \-_/]*){9}#", $value)) {
            request()->merge(['phone' => $value]);

            return'phone';
        } else {
            request()->merge(['email' => $value]);

            return "email";
        }

    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'userLogin' => 'required|string',
            'password' => 'required|string',
            'g-recaptcha-response' => 'required|captcha'
        ],[
            "userLogin.required" => "The phone / email / name is required",
            "g-recaptcha-response.required" => "You must confirm that you are not a robot"
        ]);
        
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'userLogin' => [trans('auth.failed')],
        ]);
    }
}
