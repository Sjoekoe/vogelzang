<?php 
 
class Subscription extends \Eloquent
{
    /**
     * @var array
     */
    protected $fillable = ['roster_id', 'rider_id'];

    public function rider()
    {
        return $this->belongsTo('Rider');
    }

    public function roster()
    {
        return $this->belongsTo('Roster');
    }

    public function lesson()
    {
        return Lesson::where('roster_id', $this->roster->id)->where('rider_id', $this->rider->id)->first();
    }
}