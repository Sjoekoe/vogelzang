<?php
namespace Vogelzang\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['subject', 'email', 'message', 'full_name'];
}
