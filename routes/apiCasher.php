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



// Route::prefix('vl')->group(function(){
    Route::group(['middleware' => 'admin'] , function(){

    Route::get('/menu' , 'menu\MenuController@index');
    Route::get('/menu-type' , 'menu_type\MenuTypeController@index');
    Route::get('/order' , 'order\OrderController@index');
    Route::get('/order/{id}/show' , 'order\OrderController@show');
    Route::post('/order/store' , 'order\OrderController@store');
    Route::post('/order/{id}/update' , 'order\OrderController@update');
    Route::DELETE('/order/{id}/delete' , 'order\OrderController@delete');
    
    });
 //   Route::post('login' , 'Api\AuthController@login');
    // Route::post('/register' , 'App\Http\Controllers\Api\AuthController@register');
    // Route::post('/login' , 'App\Http\Controllers\Api\AuthController@login');

    // Route::post( ['middleware' => 'auth:api']  , function(){
    // Route::post('getUser' , 'Api\AuthController@getUser');
    // });
// });
