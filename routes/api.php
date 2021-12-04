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

//    Route::post('/register' , 'Api\AuthController@register');
    // Route::post('/register' , 'App\Http\Controllers\Api\AuthController@register');
    // Route::post('/login' , 'App\Http\Controllers\Api\AuthController@login');
    // Route::get('/logout','App\Http\Controllers\Api\AuthController@logout');


    // Route::post( ['middleware' => 'auth:api']  , function(){
    // Route::post('getUser' , 'Api\AuthController@getUser');
    // });
// });
