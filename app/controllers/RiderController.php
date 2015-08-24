<?php 
 
class RiderController extends \BaseController
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $riders = Rider::where('user_id', Auth::user()->id)->get();

        return View::make('riders.index', compact('riders'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return View::make('riders.create');
    }

    /**
     * @return \Illuminate\Http\RedirectReponse
     */
    public function store()
    {
        $validator = Validator::make(Input::all(), [
            'firstname' => 'required',
            'lastname' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::route('riders.index')->withErrors($validator)->withInput();
        }

        Rider::create([
            'firstname' => Input::get('firstname'),
            'lastname' => Input::get('lastname'),
            'user_id' => Auth::user()->id,
        ]);

        return Redirect::route('riders.index')->with('global', 'Ruiter is aangemaakt');
    }

    /**
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $rider = $this->initRider($id);

        return View::make('riders.edit', compact('rider'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id)
    {
        $validator = Validator::make(Input::all(), [
            'firstname' => 'required',
            'lastname' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::route('riders.index')->withErrors($validator)->withInput();
        }

        $rider = $this->initRider($id);

        $rider->firstname = Input::get('firstname');
        $rider->lastname = Input::get('lastname');
        $rider->save();

        return Redirect::route('riders.index')->with('global', 'Ruiter is aangepast');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $rider = $this->initRider($id);

        $rider->delete();

        return Redirect::route('riders.index')->with('global', 'ruiter verwijderd');
    }

    /**
     * @param int $id
     * @return \Rider
     */
    private function initRider($id)
    {
        $rider = Rider::findOrFail($id);

        if ($rider->user_id !== Auth::user()->id) {
            App::abort(403);
        }

        return $rider;
    }
}