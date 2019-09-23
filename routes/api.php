<?php

use Illuminate\Http\Request;

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

Route::get('user', function () {
    return $array = Arr::add(['name' => 'Desk'], 'price', 100);
});

Route::get('ver', function(){
    return 'hola';
});

Route::resource('ver','EstudianteController');
