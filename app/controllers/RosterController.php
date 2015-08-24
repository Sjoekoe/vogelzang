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
        $roster = Roster::findOrFail($id);

        $riders = [];

        foreach(Auth::user()->riders as $rider) {
            if ($rider->hasNoSubscriptionForRoster($roster)) {
                $subscriptions = $rider->subscriptions->toArray();

                if (empty($subscriptions)) {
                    array_push($riders, $rider);
                } else {
                    foreach ($subscriptions as $subscription) {
                        if ($roster->id !== $subscription['roster_id']) {
                            array_push($riders, $rider);
                        }
                    }
                }
            }
        }

        $lessons = $this->getLessonsHours($roster);

        $ponies = Pony::orderBy('name')->lists('name', 'id');

        return View::make('rosters.show', compact('roster', 'riders', 'ponies', 'lessons'));
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

    /**
     * @param int $roster
     * @param int $hour
     * @return \Illuminate\View\View
     */
    public function detail($roster, $hour)
    {
        $roster = Roster::findOrFail($roster);

        $lessons = Lesson::where('roster_id', $roster->id)->where('hour', $hour)->get();

        return View::make('rosters.detail', compact('roster', 'lessons', 'hour'));
    }

    /**
     * @param \Roster $roster
     * @return array
     */
    private function getLessonsHours(Roster $roster)
    {
        $lessons = Lesson::where('roster_id', $roster->id)->orderBy('hour', 'ASC')->get();

        $result = [];

        foreach ($lessons as $lesson) {
            if (! in_array($lesson->hour, $result)) {
                array_push($result, $lesson->hour);
            }
        }

        return $result;
    }
}