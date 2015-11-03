<?php
namespace Vogelzang\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Vogelzang\User;

class Rider extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['firstname', 'lastname', 'user_id', 'turns'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    /**
     * @return string
     */
    public function fullName()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    /**
     * @param \Vogelzang\Models\Roster $roster
     * @return bool
     */
    public function hasNoLessonForRoster(Roster $roster)
    {
        foreach ($this->lessons as $lesson) {
            if ($lesson->roster->id == $roster->id) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param \Vogelzang\Models\Roster $roster
     * @return bool
     */
    public function hasNoSubscriptionForRoster(Roster $roster)
    {
        foreach ($this->subscriptions as $subscription) {
            if ($subscription->roster->id == $roster->id) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param int $turns
     */
    public function addTurns($turns)
    {
        $this->turns = $this->turns + $turns;
    }

    public function deductTurn()
    {
        $this->turns = $this->turns - 1;
    }

    /**
     * @return bool
     */
    public function hasNoTurnsLeft()
    {
        return $this->turns <= 0;
    }

    /**
     * @return int
     */
    public function futureLessonsCount()
    {
        $today = Carbon::now();
        $total = 0;

        foreach($this->subscriptions as $subscription) {
            if ($subscription->roster->date > $today) {
                $total ++;
            }
        }

        return $total;
    }
}
