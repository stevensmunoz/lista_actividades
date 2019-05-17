<?php

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
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function() {
    Route::resource('actividades', 'ActividadController', [
        'only' => [
            'index', 'store', 'update', 'edit','destroy'
        ]
    ]);



    Route::resource('categorias', 'CategoriaController', [
        'only' => [
            'index', 'store', 'update', 'destroy', 'create', 'show', 'edit'
        ]
    ]);

});
