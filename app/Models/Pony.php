<?php
namespace Vogelzang\Models;

use Illuminate\Database\Eloquent\Model;

class Pony extends Model
{
    /**
     * @var string
     */
    protected $table = 'ponies';

    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
