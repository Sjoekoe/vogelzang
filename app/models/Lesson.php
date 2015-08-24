<?php 
 
class Lesson extends \Eloquent
{
    /**
     * @var array
     */
    protected $fillable = ['roster_id', 'rider_id', 'hour', 'pony_id'];

    public function roster()
    {
        return $this->belongsTo('Roster');
    }

    public function rider()
    {
        return $this->belongsTo('Rider');
    }

    public function pony()
    {
        return $this->belongsTo('Pony');
    }
}