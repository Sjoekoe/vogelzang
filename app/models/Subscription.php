<?php
namespace Vogelzang\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['roster_id', 'rider_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rider()
    {
        return $this->belongsTo(Rider::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function roster()
    {
        return $this->belongsTo(Roster::class);
    }

    /**
     * @return \Vogelzang\Models\Lesson
     */
    public function lesson()
    {
        return Lesson::where('roster_id', $this->roster->id)->where('rider_id', $this->rider->id)->first();
    }
}
