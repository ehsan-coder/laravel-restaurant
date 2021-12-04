<?php

namespace App\Http\Controllers\WaiterControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WaiterContrller extends Controller
{
    

    public function index(){
        return view('waiter.home');
    }
}
