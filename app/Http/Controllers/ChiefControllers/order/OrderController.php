<?php

namespace App\Http\Controllers\ChiefControllers\order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    protected $order;
    protected $requestData;

    function __construct(){
        $this->order = new Order();
        $this->requestData = Request()->all();
    }

    public function index(){
        return $this->order->getOrderForChief();
    }

    public function update($id){
        $data = $this->requestData;

        $this->order->updateReady($data,$id);

        return "Ready updated";
    }
}
