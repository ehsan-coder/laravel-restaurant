<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $user; 

    public function __construct()
    {
        $this->user = new User();
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index() // not used
    // {
    //     return view('home');
    // }

    public function adminIndex(){
     
        return view('admin.home'); 
 }

    public function customerIndex()
    {
        return view('customer.home');
    }

    public function waiterIndex()
    {
        return view('waiter.home');
    }

    
    public function chiefIndex()
    {
        return view('chief.home');
    }
    public function deliverymanIndex()
    {
        return view('deliveryman.home');
    }


    


}
