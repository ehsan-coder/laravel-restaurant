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



Route::group(['middleware' => 'admin'] , function(){

    Route::get('/order','order\OrderController@index');
    Route::post('/update-item/{id}','menu\ItemController@update');
    Route::post('/update-order/{id}','order\OrderController@update');

});
    


