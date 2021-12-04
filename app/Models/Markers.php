<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Markers extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'city',
        'latitude',
        'longitude',
    ];

    public function getMarkers(){
        return $this->get();
    }
}
