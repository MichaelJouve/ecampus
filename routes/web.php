<?php


Auth::routes();


Route::get('/', 'HomeController@index')->name('front-index');
Route::get('/test', 'HomeController@test');

Route::get('/categorie','PublicationController@index')->name('listing-categorie');
Route::get('/categorie/{name}','PublicationController@show');

Route::get('/tutoriel/{slug}/consultation','PublicationController@showpublication')->name('affiche-publication');
Route::get('/tutoriel/{slug}','PublicationController@showTutorial')->name('front-tutorial');
Route::get('/tutoriel/{category}','PublicationController@showTutorialCategory')->name('listing-all-category');
Route::get('/tutoriel/','PublicationController@allTutorials')->name('listing-all');

Route::post('/post/post', 'PublicationController@storePost')->name('store-post');
Route::post('/tuto/post', 'PublicationController@storeTuto')->name('store-tuto');
Route::get('/post/ajout', 'PublicationController@createPost')->name('post-ajout');
Route::get('/tuto/ajout', 'PublicationController@createTuto')->name('tuto-ajout');
Route::get('/post','PublicationController@listingPost')->name('front-listing-all');


Route::get('/recherche/','SearchController@index')->name('search');


Route::get('/profil/infos/','UserController@infos')->name('user-profil-infos');
Route::get('/profil/message/', 'UserController@message')->name('user-profil-message');
Route::get('/profil/{slug}', 'UserController@otherProfil')->name('other-profil');
Route::get('/profil/preference/', 'UserController@preference')->name('user-profil-preference');
Route::get('/profil/follow/{slug}','FollowController@followUser')->name('follow');
Route::get('/profil/unfollow/{slug}','FollowController@unFollowUser')->name('unfollow');
Route::post('/profil/infos/update/description','UserController@updateDescription')->name('update-description');
Route::post('/profil/infos/update/imgprofil','UserController@updateAvatar')->name('update-avatar');
Route::post('/profil/infos/update','UserController@update')->name('update-info');
Route::get('/profil/', 'UserController@myProfil')->name('user-profil');

Route::get('/profil/publication/delete/{slug}', 'PublicationController@softDelete')->name('publication-delete');

Route::get('/panier', 'HomeController@panier')->name('front-panier');

Route::post('/tutoriel/{slug}/comment/', 'CommentController@store')->name('tutorial-comment');


// todo changer HomeContoller par ContentController (redirect page fix useless)
Route::get('/cgu', 'ContentController@cgu')->name('front-cgu');
Route::get('/aboutus','ContentController@aboutus')->name('front-aboutus');
Route::get('/contact','ContentController@contact')->name("front-contact");
Route::get('/rgpd', 'ContentController@rgpd')->name('front-rgpd');