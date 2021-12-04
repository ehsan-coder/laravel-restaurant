<?php

namespace App\Http\Controllers\AdminControllers\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuType;
use Validator;


use Illuminate\Foundation\Validation\ValidatesRequests;
class MenuTypeController extends Controller
{
   protected $menuTypeEn;
   protected $menuTypeAr;
   protected $requestData;

   function __construct() {
    $this->menuTypeEn = new MenuType();
    $this->menuTypeAr = new MenuType();
    $this->requestData = Request()->all();
   }

public function index(){   //done
        return view('admin.menu_type');
   }
public function getAll()   //done
    {
       return $this->menuTypeEn->getAll();
    }


public function store()   //done
    {
        $data = $this->requestData;
        
        
          $validator = Validator::make($data, [
            'nameEn' => 'required',
            'nameAr' => 'required',
          ]);
         if ($validator->passes()) {
            
            $data1 =[
                'category' => $this->requestData['nameEn'],
                'lang_id' => 1
            ];
            
            $data2 =[
                'category' => $this->requestData['nameAr'],
                'lang_id' => 2
            ];
            $this->menuTypeEn->store($data1);
            $this->menuTypeAr->store($data2);

            return response()->json([
                'status' => 200,
                'success'   => 'menu type stored successfully',
                'class_name'  => 'alert-success'
                ]);
         }
        
         
         return response()->json(['error'=>$validator->errors()->all()]);
    }

public function show($id)
    {
        return $this->menuType->getById($id);
    }

public function edit($id)
    {
        
        return $this->menuTypeEn->getById($id);
    }

public function update($idEn,$idAr)
    {
        $data = $this->requestData;
        return $this->menuTypeEn->updateData($data,$idEn,$idAr);
    }


public function delete($id)
    {
        return $this->menuTypeEn->deleteData($id);
    }

}
