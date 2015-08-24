<?php 
 
class LessonController extends \BaseController
{
    /**
     * @param int $roster
     * @param int $rider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store($roster, $rider)
    {
        $roster = Roster::findOrFail($roster);
        $rider = Rider::findOrFail($rider);

        Lesson::create([
            'roster_id' => $roster->id,
            'rider_id' => $rider->id,
            'pony_id' => Input::get('pony'),
            'hour' => Input::get('hour'),
        ]);

        return Redirect::route('roster.show', $roster->id)->with('global', 'Les aangemaakt');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $lesson = Lesson::findOrFail($id);

        $lesson->delete();

        return Redirect::back();
    }
}