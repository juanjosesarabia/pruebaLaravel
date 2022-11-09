<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('prueba',function(){
    return "Efecto de prueba en ruta prueba";
} );

/*
    Route::get("listar-productos",'UsuarioPrueba@editUser'); //Listar productos
    Route::put("crear-producto",'UsuarioPrueba@editUser'); //Crear productos
    Route::put('actualizar-producto', '');//actualzar productos
    Route::delete('eliminar-producto',''); // Eliminar productos
*/