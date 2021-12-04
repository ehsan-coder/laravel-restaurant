<?php

namespace App\Http\Controllers\CasherControllers\menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class MenuController extends Controller
{
    protected $menu;
    protected $requestData;
 
    function __construct() {
     $this->menu = new Menu();
     $this->requestData = Request()->all();
    }

    public function index()
    {
     return $this->menu->getAll();
    }
}
