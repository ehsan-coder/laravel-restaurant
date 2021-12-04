<?php

namespace App\Http\Controllers\CustomerControllers\order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;

use App\Models\OrderMenu;

class OrderController extends Controller
{
    protected $order;
    protected $order_menu;
    protected $requestData;

    function __construct(){
        $this->order = new Order();
        // $this->order_menu = new OrderMenu();
        $this->requestData = Request()->all();
    }

    public function show($user_id){
        return $this->order->getById($user_id);
    }

    public function store(){
        $data = $this->requestData;

        $this->order->createCustomerOrder($data);
        return "customer order created";
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





     public function shop($order_id){
        $data = $this->requestData;
     



        $cart_ids=[];
       $kk= Cart::where('order_id',$order_id)->get();
       foreach ($kk as  $value) {
           array_push($cart_ids,$value['id']);
    }

  
        foreach ($cart_ids as $value) {
        Cart::where('id',$value)->update(['status'=>1]);
            }



        Order::where('id',$order_id)->update(['total_price' => $data['tp'],'status' => 1]);


        return "test fm";
        
    }
}
