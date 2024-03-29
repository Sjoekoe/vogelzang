<?php
namespace Vogelzang\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Roster extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['date', 'type', 'name', 'description', 'hour', 'limit'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'roster_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    /**
     * @return bool
     */
    public function stillHasPlace()
    {
        return count($this->subscriptions) < $this->limit;
    }

    /**
     * @return bool
     */
    public function canStillBeCanceled()
    {
        $hour = Explode(':', trans('days.hours')[$this->hour]);
        $parsedDate = strtotime($this->date);

        $lessonHour = Carbon::createFromDate(date('Y', $parsedDate), date('m', $parsedDate), date('d', $parsedDate))
            ->hour($hour[0])->minute($hour[1])->second(0);

        $today = Carbon::now();

        if (($lessonHour->diffInHours($today) < 12) || $today > $lessonHour) {
            return false;
        }

        return true;
    }

    /**
     * @return bool
     */
    public function cannotBeCanceled()
    {
        return ! $this->canStillBeCanceled();
    }
}
