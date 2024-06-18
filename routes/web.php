<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

/*Route::get('/', function () {
    //return view('welcome');
    $viewData = [];
    $viewData["title"] = "Home Page - Online Store";
    return view('home.index')->with("viewData", $viewData);
});*/

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/about', 'App\Http\Controllers\HomeController@about')->name("home.about");
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name("product.index");
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name("product.show");

Route::get('/landing', function () {
    $viewData = [];
    $viewData["title"] = "Landing Page - Online Store";
    return view('home.landing')->with("viewData", $viewData);
})->name("home.landing");

Auth::routes();

Route::get('/prestashop/products', 'App\Http\Controllers\PrestashopController@index')->name('prestashop.product.index');
Route::get('/prestashop/products/{id}', 'App\Http\Controllers\PrestashopController@show')->name('prestashop.product.show');

Route::get('/cart', 'App\Http\Controllers\CartController@index')->name("cart.index");
Route::get('/cart/delete', 'App\Http\Controllers\CartController@delete')->name("cart.delete");
Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name("cart.add");

Route::middleware('auth')->group(function () {
    Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name("cart.purchase");
    Route::get('/my-account/orders', 'App\Http\Controllers\MyAccountController@orders')->name("myaccount.orders");
});

Route::get('/import', 'App\Http\Controllers\ImportController@index')->name("import.index");
Route::get('/import/dreamlove/' , 'App\Http\Controllers\DLController@index')->name("dreamlove.index");
Route::get('/import/dreamlove/importfile', 'App\Http\Controllers\DLController@importfile')->name("dreamlove.importfile");
Route::get('/import/dreamlove/loadfile/{limit}', 'App\Http\Controllers\DLController@loadfile')->name("dreamlove.loadfile");
Route::get('/import/dreamlove/{referencia}', 'App\Http\Controllers\DLController@show')->name("dreamlove.show");
Route::get('/import/lovecherry/' , 'App\Http\Controllers\LCHController@index')->name("lovecherry.index");
Route::get('/import/lovecherry/importfile', 'App\Http\Controllers\LCHController@importfile')->name("lovecherry.importfile");
Route::get('/import/lovecherry/loadfile/{limit}', 'App\Http\Controllers\LCHController@loadfile')->name("lovecherry.loadfile");
Route::get('/import/lovecherry/{referencia}', 'App\Http\Controllers\LCHController@show')->name("lovecherry.show");
Route::get('/import/{referencia}', 'App\Http\Controllers\ImportController@index')->name("import.show");

//Route::get('/xml', 'App\Http\Controllers\XmlController@index')->name("xml.index");
//Route::get('/xml/importfile', 'App\Http\Controllers\XmlController@importfile')->name("xml.importfile");
//Route::get('/xml/loadfile/{limit}', 'App\Http\Controllers\XmlController@loadfile')->name("xml.loadfile");
//Route::get('/xml/show/{referencia}', 'App\Http\Controllers\XmlController@show')->name("xml.show");

Route::post('/contactos/{full_apodo}/direccions', 'App\Http\Controllers\ContactoController@direccions')->name("contacto.direccions");

Route::middleware('admin')->group(function () {

    Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.home.index");
    Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name("admin.product.index");
    Route::post('/admin/products/store', 'App\Http\Controllers\Admin\AdminProductController@store')->name("admin.product.store");
    Route::get('/admin/products/{id}/edit', 'App\Http\Controllers\Admin\AdminProductController@edit')->name("admin.product.edit");
    Route::put('/admin/products/{id}/update', 'App\Http\Controllers\Admin\AdminProductController@update')->name("admin.product.update");
    Route::delete('/admin/products/{id}/delete', 'App\Http\Controllers\Admin\AdminProductController@delete')->name("admin.product.delete");

    Route::get('/contactos', 'App\Http\Controllers\ContactoController@index')->name("contacto.index");
    Route::post('/contactos/datalist/{id?}', 'App\Http\Controllers\ContactoController@datalist')->name("contacto.datalist");
    //Route::get('/contactos/create', 'App\Http\Controllers\ContactoController@create')->name("contacto.create");
    
    Route::post('/contactos/store', 'App\Http\Controllers\ContactoController@store')->name("contacto.store");
    Route::post('/contactos/update/{id}', 'App\Http\Controllers\ContactoController@update')->name("contacto.update");
   
    Route::get('/contactos/{telefono}', 'App\Http\Controllers\ContactoController@show')->name("contacto.show");
    
    //Route::get('/contactos/{telefono}/edit', 'App\Http\Controllers\ContactoController@edit')->name("contacto.edit");
    //Route::put('/contactos/{telefono}/update', 'App\Http\Controllers\ContactoController@update')->name("contacto.update");
    Route::delete('/contactos/{telefono}/delete', 'App\Http\Controllers\ContactoController@delete')->name("contacto.delete");
    
    Route::get('/direcciones/{direccion}', 'App\Http\Controllers\DireccionController@show')->name("direccion.show");
    
    Route::post('/direccions/store', 'App\Http\Controllers\DireccionController@store')->name("direccion.store");
    Route::post('/direccions/update/{direccion}', 'App\Http\Controllers\DireccionController@update')->name("direccion.update");

    //Route::delete('/direcciones/{direccion}/delete', 'App\Http\Controllers\DireccionController@delete')->name("direccion.delete");

    Route::get('/reunion', 'App\Http\Controllers\ReunionController@index')->name("reunion.index");
    Route::get('/reunion/gestion', 'App\Http\Controllers\ReunionController@gestion')->name("reunion.gestion");
    Route::get('/reunion/create', 'App\Http\Controllers\ReunionController@create')->name("reunion.create");
    Route::get('/reunion/{id}/edit', 'App\Http\Controllers\ReunionController@edit')->name("reunion.edit");
    Route::post('/reunion/estados', 'App\Http\Controllers\ReunionController@estados')->name("reunion.estados");

    Route::post('/reunion/store', 'App\Http\Controllers\ReunionController@store')->name("reunion.store");
    Route::post('/reunion/update/{id}', 'App\Http\Controllers\ReunionController@update')->name("reunion.update");

    Route::get('/evento', 'App\Http\Controllers\EventoController@index')->name("evento.index");
    Route::get('/evento/list', 'App\Http\Controllers\EventoController@list')->name("evento.list");
    //Route::post('/evento/list', 'App\Http\Controllers\EventoController@list')->name("evento.list");
    Route::post('/evento/store', 'App\Http\Controllers\EventoController@store')->name("evento.store");
    Route::post('/evento/edit/{id}', 'App\Http\Controllers\EventoController@edit')->name("evento.edit");
    Route::get('/evento/show/{id}', 'App\Http\Controllers\EventoController@show')->name("evento.show");
    Route::post('/evento/update/{evento}', 'App\Http\Controllers\EventoController@update')->name("evento.update");
    Route::post('/evento/delete/{id}', 'App\Http\Controllers\EventoController@delete')->name("evento.delete");
    
});