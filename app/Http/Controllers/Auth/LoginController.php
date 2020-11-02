<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo(){
        if (Auth::user()->hasRole('admin')){
            $this->redirectTo = route('admin.home.index');
            return $this->redirectTo;
        }
        if (Auth::user()->hasRole('fieldagent')){
            $this->redirectTo = route('fieldagent.home.index');
            return $this->redirectTo;
        }
//        if (Auth::user()->hasRole('agent')){
//            $this->redirectTo = route('agent.home.index');
//            return $this->redirectTo;
//        }
//        if (Auth::user()->hasRole('teacher')){
//            $this->redirectTo = route('teacher.home.index');
//            return $this->redirectTo;
//        }
//        if (Auth::user()->hasRole('school')){
//            $this->redirectTo = route('school.home.index');
//            return $this->redirectTo;
//        }
           $this->redirectTo = route('home');
        return $this->redirectTo;

    }
}
