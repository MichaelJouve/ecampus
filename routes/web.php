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

//Route::get('/', function () {
  //  return view('welcome');
//});



Auth::routes();





Route::get('/', 'HomeController@index')->name('front_index');
Route::get('conditions-generales-du-client', 'HomeController@cgu')->name('front_cgu');
Route::get('aboutus','HomeController@aboutus')->name('front_aboutus');
Route::get('contact','HomeController@contact')->name('front_contact');
Route::get('liste-tutoriel-par-categorie/{id}','HomeController@listing')->name('front_listing_categorie');
Route::get('liste-all-tutoriel','HomeController@listingall')->name('front_listing_all');
Route::get('votre-recherche','HomeController@recherche')->name('front_recherche');

Route::get('profil-personnel','IndexController@profil')->name('front_profil');
Route::get('article-tutoriel','IndexController@article')->name('front_article');

Route::get('configuration-compte-infos','IndexController@configInfos')->name('front-config-infos');
Route::get('configuration-compte-message', 'IndexController@configMessage')->name('front-config-message');
Route::get('configuration-compte-preference', 'IndexController@configPref')->name('front-config-preference');
Route::get('panier', 'IndexController@panier')->name('front_panier');