<?php

post('/contact', ['as' => 'contacts.store', 'uses' => 'ContactsController@store']);

get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
get('/horses', ['as' => 'horses.index', 'uses' => 'HorsesController@index']);
get('/horses/show/{horse}', ['as' => 'horses.show', 'uses' => 'HorsesController@show']);
get('/accomodation', ['as' => 'home.accomodation', 'uses' => 'HomeController@accommodation']);
get('/manege', ['as' => 'home.manege', 'uses' => 'HomeController@manege']);
get('/contact', ['as' => 'contacts.create', 'uses' => 'ContactsController@create']);
get('/about', ['as' => 'home.about', 'uses' => 'HomeController@about']);
get('/news', ['as' => 'items.index', 'uses' => 'ItemsController@index']);
get('/news/show/{item}', ['as' => 'items.show', 'uses' => 'ItemsController@show']);

/**
 * Authenticated groups
 */
Route::group(['middleware' => 'auth'], function() {
    /**
     * Admin Group
     */
    Route::group(['middleware' => 'admin'], function() {
        post('/admin/users/create', ['as' => 'accounts.store', 'uses' => 'AccountController@store']);
        patch('/admin/users/edit/{user}', ['as' => 'accounts.update',	'uses' => 'AccountController@update']);
        post('/admin/horses/create', ['as' => 'horses.store', 'uses' => 'HorsesController@store']);
        patch('/admin/horses/edit/{horse}', ['as' => 'horses.update', 'uses' => 'HorsesController@update']);
        post('/admin/news/create', ['as'=> 'items.store', 'uses' => 'ItemsController@store']);
        patch('/admin/news/edit/{item}', ['as' => 'items.update', 'uses' => 'ItemsController@update']);
        post('/admin/contacts/show/{contact}', ['as' => 'contacts.update', 'uses' => 'ContactsController@update']);
        post('/admin/ponies/create', ['as' => 'pony.store', 'uses' => 'PonyController@store']);
        patch('/admin/ponies/edit/{pony}', ['as' => 'pony.update', 'uses' => 'PonyController@update']);
        post('/roster/create', ['as' => 'roster.store', 'uses' => 'RosterController@store']);
        patch('/roster/edit/{roster}', ['as' => 'roster.update', 'uses' => 'RosterController@update']);
        post('/roster/{roster}/lesson/create/{rider}', ['as' => 'lesson.create', 'uses' => 'LessonController@store']);
        get('/admin', ['as' => 'admin.index', 'uses' => 'HomeController@admin']);

        get('/admin/users/', ['as' => 'accounts.index',	'uses' => 'AccountController@index']);
        get('/admin/users/show/{user}', ['as' => 'accounts.show',	'uses' => 'AccountController@show']);
        get('/admin/users/create', ['as' => 'accounts.create', 'uses' => 'AccountController@create']);
        get('/admin/users/edit/{user}', ['as' => 'accounts.edit',	'uses' => 'AccountController@edit']);
        get('/admin/users/delete/{user}', ['as' => 'accounts.destroy', 'uses' => 'AccountController@destroy']);

        get('/admin/horses', ['as' => 'horses.admin.index',	'uses' => 'HorsesController@indexAdmin']);
        get('/admin/horses/show/{horse}', ['as' => 'horses.admin.show', 'uses' => 'HorsesController@showAdmin']);
        get('/admin/horses/create', ['as' => 'horses.create', 'uses' => 'HorsesController@create']);
        get('/admin/horses/edit/{horse}', ['as' => 'horses.edit', 'uses' => 'HorsesController@edit']);
        get('/admin/horses/destroy/{horse}', ['as' => 'horses.destroy', 'uses' => 'HorsesController@destroy']);
        get('/admin/horses/destroyPhoto/{horse_picture}', ['as' => 'horsephoto.destroy', 'uses' => 'HorsesController@destroyPicture']);

        get('/admin/news', ['as' => 'items.admin.index', 'uses' => 'ItemsController@indexAdmin']);
        get('/admin/news/create', ['as' => 'items.create', 'uses' => 'ItemsController@create']);
        get('/admin/news/{item}', ['as' => 'items.admin.show', 'uses' => 'ItemsController@showAdmin']);
        get('/admin/news/edit/{item}', ['as' => 'items.edit', 'uses' => 'ItemsController@edit']);
        get('/admin/news/delete/{item}', ['as' => 'items.delete', 'uses' => 'ItemsController@delete']);
        get('/admin/news/destroyPhoto/{item_photo}', ['as' => 'itemphoto.destroy', 'uses' => 'ItemsController@deletePhoto']);

        get('/admin/contacts', ['as' => 'contacts.index', 'uses' => 'ContactsController@index']);
        get('/admin/contacts/show/{contact}', ['as' => 'contacts.show', 'uses' => 'ContactsController@show']);
        get('/admin/contacts/delete/{contact}', ['as' => 'contacts.delete', 'uses' => 'ContactsController@delete']);

        get('/admin/ponies', ['as' => 'ponys.index', 'uses' => 'PonyController@index']);
        get('/admin/ponies/create', ['as' => 'pony.create', 'uses' => 'PonyController@create']);
        get('/admin/ponies/edit/{pony}', ['as' => 'pony.edit', 'uses' => 'PonyController@edit']);
        get('/admin/ponies/delete/{pony}', ['as' => 'pony.delete', 'uses' => 'PonyController@delete']);

        get('/rosters/create', ['as' => 'roster.create', 'uses' => 'RosterController@create']);
        get('/roster/edit/{roster}', ['as' => 'roster.edit', 'uses' => 'RosterController@edit']);
        get('/roster/delete/{roster}', ['as' => 'roster.delete', 'uses' => 'RosterController@delete']);
        get('/roster/detail/{roster}/{hour}', ['as' => 'roster.detail', 'uses' => 'RosterController@detail']);

        get('lesson/delete/{lesson}', ['as' => 'lesson.delete', 'uses' => 'LessonController@delete']);

        get('admin/newsletter', ['as' => 'newsletter.index', 'uses' => 'NewsLetterController@index']);
        post('admin/newsletter', ['as' => 'newsletter.send', 'uses' => 'NewsLetterController@send']);
    });

    patch('/user/edit/{user}', ['as' => 'user.update', 'uses' => 'UserController@update']);
    patch('/user/change-password', ['as' => 'user.update.password',	'uses' => 'UserController@updatePassword']);
    post('/riders/create', ['as' => 'rider.store', 'uses' => 'RiderController@store']);
    patch('/riders/edit/{rider}', ['as' => 'rider.update', 'uses' => 'RiderController@update']);
    post('/subscription/create/{roster}', ['as' => 'subscription.store', 'uses' => 'SubscriptionController@store']);

    get('/user/edit', ['as' => 'user.edit',	'uses' => 'UserController@edit']);
    get('/user/change-password', ['as' => 'user.edit.password',	'uses' => 'UserController@editPassword']);
    get('/user/show/{user}', ['as' => 'user.show', 'uses' => 'UserController@show']);
    get('/sign-out', ['as' => 'user.sign-out', 'uses' => 'UserController@getSignOut']);

    get('/rosters/index', ['as' => 'rosters.index', 'uses' => 'RosterController@index']);
    get('/roster/show/{roster}', ['as' => 'roster.show', 'uses' => 'RosterController@show']);
    get('/dashboard', ['as' => 'dashboard.index', 'uses' => 'DashboardController@index']);
    get('/riders/index', ['as' => 'riders.index', 'uses' => 'RiderController@index']);
    get('/riders/create', ['as' => 'rider.create', 'uses' => 'RiderController@create']);
    get('/riders/show/{rider}', ['as' => 'rider.show', 'uses' => 'RiderController@show']);
    get('/riders/edit/{rider}', ['as' => 'rider.edit', 'uses' => 'RiderController@edit']);
    get('/riders/delete{rider}', ['as' => 'rider.delete', 'uses' => 'RiderController@delete']);
    get('/subscription/delete/{subscription}', ['as' => 'subscription.delete', 'uses' => 'SubscriptionController@delete']);
});


/**
 * Unauthenticated group
 */
Route::group(['middleware' => 'guest'], function() {
    post('/user/sign-in', ['as' => 'user.signed-in', 'uses' => 'UserController@postSignin']);
    post('/user/forgot-password', ['as' => 'user.recover-password.post', 'uses' => 'UserController@postRecoverPassword']);
    get('/user/sign-in', ['as' => 'user.sign-in', 'uses' => 'UserController@getSignin']);
    get('/user/activate/{code}', ['as' => 'user.activate', 'uses' => 'UserController@create']);
    get('/user/forgot-password', ['as' => 'user.recover-password', 'uses' => 'UserController@recoverPassword']);
    get('/user/recover/{code}', ['as' => 'user.recover-password.code', 'uses' => 'UserController@recover']);
});

Route::get('/sitemap', function()
{
    $file = public_path(). "/download/sitemap.xml";  // <- Replace with the path to your .xml file
    if (file_exists($file)) {
        $content = file_get_contents($file);
        return Response::make($content, 200, ['content-type'=>'application/xml']);
    }
});
