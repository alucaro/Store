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

Route::get('/', function () {
    return view('/compras');
});

Route::get('/compras', 'ComprasController@index');
Route::post('/compras', 'ComprasController@store');
Route::get('/registro', 'RegistroController@index');
Route::post('/registro', 'RegistroController@store');
Route::get('/resumen', 'ResumenController@index');
Route::get('/ordenes', 'OrdenesController@index');
