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


Route::get('send_message/{name}', 'HomeController@captcha_send')->name('save_mess');
Route::get('/contact', 'HomeController@contacts')->name('contact_site');

//              Appartement site config
Route::get('details_proprieties/{id}', 'AppartController@details_site')->name('property-detail');
Route::get('all_appart', 'HomeController@all_appart')->name('all_appar');
Route::get('all_appartement_louer', 'AppartController@all_louer')->name('app_louer');
Route::get('all_appartement_vendre', 'AppartController@all_vendre')->name('app_vendre');
Route::get('all_appartement_vendre', 'AppartController@all_vendre')->name('app_vendre');
Route::get('all_appartement_promo', 'AppartController@all_promo')->name('app_promo');
Route::post('all_search_louer', 'AppartController@search_louer')->name('search_lou');
Route::post('all_search', 'AppartController@search')->name('search');
Route::post('all_search_vendre', 'AppartController@search_vendre')->name('search_ven');
Route::post('all_search_promo', 'AppartController@search_promo')->name('search_promo');

//              Villa site config
Route::get('villa_all', 'HomeController@all_villa')->name('vil_all');
Route::get('details_proprieties_villa/{id}', 'VillaController@details_villa_site')->name('villa_detail');
Route::get('all_villa_louer', 'VillaController@all_louer')->name('vill_louer');
Route::get('all_villa_vendre', 'VillaController@all_vendre')->name('vill_vendre');
Route::get('all_villa_promo', 'VillaController@all_promo')->name('vill_promo');
Route::post('all_search_louer_villa', 'VillaController@search_louer')->name('search_lou_vill');
Route::post('all_search_villa', 'VillaController@search')->name('search_vill');
Route::post('all_search_vendre_villa', 'VillaController@search_vendre')->name('search_ven_vill');
Route::post('all_search_promo_villa', 'VillaController@search_promo')->name('search_promo_vill');

//              Immeuble site config
Route::get('all_immeub', 'HomeController@all_immeub')->name('all_im');
Route::get('details_immeuble_font/{id}', 'ImmeubleController@details_site')->name('detail_im');
Route::get('louer_immeub', 'ImmeubleController@all_louer')->name('im_louer');
Route::get('vendre_immeub', 'ImmeubleController@all_vendre')->name('im_vendre');
Route::get('promo_immeub', 'ImmeubleController@all_promo')->name('im_promo');
Route::post('all_search_immeub', 'ImmeubleController@search')->name('search_im');
Route::post('all_search_louer_immeub', 'ImmeubleController@search_louer')->name('search_lou_im');
Route::post('all_search_vendre_immeub', 'ImmeubleController@search_vendre')->name('search_ven_im');
Route::post('all_search_promo_immeub', 'ImmeubleController@search_promo')->name('search_promo_im');

//              Bureau site conig
Route::get('all_bureau', 'HomeController@all_bureau')->name('all_bur');
Route::get('details_bureau_font/{id}', 'BureauController@details_site')->name('detail_bur');
Route::get('louer_bureau', 'BureauController@all_louer')->name('bur_louer');
Route::get('vendre_bureau', 'BureauController@all_vendre')->name('bur_vendre');
Route::get('promo_bureau', 'BureauController@all_promo')->name('bur_promo');
Route::post('all_search_bureau', 'BureauController@search')->name('search_bur');
Route::post('all_search_louer_bureau', 'BureauController@search_louer')->name('search_lou_bur');
Route::post('all_search_vendre_bureau', 'BureauController@search_vendre')->name('search_ven_bur');
Route::post('all_search_promo_bureau', 'BureauController@search_promo')->name('search_promo_bur');

//              Terrain site conig
Route::get('all_terrain', 'HomeController@all_terrain')->name('all_terre');
Route::get('details_terrain_font/{id}', 'TerrainController@details_terrain_site')->name('detail_terre');
Route::get('louer_terrain', 'TerrainController@all_louer')->name('terre_louer');
Route::get('vendre_terrain', 'TerrainController@all_vendre')->name('terre_vendre');
Route::get('promo_terrain', 'TerrainController@all_promo')->name('terre_promo');
Route::post('all_search_terrain', 'TerrainController@search')->name('search_terre');
Route::post('all_search_louer_terrain', 'TerrainController@search_louer')->name('search_lou_terre');
Route::post('all_search_vendre_terrain', 'TerrainController@search_vendre')->name('search_ven_terre');
Route::post('all_search_promo_terrain', 'TerrainController@search_promo')->name('search_promo_terre');



//           ----------partie admin--------------
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
    Route::get('/delete_admin/{id}', 'AdminController@supprimer');
    Route::get('/active_admin/{id}', 'AdminController@active_admin');
    Route::get('/desactive_admin/{id}', 'AdminController@desactive_admin');
    Route::post('/save_admin', 'AdminController@save');
    Route::post('/update_admin/test', 'AdminController@update');

    //Route pour les appartements
    Route::get('/add_appartement', 'AppartController@index');
    Route::get('/all_appartement', 'AppartController@all_appart')->name('appart');
    Route::get('/active_appart/{id}', 'AppartController@active')->name('active_ap');
    Route::get('/unactive_appart/{id}', 'AppartController@unactive')->name('desactive_ap');
    Route::get('/delete_appart/{id}', 'AppartController@supprimer')->name('supprimer_ap');
    Route::get('/detail_appart/{id}', 'AppartController@details')->name('detail_appart');
    Route::get('/edit_appart/{id}', 'AppartController@edits')->name('selectionner_ap');
    Route::post('/save_appart', 'AppartController@save')->name('save_ap');
    Route::post('/update_appart/{id}', 'AppartController@updates')->name('modifie_ap');

    //Route pour les villas
    Route::get('/add_villa', 'VillaController@index');
    Route::get('/all_villa', 'VillaController@all_villa')->name('all_vil');
    Route::get('/active_villa/{id}', 'VillaController@active')->name('active');
    Route::get('/unactive_villa/{id}', 'VillaController@unactive')->name('desactive');
    Route::get('/delete_villa/{id}', 'VillaController@supprimer')->name('supprimer');
    Route::get('/detail_villa/{id}', 'VillaController@details')->name('details_villas');
    Route::get('/edit_villa/{id}', 'VillaController@edits')->name('selectionner');
    Route::post('/save_villa', 'VillaController@save')->name('save_v');
    Route::post('/update_villa/{id}', 'VillaController@updates')->name('modifier');

    //Route pour les immeubles
    Route::get('all_im', 'ImmeubleController@all_immeuble')->name('immeubles');
    Route::get('add_im', 'ImmeubleController@index')->name('add_immeubles');
    Route::get('/detail_im/{id}', 'ImmeubleController@details')->name('detail_immeub');
    Route::get('/active_im/{id}', 'ImmeubleController@active')->name('active_immeubles');
    Route::get('/unactive_im/{id}', 'ImmeubleController@unactive')->name('desactive_immeubles');
    Route::get('/edit_im/{id}', 'ImmeubleController@edits')->name('selectionner_im');
    Route::get('/delete_im/{id}', 'ImmeubleController@supprimer')->name('supprimer_im');
    Route::post('save_im', 'ImmeubleController@save')->name('save_immeubles');
    Route::post('/update_im/{id}', 'ImmeubleController@updates')->name('modifie_im');

    //Route pour les bureaux
    Route::get('all_bur', 'BureauController@all_bureau')->name('bureaux');
    Route::get('add_bur', 'BureauController@index')->name('add_bureau');
    Route::get('/detail_bur/{id}', 'BureauController@details')->name('detail_bureau');
    Route::get('/active_bur/{id}', 'BureauController@active')->name('active_bureaux');
    Route::get('/edit_bur/{id}', 'BureauController@edits')->name('selectionner_bur');
    Route::get('/delete_bur/{id}', 'BureauController@supprimer')->name('supprimer_bur');
    Route::get('/unactive_bur/{id}', 'BureauController@unactive')->name('desactive_bureaux');
    Route::post('save_bur', 'BureauController@save')->name('save_bureau');
    Route::post('/update_bur/{id}', 'BureauController@updates')->name('modifie_bur');

    //Route pour les terrains
    Route::get('all_terre', 'TerrainController@all_terrain')->name('terrains');
    Route::get('add_terre', 'TerrainController@index')->name('add_terrain');
    Route::get('/detail_terre/{id}', 'TerrainController@details')->name('detail_terrain');
    Route::get('/active_terre/{id}', 'TerrainController@active')->name('active_terrains');
    Route::get('/edit_terre/{id}', 'TerrainController@edits')->name('selectionner_terre');
    Route::get('/delete_terre/{id}', 'TerrainController@supprimer')->name('supprimer_terre');
    Route::get('/unactive_terre/{id}', 'TerrainController@unactive')->name('desactive_terrains');
    Route::post('save_terre', 'TerrainController@save')->name('save_terrain');
    Route::post('/update_terre/{id}', 'TerrainController@updates')->name('modifie_terre');
});