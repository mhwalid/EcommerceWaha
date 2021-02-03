<?php

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Route;

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
// Route::get('/Show', 'Store\ProductController@xc')->name('Shop.show');


// panier
Route::post('/paiement', 'Cart\CartController@store')->name('Cart.store');

Route::get('/panier', 'Cart\CartController@index')->name('Cart.index');
Route::patch('/panier/{rowId}', 'Cart\CartController@update')->name('Cart.update');
Route::delete('/panier/{rowId}', 'Cart\CartController@destroy')->name('Cart.destroy');


// checkout
Route::get('/checkout', 'Cart\CheckoutController@index')->name('Checkout.index');
Route::post('/checkout', 'Cart\CheckoutController@store')->name('Checkout.store');
Route::get('/merci', 'Cart\CheckoutController@thankyou')->name('Checkout.thankyou');
// });
Route::get('/wa', function () {
    Cart::destroy();
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
