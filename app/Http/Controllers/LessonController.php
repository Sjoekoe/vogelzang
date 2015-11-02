<?php
namespace Vogelzang\Http\Controllers;

use Vogelzang\Models\Lesson;
use Vogelzang\Models\Rider;
use Vogelzang\Models\Roster;

class LessonController extends Controller
{
    /**
     * @param \Vogelzang\Models\Roster $roster
     * @param \Vogelzang\Models\Rider $rider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Roster $roster, Rider $rider)
    {
        Lesson::create([
            'roster_id' => $roster->id,
            'rider_id' => $rider->id,
        ]);

        session()->put('success', 'Les aangemaakt.');

        return redirect()->route('roster.show', $roster->id);
    }

    /**
     * @param \Vogelzang\Models\Lesson $lesson
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Lesson $lesson)
    {
        $lesson->delete();

        session()->put('succes', 'Les verwijderd.');

        return back();
    }
}
