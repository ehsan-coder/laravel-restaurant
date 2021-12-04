<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    // function __construct(){
    //    $this->middleware('auth');
    // }

    public function index(){
     
           return view('admin.home'); 
    }
    
}