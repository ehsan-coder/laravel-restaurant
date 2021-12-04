<?php

namespace App\Http\Controllers\AdminControllers\setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class settingController extends Controller
{
    protected $setting;
    protected $requestData;

    function __construct(){
        $this->setting = new Setting();
        $this->requestData = Request()->all();
    }

    public function index(){
        return $this->setting->getSetting();
    }

    public function show($id){
        return $this->setting->getById($id);
    }

    public function delete($id){
        $this->setting->deleteData($id);
        return "deleted done";
    }
    public function store(){

        $data = $this->requestData;

        $this->setting->storeData($data);
        return "data stored successfully";
    }

    public function update($id){
        $data = $this->requestData;

        $this->setting->updateData($data,$id);
        return "updated done";
    }
}
