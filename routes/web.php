<?php


Auth::routes();


Route::get('/', 'HomeController@index')->name('front-index');

//Auth
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

//Administration
Route::prefix('admin')->middleware('role:admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('administration');

    //manage members
    Route::prefix('members')->group(function () {
        Route::get('/', 'Admin\MemberController@index')->name('admin.members.index');
        Route::get('/create', 'Admin\MemberController@create')->name('admin.member.create');
        Route::post('/create', 'Admin\MemberController@store')->name('admin.member.store');
        Route::get('/{user}', 'Admin\MemberController@edit')->name('admin.member.edit');
        Route::post('/{user}', 'Admin\MemberController@update')->name('admin.member.update');
        Route::get('/{user}/delete', 'Admin\MemberController@destroy')->name('admin.member.delete');
    });

    // Manage Posts
    Route::prefix('posts')->group(function () {
        Route::get('/', 'Admin\PostController@index')->name('admin.posts.index');
        Route::get('/create', 'Admin\PostController@create')->name('admin.post.create');
        Route::post('/create', 'Admin\PostController@store')->name('admin.post.store');
        Route::get('/{publication}', 'Admin\PostController@edit')->name('admin.post.edit');
        Route::post('/{publication}', 'Admin\PostController@update')->name('admin.post.update');
        Route::get('/{publication}/delete', 'Admin\PostController@destroy')->name('admin.post.delete');
    });

    //Manage Tutorials
    Route::prefix('tutorials')->group(function () {
        Route::get('/', 'Admin\TutorialController@index')->name('admin.tutorials.index');
        Route::get('/create', 'Admin\TutorialController@create')->name('admin.tutorial.create');
        Route::post('/create', 'Admin\TutorialController@store')->name('admin.tutorial.store');
        Route::get('/{publication}', 'Admin\TutorialController@edit')->name('admin.tutorial.edit');
        Route::post('/{publication}', 'Admin\TutorialController@update')->name('admin.tutorial.update');
        Route::get('/{publication}/delete', 'Admin\TutorialController@destroy')->name('admin.tutorial.delete');
    });

    //Manage COmments
    Route::prefix('comments')->group(function () {
        Route::get('/', 'Admin\CommentController@index')->name('admin.comments.index');
        Route::get('/{comment}', 'Admin\CommentController@edit')->name('admin.comment.edit');
        Route::post('/{comment}', 'Admin\CommentController@update')->name('admin.comment.update');
        Route::get('/{comment}/delete', 'Admin\CommentController@destroy')->name('admin.comment.delete');
    });

    //Manage Requestes
    Route::prefix('requests')->group(function () {
        Route::get('/', 'Admin\RequestController@index')->name('admin.request.index');
    });

    //Manage Comptable
    Route::prefix('comptable')->middleware('role:adminMarketing')->group(function () {
        Route::get('/', 'Admin\ComptableController@index')->name('admin.comptable.index');
    });

    //Manage Marketing
    Route::prefix('marketing')->middleware('role:adminAccounting')->group(function () {
        Route::get('/', 'Admin\MarketingController@index')->name('admin.marketing.index');
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


//PUBLCIATIONS
Route::prefix('publication')->group(function () {

    //POSTS
    Route::get('/post', 'FrontEnd\PostController@create')->name('post-ajout');
    Route::post('/post', 'FrontEnd\PostController@store')->name('store-post');
    Route::get('/post/{slug}', 'FrontEnd\PostController@edit')->name('update-publication-post');
    Route::post('/post/{slug}', 'FrontEnd\PostController@update')->name('update-publication');
    Route::get('/post/{slug}/delete', 'PublicationController@softDelete')->name('publication-delete');

    // TUTORIELS
//Route for tutoriel
    Route::prefix('tutoriel')->group(function () {
        Route::get('/{slug}/buy', 'FrontEnd\TutorialController@buy')->name('front-buy-tutorial');
        Route::get('/{slug}/summary', 'FrontEnd\TutorialController@summary')->name('front-tutorial');
        Route::get('/{slug}/consultation', 'FrontEnd\TutorialController@show')->name('affiche-publication');

        Route::post('/{slug}/comment/', 'CommentController@store')->name('tutorial-comment');
        Route::post('/{slug}/rating', 'RatingController@store')->name('tutorial.rating');

        Route::get('/create', 'FrontEnd\TutorialController@create')->name('tuto-ajout');
        Route::post('/store', 'FrontEnd\TutorialController@store')->name('store-tuto');
        Route::get('/{slug}/edit', 'FrontEnd\TutorialController@edit')->name('update-publication-tutorial');
        Route::post('/{slug}/update', 'FrontEnd\TutorialController@update')->name('update-publication');
        Route::get('/{slug}/delete', 'PublicationController@softDelete')->name('publication-delete');
    });

    Route::get('/comment/delete/{id}', 'CommentController@softDelete')->name('comment-delete');
    Route::post('/{slug}/comment/', 'CommentController@store')->name('post-comment');


});


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