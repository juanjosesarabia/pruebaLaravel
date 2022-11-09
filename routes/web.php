<?php

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('listar-productos', function () {
    return view('listar');
});

Route::get('/prueba','ProductoController@productoAll');


Route::get(
   '/', 
   [
      'as'   => 'app',
      'uses' => 'ProductoController@productoAll'
   ]
);



/*
    Route::get("listar-productos",'UsuarioPrueba@editUser'); //Listar productos
    Route::put("crear-producto",'UsuarioPrueba@editUser'); //Crear productos
    Route::put('actualizar-producto', '');//actualzar productos
    Route::delete('eliminar-producto',''); // Eliminar productos
*/