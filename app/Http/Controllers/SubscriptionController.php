<?php
namespace Vogelzang\Http\Controllers;

use Input;
use Vogelzang\Models\Rider;
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

                $rider = $this->initRider($rider);

                $rider->deductTurn();
                $rider->save();

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

        $rider = $this->initRider($subscription->rider->id);
        $rider->addTurns(1);
        $rider->save();

        if ($subscription->lesson()) {
            $subscription->lesson()->delete();
        }

        $subscription->delete();

        return redirect()->route('roster.show', $rosterId)->with('global', 'Uitgeschreven');
    }

    /**
     * @param int $id
     * @return \Vogelzang\Models\Rider
     */
    private function initRider($id)
    {
        return Rider::find($id);
    }
}
