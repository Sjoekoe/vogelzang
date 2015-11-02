<?php
namespace Vogelzang\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['roster_id', 'rider_id', 'pony_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function roster()
    {
        return $this->belongsTo(Roster::class);
    }

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
    public function pony()
    {
        return $this->belongsTo(Pony::class);
    }
}
