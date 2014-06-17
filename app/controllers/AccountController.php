<?php

class AccountController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::orderBy('username', 'asc')->paginate(7);
		return View::make('admin.accounts.index', compact('users'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		return View::make('admin.accounts.create');

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), 
			array(
				'email' 			=> 'required|email|max:50|unique:users',
				'username' 			=> 'required|max:20|min:3|unique:users'
			)
		);

		if ($validator->fails()) {
			return 	Redirect::route('accounts.create')
					->withErrors($validator)
					->withInput();
		} else {
			$email 		= Input::get('email');
			$username 	= Input::get('username');
			
			$password 	= str_random(10);

			// Activation code
			$code 		= str_random(60);

			$user = User::create(array(
				'email' 		=> $email,
				'username' 		=> $username,
				'password' 		=> Hash::make($password),
				'code'			=> $code,
				'level_id'		=> Input::get('level_id'),
				'active'		=> 0
			));

			if ($user) {
				Mail::send('emails.auth.activate', array(
					'link'		=> URL::route('user.activate', $code),
					'username'	=> $username,
					'password'	=> $password
				), function($message) use ($user) {
					$message->to($user->email, $user->username)->subject('Uw vogelzang account');
				});

				return 	Redirect::route('accounts.create')
						->with('global', 'Account is aangemaakt');
			} else {
				return Redirect::route('accounts.create')->with('global', 'Account kon niet worden aangemaakt');
			}
		}

		return Redirect::route('accounts.create')->with('global', 'Er heeft zich een probleem voorgedaan bij het aanmaken van een account. Probeer later nog eens.');
		
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::find($id);
		return View::make('admin.accounts.show', compact('user'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::where('id', '=', $id);
		if ($user->count()) {
			$user = $user->first();
			return View::make('admin.accounts.edit', compact('user'));
		}
		return View::make('admin.accounts.index')->with('global', 'Deze gebruiker bestaat niet.');
		
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::findOrFail($id);
		$user->username 	= Input::get('username');
		$user->email 		= Input::get('email');
		$user->first_name 	= Input::get('first_name');
		$user->last_name	= Input::get('last_name');
		$user->level_id		= Input::get('level_id');
		if ($user->save()) {
			return Redirect::route('accounts.index', $user->id)->with('global', 'De gegevens zijn aangepast');
		}
		return Redirect::route('accounts.edit', $user->id)->with('global', 'Er is een fout opgetreden bij het aanpassen van de gegevens.');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::find($id);

		if ($user != Auth::user()) {
			if ($user->delete()) {
				return Redirect::route('accounts.index')->with('global', 'De gebruiker is verwijderd');
			} else {
				return Redirect::route('accounts.index')->with('global', 'Er heeft zich een probleem voorgedaan bij het verwijderen van de persoon.');
			}
		} else {
			return Redirect::route('accounts.index')->with('global', 'Je kan jezelf niet verwijderen');
		}

		return Redirect::route('accounts.index')->with('global', 'Deze gebruiker kon niet worden verwijderd.');
	}


}
