<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'setting';
    protected $primaryKey = 'id';
    protected $fillable = [
        'code',
        'key',
        'value'
    ];

    public function getSetting(){
        return $this->get();
    }
    public function getById($id){
        return $this->find($id);
    }
    public function deleteData($id){
        $this->destroy($id);
    }
    public function storeData($data){
        $this->create($data);
    }
    public function updateData($data,$id){
        $index = $this->where('id',$id)->first();
        $index->update($data);
    }
}
