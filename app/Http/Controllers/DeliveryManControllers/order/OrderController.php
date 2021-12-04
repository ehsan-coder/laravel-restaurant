<?php

namespace App\Http\Controllers\DeliveryManControllers\order;

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
        return $this->order->getOrderForDelivery();
    }

    public function update($id){
        $data = $this->requestData;
        $this->order->updateStatus($data,$id);

        return "order staus updated";
    }
}
