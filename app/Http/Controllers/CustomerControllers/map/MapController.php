<?php

namespace App\Http\Controllers\CustomerControllers\map;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Markers;

class MapController extends Controller
{
    protected $markers;
    protected $requestData;

    function __construct(){
        $this->markers = new Markers();
        $this->requestData = Request()->all();
    }

    public function viewMarkers(){
        return $this->markers->getMarkers();
        // return view('customer.customerMap' , ['markers' => $markers]);
    }
}
