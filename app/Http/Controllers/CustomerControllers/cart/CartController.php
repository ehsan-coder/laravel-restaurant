<?php

namespace App\Http\Controllers\CustomerControllers\cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Item;
use App\Models\Order;

class CartController extends Controller
{
    protected $cart;
    protected $requestData;

    function __construct(){
        $this->cart = new Cart();
        $this->requestData = Request()->all();
    }

public function addToCart($item_id,$user_id){

    $uos = Order::where('user_id',$user_id)->where('status',0)->first();
    $ifitemexist = Cart::where('user_id',$user_id)->where('status',0)->where('item_id',$item_id)->first();
 if($ifitemexist === null){
    if($uos === null){
        $data = [
            'user_id' => $user_id,
            'driver_id' => $user_id,
        ];
        $newOrder = Order::create($data);

        

        $newCart = [
            'user_id' => $user_id,
            'item_id' => $item_id,
            'order_id' => $newOrder->id
        ];
        Cart::create($newCart);
    }
    else{
        $newCart = [
            'user_id' => $user_id,
            'item_id' => $item_id,
            'order_id' => $uos->id
        ];
        Cart::create($newCart);
    }
        return redirect(app()->getLocale() . "/customer/menu");
    }
    else{
        return redirect(app()->getLocale() . "/customer/menu");
    }
}


public function allData($user_id){
   
    $mycarts = Cart::where('user_id',$user_id)->where('status',0)->get();
    $item_ids = [];
    foreach ($mycarts as $value) {
        array_push($item_ids,$value->item_id);
    }



    $itemsforcart = [];

    foreach ($item_ids as $value) {
        array_push($itemsforcart,Item::where('id',$value)->get());
    }

    return response()->json([$itemsforcart,$mycarts]);
}




public function deleteId($cartId){
    Cart::destroy($cartId);
    return redirect(app()->getLocale() . "/customer/menu");
}








    public function showCart($user_id){
      return $this->cart->myCart($user_id);
    }

    public function deleteCart($id){
        $this->cart->deleteC($id);

        return "cart deleted";
    }

    public function changeAmount($cart_id){
        
        return "123";
        $data = $this->requestData;


        return $data['newamount'];

        Cart::where('id',$cart_id)->update(['amount' => $data['newamount']]);

        return "amount change";
    }

}
