<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('index');
});



Route::get('/inicio', function () {
    return view('index');
});


// Route::get('/administrar', function () {
//     return view('admin');
// });


Route::get('productos', 'PagesController@productos')->name('productos');


// Route::get('/listar', 'PagesController@buscarproductos')->name('buscarpor');


Route::get('cart', 'PagesController@cart');

Route::get('add-to-cart/{id}', 'PagesController@addToCart');
Route::get('delete-to-cart/{id}', 'PagesController@eliminardelCarrito');


Route::get('product-detali/{id}', 'PagesController@detail');



Route::get('pagar/{total}', 'PagesController@pagar');






Route::get('productodetalle/{id}','PagesController@detalle')->name('productodetalle');



Route::get('/adfarmacia','ProductoController@adfarmacia')->name('adfarmacia');


Route::get('/detalle','ProductoController@detalle')->name('detalle');

Route::get('/usuarios','ProductoController@usuarios')->name('usuarios');

Route::post('/save','PagesController@save')->name('save');


Route::post('/guardar','PagesController@guardar')->name('guardar');





Route::delete('/eliminar/{id}','PagesController@eliminar')->name('productoeliminar');
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

