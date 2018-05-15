<?php


Auth::routes();


Route::get('/', 'HomeController@index')->name('front-index');


//Auth
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback','Auth\LoginController@handleProviderCallback');

// What else ?
Route::get('/test', 'HomeController@test');

//Administration
Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('administration');
    Route::get('/gestion-membres', 'AdminController@gestionMembres')->name('gestion-membres');
    Route::get('/gestion-posts', 'AdminController@gestionPosts')->name('gestion-posts');
    Route::get('/gestion-tutoriels', 'AdminController@gestionTutoriels')->name('gestion-tutoriels');
    Route::get('/gestion-comments', 'AdminController@gestionComments')->name('gestion-comments');
});



Route::get('/categorie','PublicationController@index')->name('listing-categorie');
Route::get('/categorie/{name}/tous','PublicationController@showAll')->name('listing-all-categorie');
Route::get('/categorie/{name}','PublicationController@show');


Route::get('/Alltutoriels/','PublicationController@allTutorials')->name('listing-all');
Route::get('/tutoriel/{slug}/consultation','PublicationController@showpublication')->name('affiche-publication');
Route::get('/tutoriel/{slug}','PublicationController@showTutorial')->name('front-tutorial');


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
Route::get('/post/comment/delete/{id}', 'CommentController@softDelete')->name('comment-delete');
Route::post('/post/{slug}/comment/', 'CommentController@storePost')->name('post-comment');

// todo changer HomeContoller par ContentController (redirect page fix useless)
Route::get('/cgu', 'ContentController@cgu')->name('front-cgu');
Route::get('/aboutus','ContentController@aboutus')->name('front-aboutus');
Route::get('/contact','ContentController@contact')->name("front-contact");
Route::get('/rgpd', 'ContentController@rgpd')->name('front-rgpd');