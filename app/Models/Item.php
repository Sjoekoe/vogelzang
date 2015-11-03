<?php
namespace Vogelzang\Models;

use Illuminate\Database\Eloquent\Model;
use Vogelzang\User;

class Item extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['title', 'message', 'user_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function itemphoto()
    {
        return $this->hasMany(Itemphoto::class);
    }
}
