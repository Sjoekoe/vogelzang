<?php
namespace Vogelzang\Models;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function horse()
    {
        return $this->belongsTo(Horse::class, 'gender_id');
    }
}
