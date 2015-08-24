<?php

class Rider extends \Eloquent
{
    /**
     * @var array
     */
    protected $fillable = ['firstname', 'lastname', 'user_id'];

    /**
     * @return \User
     */
    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function subscriptions()
    {
        return $this->hasMany('Subscription');
    }

    public function lessons()
    {
        return $this->hasMany('Lesson');
    }

    /**
     * @return string
     */
    public function fullName()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    /**
     * @param \Roster $roster
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

    public function hasNoSubscriptionForRoster(Roster $roster)
    {
        foreach ($this->subscriptions as $subscription) {
            if ($subscription->roster->id == $roster->id) {
                return false;
            }
        }

        return true;
    }
}