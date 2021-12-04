<?php

namespace App\Http\Controllers\CustomerControllers\menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\MenuType;
use App\Models\Category;

class ItemController extends Controller
{
    protected $item;
    protected $requestData;

    function __construct(){
        $this->item = new Item();
        $this->requestData = Request()->all();
    }

    public function index(){
        // return $this->item->getActiveItem();
    return view('customer.Menu');
    }

    public function allData()
    {
      
    return $this->item->getAll();
    }


    // filtering

public function filter(){
    $data = $this->requestData;


    $mid = MenuType::where('category',$data['cate'])->get('id');
    
    


    $categories = Category::get();
    $itemID = [];
    
    
        foreach ($categories as $cate) {
            if($cate->menu_type_id == $mid[0]->id){
    
                array_push($itemID,$cate->item_id);
            }
        
    }
    $itemsId = array_unique($itemID);

    $result = [];
    $items = Item::get();

    foreach ($itemsId as $iid) {
        foreach ($items as $item) {
            if($item->id == $iid){
                array_push($result,$item);
            }
        }
    }

    return $result;
}
// end filtering
//-----------------------------------------

}
