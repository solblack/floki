<?php
use App\Http\Controllers\UserController;
use App\Http\Middleware\Admin;
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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/inspiration', function () {
    return view('inspiration');
});

Route::get('/nosotros', function () {
    return view('nosotros');
});

Route::get('/shop', 'ProductController@index');

Route::get('/search', 'ProductController@search');

Route::get('/profile', 'UserController@show')->middleware('auth');

Route::post('/profile', 'UserController@update')->middleware('auth');

Route::group(['middleware' => 'admin'], function () {

    Route::post('/admin/addproducts', 'ProductController@create');

    Route::post('/admin/updateproduct', 'ProductController@update');

    Route::get('/admin/productslist', 'ProductController@list');

    Route::get('/admin/showproduct/{id}', 'ProductController@edit');;

    Route::get('/admin/deletephoto/{id}','ProductPhotoController@destroy');

    Route::get('/admin/deleteproduct/{id}', 'ProductController@destroy');

    Route::get('/admin/categorieslist', 'CategoryController@index');

    Route::get('/admin/editcategory/{id}', 'CategoryController@show');

    Route::post('/admin/updatecategory', 'CategoryController@edit');

    Route::get('/admin/deletecategory/{id}', 'CategoryController@destroy');

    Route::post('/admin/addcategory', 'CategoryController@create');

    Route::get('/admin/orderslist', 'OrderController@index');

    Route::get('/admin/userslist', 'UserController@index');

    Route::get('/admin/edituser/{id}', 'UserController@edit');

    Route::post('/admin/updateuser', 'UserController@adminupdate');

});


Route::get('/shop/{category}', 'ProductController@categories');

Route::get('/product/{id}', 'ProductController@show');

Route::get('/shop/order/{parametro}', 'ProductController@orderByPrice');

Route::get('/contacto', 'ContactoController@index');

Route::post('/contacto', 'ContactoController@enviarMensaje');

Route::post('/addtocart', 'ProductController@addToCart');

Route::post('/editcart', 'ProductController@editCart');

Route::post('/borrarCartItem', 'ProductController@editCart');

// update & delete from ajax
Route::post('/updatecart', 'ProductController@updateCart');

Route::post('/deletefromcart', 'ProductController@deleteFromCart');

Route::get('/cart', 'ProductController@cart');

Route::get('/checkout', 'ProductController@');
