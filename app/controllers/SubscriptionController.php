<?php 
 
class SubscriptionController extends \BaseController
{
    /**
     * @param int $roster
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store($roster)
    {
        $roster = Roster::findOrFail($roster);

        foreach (Input::get('riders') as $rider) {
            Subscription::create([
                'roster_id' => $roster->id,
                'rider_id' => $rider ,
            ]);
        }

        return Redirect::route('roster.show', $roster->id)->with('global', 'Ingeschreven!');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $subscription = Subscription::findorFail($id);

        $rosterId = $subscription->roster->id;

        if ($subscription->lesson()) {
            $subscription->lesson()->delete();
        }

        $subscription->delete();

        return Redirect::route('roster.show', $rosterId)->with('global', 'Uitgeschreven');
    }
}