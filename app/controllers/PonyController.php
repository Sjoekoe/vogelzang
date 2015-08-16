<?php 
 
class PonyController extends \BaseController
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $ponies = Pony::orderBy('name')->get();

        return View::make('ponies.index', compact('ponies'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return View::make('ponies.create');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validator = Validator::make(Input::all(), ['name' => 'required']);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $pony = Pony::create([
            'name' => Input::get('name'),
        ]);

        return Redirect::route('ponys.index')->with('global', $pony->name . ' is opgeslagen');
    }

    /**
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $pony = Pony::findOrFail($id);

        return View::make('ponies.edit', compact('pony'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id)
    {
        $pony = Pony::findOrFail($id);

        $validator = Validator::make(Input::all(), ['name' => 'required']);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $pony->name = Input::get('name');
        $pony->save();

        return Redirect::route('ponys.index')->with('global', $pony->name . ' is gewijzigd.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $pony = Pony::findOrFail($id);

        $name = $pony->name;

        $pony->delete();

        return Redirect::route('ponys.index')->with('global', $name . ' is verwijderd');
    }
}