<?php 
 
class RosterController extends \BaseController
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $today = new \DateTime();
        $today->sub(new \DateInterval('P1D'));

        $rosters = Roster::where('date', '>', $today)->orderBy('date')->paginate(10);

        return View::make('rosters.index', compact('rosters'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return View::make('rosters.create');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validator = Validator::make(Input::all(), [
            'name' => 'required',
            'date' => 'required|date_format:d/m/Y'
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        Roster::create([
            'name' => input::get('name'),
            'date' => DateTime::createFromFormat('d/m/Y', Input::get('date')),
            'type' => Input::get('type'),
            'description' => Input::get('description'),
        ]);

        return Redirect::route('rosters.index')->with('global', 'Lesdag aangemaakt');
    }

    /**
     * @param int $id
     */
    public function show($id)
    {

    }

    /**
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $roster = Roster::findOrFail($id);

        return View::make('rosters.edit', compact('roster'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id)
    {
        $roster = Roster::findOrFail($id);

        $validator = Validator::make(Input::all(), [
            'name' => 'required',
            'date' => 'required|date_format:d/m/Y'
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $roster->name = Input::get('name');
        $roster->date = DateTime::createFromFormat('d/m/Y', Input::get('date'));
        $roster->type = Input::get('type');
        $roster->description = Input::get('description');
        $roster->save();

        return Redirect::route('rosters.index')->with('global','Lesdag aangepast');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $roster = Roster::findOrFail($id);

        $roster->delete();

        return Redirect::route('rosters.index')->with('global', 'Lesdag verwijderd.');
    }
}