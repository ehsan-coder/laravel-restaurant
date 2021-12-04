<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuType extends Model
{
    use HasFactory;

    protected $table = 'menu_type';
    protected $primaryKey = 'id';
    protected $fillable = [
        'category',
        'lang_id'
    ];

    public function getAll()
    {
         return $this->get()->toJson();
    }

    public function store($request){
        return $this->create($request);   
    }

public function getById($id){
        // return $this->find($id);
      
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

    
    }

public function updateData($data,$enId,$arId){
        
        
            $enItem = $this->find($enId);
            $enItem->update(
                ["category" => $data['nameEn']],
            );
    
            $aritem = $this->find($arId);
            $aritem->update(
                ["category" => $data['nameAr']],
            );
    
            return response()->json([
                'state' => 200,
                'message' => "data updated",
            ]);
        
    }



    public function deleteData($id){
        
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
            'message' => 'Menu Type Deleted Successfully',
        ]);
    
    }
}
