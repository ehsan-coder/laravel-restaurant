<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('dman',function(){
    return view('deliveryman.map');
});

Route::get('d',function(){
    return view('deliveryman.map');
});

Route::get('getlocation',function(){
    $geoipInfo = geoip()->getLocation($_SERVER['REMOTE_ADDR']);
    return $geoipInfo->toArray();
});

Route::group(['middleware' => 'admin'] , function(){

    Route::get('/order','order\OrderController@index');
    Route::post('/order/{id}/update','order\OrderController@update');

});
