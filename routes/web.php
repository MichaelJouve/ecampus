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

Route::get('/categorie','CategoryController@index')->name('front_listing_categorie');
Route::get('/categorie/{name}','CategoryController@name');

Route::get('/publication', 'PublicationController@listingAll')->name('front_listing_all');

Route::get('/tutoriel','PublciationController@listingTuto')->name('front_listing_tutos');
Route::get('/tutoriel/ajout', 'PublicationController@create')->middleware('auth');
Route::get('/tutoriel/{slug}','PublicationController@show')->name('front_tuto');

Route::get('/post','PublicationController@listingPost')->name('front_listing_posts');
Route::get('/post/ajout', 'PublciationController@create')->middleware('auth');
Route::get('/post/{slug}','PublicationController@show')->name('front_post');


Route::get('/recherche','SearchController@index')->name('front_recherche');


Route::get('/profil','UserController@index')->name('front_profil');
Route::get('/profil/infos','UserController@infos')->name('front-config-infos');
Route::get('/profil/message', 'UserController@message')->name('front-config-message');
Route::get('/profil/preference', 'UserController@preference')->name('front-config-preference');


Route::get('/panier', 'HomeController@panier')->name('front_panier');

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/cgu', 'ContentController@cgu')->name('front_cgu');
Route::get('/aboutus','ContentController@aboutus')->name('front_aboutus');
Route::get('/contact','ContentController@contact')->name("front_contact");
