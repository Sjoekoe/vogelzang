<?php 

/**
 * Acces for everybody
 */
Route::group(['before' => 'csrf'], function() {
	Route::post('/contact', ['as' => 'contacts.store', 'uses' => 'ContactsController@store']); // Contact Page (POST)
});

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']); // Homepage
Route::get('/horses', ['as' => 'horses.index', 'uses' => 'HorsesController@index']); // Te Koop pagina
Route::get('/horses/show/{id}', ['as' => 'horses.show', 'uses' => 'HorsesController@show']); // Show Horse
Route::get('/accomodation', ['as' => 'home.accomodation', 'uses' => 'HomeController@accomodation']); // Accomodation page
Route::get('/manege', ['as' => 'home.manege', 'uses' => 'HomeController@manege']);
Route::get('/contact', ['as' => 'contacts.create', 'uses' => 'ContactsController@create']); // Contact page
Route::get('/about', ['as' => 'home.about', 'uses' => 'HomeController@about']); // About Page
Route::get('/news', ['as' => 'items.index', 'uses' => 'ItemsController@index']); // News Page
Route::get('/news/show/{id}', ['as' => 'items.show', 'uses' => 'ItemsController@show']); // Show NewsItem

/**
 * Authenticated groups
 */
Route::group(['before' => 'auth'], function() {
	/**
	 * Admin Group
	 */
	Route::group(['before' => 'admin'], function() {
		/**
		 * Admin CSRF Group
		 */
		Route::group(['before' => 'csrf'], function() {
			Route::post('/admin/users/create', ['as' => 'accounts.store', 'uses' => 'AccountController@store']); //Create User (POST)
			Route::patch('/admin/users/edit/{id}', ['as' => 'accounts.update',	'uses' => 'AccountController@update']); //Update User (PATCH)
			Route::post('/admin/horses/create', ['as' => 'horses.store', 'uses' => 'HorsesController@store']); // Create Horse (POST)
			Route::patch('/admin/horses/edit/{id}', ['as' => 'horses.update', 'uses' => 'HorsesController@update']); // Update Horse (PATCH)
			Route::post('/admin/news/create', ['as'=> 'items.store', 'uses' => 'ItemsController@store']); // Creates a news item
			Route::patch('/admin/news/edit/{id}', ['as' => 'items.update', 'uses' => 'ItemsController@update']); // Updates a news item
            Route::post('/admin/contacts/show/{id}', ['as' => 'contacts.update', 'uses' => 'ContactsController@update']);
            Route::post('/admin/ponies/create', ['as' => 'pony.store', 'uses' => 'PonyController@store']);
            Route::patch('/admin/ponies/edit/{id}', ['as' => 'pony.update', 'uses' => 'PonyController@update']);
            Route::post('/roster/create', ['as' => 'roster.store', 'uses' => 'RosterController@store']);
            Route::patch('/roster/edit/{id}', ['as' => 'roster.update', 'uses' => 'RosterController@update']);
            Route::post('/roster/{roster}/lesson/create/{rider}', ['as' => 'lesson.create', 'uses' => 'LessonController@store']);
		}); // END CSRF GROUP

		Route::get('/admin', ['as' => 'admin.index', 'uses' => 'HomeController@admin']); // Admin Dashboard (GET)
		/**
		 * Users
		 */
		Route::get('/admin/users/', ['as' => 'accounts.index',	'uses' => 'AccountController@index']); // Show Users Table (GET)
		Route::get('/admin/users/show/{id}', ['as' => 'accounts.show',	'uses' => 'AccountController@show']); // Show Single User (GET)
		Route::get('/admin/users/create', ['as' => 'accounts.create', 'uses' => 'AccountController@create']); // Create a new user (GET)
		Route::get('/admin/users/edit/{id}', ['as' => 'accounts.edit',	'uses' => 'AccountController@edit']); // Edit User (GET)
		route::get('/admin/users/delete/{id}', ['as' => 'accounts.destroy', 'uses' => 'AccountController@destroy']); // Delete User(GET)
		/**
		 * Horses
		 */
		Route::get('/admin/horses', ['as' => 'horses.admin.index',	'uses' => 'HorsesController@indexAdmin']); // Show horses table (GET)
		Route::get('/admin/horses/show/{id}', ['as' => 'horses.admin.show', 'uses' => 'HorsesController@showAdmin']); // Show single horse (GET)
		Route::get('/admin/horses/create', ['as' => 'horses.create', 'uses' => 'HorsesController@create']); // Create Horse (GET)
		Route::get('/admin/horses/edit/{id}', ['as' => 'horses.edit', 'uses' => 'HorsesController@edit']); // Edit Horse (GET)
		Route::get('/admin/horses/destroy/{id}', ['as' => 'horses.destroy', 'uses' => 'HorsesController@destroy']); // Delete Horse (GET)
		Route::get('/admin/horses/destroyPhoto/{id}', ['as' => 'horsephoto.destroy', 'uses' => 'HorsesController@destroyPicture']); // Deletes a single picture (GET)
		/**
		 * News items
		 */
		Route::get('/admin/news', ['as' => 'items.admin.index', 'uses' => 'ItemsController@indexAdmin']); // Show newsitems table(GET)
		Route::get('/admin/news/create', ['as' => 'items.create', 'uses' => 'ItemsController@create']); // Creates a news item (GET)
		Route::get('/admin/news/{id}', ['as' => 'items.admin.show', 'uses' => 'ItemsController@showAdmin']); // Shows a newsitem (GET)
		Route::get('/admin/news/edit/{id}', ['as' => 'items.edit', 'uses' => 'ItemsController@edit']); //Edit a news item (GET)
		Route::get('/admin/news/destroy/{id}', ['as' => 'items.destroy', 'uses' => 'ItemsController@destroy']); // Deletes a news item (GET)
		Route::get('/admin/news/destroyPhoto/{id}', ['as' => 'itemphoto.destroy', 'uses' => 'ItemsController@destroyPhoto']); // Deletes a photo of a news item (GET)
		/**
		 * Contact form messages
		 */
		Route::get('/admin/contacts', ['as' => 'contacts.index', 'uses' => 'ContactsController@index']); // Show all messages (GET)
		Route::get('/admin/contacts/show/{id}', ['as' => 'contacts.show', 'uses' => 'ContactsController@show']); // Show the contact form message (GET)
		Route::get('/admin/contacts/destroy/{id}', ['as' => 'contacts.destroy', 'uses' => 'ContactsController@destroy']); // Deletes a message (GET)

        /** Pony's */
        Route::get('/admin/ponies', ['as' => 'ponys.index', 'uses' => 'PonyController@index']);
        Route::get('/admin/ponies/create', ['as' => 'pony.create', 'uses' => 'PonyController@create']);
        Route::get('/admin/ponies/edit/{id}', ['as' => 'pony.edit', 'uses' => 'PonyController@edit']);
        Route::get('/admin/ponies/delete/{id}', ['as' => 'pony.delete', 'uses' => 'PonyController@delete']);

        /** Rosters */
        Route::get('/rosters/create', ['as' => 'roster.create', 'uses' => 'RosterController@create']);
        Route::get('/roster/edit/{id}', ['as' => 'roster.edit', 'uses' => 'RosterController@edit']);
        Route::get('/roster/delete/{id}', ['as' => 'roster.delete', 'uses' => 'RosterController@delete']);
        Route::get('/roster/detail/{roster}/{hour}', ['as' => 'roster.detail', 'uses' => 'RosterController@detail']);

        /** Lessons */
        Route::get('lesson/delete/{lesson}', ['as' => 'lesson.delete', 'uses' => 'LessonController@delete']);

	}); // END ADMIN GROUP

	/**
	 * Users CSRF protection group
	 */
	Route::group(['before' => 'csrf'], function() {
		Route::patch('/user/edit/{id}', ['as' => 'user.update', 'uses' => 'UserController@update']); // Update Profile (PATCH)
		Route::patch('/user/change-password', ['as' => 'user.update.password',	'uses' => 'UserController@updatePassword']); // Change password (PATCH)
        Route::post('/riders/create', ['as' => 'rider.store', 'uses' => 'RiderController@store']);
        Route::patch('/riders/edit/{id}', ['as' => 'rider.update', 'uses' => 'RiderController@update']);
        Route::post('/subscription/create/{roster}', ['as' => 'subscription.store', 'uses' => 'SubscriptionController@store']);
	}); // END CSRF GROUP

	Route::get('/user/edit', ['as' => 'user.edit',	'uses' => 'UserController@edit']); // Edit User
	Route::get('/user/change-password', ['as' => 'user.edit.password',	'uses' => 'UserController@editPassword']); // Change password (GET)
	Route::get('/user/show/{username}', ['as' => 'user.show', 'uses' => 'UserController@show']); // Show Profile (GET)
	Route::get('/sign-out', ['as' => 'user.sign-out', 'uses' => 'UserController@getSignOut']); // Sign out (GET)

    Route::get('/rosters/index', ['as' => 'rosters.index', 'uses' => 'RosterController@index']);
    Route::get('/roster/show/{id}', ['as' => 'roster.show', 'uses' => 'RosterController@show']);
    Route::get('/dashboard', ['as' => 'dashboard.index', 'uses' => 'dashboardController@index']);
    Route::get('/riders/index', ['as' => 'riders.index', 'uses' => 'RiderController@index']);
    Route::get('/riders/create', ['as' => 'rider.create', 'uses' => 'RiderController@create']);
    Route::get('/riders/edit/{id}', ['as' => 'rider.edit', 'uses' => 'RiderController@edit']);
    Route::get('/riders/delete{id}', ['as' => 'rider.delete', 'uses' => 'RiderController@delete']);
    Route::get('/subscription/delete/{id}', ['as' => 'subscription.delete', 'uses' => 'SubscriptionController@delete']);
}); // END AUTHENTICATED GROUP


/**
 * Unauthenticated group
 */
Route::group(['before' => 'guest'], function() {
	/**
	 * CSRF protection group
	 */
	Route::group(['before' => 'csrf'], function() {
		Route::post('/user/sign-in', ['as' => 'user.signed-in', 'uses' => 'UserController@postSignin']); // Sign in (POST)
		Route::post('/user/forgot-password', ['as' => 'user.recover-password.post', 'uses' => 'UserController@postRecoverPassword']); // Recover password (POST)
	}); // END CSRF GROUP
	Route::get('/user/sign-in', ['as' => 'user.sign-in', 'uses' => 'UserController@getSignin']); // Sign In (GET)
	Route::get('/user/activate/{code}', ['as' => 'user.activate', 'uses' => 'UserController@create']); // Activate account (GET)
	Route::get('/user/forgot-password', ['as' => 'user.recover-password', 'uses' => 'UserController@recoverPassword']); // Recover password (GET)
	Route::get('/user/recover/{code}', ['as' => 'user.recover-password.code', 'uses' => 'UserController@recover']); //Recover password code (GET)
}); // END UNAUTHENTICATED GROUP

Route::get('/sitemap', function()
{
    $file = public_path(). "/download/sitemap.xml";  // <- Replace with the path to your .xml file
    if (file_exists($file)) {
        $content = file_get_contents($file);
        return Response::make($content, 200, ['content-type'=>'application/xml']);
    }
});
