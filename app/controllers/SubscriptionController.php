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

        $count = count($roster->subscriptions);

        foreach (Input::get('riders') as $rider) {
            if ($count <= $roster->limit) {
                Subscription::create([
                    'roster_id' => $roster->id,
                    'rider_id' => $rider ,
                ]);

                $count ++;
            } else {
                return Redirect::route('roster.show', $roster->id)->with('global', 'De les zit reeds vol');
            }
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

        if ($subscription->roster->cannotBeCanceled()) {
            return Redirect::route('roster.show', $rosterId)->with('global', 'Je kan je niet meer uitschrijven voor deze les.');
        }

        if ($subscription->lesson()) {
            $subscription->lesson()->delete();
        }

        $subscription->delete();

        return Redirect::route('roster.show', $rosterId)->with('global', 'Uitgeschreven');
    }
}