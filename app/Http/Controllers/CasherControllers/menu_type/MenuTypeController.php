<?php

namespace App\Http\Controllers\CasherControllers\menu_type;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuType;

class MenuTypeController extends Controller
{
    protected $menuType;
   protected $requestData;

   function __construct() {
    $this->menuType = new MenuType();
    $this->requestData = Request()->all();
   }

    public function index()
    {
       return $this->menuType->getAll();
    }
}
