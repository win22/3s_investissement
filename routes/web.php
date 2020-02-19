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

Route::get('/', 'HomeController@index');
//Appartement site config

Route::get('send_message/{name}', 'HomeController@captcha_send')->name('save_mess');

Route::get('details_proprieties/{id}', 'AppartController@details_site')->name('property-detail');
Route::get('all_appart', 'HomeController@all_appart')->name('all_appar');
Route::get('all_appartement_louer', 'AppartController@all_louer')->name('app_louer');
Route::get('all_appartement_vendre', 'AppartController@all_vendre')->name('app_vendre');
Route::post('all_search_louer', 'AppartController@search_louer')->name('search_lou');
Route::post('all_search', 'AppartController@search')->name('search');
Route::post('all_search_vendre', 'AppartController@search_vendre')->name('search_ven');

Route::get('villa_all', 'HomeController@all_villa')->name('vil_all');
Route::get('details_proprieties_villa/{id}', 'VillaController@details_villa_site')->name('villa_detail');
Route::get('all_villa_louer', 'VillaController@all_louer')->name('vill_louer');
Route::get('all_villa_vendre', 'VillaController@all_vendre')->name('vill_vendre');
Route::post('all_search_louer_villa', 'VillaController@search_louer')->name('search_lou_vill');
Route::post('all_search_villa', 'VillaController@search')->name('search_vill');
Route::post('all_search_vendre_villa', 'VillaController@search_vendre')->name('search_ven_vill');








// partie admin
Route::get('/investi_admin', 'SuperAdminController@index');
Route::post('/admin_connexion', 'SuperAdminController@connexion');
Route::group([
    'middleware' => 'App\Http\Middleware\Auth'
    ], function ()
{
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/dashboard', 'DashboardController@all_message');
    Route::get('/logout', 'DashboardController@logout');
    Route::post('/view_message/test', 'DashboardController@view_mess');
    Route::get('delete_message/{id}', 'DashboardController@delete_mess');

    Route::get('/all_admin', 'AdminController@all_admin');
    Route::post('/save_admin', 'AdminController@save');
    Route::post('/update_admin/test', 'AdminController@update');
    Route::get('/delete_admin/{id}', 'AdminController@supprimer');
    Route::get('/active_admin/{id}', 'AdminController@active_admin');
    Route::get('/desactive_admin/{id}', 'AdminController@desactive_admin');

    //Route pour les appartements
    Route::get('/add_appartement', 'AppartController@index');
    Route::get('/all_appartement', 'AppartController@all_appart')->name('appart');
    Route::post('/save_appart', 'AppartController@save')->name('save_ap');
    Route::post('/update_appart/{id}', 'AppartController@updates')->name('modifie_ap');
    Route::get('/active_appart/{id}', 'AppartController@active')->name('active_ap');
    Route::get('/unactive_appart/{id}', 'AppartController@unactive')->name('desactive_ap');
    Route::get('/delete_appart/{id}', 'AppartController@supprimer')->name('supprimer_ap');
    Route::get('/detail_appart/{id}', 'AppartController@details')->name('detail_appart');
    Route::get('/edit_appart/{id}', 'AppartController@edits')->name('selectionner_ap');

    //Route pour les villas
    Route::get('/add_villa', 'VillaController@index');
    Route::get('/all_villa', 'VillaController@all_villa')->name('all_vil');
    Route::post('/save_villa', 'VillaController@save')->name('save_v');
    Route::post('/update_villa/{id}', 'VillaController@updates')->name('modifier');
    Route::get('/active_villa/{id}', 'VillaController@active')->name('active');
    Route::get('/unactive_villa/{id}', 'VillaController@unactive')->name('desactive');
    Route::get('/delete_villa/{id}', 'VillaController@supprimer')->name('supprimer');
    Route::get('/detail_villa/{id}', 'VillaController@details')->name('detail');
    Route::get('/edit_villa/{id}', 'VillaController@edits')->name('selectionner');

    //Route pour les immeubles
    Route::get('all_im', 'ImmeubleController@all_immeuble')->name('immeubles');
    Route::get('add_im', 'ImmeubleController@index')->name('add_immeubles');
    Route::post('save_im', 'ImmeubleController@save')->name('save_immeubles');
});