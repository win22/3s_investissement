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

Route::get('/investi_admin', 'SuperAdminController@index');

Route::post('/admin_connexion', 'SuperAdminController@connexion');

Route::get('/dashboard', 'DashboardController@index');
Route::get('/logout', 'DashboardController@logout');

Route::get('/all_admin', 'AdminController@all_admin');
Route::post('/save_admin', 'AdminController@save');
Route::get('/edit/{id}', 'AdminController@edit');
Route::post('/update/test', 'AdminController@update');
