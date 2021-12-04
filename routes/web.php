<?php
// namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuTypeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('enc/{string}','App\Http\Controllers\ReferralSystemController@encryptString');
// Route::get('dec/{string}','App\Http\Controllers\ReferralSystemController@decryptString');
// Route::get('code','App\Http\Controllers\ReferralSystemController@generateRandomString');
// Route::get('user-ip','App\Http\Controllers\UserSystemInfoController@get_mac');






// Route::get('/locale/{locale}','App\Http\Controllers\LanguageController@switch');

// Route::get('/ttt/{s}/{d}/{ip}','App\Http\Controllers\HomeController@test');

// Route::get('mymap','App\Http\Controllers\CustomerControllers\map\MapController@viewMarkers');



// Route::get('/te/{id}',function(){
//     return view('test');
// });

Route::get('/',function(){
    return redirect(app()->getLocale());
});

Route::group([
    'prefix' => '{locale}', 
    'where' => ['locale' => '[a-zA-Z]{2}'], 
    'middleware' => 'setLocleMiddleware'],
    function(){




    Route::get('/', function () {
        return view('index');
    })->name('main_home');

Auth::routes(['verify'=>true]);


Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminIndex'])->name('admin.dash')->middleware('adminMiddleware');
Route::get('/waiter/home', [App\Http\Controllers\HomeController::class, 'waiterIndex'])->name('waiter.dash')->middleware('waiterMiddleware');
Route::get('/chief/home', [App\Http\Controllers\HomeController::class, 'chiefIndex'])->name('chief.dash')->middleware('chiefMiddleware');
Route::get('/deliveryman/home', [App\Http\Controllers\HomeController::class, 'deliverymanIndex'])->name('deliveryman.dash')->middleware('deliveryManMiddleware');


/*customer routes*/ 
Route::get('/customer/home', [App\Http\Controllers\HomeController::class, 'customerIndex'])->name('customer.dash')->middleware('customerMiddleware');
Route::get('customer/menu',function(){
    return view('customer.Menu');
})->name('c_gmenu');
    



});// end languahes



Route::get('/customer/cart/add-to/{item_id}/{user_id}', [App\Http\Controllers\CustomerControllers\cart\CartController::class, 'addToCart']);
Route::get('/customer/items/getAll', [App\Http\Controllers\CustomerControllers\menu\ItemController::class, 'allData'])->name('c_getitem');
Route::get('/customer/carts/getAll/{user_id}', [App\Http\Controllers\CustomerControllers\cart\CartController::class, 'allData'])->name('c_getcart');
Route::get('/customer/cart/delete/{cart_id}', [App\Http\Controllers\CustomerControllers\cart\CartController::class, 'deleteId'])->name('c_deletecart');
Route::get('/customer/order/shop/{order_id}', [App\Http\Controllers\CustomerControllers\order\OrderController::class, 'shop'])->name('c_shop');
Route::post('/customer/cart/amount/{cart_id}', [App\Http\Controllers\CustomerControllers\cart\CartController::class, 'changeAmount'])->name('c_camount');




Route::get('qr','App\Http\Controllers\QrCodeController@generateQrCode');

Route::get('qrcode', function () {
    return QrCode::size(250)
        ->backgroundColor(255, 255, 204)
        ->generate('project 1 x prex');
});


