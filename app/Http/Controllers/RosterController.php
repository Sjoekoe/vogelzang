<?php
namespace Vogelzang\Http\Controllers;

use Carbon\Carbon;
use DateTime;
use Vogelzang\Http\Requests\RosterRequest;
use Vogelzang\Models\Lesson;
use Vogelzang\Models\Roster;

class RosterController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $today = Carbon::now()->startOfDay();
        $future = Carbon::now()->addWeeks(4);

        if (auth()->user()->isAdmin()) {
            $rosters = Roster::where('date', '>', $today)
                ->orderBy('date')
                ->orderBy('hour')
                ->paginate(20);
        } else {
            $rosters = Roster::where('date', '>', $today)
                ->where('date', '<', $future)
                ->orderBy('date')
                ->orderBy('hour')
                ->paginate(20);
        }

        return view('rosters.index', compact('rosters'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view ('rosters.create');
    }

    /**
     * @param \Vogelzang\Http\Requests\RosterRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RosterRequest $request)
    {
        Roster::create([
            'name' => $request->get('name'),
            'date' => DateTime::createFromFormat('d/m/Y', $request->get('date')),
            'type' => $request->get('type'),
            'hour' => $request->get('hour'),
            'limit' => $request->get('limit'),
            'description' => $request->get('description'),
        ]);

        return redirect()->route('rosters.index')->with('global', 'Lesdag aangemaakt');
    }

    /**
     * @param \Vogelzang\Models\Roster $roster
     * @return \Illuminate\View\View
     */
    public function show(Roster $roster)
    {
        $riders = [];

        foreach (auth()->user()->riders as $rider) {
            if ($rider->hasNoSubscriptionForRoster($roster)) {
                array_push($riders, $rider);
            }
        }

        return view('rosters.show', compact('roster', 'riders'));
    }

    /**
     * @param \Vogelzang\Models\Roster $roster
     * @return \Illuminate\View\View
     */
    public function edit(Roster $roster)
    {
        return view('rosters.edit', compact('roster'));
    }

    /**
     * @param \Vogelzang\Http\Requests\RosterRequest $request
     * @param \Vogelzang\Models\Roster $roster
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(RosterRequest $request, Roster $roster)
    {
        $roster->name = $request->get('name');
        $roster->date = DateTime::createFromFormat('d/m/Y', $request->get('date'));
        $roster->type = $request->get('type');
        $roster->description = $request->get('description');
        $roster->hour = $request->get('hour');
        $roster->limit = $request->get('limit');
        $roster->save();

        return redirect()->route('rosters.index')->with('global', 'Lesdag aangepast');
    }

    /**
     * @param \Vogelzang\Models\Roster $roster
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Roster $roster)
    {
        $roster->delete();

        return redirect()->route('rosters.index')->with('global', 'Lesdag verwijderd');
    }

    /**
     * @param \Vogelzang\Models\Roster $roster
     * @param int $hour
     * @return \Illuminate\View\View
     */
    public function detail(Roster $roster, $hour)
    {
        $lessons = Lesson::where('roster_id', $roster->id)->where('hour', $hour)->get();

        return view('rosters.detail', compact('roster', 'lessons', 'hour'));
    }
}
