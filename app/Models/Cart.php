<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'item_id',
        'order_id',
        'status',
        'amount',
    ];

    public function store($data){
        $this->create($data);
    }

    public function myCart($user_id){
        $data = $this->where('user_id',$user_id)->get();

        return $data;
    }

    public function deleteC($id){
        $this->destroy($id);
    }

}
