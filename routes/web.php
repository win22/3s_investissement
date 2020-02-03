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

Route::group([
    'middleware' => 'App\Http\Middleware\Auth'
    ], function ()
{
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/logout', 'DashboardController@logout');

    Route::get('/all_admin', 'AdminController@all_admin');
    Route::post('/save_admin', 'AdminController@save');
    Route::post('/update_admin/test', 'AdminController@update');
    Route::get('/delete_admin/{id}', 'AdminController@delete');
    Route::get('/active_admin/{id}', 'AdminController@active_admin');
    Route::get('/desactive_admin/{id}', 'AdminController@desactive_admin');

    //Route pour les appartements
    Route::get('/add_appartement', 'AppartController@index');
    Route::get('/all_appartement', 'AppartController@all_appart')->name('appart');
    Route::post('/save_appart', 'AppartController@save')->name('save');
    Route::get('/active_appart/{id}', 'AppartController@active')->name('active');
    Route::get('/unactive_appart/{id}', 'AppartController@unactive')->name('desactive');
    Route::get('/delete_appart/{id}', 'AppartController@supprimer')->name('supprimer');
});