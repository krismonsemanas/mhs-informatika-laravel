<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    // login
    public function login(Request $request)
    {
        $login = $request->only('email','password');
        if (Auth::attempt($login)) {
            // Authentication passed...
            return redirect($this->redirectPath());
        } else {
            return redirect()->back()->with(['error'=>'Wrong username or password']);
        }
    }
    // logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with(['success'=>'You have been logged out']);
    }
}
