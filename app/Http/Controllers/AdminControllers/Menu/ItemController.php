<?php

namespace App\Http\Controllers\AdminControllers\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\MenuType;
use App\Models\AjaxImage;
// use Illuminate\Suppor\Facades\Validator;
use Validator;
use Illuminate\Support\Facades\Config;

class ItemController extends Controller
{

    protected $item;
    protected $requestData;
 
    function __construct() {
     $this->item = new Item();
     $this->requestData = Request()->all();
    }

    


    
    public function edit($id)
    {
        return $this->item->getById($id);
    }

    public function delete($id)
    {
       return $this->item->deleteData($id);
    }

  
    public function update(Request $request)
    {
        $data = $this->requestData;
        
        // return $this->item->updateData($data,$enId,$arId);
       return $data;
    
        $validator = Validator::make($request->all(), [
            'nameEn' => 'required',       
            'nameAr' => 'required',
            'descEn' => 'required',       
            'descAr' => 'required',       
            'price' => 'required',       
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
          ]);
         if ($validator->passes()) {
            $input['image'] = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $input['image']);
            $data1 = [
                'name' => $request->nameEn,
                'description' => $request->descEn,
                'price' => $request->price,
                'lang_id' => 1,
                'image'=> $input['image']
            ];
            $data2 = [
                'name' => $request->nameAr,
                'description' => $request->descAr,
                'price' => $request->price,
                'lang_id' => 2,
                'image'=> $input['image']
            ];
    
            Item::create($data1);
            Item::create($data2);
       
            return response()->json([
                'success'   => 'Image Upload Successfully',
                'uploaded_image' => '<img src="/images/'.$input['image'].'" class="img-thumbnail" width="300" />',
                'class_name'  => 'alert-success'
                ]);
          }
          
        return response()->json(['error'=>$validator->errors()->all()]);
    }
    
   



// filtering

public function filter(){
        $data = $this->requestData;

return $data;

        $ids = [];
        foreach ($data['data'] as $category) {
            array_push($ids,MenuType::where('category',$category)->get('id'));
        }
        

     
        $categories = Category::get();
        $itemID = [];
        foreach ($ids as $cid) {
            foreach ($categories as $cate) {
                if($cate->menu_type_id == $cid[0]->id){
                    array_push($itemID,$cate->item_id);
                }
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





 // display
public function allData()
{
return $this->item->getAll();
}
// end display

public function index()
    {
    	return view('admin.itemes');
    }


   
    
public function itemstore(Request $request)
    {

      $validator = Validator::make($request->all(), [
        'nameEn' => 'required',       
        'nameAr' => 'required',
        'descEn' => 'required',       
        'descAr' => 'required',       
        'price' => 'required',       
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
      ]);
     if ($validator->passes()) {
        $input['image'] = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $input['image']);
        $data1 = [
            'name' => $request->nameEn,
            'description' => $request->descEn,
            'price' => $request->price,
            'lang_id' => 1,
            'image'=> $input['image']
        ];
        $data2 = [
            'name' => $request->nameAr,
            'description' => $request->descAr,
            'price' => $request->price,
            'lang_id' => 2,
            'image'=> $input['image']
        ];

        Item::create($data1);
        Item::create($data2);
   
        return response()->json([
            'success'   => 'Image Upload Successfully',
            'uploaded_image' => '<img src="/images/'.$input['image'].'" class="img-thumbnail" width="300" />',
            'class_name'  => 'alert-success'
            ]);
      }
      
    return response()->json(['error'=>$validator->errors()->all()]);
  }
}
