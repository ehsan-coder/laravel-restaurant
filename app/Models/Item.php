<?php

namespace App\Models;
use App\Models\lang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;


class Item extends Model
{
    use HasFactory;

    protected $table = 'items';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'image',
        'price',
        'description',
        'status',
        'lang_id'

    ];
    // public function menuType(){
    //  return $this->belongsTo(MenuType::class);
    // }

    public function getAll(){ // done
        return $this->get();
    }


    /// customer ///
    public function getActiveItem(){

        $menu= $this->where('status',1)->get();
        foreach($menu as $key =>$value){
            $data[$key]['id']=$value['id'];
            $data[$key]['name']=$value['name'];
            $data[$key]['image']=$value['image'];
            $data[$key]['price']=$value['price'];
            $data[$key]['description']=$value['description'];
            $data[$key]['status']=$value['status'];
            // $data[$key]['menuType']=MenuType::find($value['menu_type_id']);
        }
         return $data;
    }

public function getById($id)
    {
        $item1 = $this->find($id);
        if($item1->lang_id == 1){    // get next item
            $item_2_id = $this->where('id','>',$item1->id)->min('id');
        }
        else if($item1->lang_id == 2){  // get previous item
            $item_2_id = $this->where('id','<',$item1->id)->max('id');
        }

        $item2 = $this->find($item_2_id);


        if($item1->lang_id == 1){
            return response()->json([
                $item1,
                $item2,
            ]);
        }
        else{
            return response()->json([
                $item2,
                $item1,
            ]);
        }

        //     $data['id']=$menu['id'];
        //     $data['name']=$menu['name'];
        //     $data['image']=$menu['image'];
        //     $data['price']=$menu['price'];
        //     $data['description']=$menu['description'];
        //     $data['status']=$menu['status'];
        //     // $data['menuType']=MenuType::find($menu['menu_type_id']);

        // return $data;
    }
public function deleteData($id)
    {
        $dataDeleted_1 = $this->find($id);
        if($dataDeleted_1->lang_id == 1){    // get next item
            $dataDeleted_2 = $this->where('id','>',$dataDeleted_1->id)->min('id');
        }
        else if($dataDeleted_1->lang_id == 2){  // get previous item
            $dataDeleted_2 = $this->where('id','<',$dataDeleted_1->id)->max('id');
        }
        
        $this->destroy($id);
        $this->destroy($dataDeleted_2);

        return response()->json([
            'state' => 200,
            'message' => 'Item Deleted Successfully',
        ]);
    }
public function store($data)
    {
    //   $to_store=[];
      
    //     foreach($data['d'] as $key => $value){
           
    //         $to_store[$key]['name']= $value['name']; 
    //         $to_store[$key]['description']= $value['description']; 
    //         $to_store[$key]['lang_id']=$value['lang_id']; 
    //         $to_store[$key]['price']=$data['price'];
        
    //         // $to_store[$key]['image']=$data['image'];

            
    //        $dd= $this->create($to_store[$key]);
    //     }
        
    //     // return response()->json($dd);

    //     $imag = $data->image;

    //     return $image;
    $this->create($data);
    }




public function updateData($data,$enId,$arId)
    {
        $enItem = $this->find($enId);
        $enItem->update(
            ["name" => $data['nameEn']],
            ["description" => $data['descriptionEn']],
            ["price" => $data['price']],
            ["image" => $data['image']],
        );

        $aritem = $this->find($arId);
        $aritem->update(
            ["name" => $data['nameAr']],
            ["description" => $data['descriptionAr']],
            ["price" => $data['price']],
            ["image" => $data['image']],
        );

        return response()->json([
            'state' => 200,
            'message' => "data updated",
        ]);
    }


public function updateStatus($value,$id){
        $index = $this->where('id',$id)->first();
        $index->update($value);
    }
}
