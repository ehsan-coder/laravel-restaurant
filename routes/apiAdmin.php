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

Route::get('h',function(){
    return view('admin.home');
});
// Route::get('/',function(){
//     return redirect(app()->getLocale());
// });

Route::group([
    'prefix' => '{locale}', 
    'where' => ['locale' => '[a-zA-Z]{2}'], 
    'middleware' => 'setLocleMiddleware'],
    function(){

        
        
    // });
// Route::group(['middleware' => 'admin'] , function(){    /// back

/* menu routes*/
Route::get('/items' , 'Menu\ItemController@index')->name('ad_items');



    });// end lang group

    Route::post('/item/create' , 'Menu\ItemController@itemstore')->name('itemUpload');
    Route::get('/items/getAll' , 'Menu\ItemController@allData')->name('ad_itemall');
    Route::get('/item/edit/{id}' , 'Menu\ItemController@edit')->name('ad_itemedit');
    Route::post('/item/update' , 'Menu\ItemController@update')->name('itemUpdate');
    Route::DELETE('/item/delete/{id}' , 'Menu\ItemController@delete');



// Route::get('items', [Menu\ItemController::class,'index']);

// Route::post('item/create', [Menu\ItemController::class,'itemcreate'])->name('itemUpload');




// filter
Route::post('/item/filter' , 'Menu\ItemController@filter');


/* oreder routes */ 
Route::get('/order-filter/{f}/{t}','orders\OrderController@getOrderBetween');    

/* menu type routes*/ 
    Route::get('/menu-type' , 'Menu\MenuTypeController@index');
    Route::get('/get-menu-type' , 'Menu\MenuTypeController@getAll');
    Route::post('/menu-type/create' , 'Menu\MenuTypeController@store');
    Route::get('/menu-type/edit/{id}' , 'Menu\MenuTypeController@edit');
    Route::post('/menu-type/update/{idEn}/{idAr}' , 'Menu\MenuTypeController@update');
    Route::DELETE('/menu-type/delete/{id}' , 'Menu\MenuTypeController@delete');


/* setting routes*/
    Route::get('/setting' , 'setting\settingController@index');
    Route::get('/setting/{id}/show' , 'setting\settingController@show');
    Route::DELETE('/setting/{d}/delete' , 'setting\settingController@delete');
    Route::post('/setting/store' , 'setting\settingController@store');
    Route::post('/setting/{id}/update' , 'setting\settingController@update');

/* user routes */
    Route::get('/users','users\UserController@index');  
    Route::get('/user/{id}/show','users\UserController@show');  
    Route::post('user/add-user','users\UserController@store')->name('user.add');  // done
    Route::post('/user/{id}/update','users\UserController@update');
    Route::DELETE('/user/{id}/delete','users\UserController@delete');  

// });

