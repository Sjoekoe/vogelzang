<?php
namespace Vogelzang\Http\Controllers;

use Hash;
use Mail;
use Vogelzang\Http\Requests\StoreAccountRequest;
use Vogelzang\Http\Requests\UpdateAccountRequest;
use Vogelzang\User;

class AccountController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::orderBy('username', 'asc')->paginate(20);

        return view('admin.accounts.index', compact('users'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.accounts.create');
    }

    /**
     * @param \Vogelzang\Http\Requests\StoreAccountRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreAccountRequest $request)
    {
        $email = $request->get('email');
        $username = $request->get('username');
        $code = str_random(60);
        $password = 'vogelzang';

        $user = User::create([
            'email' => $email,
            'username' => $username,
            'password' => Hash::make($password),
            'code' => $code,
            'level_id' => $request->get('level_id'),
            'active' => false,
        ]);

        Mail::send('emails.auth.activate', [
            'link' => route('user.activate', $code),
            'username' => $username,
            'password' => $password,
        ], function($message) use ($user) {
            $message->to($user->email, $user->username)->subject('Uw vogelzang account.');
        });

        return redirect()->route('accounts.create')->with('global', 'Account is aangemaakt');
    }

    /**
     * @param \Vogelzang\Models\User $user
     * @return \Illuminate\View\View
     */
    public function show(User $user)
    {
        return view('admin.accounts.show', compact('user'));
    }

    /**
     * @param \Vogelzang\Models\User $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('admin.accounts.edit', compact('user'));
    }

    /**
     * @param \Vogelzang\Http\Requests\UpdateAccountRequest $request
     * @param \Vogelzang\Models\User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateAccountRequest $request, User $user)
    {
        $user->username = $request->get('username');
        $user->email = $request->get('email');
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->level_id = $request->get('level_id');
        $user->save();

        return redirect()->route('accounts.index', $user->id)->with('global', 'De gegevens zijn aangepast');
    }

    /**
     * @param \Vogelzang\Models\User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        if ($user->id == auth()->user()->id) {
            return redirect('accounts.index')->with('global', 'Je kan jezelf niet verwijderen');
        }

        $user->delete();

        return redirect()->route('accounts.index', 'De gebruiker is verwijderd.');
    }
}
