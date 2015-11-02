<?php
namespace Vogelzang\Http\Controllers;

use Hash;
use Mail;
use Vogelzang\Http\Requests\RecoverPasswordRequest;
use Vogelzang\Http\Requests\SigninRequest;
use Vogelzang\Http\Requests\UpdatePasswordRequest;
use Vogelzang\Http\Requests\UpdateUserRequest;
use Vogelzang\User;

class UserController extends Controller
{
    /**
     * @param string $code
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create($code)
    {
        $user = User::where('code', $code)->where('active', false)->first();

        if (! $user) {
            return redirect()->route('home')->with('global', 'Er is een fout opgetreden bij het activeren van uw account.');
        }

        $user->active = true;
        $user->code = '';
        $user->save();

        return redirect()->route('user.sign-in')
            ->with('global', 'Geactiveerd! U kan nu gebruik maken van onze leden pagina\'s. Veel plezier.');
    }

    /**
     * @param \Vogelzang\Models\User $user
     * @return \Illuminate\View\View
     */
    public function show(User $user)
    {
        return view('users.show', compact($user));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $user = auth()->user();

        return view('users.edit', compact('user'));
    }

    /**
     * @param \Vogelzang\Http\Requests\UpdateUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserRequest $request)
    {
        auth()->user()->fill($request->all());
        auth()->user()->save();

        return redirect()->route('user.edit')->with('global', 'Je gegevens zijn aangepast');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function editPassword()
    {
        $user = auth()->user();

        return view('users.editPassword', compact('user'));
    }

    /**
     * @param \Vogelzang\Http\Requests\UpdatePasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(UpdatePasswordRequest $request)
    {
        $user = auth()->user();

        $old_password = $request->get('old_password');
        $password = $request->get('password');

        if (! Hash::check($old_password, $user->getAuthPassword())) {
            return redirect()->route('user.edit.password')->with('global', 'Het oude wachtwoord is incorrect');
        }

        $user->password = Hash::make($password);
        $user->save();

        if ($user->isAdmin()) {
            return redirect()->route('admin.index')->with('global', 'Wachtwoord is gewijzigd.');
        }

        return redirect()->route('dashboard.index')->with('global', 'Wachtwoord is gewijzigd.');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getSignin()
    {
        return view('users.signin')->with('title', 'Sign in');
    }

    /**
     * @param \Vogelzang\Http\Requests\SigninRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postSignin(SigninRequest $request)
    {
        $remember = $request->get('remember') ? true : false;

        $auth = auth()->attempt([
            'username' => $request->get('username'),
            'password' => $request->get('password'),
            'active' => true,
        ], $remember);

        if (! $auth) {
            return redirect()->route('user.sign-in')
                ->with('global', 'Gebruikersnaam/Wachtwoord incorrect. Of uw account is nog niet geactiveerd.');
        }

        if (auth()->user()->isAdmin()) {
            return redirect()->intended('/admin')->with('global', 'Je bent nu ingelogd.');
        }

        return redirect()->intended('/dashboard')->with('global', 'Je bent nu ingelogd.');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getSignout()
    {
        auth()->logout();

        return redirect()->route('home')->with('global', 'Je bent uitgelogd.');
    }

    /**
     * @param \Vogelzang\Http\Requests\RecoverPasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function recoverPassword(RecoverPasswordRequest $request)
    {
        $user = User::where('email', $request->get('email'))->firtsOrFail();

        $code = str_random(60);
        $password = str_random(10);

        $user->code = $code;
        $user->password_temp = Hash::make($password);

        Mail::send('emails.auth.recover', [
            'url' => route('user.recover-password.code', $code),
            'username' => $user->username,
            'password' => $password,
        ], function ($message) use ($user) {
            $message->to($user->email, $user->username)->subject('Us nieuw wachtwoord');
        });

        return redirect()->route('user.recover-password')->with('global', 'Uw nieuw wachtwoord is aangemaakt.');
    }

    /**
     * @param string $code
     * @return \Illuminate\Http\RedirectResponse
     */
    public function recover($code)
    {
        $user = User::where('code', $code)->where('password_temp', '!=', '')->firstOrFail();

        $user->password = $user->password_temp;
        $user->password_temp = '';
        $user->code = '';
        $user->save();

        return redirect()->route('home')->with('global', 'Uw account is hersteld. Gelieve in te loggen met uw niew wachtwoord.');
    }
}
