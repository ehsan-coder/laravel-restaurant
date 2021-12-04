<?php

namespace App\Http\Controllers\WaiterControllers\cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    protected $cart;
    protected $requestData;

    function __construct(){
        $this->cart = new Cart();
        $this->requestData = Request()->all();
    }

    public function create(){
        $data = $this->requestData;;
        $this->cart->store($data);

        return "cart created";
    }
}
