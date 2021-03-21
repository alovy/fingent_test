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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'Invoice@index');
Route::get('create', 'Invoice@create');
Route::post('store', 'Invoice@store');
Route::get('preview/{invoice}', 'Invoice@preview');
