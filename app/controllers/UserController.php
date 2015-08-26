<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($code)
	{
		$user = User::where('code', '=', $code)->where('active', '=', 0);

		if ($user->count()) {
			$user = $user->first();
			// Update user to active state
			$user->active 	= 1;
			$user->code 	= '';
			if ($user->save()) {
				return 	Redirect::route('home')
						->with('global', 'Geactiveerd, U kan nu gebruik maken van onze leden pagina. Veel plezier.');
			}
		}

		return 	Redirect::route('home')
				->with('global', 'Er is een fout opgetreden bij het activeren van uw account. Probeer later nog eens.')	;
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($username)
	{
		$user = User::where('username', '=', $username);

		if ($user->count()) {
			$user = $user->first();
			return View::make('users.show', compact('user'));
		}

		return App::abort(404);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit()
	{
		$user = User::find(Auth::user()->id);

		return View::make('users.edit', compact('user'));
	}

	public function editPassword() {
		$user = User::find(Auth::user()->id);

		return View::make('users.editPassword', compact('user'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
        $validator = Validator::make(Input::all(), [
            'email' => 'required|email|max:50|unique:users,email,' . Auth::user()->id,
            'username' => 'required|max:20|min:3|unique:users,username,' . Auth::user()->id,
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }

        $user = User::findOrFail(Auth::user()->id);
        $user->fill(Input::all());
        $user->save();

		return Redirect::route('user.edit')->with('global', 'Je gegevens zijn aangepast');
	}

	public function updatePassword() {

		$user = User::findOrFail(Auth::user()->id);
		$validator = Validator::make(Input::all(),
			array(
				'old_password'		=> 'required',
				'password'			=> 'required|min:6',
				'password_again'	=> 'required|same:password'
			)
		);

		if ($validator->fails()) {
			return Redirect::route('user.edit.password', $user->id)->withErrors($validator);
		} else {
			$old_password = Input::get('old_password');
			$password = Input::get('password');
			if (Hash::check($old_password, $user->getAuthPassword())) {
				$user->password = Hash::make($password);

				if ($user->save()) {
					if ($user->isAdmin()) {
						return Redirect::route('admin.index')->with('global', 'Wachtwoord is gewijzigd');
					} else {
						return Redirect::route('dashboard.index')->with('global', 'Wachtwoord is geweizigd');
					}
				} else {
					return Redirect::route('user.edit.password')->with('global', 'Het oude wachtwoord is incorrect');
				}
			}
		}
		return Redirect::route('user.edit.password')->with('global', 'Uw wachtwoord kon niet worden gewijzigd.');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function getSignin() {
		return View::make('users.signin')->with('title', 'Sign in');
	}

	public function postSignin() {
		$validator = Validator::make(Input::all(),
			array(
				'username' => 'required',
				'password' => 'required'
			)
		);

		if ($validator->fails()) {
			return 	Redirect::route('user.sign-in')
					->withErrors($validator)
					->withInput();
		} else {

			$remember = (Input::has('remember')) ? true : false;

			$auth = Auth::attempt(array(
				'username' 	=> Input::get('username'),
				'password' 	=> Input::get('password'),
				'active' 	=> 1
			), $remember);

			if ($auth) {
                if (Auth::user()->isAdmin()) {
                    return Redirect::intended('/admin')->with('global', 'Je bent nu ingelogd');
                } else {
                    return Redirect::intended('/dashboard')->with('global', 'Je bent nu ingelogd');
                }
			} else {
				return Redirect::route('user.sign-in')->with('global', 'Gebruikersnaam/wachtwoord incorrect, Of uw account is nog niet geactiveerd.');
			}
		}

		return Redirect::route('user.sign-in')->with('global', 'Er is een probleem opgetreden bij het inloggen. Is uw account geactiveerd?');
	}

	public function getSignOut() {
		Auth::logout();
		return Redirect::route('home')->with('global', 'Je bent uitgelogd');
	}

	public function recoverPassword() {
		return View::make('users.forgot')->with('title', 'Wachtwoord vergeten');
	}

	public function postRecoverPassword() {
		$validator = Validator::make(Input::all(),
			array(
				'email' => 'required|email'
			)
		);

		if ($validator->fails()) {
			return Redirect::route('user.recover-password')->withErrors($validator)->withInput();
		} else {
			$user = User::where('email', '=', Input::get('email'));

			if ($user->count()) {
				$user 					= $user->first();

				// Generate code & password
				$code 					= str_random(60);
				$password 				= str_random(10);

				$user->code 			= $code;
				$user->password_temp 	= Hash::make($password);

				if ($user->save()) {
					Mail::send('emails.auth.recover', array(
						'url' => URL::route('user.recover-password.code', $code),
						'username' => $user->username,
						'password' => $password
					), function($message) use ($user) {
						$message	->to($user->email, $user->username)
									->subject('Uw nieuw wachtwoord');
					});

					return Redirect::route('user.recover-password')->with('global', 'Uw nieuw wachtwoord is aangevraagd');
				}
			}
		}
		return Redirect::route('user.recover-password')->with('global', 'U kon geen nieuw wachtwoord aanvragen');
	}

	public function recover($code) {
		$user = User::where('code', '=', $code)->where('password_temp', '!=', '');
		if ($user->count()) {
			$user = $user->first();

			$user->password 		= $user->password_temp;
			$user->password_temp 	= '';
			$user->code 			= '';

			if ($user->save()) {
				return Redirect::route('home')->with('global', 'Uw account is hersteld. Gelieve in te loggen met uw nieuw wachtwoord.');
			}
		}

		return Redirect::route('home')->with('global', 'We hebben u account niet kunnen herstellen');
	}


}
