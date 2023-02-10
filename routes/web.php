<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\checkout;
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
//routes for adding product
Route::get('addProduct', [Controller::class,'addProduct']);
Route::post('addProduct', [Controller::class,'addproductData']);
Route::get('productList', [Controller::class,'show']);
Route::get('/fetchproducts', [Controller::class,'fetchproducts']);
Route::get('/get-products', [Controller::class, "getproducts"]);
Route::post('/delete-admin', [Controller::class, "deleteAdmin"]);


//routes for mousepad
Route::get('mousePad', [Controller::class,'mousePad']);
Route::get('mousePad', [Controller::class,'showMousePad']);
//routes for keyboard
Route::get('keyboard', [Controller::class,'keyboard']);
Route::get('keyboard', [Controller::class,'showKeyboard']);
//routes for mouse
Route::get('mouse', [Controller::class,'mouse']);
Route::get('mouse', [Controller::class,'showMouse']);
//routes for headset
Route::get('headset', [Controller::class,'headset']);
Route::get('headset', [Controller::class,'showHeadset']);
//routes for home page
Route::get('home', [Controller::class,'home']);

//routes for cart page
Route::get('cart', [Controller::class,'cart']);

//Routes for user profiling page
Route::get('userprofiling', [Controller::class,'userprofiling']);
// Routes for add to cart
Route::post('addtoCart', [Controller::class,'addtoCart']);

//Routes to display the cart
Route::get('productList', [Controller::class,'show']);

//Routes to remove product

Route::get('removecart/{id}', [Controller::class,'removeCart']);
Route::post('updateCart', [Controller::class,'updateCart']);


//Routes to get detail of product
Route::get('details/{id}', [Controller::class,'details']);

//Routes for searching of product of 4 different types
Route::get('searchMouse', [Controller::class,'searchMouse']);
Route::get('searchMousePad', [Controller::class,'searchMousePad']);
Route::get('searchKeyboard', [Controller::class,'searchKeyboard']);
Route::get('searchHeadset', [Controller::class,'searchHeadset']);

// route for dashboard of admin
Route::get('adminDashboard',  [Controller::class,'viewdashboard']);

Route::get('adminDashboard',  [Controller::class,'viewdashboardData']);
// route for update to cart
Route::post('update-to-cart', [Controller::class,'updatetocart']);
// route for order now
Route::post('ordernow',  [Controller::class,'ordernow']);
// route for checkout page
Route::get('checkout', [checkout::class,'checkout']);
//route for checkout
Route::post('check', [Controller::class,'check']);
// route for deliver orders
Route::get('deliver/{id}', [Controller::class,'deliverOrders']);

// Statistics
Route::get('/statistic', 'App\HTTP\Controllers\Controller@viewstatistic');
// About us
Route::get('aboutus', [Controller::class,'aboutus']);




Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/home', function () {
        return view('website.home');
    });
});
Route::get('redirects', [Controller::class,'index']);





