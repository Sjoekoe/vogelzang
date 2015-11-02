<?php
namespace Vogelzang\Http\Controllers;

use Vogelzang\Http\Requests\PonyRequest;
use Vogelzang\Models\Pony;

class PonyController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $ponies = Pony::orderBy('name')->get();

        return view('ponies.index', compact('ponies'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('ponies.create');
    }

    /**
     * @param \Vogelzang\Http\Requests\PonyRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PonyRequest $request)
    {
        $pony = Pony::create([
            'name' => $request->get('name'),
        ]);

        return redirect()->route('ponys.index')->with('global', $pony->name . ' is opgeslagen.');
    }

    /**
     * @param \Vogelzang\Models\Pony $pony
     * @return \Illuminate\View\View
     */
    public function edit(Pony $pony)
    {
        return view('ponies.edit', compact('pony'));
    }

    /**
     * @param \Vogelzang\Http\Requests\PonyRequest $request
     * @param \Vogelzang\Models\Pony $pony
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PonyRequest $request, Pony $pony)
    {
        $pony->name = $request->get('name');
        $pony->save();

        return redirect()->route('ponys.index')->with('global', $pony->name . ' is aangepast.');
    }

    /**
     * @param \Vogelzang\Models\Pony $pony
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Pony $pony)
    {
        $name = $pony->name;

        $pony->delete();

        return redirect()->route('ponys.index')->with('global', $name . ' is verwijderd.');
    }
}
