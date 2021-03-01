<?php

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

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


// Route::get('/', 'shop\MainController@index');
//page d'index
// Route::group(['prefix' => 'Wahabs'], function () {
Route::get('/', 'Store\ProductController@index')->name('Shop.index');

// Store
Route::get('/Store', 'Store\ProductController@stor')->name('Shop.store');
Route::get('/About', 'Store\ProductController@about')->name('Shop.about');
Route::get('/Show/{id}', 'Store\ProductController@show')->name('Shop.show');
Route::get('/Search', 'Store\ProductController@search')->name('Shop.search');
Route::get('/contact', 'Store\ProductController@contact')->name('Shop.contact');
// Route::get('/Show', 'Store\ProductController@xc')->name('Shop.show');


// panier
Route::post('/paiement', 'Cart\CartController@store')->name('Cart.store');

Route::get('/panier', 'Cart\CartController@index')->name('Cart.index');
Route::patch('/panier/{rowId}', 'Cart\CartController@update')->name('Cart.update');
Route::delete('/panier/{rowId}', 'Cart\CartController@destroy')->name('Cart.destroy');

Route::group(['middleware' => 'auth:customer',], function () {
    // checkout

    Route::get('/checkout', 'Cart\CheckoutController@index')->name('Checkout.index');
    Route::post('/checkout', 'Cart\CheckoutController@store')->name('Checkout.store');
    Route::get('/merci', 'Cart\CheckoutController@thankyou')->name('Checkout.thankyou');
    Route::get('/ordes', 'Cart\CartController@customerOrders')->name('Customer.orders');
    Route::post('/coupon', 'Cart\CartController@storcoupon')->name('cart.coupon');
    Route::delete('/coupon', 'Cart\CartController@destroycoupon')->name('cart.coupon.destroy');
});
Auth::routes(['verify' => true]);

Route::get('/wa', function () {
    Cart::destroy();
});

Route::get('/customer/login', 'Auth\LoginController@showCustomerLoginForm')->name('Login.show');
Route::get('/customer/register', 'Auth\RegisterController@showCustomerRegisterForm')->name('Login.register');
Route::post('/customer/login', 'Auth\LoginController@customerLogin');
Route::post('/customer/register', 'Auth\RegisterController@createCustomer');
Route::post('/customer/logout', 'Auth\LoginController@logout')->name('Login.logout');
// Route::view('/customer', 'customer');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});




Route::get('/home', 'HomeController@index')->name('home');
