<?php


Auth::routes();


Route::get('/', 'HomeController@index')->name('front-index');

//Auth
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

//Administration
Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('administration');
    Route::prefix('membres')->group(function () {
        Route::get('/change/{slug}', 'Admin\AdminMembersController@changeInfosMember')->name('admin-change');
        Route::post('/update/{slug}', 'Admin\AdminMembersController@adminUpdate')->name('admin-update');
        Route::get('/', 'Admin\AdminMembersController@index')->name('admin-membres');
    });
    Route::prefix('posts')->group(function () {
        Route::get('/', 'Admin\AdminPostController@index')->name('admin-posts');
        Route::get('/delete/{slug}', 'Admin\AdminPostController@softDeletePost')->name('admin-delete-post');
        Route::get('/change/{slug}', 'Admin\AdminPostController@viewChangePost')->name('admin-view-change-post');
        Route::post('/change/{slug}', 'Admin\AdminPostController@updatePost')->name('admin-update-publication');
    });
    Route::prefix('tutoriels')->group(function () {
        Route::get('/', 'Admin\AdminTutorielController@index')->name('admin.tutoriels');
        Route::get('/{slug}', 'Admin\AdminTutorielController@viewChangeTuto')->name('admin-view-change-tuto');
        Route::post('/{slug}', 'Admin\AdminPostController@updatePost')->name('admin-update-tutoriel');
    });
    Route::prefix('comments')->group(function () {
        Route::get('/', 'Admin\AdminCommentController@index')->name('admin-comments');
    });
    Route::prefix('requests')->group(function () {
        Route::get('/', 'Admin\AdminRequestController@index')->name('admin-request');
    });
    Route::prefix('comptable')->group(function () {
        Route::get('/', 'Admin\AdminComptableController@index')->name('admin-comptable');
    });
    Route::prefix('marketing')->group(function () {
        Route::get('/', 'Admin\AdminMarketingController@index')->name('admin-marketing');
    });
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
    Route::get('/subscription', 'UserController@subscription')->name('user-sub');
    Route::get('/unsubscription', 'UserController@unsubscription')->name('user-unsub');
    Route::get('/{slug}', 'UserController@otherProfil')->name('other-profil');
    Route::get('/follow/{slug}', 'FollowController@followUser')->name('follow');
    Route::get('/unfollow/{slug}', 'FollowController@unFollowUser')->name('unfollow');
    Route::post('/infos/update/description', 'UserController@updateDescription')->name('update-description');
    Route::post('/infos/update/imgprofil', 'UserController@updateAvatar')->name('update-avatar');
    Route::post('/infos/update', 'UserController@update')->name('update-info');
    Route::get('/publication/delete/{slug}', 'PublicationController@softDelete')->name('publication-delete');
    Route::get('/publication/update/tutorial/{slug}', 'PublicationController@editPublication')->name('update-publication-tutorial');
    Route::get('/publication/update/post/{slug}', 'PublicationController@editPost')->name('update-publication-post');
    Route::post('/publication/update/tutorial/{slug}/action', 'PublicationController@update')->name('update-publication');
    Route::get('/', 'UserController@myProfil')->name('user-profil');
});


//Route conversation message
Route::get('/profil/message/conversation/{slug}', 'MessageController@show')->name('conversation.show');
Route::post('/profil/message/conversation/{slug}', 'MessageController@store');

//See this page
Route::get('/panier', 'HomeController@panier')->name('front-panier');


// Route for the statics pages
Route::get('/cgu', 'ContentController@cgu')->name('front-cgu');
Route::get('/aboutus', 'ContentController@aboutus')->name('front-aboutus');
Route::get('/contact', 'ContentController@contact')->name('front-contact');
Route::post('/contact/sendRequest', 'ContactRequestController@store')->name('contact-request');
Route::get('/rgpd', 'ContentController@rgpd')->name('front-rgpd');