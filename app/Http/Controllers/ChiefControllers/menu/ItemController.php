<?php

namespace App\Http\Controllers\ChiefControllers\menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    protected $item;
    protected $requestData;

    function __construct(){
        $this->item = new Item();
        $this->requestData = Request()->all();
    }

    public function update($id){
        $value = $this->requestData;
        $this->item->updateStatus($value,$id);
    
        return "menu status updated";
    }
}
