<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'ready',
        'total_price',
        'type',
        'table_number',
        'payment_method',
        'user_id',
        'driver_id',
    ];

    public function getOrder(){
        $order = $this->get();
       
        foreach($order as $key => $value){
                        $data[$key]['id']=$value['id'];
                        $data[$key]['ready']=$value['ready'];
                        $data[$key]['status']=$value['status'];
                        $data[$key]['total_price']=$value['total_price'];
                        $data[$key]['type']=$value['type'];
                        $data[$key]['table_number']=$value['table_number'];
                        $data[$key]['payment_method']=$value['payment_method'];
                        $data[$key]['user']=User::find($value['user_id']);

                        $carts = Cart::where('order_id',$value['id'])->get();
                        foreach($carts as $k => $cart){   
                        $data[$key][$k]['items'] = Item::where('id',$cart->item_id)->get();
                        $data['amount'][$key][$k] = $cart->amount;
                        }

        }
        return $data;
    }


    public function getById($id){
        $order = $this->find($id);

        $data['id']=$order['id'];
            $data['ready']=$order['ready'];
            $data['status']=$order['status'];
            $data['total_price']=$order['total_price'];
            $data['type']=$order['type'];
            $data['table_number']=$order['table_number'];
            $data['payment_method']=$order['payment_method'];
            $data['user']=User::find($order['user_id']);

            $carts = Cart::where('order_id',$order['id'])->get();
            foreach($carts as $key => $cart){   
            $data['items'][$key] = Item::where('id',$cart->item_id)->get();
            $data['amount'][$key] = $cart->amount;
            }

        return $data;
    }
    //  for waiter //
    public function getInternalOrder(){
        return $this->where('type','internal')->get();
    }
    public function createWaiterOrder($info){
        $data['status'] = 0;
        $data['ready'] = 0;
        $data['type'] = 'internal';
        $data['table_number'] = $info['table_number'];
        $data['payment_method'] = $info['payment_method'];
        $data['user_id'] = $info['user_id'];

        $sum = 0;
        $carts = Cart::where('user_id',$info['user_id'])->where('status',0)->get();
        $items = Item::all();
        foreach($carts as $cart)
        {
                $price = Item::find($cart->item_id)['price'];
                $amount = $cart->amount;
                $sum += ($price*$amount);
        }

        $data['total_price'] = $sum;
         
       $o = $this->create($data);
       
        //////////////////////////////
        foreach($carts as $cart)
        {
            $d['user_id'] = $cart['user_id'];
            $d['item_id'] = $cart['item_id'];
            $d['order_id'] = $o['id'];
            $d['status'] = 1;
            $d['amount'] = $cart['amount'];

            
            $index = $cart['id'];
            Cart::where('id',$index)->update($d);

    }
}



    
    // for customer //
    public function createCustomerOrder($info){
    
        $data['status'] = 0;
        $data['ready'] = 0;
        $data['type'] = 'external';
        $data['table_number'] = null;
        $data['payment_method'] = $info['payment_method'];
        $data['user_id'] = $info['user_id'];

        /* get random driver */ 
        $users = User::where('role','deliveryman')->get();
        foreach ($users as $key => $driver) {
            $drivers[$key] = $driver['id'];
        }
        $randomIndex = array_rand($drivers,1);
        $data['driver_id'] = $drivers[$randomIndex];
       
        /////////////////////
        /* get current carts */ 
        $sum = 0;
        $carts = Cart::where('user_id',$info['user_id'])->where('status',0)->get();
        $items = Item::all();
        foreach($carts as $cart)
        {
                $price = Item::find($cart->item_id)['price'];
                $amount = $cart->amount;
                $sum += ($price*$amount);
        }

        $data['total_price'] = $sum;
         
       $o = $this->create($data);
       
        //////////////////////////////
        /* update carts status */
        foreach($carts as $cart)
        {
            $d['user_id'] = $cart['user_id'];
            $d['item_id'] = $cart['item_id'];
            $d['order_id'] = $o['id'];
            $d['status'] = 1;
            $d['amount'] = $cart['amount'];

            
            $index = $cart['id'];
            Cart::where('id',$index)->update($d);

        }
    }

    public function deleteOrder($id){
        $this->destroy($id);
    }
    public function updateOrder($data,$id){
        $index = $this->where('id',$id)->first();
        $index->update($data);
    }



    // for cief //
    public function updateReady($data,$id){
        $index = $this->where('id',$id)->first();
        $index->update($data);
    }


    public function getOrderForChief(){
        $order = $this->where('ready',0)->get();
       
        foreach($order as $key => $value){
                        $data[$key]['id']=$value['id'];
                        $data[$key]['ready']=$value['ready'];
                        $data[$key]['status']=$value['status'];
                        $data[$key]['total_price']=$value['total_price'];
                        $data[$key]['type']=$value['type'];
                        $data[$key]['table_number']=$value['table_number'];
                        $data[$key]['payment_method']=$value['payment_method'];
                        $data[$key]['user']=User::find($value['user_id']);

                        $carts = Cart::where('user_id',$value['user_id'])->get();
                        foreach($carts as $k => $cart){   
                        $data[$key][$k]['items'] = Item::where('id',$cart->item_id)->get();
                        }

        }
        return $data;
    }


    // Delivery man //

    public function getOrderForDelivery(){
        $order = $this->where('status',0)->get();
       
        foreach($order as $key => $value){
                        $data[$key]['id']=$value['id'];
                        $data[$key]['ready']=$value['ready'];
                        $data[$key]['status']=$value['status'];
                        $data[$key]['total_price']=$value['total_price'];
                        $data[$key]['type']=$value['type'];
                        $data[$key]['table_number']=$value['table_number'];
                        $data[$key]['payment_method']=$value['payment_method'];
                        $data[$key]['user']=User::find($value['user_id']);

                        $carts = Cart::where('user_id',$value['user_id'])->get();
                        foreach($carts as $k => $cart){   
                        $data[$key][$k]['items'] = Item::where('id',$cart->item_id)->get();
                        }

        }
        return $data;
    }
    
    public function updateStatus($data,$id){
        $index = $this->where('id',$id)->first();
        $index->update($data);
    }


    // get order from date to another date 
    public function orderFromToDate($from,$to){
        return $this->where('created_at','>=',$from)
        ->where('created_at','<=',$to)
        ->get();
    }
}
