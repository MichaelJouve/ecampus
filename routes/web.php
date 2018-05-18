<?php


Auth::routes();


Route::get('/', 'HomeController@index')->name('front-index');

//Auth
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

//Administration
Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('administration');
    Route::get('/membres', 'AdminController@gestionMembres')->name('admin-membres');
    Route::get('/posts', 'AdminController@gestionPosts')->name('admin-posts');
    Route::get('/tutoriels', 'AdminController@gestionTutoriels')->name('admin.tutoriels');
    Route::get('/comments', 'AdminController@gestionComments')->name('admin-comments');
    Route::get('/requests', 'AdminController@gestionContactRequest')->name('admin-request');
});

//Route for category
Route::prefix('categorie')->group(function () {
    Route::get('/', 'PublicationController@index')->name('listing-categorie');
    Route::get('/{name}/All', 'PublicationController@showAll')->name('listing-all-categorie');
    Route::get('/{name}', 'PublicationController@show');
});

//Show list all tutoriels
Route::get('/Alltutoriels/', 'PublicationController@allTutorials')->name('listing-all');

//Route for tutoriel
Route::prefix('tutoriel')->group(function () {
    Route::get('/{slug}/buy', 'PublicationController@buyTutorial')->name('front-buy-tutorial');
    Route::get('/{slug}/consultation', 'PublicationController@showpublication')->name('affiche-publication');
    Route::get('/{slug}', 'PublicationController@showTutorial')->name('front-tutorial');
    Route::post('/{slug}/comment/', 'CommentController@store')->name('tutorial-comment');
    Route::post('/{slug}/rating', 'RatingController@store')->name('tutorial.rating');
});

//Route for post
Route::prefix('post')->group(function () {
    Route::post('/post', 'PublicationController@storePost')->name('store-post');
    Route::get('/ajout', 'PublicationController@createPost')->name('post-ajout');
    Route::get('/comment/delete/{id}', 'CommentController@softDelete')->name('comment-delete');
    Route::post('/{slug}/comment/', 'CommentController@storePost')->name('post-comment');
});

//Route for tuto
Route::post('/tuto/post', 'PublicationController@storeTuto')->name('store-tuto');
Route::get('/tuto/ajout', 'PublicationController@createTuto')->name('tuto-ajout');


Route::post('/recherche/', 'SearchController@index')->name('search');

Route::prefix('profil')->group(function () {
    Route::prefix('bought')->group(function () {
        Route::get('/', 'UserController@bought')->name('user-profil-bought');
        Route::get('/category', 'UserController@categoryBought')->name('user-profil-category-bought');
        Route::get('/category/{name}', 'UserController@showAllBoughtByCategory')
            ->name('user-profil-all-category-bought');
    });
    Route::get('/infos/', 'UserController@infos')->name('user-profil-infos');
    Route::get('/message/', 'UserController@message')->name('user-profil-message');
    Route::get('/preference/', 'UserController@preference')->name('user-profil-preference');
    Route::get('/{slug}', 'UserController@otherProfil')->name('other-profil');
    Route::get('/follow/{slug}', 'FollowController@followUser')->name('follow');
    Route::get('/unfollow/{slug}', 'FollowController@unFollowUser')->name('unfollow');
    Route::post('/infos/update/description', 'UserController@updateDescription')->name('update-description');
    Route::post('/infos/update/imgprofil', 'UserController@updateAvatar')->name('update-avatar');
    Route::post('/infos/update', 'UserController@update')->name('update-info');
    Route::get('/publication/delete/{slug}', 'PublicationController@softDelete')->name('publication-delete');
    Route::get('/', 'UserController@myProfil')->name('user-profil');
});


//Route conversation message
Route::get('/profil/message/conversation/{slug}','MessageController@show')->name('conversation.show');
Route::post('/profil/message/conversation/{slug}','MessageController@store');

//See this page
Route::get('/panier', 'HomeController@panier')->name('front-panier');


// Route for the statics pages
Route::get('/cgu', 'ContentController@cgu')->name('front-cgu');
Route::get('/aboutus', 'ContentController@aboutus')->name('front-aboutus');
Route::get('/contact', 'ContentController@contact')->name('front-contact');
Route::post('/contact/sendRequest', 'ContactRequestController@store')->name('contact-request');
Route::get('/rgpd', 'ContentController@rgpd')->name('front-rgpd');