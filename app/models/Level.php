<?php
namespace Vogelzang\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'level_id');
    }
}
