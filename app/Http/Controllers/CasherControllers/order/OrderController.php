<?php

namespace App\Http\Controllers\CasherControllers\order;

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
        return $this->order->getOrder();
    }

    public function show($id){
        return $this->order->getById($id);
    }

    public function store(){
        $data = $this->requestData;

        $this->order->createOrder($data);

        return "order created";
    }
    public function update($id){
        $data = $this->requestData;
        $this->order->updateOrder($data,$id);

        return "order updated";
    }

    public function delete($id){
        $this->order->deleteOrder($id);

        return "order deleted";
    }
}
