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


Route::post('/send_message/{name}', 'HomeController@captcha_send')->name('save_mess');
Route::post('/send_message_two', 'HomeController@captcha_send_two')->name('save_mess_two');
Route::post('/send_message', 'HomeController@send_message_twree')->name('send_message');
Route::get('/contact', 'HomeController@contacts')->name('contact_site');
Route::get('/about', 'HomeController@about')->name('about_site');

//              Appartement site config
Route::get('/details_proprieties/{id}', 'AppartController@details_site')->name('property-detail');
Route::get('/all_appart', 'HomeController@all_appart')->name('all_appar');
Route::get('/all_appartement_louer', 'AppartController@all_louer')->name('app_louer');
Route::get('/all_appartement_vendre', 'AppartController@all_vendre')->name('app_vendre');
Route::get('/all_appartement_vendre', 'AppartController@all_vendre')->name('app_vendre');
Route::get('/all_appartement_promo', 'AppartController@all_promo')->name('app_promo');
Route::post('/all_search_louer', 'AppartController@search_louer')->name('search_lou');
Route::post('/all_search', 'AppartController@search')->name('search');
Route::post('/all_search_vendre', 'AppartController@search_vendre')->name('search_ven');
Route::post('/all_search_promo', 'AppartController@search_promo')->name('search_promo');

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

//              entrepot site conig
Route::get('all_entrepot', 'HomeController@all_entrepot')->name('all_entr');
Route::get('details_entrepot_font/{id}', 'EntrepotController@details_entrepot_site')->name('detail_entr');
Route::get('louer_entrepot', 'EntrepotController@all_louer')->name('entr_louer');
Route::get('vendre_entrepot', 'EntrepotController@all_vendre')->name('entr_vendre');
Route::get('promo_entrepot', 'EntrepotController@all_promo')->name('entr_promo');
Route::post('all_search_entrepot', 'EntrepotController@search')->name('search_entr');
Route::post('all_search_louer_entrepot', 'EntrepotController@search_louer')->name('search_lou_entr');
Route::post('all_search_vendre_entrepot', 'EntrepotController@search_vendre')->name('search_ven_entr');
Route::post('all_search_promo_entrepot', 'EntrepotController@search_promo')->name('search_promo_entr');

//              magasin site conig
Route::get('all_magasin', 'HomeController@all_magasin')->name('all_mag');
Route::get('details_magasin_font/{id}', 'MagasinController@details_magasin_site')->name('detail_mag');
Route::get('louer_magasin', 'MagasinController@all_louer')->name('mag_louer');
Route::get('vendre_magasin', 'MagasinController@all_vendre')->name('mag_vendre');
Route::get('promo_magasin', 'MagasinController@all_promo')->name('mag_promo');
Route::post('all_search_magasin', 'MagasinController@search')->name('search_mag');
Route::post('all_search_louer_magasin', 'MagasinController@search_louer')->name('search_lou_mag');
Route::post('all_search_vendre_magasin', 'MagasinController@search_vendre')->name('search_ven_mag');
Route::post('all_search_promo_magasin', 'MagasinController@search_promo')->name('search_promo_mag');

//              hectare site conig
Route::get('all_hectare', 'HomeController@all_hectare')->name('all_hect');
Route::get('details_hectare_font/{id}', 'HectareController@details_hectare_site')->name('detail_hect');
Route::get('louer_hectare', 'HectareController@all_louer')->name('hect_louer');
Route::get('vendre_hectare', 'HectareController@all_vendre')->name('hect_vendre');
Route::get('promo_hectare', 'HectareController@all_promo')->name('hect_promo');
Route::post('all_search_hectare', 'HectareController@search')->name('search_hect');
Route::post('all_search_louer_hectare', 'HectareController@search_louer')->name('search_lou_hect');
Route::post('all_search_vendre_hectare', 'HectareController@search_vendre')->name('search_ven_hect');
Route::post('all_search_promo_hectare', 'HectareController@search_promo')->name('search_promo_hect');

//           ----------partie admin--------------
Route::get('/investi_admin', 'SuperAdminController@index');
Route::post('/signin_connexion_user_admin', 'SuperAdminController@connexion');
Route::get('/renitialisation_password_user', 'SuperAdminController@ren')->name('reni');
Route::post('/send_mail', 'SuperAdminController@send_email')->name('send_email_reni');
Route::get('/user/reset/{token}','SuperAdminController@res');
Route::post('/user/res/{token}','SuperAdminController@active_compte2');

Route::group([
    'middleware' => 'App\Http\Middleware\Auth'
    ], function ()
{
    Route::get('/dashboard', 'DashboardController@index');

    Route::get('/logout', 'DashboardController@logout');
    Route::post('/view_message/test', 'DashboardController@view_mess');
    Route::get('delete_message/{id}', 'DashboardController@delete_mess');
    Route::get('delete_message_n/{id}', 'DashboardController@delete_mess_n');
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
    Route::post('/search_data_appart', 'AppartController@search_data')->name('search_admin_ap');
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
    Route::post('/search_data_villa', 'VillaController@search_data')->name('search_admin_vil');
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
    Route::post('/search_data_immeuble', 'ImmeubleController@search_data')->name('search_admin_im');

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
    Route::post('/search_data_bureau', 'BureauController@search_data')->name('search_admin_bur');

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
    Route::post('/search_data_terrain', 'TerrainController@search_data')->name('search_admin_terre');

    //Route pour les entrepots
    Route::get('all_entr', 'EntrepotController@all_entrepot')->name('entrepots');
    Route::get('add_entr', 'EntrepotController@index')->name('add_entrepot');
    Route::get('/detail_entr/{id}', 'EntrepotController@details')->name('detail_entrepot');
    Route::get('/active_entr/{id}', 'EntrepotController@active')->name('active_entrepots');
    Route::get('/edit_entr/{id}', 'EntrepotController@edits')->name('selectionner_entr');
    Route::get('/delete_entr/{id}', 'EntrepotController@supprimer')->name('supprimer_entr');
    Route::get('/unactive_entr/{id}', 'EntrepotController@unactive')->name('desactive_entrepots');
    Route::post('save_entr', 'EntrepotController@save')->name('save_entrepot');
    Route::post('/update_entr/{id}', 'EntrepotController@updates')->name('modifie_entr');
    Route::post('/search_data_entr', 'EntrepotController@search_data')->name('search_admin_entr');


    //Route pour les magasins
    Route::get('all_mag', 'MagasinController@all_magasin')->name('magasins');
    Route::get('add_mag', 'MagasinController@index')->name('add_magasin');
    Route::get('/detail_mag/{id}', 'MagasinController@details')->name('detail_magasin');
    Route::get('/active_mag/{id}', 'MagasinController@active')->name('active_magasins');
    Route::get('/edit_mag/{id}', 'MagasinController@edits')->name('selectionner_mag');
    Route::get('/delete_mag/{id}', 'MagasinController@supprimer')->name('supprimer_mag');
    Route::get('/unactive_mag/{id}', 'MagasinController@unactive')->name('desactive_magasins');
    Route::post('save_mag', 'MagasinController@save')->name('save_magasin');
    Route::post('/update_mag/{id}', 'MagasinController@updates')->name('modifie_mag');
    Route::post('/search_data_mag', 'MagasinController@search_data')->name('search_admin_mag');

    //Route pour les Hectares
    Route::get('all_hect', 'HectareController@all_hectare')->name('hectares');
    Route::get('add_hect', 'HectareController@index')->name('add_hectare');
    Route::get('/detail_hect/{id}', 'HectareController@details')->name('detail_hectare');
    Route::get('/active_hect/{id}', 'HectareController@active')->name('active_hectares');
    Route::get('/edit_hect/{id}', 'HectareController@edits')->name('selectionner_hect');
    Route::get('/delete_hect/{id}', 'HectareController@supprimer')->name('supprimer_hect');
    Route::get('/unactive_hect/{id}', 'HectareController@unactive')->name('desactive_hectares');
    Route::post('save_hect', 'HectareController@save')->name('save_hectare');
    Route::post('/update_hect/{id}', 'HectareController@updates')->name('modifie_hect');
    Route::post('/search_data_hect', 'HectareController@search_data')->name('search_admin_hect');
});