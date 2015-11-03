<?php
namespace Vogelzang\Http\Controllers;

use Vogelzang\Http\Requests\RiderRequest;
use Vogelzang\Models\Rider;

class RiderController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (auth()->user()->isAdmin()) {
            $riderCount = count(Rider::all());
            $riders = Rider::orderBy('firstname', 'ASC')->paginate(20);
        } else {
            $riders = Rider::where('user_id', auth()->user()->id)->paginate(20);
        }

        return view('riders.index', compact('riders', 'riderCount'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('riders.create');
    }

    /**
     * @param \Vogelzang\Http\Requests\RiderRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RiderRequest $request)
    {
        Rider::create([
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('riders.index')->with('global', 'Ruiter is aangemaakt');
    }

    /**
     * @param \Vogelzang\Models\Rider $rider
     * @return \Illuminate\View\View
     */
    public function show(Rider $rider)
    {
        return view('riders.show', compact('rider'));
    }

    /**
     * @param \Vogelzang\Models\Rider $rider
     * @return \Illuminate\View\View
     */
    public function edit(Rider $rider)
    {
        $this->initRider($rider);

        return view('riders.edit', compact('rider'));
    }

    /**
     * @param \Vogelzang\Http\Requests\RiderRequest $request
     * @param \Vogelzang\Models\Rider $rider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(RiderRequest $request, Rider $rider)
    {
        $this->initRider($rider);

        $rider->firstname = $request->get('firstname');
        $rider->lastname = $request->get('lastname');

        if ($request->has('turns')) {
            $rider->turns = $request->get('turns');
        }

        $rider->save();

        return redirect()->route('riders.index')->with('global', 'Ruiter is aangemaakt');
    }

    /**
     * @param \Vogelzang\Models\Rider $rider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Rider $rider)
    {
        $this->initRider($rider);

        $rider->delete();

        return redirect()->route('riders.index')->with('global', 'De ruiter is verwijderd.');
    }

    /**
     * @param \Vogelzang\Models\Rider $rider
     */
    private function initRider(Rider $rider)
    {
        if ($rider->user_id !== auth()->user()->id && ! auth()->user()->isAdmin()) {
            abort(403);
        }

        return;
    }
}
