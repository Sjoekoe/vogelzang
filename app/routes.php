<?php 

/**
 * Acces for everybody
 */
Route::group(array('before' => 'csrf'), function() {
	Route::post('/contact', array('as' => 'contacts.store', 'uses' => 'ContactsController@store')); // Contact Page (POST)
});

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index')); // Homepage
Route::get('/horses', array('as' => 'horses.index', 'uses' => 'HorsesController@index')); // Te Koop pagina
Route::get('/horses/show/{id}', array('as' => 'horses.show', 'uses' => 'HorsesController@show')); // Show Horse
Route::get('/accomodation', array('as' => 'home.accomodation', 'uses' => 'HomeController@accomodation')); // Accomodation page
Route::get('/manege', array('as' => 'home.manege', 'uses' => 'HomeController@manege'));
Route::get('/contact', array('as' => 'contacts.create', 'uses' => 'ContactsController@create')); // Contact page
Route::get('/about', array('as' => 'home.about', 'uses' => 'HomeController@about')); // About Page
Route::get('/news', array('as' => 'items.index', 'uses' => 'ItemsController@index')); // News Page
Route::get('/news/show/{id}', array('as' => 'items.show', 'uses' => 'ItemsController@show')); // Show NewsItem

/**
 * Authenticated groups
 */
Route::group(array('before' => 'auth'), function() {
	/**
	 * Admin Group
	 */
	Route::group(array('before' => 'admin'), function() {
		/**
		 * Admin CSRF Group
		 */
		Route::group(array('before' => 'csrf'), function() {
			Route::post('/admin/users/create', array('as' => 'accounts.store', 'uses' => 'AccountController@store')); //Create User (POST)
			Route::patch('/admin/users/edit/{id}', array('as' => 'accounts.update',	'uses' => 'AccountController@update')); //Update User (PATCH)
			Route::post('/admin/horses/create', array('as' => 'horses.store', 'uses' => 'HorsesController@store')); // Create Horse (POST)
			Route::patch('/admin/horses/edit/{id}', array('as' => 'horses.update', 'uses' => 'HorsesController@update')); // Update Horse (PATCH)
			Route::post('/admin/news/create', array('as'=> 'items.store', 'uses' => 'ItemsController@store')); // Creates a news item
			Route::patch('/admin/news/edit/{id}', array('as' => 'items.update', 'uses' => 'ItemsController@update')); // Updates a news item
		}); // END CSRF GROUP

		Route::get('/admin', array('as' => 'admin.index', 'uses' => 'HomeController@admin')); // Admin Dashboard (GET)
		/**
		 * Users
		 */
		Route::get('/admin/users/', array('as' => 'accounts.index',	'uses' => 'AccountController@index')); // Show Users Table (GET)
		Route::get('/admin/users/show/{id}', array('as' => 'accounts.show',	'uses' => 'AccountController@show')); // Show Single User (GET)
		Route::get('/admin/users/create', array('as' => 'accounts.create', 'uses' => 'AccountController@create')); // Create a new user (GET)
		Route::get('/admin/users/edit/{id}', array('as' => 'accounts.edit',	'uses' => 'AccountController@edit')); // Edit User (GET)
		route::get('/admin/users/delete/{id}', array('as' => 'accounts.destroy', 'uses' => 'AccountController@destroy')); // Delete User(GET)
		/**
		 * Horses
		 */
		Route::get('/admin/horses', array('as' => 'horses.admin.index',	'uses' => 'HorsesController@indexAdmin')); // Show horses table (GET)
		Route::get('/admin/horses/show/{id}', array('as' => 'horses.admin.show', 'uses' => 'HorsesController@showAdmin')); // Show single horse (GET)
		Route::get('/admin/horses/create', array('as' => 'horses.create', 'uses' => 'HorsesController@create')); // Create Horse (GET)
		Route::get('/admin/horses/edit/{id}', array('as' => 'horses.edit', 'uses' => 'HorsesController@edit')); // Edit Horse (GET)
		Route::get('/admin/horses/destroy/{id}', array('as' => 'horses.destroy', 'uses' => 'HorsesController@destroy')); // Delete Horse (GET)
		Route::get('/admin/horses/destroyPhoto/{id}', array('as' => 'horsephoto.destroy', 'uses' => 'HorsesController@destroyPicture')); // Deletes a single picture (GET)
		/**
		 * News items
		 */
		Route::get('/admin/news', array('as' => 'items.admin.index', 'uses' => 'ItemsController@indexAdmin')); // Show newsitems table(GET)
		Route::get('/admin/news/create', array('as' => 'items.create', 'uses' => 'ItemsController@create')); // Creates a news item (GET)
		Route::get('/admin/news/{id}', array('as' => 'items.admin.show', 'uses' => 'ItemsController@showAdmin')); // Shows a newsitem (GET)
		Route::get('/admin/news/edit/{id}', array('as' => 'items.edit', 'uses' => 'ItemsController@edit')); //Edit a news item (GET)
		Route::get('/admin/news/destroy/{id}', array('as' => 'items.destroy', 'uses' => 'ItemsController@destroy')); // Deletes a news item (GET)
		Route::get('/admin/news/destroyPhoto/{id}', array('as' => 'itemphoto.destroy', 'uses' => 'ItemsController@destroyPhoto')); // Deletes a photo of a news item (GET)
		/**
		 * Contact form messages
		 */
		Route::get('/admin/contacts', array('as' => 'contacts.index', 'uses' => 'ContactsController@index')); // Show all messages (GET)
		Route::get('/admin/contacts/show/{id}', array('as' => 'contacts.show', 'uses' => 'ContactsController@show')); // Show the contact form message (GET)
		Route::get('/admin/contacts/destroy/{id}', array('as' => 'contacts.destroy', 'uses' => 'ContactsController@destroy')); // Deletes a message (GET)
	}); // END ADMIN GROUP

	/**
	 * Users CSRF protection group
	 */
	Route::group(array('before' => 'csrf'), function() {
		Route::patch('/user/edit/{id}', array('as' => 'user.update', 'uses' => 'UserController@update')); // Update Profile (PATCH)
		Route::patch('/user/change-password', array('as' => 'user.update.password',	'uses' => 'UserController@updatePassword')); // Change password (PATCH)
	}); // END CSRF GROUP

	Route::get('/user/edit', array('as' => 'user.edit',	'uses' => 'UserController@edit')); // Edit User
	Route::get('/user/change-password', array('as' => 'user.edit.password',	'uses' => 'UserController@editPassword')); // Change password (GET)
	Route::get('/user/show/{username}', array('as' => 'user.show', 'uses' => 'UserController@show')); // Show Profile (GET)
	Route::get('/sign-out', array('as' => 'user.sign-out', 'uses' => 'UserController@getSignOut')); // Sign out (GET)
}); // END AUTHENTICATED GROUP


/**
 * Unauthenticated group
 */
Route::group(array('before' => 'guest'), function() {
	/**
	 * CSRF protection group
	 */
	Route::group(array('before' => 'csrf'), function() {
		Route::post('/user/sign-in', array('as' => 'user.signed-in', 'uses' => 'UserController@postSignin')); // Sign in (POST)
		Route::post('/user/forgot-password', array('as' => 'user.recover-password.post', 'uses' => 'UserController@postRecoverPassword')); // Recover password (POST)
	}); // END CSRF GROUP
	Route::get('/user/sign-in', array('as' => 'user.sign-in', 'uses' => 'UserController@getSignin')); // Sign In (GET)
	Route::get('/user/activate/{code}', array('as' => 'user.activate', 'uses' => 'UserController@create')); // Activate account (GET)
	Route::get('/user/forgot-password', array('as' => 'user.recover-password', 'uses' => 'UserController@recoverPassword')); // Recover password (GET)
	Route::get('/user/recover/{code}', array('as' => 'user.recover-password.code', 'uses' => 'UserController@recover')); //Recover password code (GET)
}); // END UNAUTHENTICATED GROUP

 ?>