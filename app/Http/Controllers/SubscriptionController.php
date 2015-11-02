<?php
namespace Vogelzang\Http\Controllers;

use Input;
use Vogelzang\Models\Roster;
use Vogelzang\Models\Subscription;

class SubscriptionController extends Controller
{
    /**
     * @param \Vogelzang\Models\Roster $roster
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Roster $roster)
    {
        $count = count($roster->subscriptions);

        foreach (Input::get('riders') as $rider) {
            if ($count <= $roster->limit) {
                Subscription::create([
                    'roster_id' => $roster->id,
                    'rider_id' => $rider,
                ]);

                $count ++;
            } else {
                return redirect()->route('roster.show', $roster->id)->with('global', 'De les zit reeds vol.');
            }
        }

        return redirect()->route('roster.show', $roster->id)->with('global', 'Ingeschreven!');
    }

    /**
     * @param \Vogelzang\Models\Subscription $subscription
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Subscription $subscription)
    {
        $rosterId = $subscription->roster->id;

        if ($subscription->roster->cannotBeCanceled()) {
            return redirect()->route('roster.show', $rosterId)->with('global', 'Je kan je niet meer uitschrijven voor deze les.');
        }

        if ($subscription->lesson()) {
            $subscription->lesson()->delete();
        }

        $subscription->delete();

        return redirect()->route('roster.show', $rosterId)->with('global', 'Uitgeschreven');
    }
}
