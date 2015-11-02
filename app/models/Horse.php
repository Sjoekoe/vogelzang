<?php
namespace Vogelzang\Models;

use Illuminate\Database\Eloquent\Model;

class Horse extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'breed', 'age', 'gender_id', 'price_id', 'description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function gender()
    {
        return $this->hasOne(Gender::class, 'id', 'gender_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function price()
    {
        return $this->hasOne(Price::class, 'id', 'price_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function horsepicture()
    {
        return $this->hasMany(Horsepicture::class);
    }
}
