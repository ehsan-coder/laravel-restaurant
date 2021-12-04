<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    
   

    // protected $redirectTo = RouteServiceProvider::HOME;

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
    if(auth()->user()->role == 'admin'){
         $this->redirectTo = route('admin.dash',app()->getLocale());
         return $this->redirectTo;
        }

    else if(auth()->user()->role == 'customer'){
     $this->redirectTo = route('customer.dash',app()->getLocale());
     return $this->redirectTo;   
    }

    else if(auth()->user()->role == 'waiter'){
        $this->redirectTo = route('waiter.dash',app()->getLocale());
        return $this->redirectTo;
       }
    else if(auth()->user()->role == 'chief'){
        $this->redirectTo = route('chief.dash',app()->getLocale());
        return $this->redirectTo;
       }
    else if(auth()->user()->role == 'deliveryman'){
        $this->redirectTo = route('deliveryman.dash',app()->getLocale());
        return $this->redirectTo;
       }
    }
    
    public function username()
    {
        return 'email';
    }
}
