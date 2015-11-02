<?php
namespace Vogelzang\Models;

use Illuminate\Database\Eloquent\Model;

class Horsepicture extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['horse_id', 'path'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function horse()
    {
        return $this->belongsTo(Horse::class, 'id', 'horse_id');
    }
}
