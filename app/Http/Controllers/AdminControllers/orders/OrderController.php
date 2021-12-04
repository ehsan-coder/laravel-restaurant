<?php

namespace App\Http\Controllers\AdminControllers\orders;

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

    public function getOrderBetween($from,$to){
        $data = $this->requestData;
        // dd($data);
        // $from = $data->fromDate;
        // $to = $data['toDate'];

        $res = $this->order->orderFromToDate($from,$to);
        $numOfOrder = count($res);
        $numOfExternal = 0;
        $numOfInternal = 0;
        $priceOfExternal = 0;
        $priceOfInternal = 0;
        $totalPrice;

        foreach ($res as $ord) {
            if($ord['type'] == 'external'){
                $numOfExternal++;
                $priceOfExternal+=$ord['total_price'];
            }
            if($ord['type'] == 'internal'){
                $numOfInternal++;
                $priceOfInternal+=$ord['total_price'];
            }
        }

        $totalPrice = $priceOfExternal + $priceOfInternal;

        return [$res,$numOfOrder,$numOfExternal,$numOfInternal,$priceOfExternal,$priceOfInternal,$totalPrice];
    }
}
