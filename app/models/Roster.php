<?php 
 
class Roster extends \Eloquent
{
    /**
     * @var array
     */
    protected $fillable = ['date', 'type', 'name', 'description', 'hour', 'limit'];

    /**
     * @return Subscription[]
     */
    public function subscriptions()
    {
        return $this->hasMany('Subscription', 'roster_id', 'id');
    }

    public function lessons()
    {
        return $this->hasMany('Lesson');
    }

    /**
     * @return bool
     */
    public function stillHasPlace()
    {
        return count($this->subscriptions) < $this->limit;
    }
}