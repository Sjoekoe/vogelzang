<?php

class Pony extends \Eloquent
{
    /**
     * @var string
     */
    protected $table = 'ponies';

    /**
     * @var array
     */
    protected $fillable = ['name'];

    public function lessons()
    {
        return $this->hasMany('Lesson');
    }
}